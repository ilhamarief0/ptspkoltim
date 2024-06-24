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
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Layanan</h1>
  <p class="mb-4">Data berikut merupakan kumpulan Layanan yang berlaku di <b>DPMPTSP</b> - Kabupaten Kolaka Timur</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="<?php echo site_url('service/add')?>" class="btn btn-primary btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>

      <!-- service Modal-->
      


      <a href="<?php echo site_url('service')?>" class="btn btn-success btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-refresh"></i>
        </span>
        <span class="text">Refresh Halaman</span>
      </a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 5%;">No</th>
              <th style="width: 12%;">#</th>
              <th>Judul</th>
              <th>Isi Layanan</th>
              <th>Kategori</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $no=1; foreach($service as $key){?>
            <tr>
              <td><?php echo $no;?></td>
              <td>
                <a href="<?php echo site_url('service/update/'.$key->service_id)?>" class="btn btn-warning btn-icon-split btn-sm" >
                  <span class="text">
                    <i class="fa fa-edit"></i>
                  </span>
                </a>
                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#serviceRemoveModal<?php echo $key->service_id?>">
                  <span class="text">
                    <i class="fa fa-trash"></i>
                  </span>
                </a>

              </td>
              <td><?php echo $key->service_title?></td>
              <td><?php echo substr($key->service_text,0,150)." ..."?></td>
              <td><?php echo $key->service_category_name?></td>
            </tr>

            <!-- Looping Modal Area -->

            
          

            <!-- service Modal Remove-->
            <div class="modal fade" id="serviceRemoveModal<?php echo $key->service_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Layanan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open("service/delete")?>
                  <div class="modal-body">
                    Apakah anda yakin akan menghapus data Layanan <b><?php echo $key->service_name ?></b> ?
                    <input type="hidden" class="form-control" name="service_id" value="<?php echo $key->service_id?>">
                    <input type="hidden" class="form-control" name="service_name" value="<?php echo $key->service_name?>">
                    <input type="hidden" class="form-control" name="service_picture" value="<?php echo $key->service_picture?>">
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Hapus</button>
                  <?php echo form_close(); ?>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    
                  </div>
                </div>
              </div>
            </div>

            <!-- End Looping -->


            <?php $no++; } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->