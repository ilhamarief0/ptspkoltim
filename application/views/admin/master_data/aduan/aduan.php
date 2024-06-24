<div class="container-fluid">
  <?php 
    if($this->session->flashdata('add')){ 
      $message = $this->session->flashdata('add');
      $heading = '#Tambah Aduan';
    }else if($this->session->flashdata('update')){ 
      $message = $this->session->flashdata('update');
      $heading = '#Update Aduan';
    }else if($this->session->flashdata('delete')){
      $message = $this->session->flashdata('delete');
      $heading = '#Delete Aduan';  
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
  <h1 class="h3 mb-2 text-gray-800">Data Aduan</h1>
  <p class="mb-4">Data berikut merupakan kumpulan Aduan yang berlaku di <b>Dinas Lingkungan Hidup dan Kehutanan</b> - Kota Kendari</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <!-- <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#aduanModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a> -->

      <!-- aduan Modal-->
      <div class="modal fade" id="aduanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Aduan Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open_multipart("aduan/input")?>
            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Nama Aduan</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nama Aduan..." name="aduan_name" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Jabatan Aduan</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Jabatan Aduan..." name="aduan_position" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>NIP Aduan</b></label>
                <input type="text" class="form-control" placeholder="Masukkan NIP Aduan..." name="aduan_nip" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Foto Aduan</b></label>
                <input type="file" class="form-control" name="userfile">
              </div>
              
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Tambah</button>
            <?php echo form_close(); ?>
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
              
            </div>
          </div>
        </div>
      </div>


      <a href="<?php echo site_url('aduan')?>" class="btn btn-success btn-icon-split btn-sm">
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
              <th style="width: 19%;">#</th>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Status</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $no=1; foreach($aduan as $key){?>
            <tr>
              <td><?php echo $no;?></td>
              <td>
                
                <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#aduanDetailModal<?php echo $key->aduan_id?>" title="Lihat Detail Aduan">
                  <span class="text">
                    <i class="fa fa-eye"></i>
                  </span>
                </a>
                <?php if($key->aduan_status==0){?>
                |
                <a href="<?php echo site_url('aduan/selesai/'.$key->aduan_id)?>" class="btn btn-success btn-icon-split btn-sm" >
                  <span class="text">
                    <i class="fa fa-check"></i>
                  </span>
                </a>
                <?php }?>

                

                <!-- <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#aduanRemoveModal<?php echo $key->aduan_id?>">
                  <span class="text">
                    <i class="fa fa-trash"></i>
                  </span>
                </a> -->


              </td>
              <td><?php echo $key->aduan_nama?></td>
              <td><?php echo $key->aduan_tanggal?></td>
              <td>
                  <?php 
                    if($key->aduan_status==0){
                      echo "<span class='badge badge-warning'>Dalam Proses</span>";
                    }else{
                      echo "<span class='badge badge-success'>Selesai</span>";
                    }
                  ?>
                  
              </td>
            </tr>

            <!-- Looping Modal Area -->

            <!-- aduan Modal Edit-->
            <div class="modal fade" id="aduanEditModal<?php echo $key->aduan_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Aduan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open_multipart("aduan/edit")?>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for=""><b>Nama Aduan</b></label>
                      <input type="hidden" class="form-control" name="aduan_id" value="<?php echo $key->aduan_id?>">
                      <input type="hidden" class="form-control" name="aduan_picture" value="<?php echo $key->aduan_picture?>">
                      <input type="text" class="form-control" placeholder="Masukkan Nama Aduan..." name="aduan_name" value="<?php echo $key->aduan_name?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for=""><b>Jabatan Aduan</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan Jabatan Aduan..." name="aduan_position" required="required" value="<?php echo $key->aduan_position?>">
                    </div>
                    <div class="form-group">
                      <label for=""><b>NIP Aduan</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan NIP Aduan..." name="aduan_nip" required="required" value="<?php echo $key->aduan_nip?>">
                    </div>
                    <div class="form-group">
                      <label for=""><b>Foto Aduan</b></label>
                      <input type="file" class="form-control" name="userfile">
                    </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-warning" type="submit">Edit</button>
                  <?php echo form_close(); ?>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    
                  </div>
                </div>
              </div>
            </div>

            <!-- aduan Modal Remove-->
            <div class="modal fade" id="aduanRemoveModal<?php echo $key->aduan_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Aduan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open("aduan/delete")?>
                  <div class="modal-body">
                    Apakah anda yakin akan menghapus data Aduan <b><?php echo $key->aduan_name ?></b> ?
                    <input type="hidden" class="form-control" name="aduan_id" value="<?php echo $key->aduan_id?>">
                    <input type="hidden" class="form-control" name="aduan_name" value="<?php echo $key->aduan_name?>">
                    <input type="hidden" class="form-control" name="aduan_picture" value="<?php echo $key->aduan_picture?>">
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Hapus</button>
                  <?php echo form_close(); ?>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    
                  </div>
                </div>
              </div>
            </div>



            <!-- aduan Modal Remove-->
            <div class="modal fade" id="aduanDetailModal<?php echo $key->aduan_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aduan : <?php echo $key->aduan_nama?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                 
                  <div class="modal-body">
                    <b>01. Identitas Pengadu </b>
                    <br>Nama:
                    <br><?php echo $key->aduan_nama;?>
                    <br>
                    <br>Alamat : 
                    <br><?php echo $key->aduan_alamat;?>
                    <br>
                    <br>No. Telpon :
                    <br><?php echo $key->aduan_nohp;?>
                    <br>
                    <hr>
                    <b>02. Lokasi Kejadian </b>
                    <br>Alamat Kejadian:
                    <br><?php echo $key->aduan_alamat_kejadian;?>
                    <br>
                    <hr>
                    <b>03. Dugaan Sumber atau Kejadian  </b>
                    <br>Jenis Kegiatan(Jika Diketahui):
                    <br><?php echo $key->aduan_jeniskegiatan;?>
                    <br>
                    <br>Nama Kegiatan dan/atau usaha (Jika Diketahui) : 
                    <br><?php echo $key->aduan_namakegiatan;?>
                    <br>
                    
                    <hr>
                    <b>04. Waktu dan Uraian Kejadian  </b>
                    <br>Waktu diketahuinya pencemaran dan atau perusakan lingkungan dan/atau perusakan hutan:
                    <br><?php echo $key->aduan_waktudiketahui;?>
                    <br>
                    <br>Uraian Kejadian : 
                    <br><?php echo $key->aduan_uraiankejadian;?>
                    <br>
                    <br>Dampak yang dirasakan akibat pencemaran dan atau perusakan lingkungan dan/atau perusakan hutan :
                    <br><?php echo $key->aduan_dampakdirasakan;?>
                    <br>

                    <hr>
                    <b>05. Penyelesaian yang Diinginkan  </b>
                    <br>Penyelesaian yang Diinginkan:
                    <br><?php echo $key->aduan_penyelesaian;?>
                    <br>
                  </div>
                  <div class="modal-footer">
                    
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