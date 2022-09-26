<div class="section-heading">
    <h2 class="text-black"><?php echo $judul ?></h2>
</div>
<form action="<?php echo site_url('AkunUsr/updatechangepswd/'.$changepswd['id_penduduk']) ?>"  method="post">
<div class="row">
	<div class="col-lg-12">
	<?php $this->view('frontend/message'); ?>
	</div>


    <div class="col-12 col-md-8">
    
    <input style="color:#536174" type="password" class="form-control" name="pswd_userb" placeholder="Masukan Password Baru" onKeyPress="return isNumberKey(event)" required oninvalid="this.setCustomValidity('Masukan Password Baru')" oninput="setCustomValidity('')"><p></p>
    <input style="color:#536174" type="password" class="form-control" name="pswd_useru" placeholder="Ulangi Password Baru" onKeyPress="return isNumberKey(event)" required oninvalid="this.setCustomValidity('Ulangi Password Baru')" oninput="setCustomValidity('')"><p></p>
   
  </div>

    <div class="col-12 col-md-3" align="center">
    <div class="single-benefits-thumb" >
      <img src="<?php echo base_url('assets/img_user/'.$changepswd['img_user1']) ?>" width="100%"><p></p>
      <img src="<?php echo base_url(); ?>assets/frontend/img/bg-img/bgfoto.jpg" alt="">
    </div>
    
    </div>
  

  <div class="col-lg-12">
      <a href="<?php echo site_url('AkunUsr/edit/'.$changepswd['id_penduduk']) ?>"><button class="small btn btn-primary px-4 py-2 rounded-0">Perbaharui</button></a>
  </div>
  </form>  
 </div>  
