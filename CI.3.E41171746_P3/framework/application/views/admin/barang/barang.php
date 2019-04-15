<?php
$data['Judul'] = 'Halaman Dashboard';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Pemanggilan modul head.php -->
  <?php $this->load->view('admin/_partials/head' , $data);?>
</head>

  <body id="page-top">
    <!-- Pemanggilan navbar -->
    <?php $this->load->view('admin/_partials/navbar');?>

    <div id="wrapper">
      <!-- Pemanggilan sidebar -->
      <?php $this->load->view('admin/_partials/sidebar');?>

      <div id="content-wrapper">

        <div class="container-fluid">
          
          <!-- Breadcrumbs-->
          <?php $this->load->view('admin/_partials/breadcrumbs');?>

          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahModal">
                    Tambah Barang
                  </button>
          <!-- Icon Cards-->
            <div class="card-body">
                  
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacinwg="0">
                    <thead>
                      <tr class="text-center">
                          <th>No</th>
                          <th>Kode Barang</th>
                          <th>Nama</th>
                          <th>Deskripsi</th>
                          <th>Stok Barang</th>
                          <th>Harga Barang</th>
                          <th>Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach ($barang as $ambildata): ?>
                              <tr>
                              <td><?= $no ?></td>
                              <td><?= $ambildata-> kdbarang ?></td>
                              <td><?= $ambildata-> nama ?></td>
                              <td><?= $ambildata-> deskripsi ?></td>
                              <td><?= $ambildata-> stokbarang ?></td>
                              <td><?= $ambildata-> hargabarang ?></td>
                              <td><a class="btn btn-small"><i class="fas fa-edit" data-toggle="modal" data-target="#editModal"></i></a>                       
                              <a href="<?php echo base_url ("admin/Barang/delete/".$ambildata->idbarang); ?>" class="btn btn-small text-danger"><i class="fas fa-trash" onclick="return confirm('Yakin ?')"></i></a></td>
                          </tr>
                    </tbody>
                    <?php $no++; endforeach; ?>
                </table>
                 </div>
            </div>     


        </div>  
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php $this->load->view('admin/_partials/footers');?>
        
      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php $this->load->view('admin/_partials/modal');?>
    <!-- Tambah Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="judulModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title" id="judulModal">Tambah Barang</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url().'admin/Barang/add'; ?>" method="post">
            <?php validation_errors();?>
              <div class="form-group">
                <label for="kdbarang">Kode Barang</label>
                <input type="text" class="form-control" id="kdbarang" name = "kdbarang">
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name = "nama">
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name = "deskripsi">
              </div>
              <div class="form-group">
                <label for="stokbarang">Stok Barang</label>
                <input type="text" class="form-control" id="stok barang" name = "stokbarang">
              </div>
              <div class="form-group">
                <label for="hargabarang">Harga Barang</label>
                <input type="number" class="form-control" id="hargabarang" name = "hargabarang">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add" class="btn btn-primary">Tambah Data</button>
            </form>  
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Edit -->
        <!-- Tambah Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="judulModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title" id="judulModal">Edit Barang</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
          <?php foreach($barang as $ambildata);{ ?>
            <form action="<?php echo base_url().'admin/Barang/update'; ?>" method="post">
            <?php validation_errors();?>
              <div class="form-group">
                <label for="kdbarang">Kode Barang</label>
                <input type="hidden" name="idbarang" value="<?php echo $ambildata->idbarang ?>">
                <input type="text" class="form-control" id="kdbarang" name = "kdbarang" value="<?php echo $ambildata->kdbarang ?>">
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name = "nama" value="<?php echo $ambildata->nama?>">
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name = "deskripsi" value="<?php echo $ambildata->deskripsi ?>">
              </div>
              <div class="form-group">
                <label for="stokbarang">Stok Barang</label>
                <input type="text" class="form-control" id="stok barang" name = "stokbarang" value="<?php echo $ambildata->stokbarang ?>">
              </div>
              <div class="form-group">
                <label for="hargabarang">Harga Barang</label>
                <input type="number" class="form-control" id="hargabarang" name = "hargabarang" value="<?php echo $ambildata->hargabarang ?>">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add" class="btn btn-primary">Update Data</button>
            </form>
          <?php } ?>  
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <?php $this->load->view('admin/_partials/js');?>

  </body>

</html>
