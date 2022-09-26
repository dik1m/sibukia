<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
    private $view      = "backend/v_user/";
    private $redirect     = "backend/User";

    public function __construct()
    {
        parent::__construct();
        //Load model
        $this->load->model('backend/M_User');
        $this->load->model('backend/M_Home');
        $this->load->library('form_validation');
        IsUser();
    }

    public function index()
    {
        $read = $this->M_User->GetAll();
        $user = $this->session->userdata('kd_user');
        $data = array(
            'user' => $this->M_Home->user($user),
            'judul'    => "DATA USER",
            'sub'    => "Lihat User",
            'read' => $read
        );

        $this->template->load('backend/template', $this->view . 'read', $data);
    }

    public function cetak()
    {
        $read = $this->M_User->GetAll();
        $data = array(
            'judul'    => "DATA USER",
            'sub'    => "Lihat User",
            'read' => $read
        );

        $this->load->view($this->view . 'cetak', $data);
    }

    public function create()
    {
        if ($this->session->userdata('email')) {
            redirect($this->redirect, 'refresh');
        }
        $this->form_validation->set_rules('kd_user', 'Kode user', 'required|trim|is_unique[user.kd_user]', [
            'is_unique' => 'Kode telah digunakan!'
        ]);
        $this->form_validation->set_rules('nm_user', 'Nama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('hp_user', 'Nomor HP', 'required|trim|min_length[10]|max_length[13]|numeric');
        $this->form_validation->set_rules('wa_kduser', 'Kode', 'required|trim|min_length[3]|max_length[6]|numeric');
        $this->form_validation->set_rules('wa_nouser', 'Nomor Whatsapp', 'required|trim|min_length[9]|max_length[13]|numeric');
        $this->form_validation->set_rules('email_user', 'Email', 'required|trim|valid_email|is_unique[user.email_user]', [
            'is_unique' => 'Email telah digunakan!'
        ]);
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'    => "DATA USER",
                'sub'    => "Tambah User",
                'create'     => ''
            );
            $this->template->load('backend/template', $this->view . 'create', $data);
        } else {
            $this->save();
        }
    }

    public function save()
    {
        $email = $this->input->post('email_user', true);
        $data = [
            'kd_user' => $this->input->post('kd_user', true),
            'nm_user' => htmlspecialchars($this->input->post('nm_user', true)),
            'pswd_user' => md5($this->input->post('password1', true)),
            'hp_user' => $this->input->post('hp_user', true),
            'wa_kduser' => $this->input->post('wa_kduser'),
            'wa_nouser' => $this->input->post('wa_nouser', true),
            'email_user' => $email,
            'img_user' => 'default.jpg',
            'active_user' => 0,
            'create_user' => time(),
            'date_user' => date('Y-m-d')
        ];
        // siapkan token
        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'create_token' => time()
        ];

        $this->db->insert('user', $data);
        $this->db->insert('user_token', $user_token);

        $this->_sendEmail($token, 'verify');
        $this->session->set_flashdata('message_true', 'Akun Berhasi tersimpan! Silahkan aktivasi melalui email dengan waktu 24 Jam');
        redirect($this->redirect, 'refresh');
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
        // $this->email->to($this->input->post('email_user'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Klik link ini untuk verifikasi akun : <a href="' . base_url() . 'index.php/Auth/verify?email=' . $this->input->post('email_user') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik link ini untuk reset password : <a href="' . base_url() . 'index.php/Auth/resetpassword?email=' . $this->input->post('email_user') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        // if ($this->email->send()) {
        //     return true;
        // } else {
        //     echo $this->email->print_debugger();
        //     die;
        // }
    }


    public function edit()
    {
        $kd   = $this->uri->segment(4);
        $this->form_validation->set_rules('nm_user', 'Nama', 'required|trim');
        $this->form_validation->set_rules('hp_user', 'Nomor HP', 'required|trim|min_length[10]|max_length[13]|numeric');
        $this->form_validation->set_rules('wa_kduser', 'Kode', 'required|trim|min_length[3]|max_length[6]|numeric');
        $this->form_validation->set_rules('wa_nouser', 'Nomor Whatsapp', 'required|trim|min_length[9]|max_length[13]|numeric');
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'    => "DATA USER",
                'sub'    => "Ubah User",
                'edit'     => $this->M_User->edit($kd)
            );
            $this->template->load('backend/template', $this->view . 'edit', $data);
        } else {
            $this->update();
        }
    }

    public function update()
    {
        $kd = $this->uri->segment(4);
        //img_user
        $name_imguser = $_FILES['img_user']['name'];
        $type_imguser = $_FILES['img_user']['type'];
        $tmp_imguser  = $_FILES['img_user']['tmp_name'];
        //upload img
        if (!empty($tmp_imguser)) {
            if ($type_imguser != "image/jpeg" and $type_imguser != "image/jpg" and $type_imguser != "image/png") {
                $this->session->set_flashdata('message_false', 'Format gambar yang digunakan jpeg|jpg|png');
                redirect($this->redirect, 'refresh');
            } else {
                $img_user = UploadImg($_FILES['img_user'], './assets/img_user/', 'user', 300);
                $data = array(
                    'nm_user' => htmlspecialchars($this->input->post('nm_user', true)),
                    'hp_user' => $this->input->post('hp_user', true),
                    'wa_kduser' => $this->input->post('wa_kduser', true),
                    'wa_nouser' => $this->input->post('wa_nouser', true),
                    'img_user'            => $img_user
                );
            }
        } else {
            $data = array(
                'nm_user' => htmlspecialchars($this->input->post('nm_user', true)),
                'hp_user' => $this->input->post('hp_user', true),
                'wa_kduser' => $this->input->post('wa_kduser', true),
                'wa_nouser' => $this->input->post('wa_nouser', true),
            );
        }
        $this->M_User->update($kd, $data);
        $this->session->set_flashdata('message_true', 'Profil telah berhasil diperbaharui, untuk max logout terlebih dulu');
        redirect('backend/Home', 'refresh');
    }

    public function show()
    {
        $kd   = $this->uri->segment(4);
        $user = $this->session->userdata('kd_user');
        $data = array(
            'user' => $this->M_Home->user($user),
            'judul'    => "DATA USER",
            'sub'    => "Detail User",
            'show'     => $this->M_User->show($kd)
        );
        $this->template->load('backend/template', $this->view . 'show', $data);
    }

    public function changepswd()
    {
        $kd   = $this->uri->segment(4);
        $user = $this->session->userdata('kd_user');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('kd_user');
            $data = array(
                'user' => $this->M_Home->user($user),
                'judul'    => "DATA USER",
                'sub'    => "Ubah Password",
                'edit'     => $this->M_User->changepswd($kd)
            );
            $this->template->load('backend/template', $this->view . 'changepswd', $data);
        } else {
            $this->uchangepswd();
        }
    }


    public function uchangepswd()
    {
        $kd = $this->uri->segment(4);
        $data = array(
            'pswd_user' => md5($this->input->post('password1'))
        );
        $this->M_User->uchangepswd($kd, $data);
        $this->session->set_flashdata('message_true', 'Password berhasil diubah');
        redirect('backend/Home', 'refresh');
    }


    public function delete()
    {
        $kd = $this->uri->segment(4);
        $data = array(
            'kd_user' => $kd
        );
        $this->M_User->delete($data);
        $this->session->set_flashdata('message_true', 'Data telah dihapus');
        redirect($this->redirect, 'refresh');
    }
}
