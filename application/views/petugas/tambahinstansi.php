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
                           <a href="<?= base_url('admin/tanggapan') ?>" class="nav-link">
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
                               <a href="<?= base_url('admin/tambahinstansi') ?>" class="nav-link active">
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
                           <h1>Admin Page</h1>
                       </div>
                       <div class="col-sm-6">
                           <ol class="breadcrumb float-sm-right">
                               <li class="breadcrumb-item"><a href="#">Home</a></li>
                               <li class="breadcrumb-item active">DataTables</li>
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
                           <div class="card card-primary">
                               <div class="card-header">
                                   <h3 class="card-title">Tambah Instansi</h3>
                               </div>
                               <!-- /.card-header -->
                               <!-- form start -->
                               <form method="POST" action="<?= base_url('admin/tambahinstansi') ?>">
                                   <div class="card-body">
                                       <div class="form-group">
                                           <label for="exampleInputEmail1">Nama Instansi</label>
                                           <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Instansi">
                                       </div>
                                       <!-- /.card-body -->

                                       <button type="submit" class="btn btn-primary">Submit</button>
                               </form>
                           </div>
                           <!-- /.card -->
                           </button>
                       </div>
                       <!-- /.col -->
                   </div>
                   <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
               <div class="modal fade" id="modal-default">
                   <div class="modal-dialog">
                       <div class="modal-content">
                           <form action="<?= base_url('admin/actverifadmin') ?>" method="POST">
                               <div class="modal-header">
                                   <h4 class="modal-title">Cek Tujuan</h4>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                               <div class="modal-body">
                                   <div class="form-group">
                                       <?php
                                        //  $wk = $this->petugas_model->getInstansi()->result_array();
                                        $nama = $this->petugas_model->getInstansiNama()->result_array();
                                        $nama2 = $this->petugas_model->getInstansiNama2()->result_array();
                                        $tujuan = $dataselected['tujuan'];
                                        $arr = array_column($nama2, "nama_instansi");
                                        // var_dump($tujuan);
                                        // $options = array('Dinas Pendidikan', 'Dinas Perhubungan', 'Badan Kepegawaian Daerah', 'Dinas Komunikasi, Informatika dan Kehumasan');
                                        ?>
                                       <label for="exampleSelectRounded0">Tujuan</label>
                                       <input type="text" name="id_pengaduan" value="<?= $dataselected['id_pengaduan'] ?>">
                                       <select class="custom-select rounded-0" id="exampleSelectRounded0" name="tujuan">
                                           <?php foreach ($arr as $option) : ?>
                                               <?php if ($tujuan == $option) : ?>
                                                   <option value="<?= $option ?> " selected><?= $option ?></option>
                                               <?php else : ?>
                                                   <option value='<?= $option ?>'><?= $option ?></option>
                                               <?php endif; ?>
                                           <?php endforeach; ?>
                                       </select>
                                       <input type="hidden" name="id_pengaduan" id="id_pengaduan" value="<?= $dataselected['id_pengaduan'] ?>">
                                   </div>
                               </div>
                               <div class="modal-footer justify-content-between">
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                   <button type="submit" class="btn btn-primary">Save changes</button>
                               </div>
                           </form>
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