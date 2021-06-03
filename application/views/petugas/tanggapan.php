       <!-- Main Sidebar Container -->
       <aside class="main-sidebar sidebar-dark-primary elevation-4">
           <!-- Brand Logo -->
           <a href="<?= base_url('assets/') ?>petugas/index3.html" class="brand-link">
               <img src="<?= base_url('assets/') ?>petugas/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
               <span class="brand-text font-weight-light">AdminLTE 3</span>
           </a>

           <!-- Sidebar -->
           <div class="sidebar">
               <!-- Sidebar user (optional) -->
               <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                   <div class="image">
                       <img src="<?= base_url('assets/') ?>petugas/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                   </div>
                   <div class="info">
                       <a href="#" class="d-block"><?= $user['username'] ?></a>
                   </div>
               </div>

               <!-- SidebarSearch Form -->
               <div class="form-inline">
                   <div class="input-group" data-widget="sidebar-search">
                       <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                       <div class="input-group-append">
                           <button class="btn btn-sidebar">
                               <i class="fas fa-search fa-fw"></i>
                           </button>
                       </div>
                   </div>
               </div>

               <!-- Sidebar Menu -->
               <nav class="mt-2">
                   <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                       <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                       <li class="nav-item ">
                           <a href="<?= base_url('admin') ?>" class="nav-link">
                               <i class="nav-icon fas fa-th"></i>
                               <p>
                                   Laporan
                               </p>
                           </a>

                       </li>
                       <li class="nav-item ">
                           <a href="<?= base_url('admin/tanggapan') ?>" class="nav-link active ">
                               <i class="nav-icon fas fa-edit"></i>
                               <p>
                                   Tanggapan
                               </p>
                           </a>

                       </li>
                       <?php
                        $level = $user['level'];
                        if ($level == 'admin') : ?>
                           <li class="nav-header">Admin</li>
                           <li class="nav-item">
                               <a href="<?= base_url('admin/verifadmin') ?>" class="nav-link">
                                   <i class="nav-icon fas fa-edit"></i>
                                   <p>
                                       Validasi Admin
                                   </p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="<?= base_url('admin/akun') ?>" class="nav-link">
                                   <i class="nav-icon fas fa-user-circle"></i>
                                   <p>
                                       Akun Petugas
                                   </p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="<?= base_url('admin/tambahinstansi') ?>" class="nav-link">
                                   <i class="nav-icon far fa-building"></i></i>
                                   <p>
                                       Tambah Instansi
                                   </p>
                               </a>
                           </li>
                       <?php else : ?>
                           <li class="nav-header">Petugas</li>
                       <?php endif; ?>
                   </ul>
               </nav>
               <!-- /.sidebar-menu -->
           </div>
           <!-- /.sidebar -->
       </aside>


       <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper">
           <!-- Content Header (Page header) -->
           <section class="content-header">
               <div class="container-fluid">
                   <div class="row mb-2">
                       <div class="col-sm-6">
                           <h1>Tanggapan Instansi</h1>
                       </div>
                       <div class="col-sm-6">
                           <ol class="breadcrumb float-sm-right">
                               <li class="breadcrumb-item"><a href="#">Home</a></li>
                               <li class="breadcrumb-item active">Tanggapan</li>
                           </ol>
                       </div>
                   </div>
               </div><!-- /.container-fluid -->
           </section>

           <!-- Main content -->
           <section class="content">
               <div class="container-fluid">
                   <div class="row">
                       <div class="col-12">
                           <div class="card">
                               <div class="card-header">
                                   <h3 class="card-title">Data list Pengaduan Masyarakat yang belum tervalidasi</h3>
                               </div>
                               <!-- /.card-header -->
                               <div class="card-body">
                                   <table id="example1" class="table table-bordered table-striped">
                                       <thead>
                                           <tr>
                                               <th>Username</th>
                                               <th>Pengaduan</th>
                                               <th>Posisi</th>
                                               <th>Status</th>
                                               <th>Action</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <?php
                                            $posisi = $user['posisi'];
                                            $query = "SELECT *
                                            FROM pengaduan JOIN masyarakat 
                                            ON pengaduan.nik = masyarakat.nik
                                            WHERE tujuan = '$posisi' AND
                                            status = 'selesai' OR status = 'proses'
                                            ORDER BY pengaduan.id_pengaduan desc
                                            ";
                                            $array = $this->db->query($query)->result_array();
                                            ?>
                                           <?php foreach ($array as $sm) : ?>
                                               <tr>
                                                   <td><?= $sm['username'] ?></td>
                                                   <td><?= $sm['judul_pengaduan'] ?></td>
                                                   <td><?= $sm['tujuan'] ?></td>
                                                   <td><?= $sm['status']?></td>
                                                   <td>
                                                       <div class="row">
                                                           <?php if($sm['status']=="proses"):?>
                                                           <div class="col-sm-6">
                                                               <a href="<?= base_url('admin/validasipetugas/' . $sm['id_pengaduan']) ?>">
                                                                   <button type="button" class="btn btn-block btn-primary btn-sm">Tanggapi</button>
                                                               </a>
                                                           </div>
                                                           <div class="col-sm-6">
                                                               <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modal-default">Selesaikan Pengaduan</button>
                                                           </div>
                                                           <?php else:?>
                                                            <div class="col-sm-12">
                                                               <button type="button" class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#modal-default2">Batalkan Selesai</button>
                                                           </div>
                                                           <?php endif;?>
                                                       </div>
                                                   </td>
                                               </tr>
                                           <?php endforeach; ?>
                                       </tbody>
                                       <tfoot>
                                           <tr>
                                               <th>Username</th>
                                               <th>Pengaduan</th>
                                               <th>Posisi</th>
                                               <th>Status</th>
                                               <th>Action</th>
                                           </tr>
                                       </tfoot>
                                   </table>
                               </div>
                               <!-- /.card-body -->
                           </div>
                           <!-- /.card -->
                       </div>
                       <!-- /.col -->
                   </div>
                   <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
               <div class="modal fade" id="modal-default">
                   <div class="modal-dialog">
                       <div class="modal-content">
                           <div class="modal-body">
                               <div class="form-group">
                                   <h5>Apakah anda ingin menolak pengaduan ini?</h5>
                               </div>
                           </div>
                           <div class="modal-footer justify-content-between">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                               <a href="<?= base_url('admin/selesaiproses/' . $sm['id_pengaduan'])?>">
                                   <button type="button" class="btn btn-primary">Ya</button>
                               </a>
                           </div>
                       </div>
                       <!-- /.modal-content -->
                   </div>
                   <!-- /.modal-dialog -->
               </div>
               <!-- /.modal -->

               <div class="modal fade" id="modal-default2">
                   <div class="modal-dialog">
                       <div class="modal-content">
                           <div class="modal-body">
                               <div class="form-group">
                                   <h5>Apakah anda ingin membatalkan pengaduan ini?</h5>
                               </div>
                           </div>
                           <div class="modal-footer justify-content-between">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                               <a href="<?= base_url('admin/bataltanggapan/' . $sm['id_pengaduan']) ?>">
                                   <button type="button" class="btn btn-primary">Ya</button>
                               </a>
                           </div>
                       </div>
                       <!-- /.modal-content -->
                   </div>
                   <!-- /.modal-dialog -->
               </div>
               <!-- /.modal -->
           </section>
           <!-- /.content -->
       </div>
       <!-- /.content-wrapper -->