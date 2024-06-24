<div class="container-fluid">
  <?php 
    if($this->session->flashdata('add')){ 
      $message = $this->session->flashdata('add');
      $heading = '#Tambah Layanan';
    }else if($this->session->flashdata('update')){ 
      $message = $this->session->flashdata('update');
      $heading = '#Update Layanan';
    }else if($this->session->flashdata('delete')){
      $message = $this->session->flashdata('delete');
      $heading = '#Delete Layanan';  
    } 
  ?>
  <?php if(isset($message)){ ?>
  <script>
    $(document).ready(function(){
      $.toast({
        text : '<?php echo $message;?>',
        heading : '<?php echo $heading;?>',
        position : 'top-right',
        width : 'auto',
        showHideTransition : 'slide',
        icon: 'info',
        hideAfter: 5000
      })
    });
  </script>
  <?php } ?>
  <script src="<?php echo base_url()?>assets/plugin-new/ckeditor/ckeditor.js"></script>
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Layanan</h1>
  <p class="mb-4">Data berikut merupakan kumpulan Layanan yang berlaku di <b>DPMPTSP</b> - Kabupaten Kolaka Timur</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      
      <a href="<?php echo site_url('service')?>" class="btn btn-warning btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-arrow-left"></i>
        </span>
        <span class="text">Kembali</span>
      </a>

      <a href="<?php echo site_url('service/add')?>" class="btn btn-success btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-refresh"></i>
        </span>
        <span class="text">Refresh Halaman</span>
      </a>
      
    </div>
    <div class="card-body">
      
      <?php echo form_open_multipart("service/input")?>
      <div class="form-group">
        <label for=""><b>Judul Layanan</b></label>
        <input type="text" class="form-control" name="service_title" required="required">
        <input type="hidden" class="form-control" name="service_author" required="required" value="<?php echo $this->session->userdata('user_id')?>">
      </div>
      <div class="form-group">
        <label for=""><b>File Dokumen</b></label>
        <input type="file" class="form-control" name="userfile" required="required">
      </div>
       <div class="form-group">
        <label for=""><b>Keterangan Layanan</b></label>
        <textarea class="form-control" name="service_text" id="editor1" rows="10" cols="80" required="required"></textarea>
      </div>
      
      <div class="form-group">
        <label for=""><b>Kategori Layanan</b></label>
        <select class="form-control" name="service_category_id" required="required">
          <option value="">-Pilih Kategori-</option>
          <?php foreach($jenis as $j){
                  
          ?>
          
          <option value="<?php echo $j->service_category_id?>"><?php echo $j->service_category_name?></option>
          <?php  }?>
        </select>
      </div>
      <hr>
      <button style="width: 100%" class="btn btn-success" type="submit">Tambah Layanan</button>
      <?php echo form_close(); ?>
    </div>
  </div>

  <script type="text/javascript">
    CKEDITOR.replace( 'editor1' );
  </script>

</div>
<!-- /.container-fluid -->