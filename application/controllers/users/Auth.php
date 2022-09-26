<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    private $redirect     = "users/Auth";

    public function __construct()
    {
        parent::__construct();
        //Load model
        $this->load->model('users/M_Auth');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $this->form_validation->set_rules('no_kia', 'Nomor Buku KIA', 'trim|required');
        $this->form_validation->set_rules('pswd_kia', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('users/login', $data);
        } else {
            // validasinya success
            $this->_login();
        }
    }

    private function _login()
    {
        $no_kia     = $this->input->post('no_kia');
        $pswd_kia    = md5($this->input->post('pswd_kia'));
        $verify = $this->M_Auth->CekLogin('kia', $no_kia, $pswd_kia);
        $user = $this->db->get_where('kia', ['no_kia' => $no_kia])->row_array();
        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            // if ($user['active_peop'] == 1) {
            //jika login
            //if (password_verify($pswd, $user['pswd_peop'])) {
            if ($verify > 0) {
                $data = array(
                    'no_kia'     => $user['no_kia'],
                    'nmibu_kia'     => $user['nmibu_kia'],
                    'email_kia'     => $user['email_kia'],
                    'IsUsers'        => 1
                );
                $this->session->set_userdata($data);
                $this->session->set_flashdata('message_true', 'hello.. ' . $this->session->userdata('nm_peop') . ' Selamat Datang dihalaman useristartor');
                redirect('users/Home', 'refresh');
            } else {
                $this->session->set_flashdata('message_false', '<center>Login Gagal!<br> Password Salah</center>');
                redirect($this->redirect, 'refresh');
            }
            // } else {
            //     $this->session->set_flashdata('message_false', '<center>Login Gagal!<br>Email belum aktif</center>');
            //     redirect($this->redirect, 'refresh');
            // }
        } else {
            $this->session->set_flashdata('message_false', '<center>Login Gagal!<br>No. Buku KIA tidak tersedia</center>');
            redirect($this->redirect, 'refresh');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Home', 'refresh');
    }

    public function forgotPassword()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('email_peop', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('users/forgot_password', $data);
        } else {
            $email = $this->input->post('email_peop');
            $user = $this->db->get_where('user', ['email_peop' => $email])->row_array();
            if ($user) {
                if ($user['active_peop'] == 1) {
                    $token = base64_encode(random_bytes(32));
                    $user_token = [
                        'email' => $email,
                        'token' => $token,
                        'create_token' => time()
                    ];

                    $this->db->insert('user_token', $user_token);
                    $this->_sendEmail($token, 'forgot');
                    $this->session->set_flashdata('message_true', '<center>Silahkan cek email untuk melakukan reset password</center>');
                    redirect('Auth/forgotpassword');
                } else {
                    $this->session->set_flashdata('message_false', '<center>Email Gagal!<br>Email belum aktif</center>');
                    redirect('Auth/forgotpassword');
                }
            } else {
                $this->session->set_flashdata('message_false', '<center>Email Gagal!<br>Email tidak tersedia</center>');
                redirect('Auth/forgotpassword');
            }
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'projek4ji@gmail.com',
            'smtp_pass' => 'Pa55w@rd',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        // $this->email->initialize($config);
        // $this->email->from('projek4ji@gmail.com', 'Wesite Desa');
        // $this->email->to($this->input->post('email_peop'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Klik link ini untuk verifikasi akun : <a href="' . base_url() . 'index.php/Auth/verify?email=' . $this->input->post('email_peop') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik link ini untuk reset password : <a href="' . base_url() . 'index.php/Auth/resetpassword?email=' . $this->input->post('email_peop') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        // if ($this->email->send()) {
        //     return true;
        // } else {
        //     echo $this->email->print_debugger();
        //     die;
        // }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('user', ['email_peop' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message_false', '<center>Reset password Gagal! Token salah</center>');
                redirect($this->redirect, 'refresh');
            }
        } else {
            $this->session->set_flashdata('message_false', '<center>Reset password Gagal! Email salah</center>');
            redirect($this->redirect, 'refresh');
        }
    }


    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect($this->redirect, 'refresh');
        }

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('backend/change_password', $data);
        } else {
            $password = md5($this->input->post('password1'));
            $email = $this->session->userdata('reset_email');

            $this->db->set('pswd_peop', $password);
            $this->db->where('email_peop', $email);
            $this->db->update('people');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);
            $this->session->set_flashdata('message_true', '<center>Password berhasil diubah! silahkan login</center>');
            redirect($this->redirect, 'refresh');
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email_peop' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('active_peop', 1);
                    $this->db->where('email_peop', $email);
                    $this->db->update('people');

                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message_true', 'Akun telah aktif! silahkan melakukan login</center>');
                    redirect($this->redirect, 'refresh');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message_false', '<center>Akun Gagal! waktu aktivasi habis</center>');
                    redirect($this->redirect, 'refresh');
                }
            } else {
                $this->session->set_flashdata('message_false', '<center>Akun Gagal! Kode salah</center>');
                redirect($this->redirect, 'refresh');
            }
        } else {
            $this->session->set_flashdata('message_false', '<center>Akun Gagal! Email salah</center>');
            redirect($this->redirect, 'refresh');
        }
    }
}
