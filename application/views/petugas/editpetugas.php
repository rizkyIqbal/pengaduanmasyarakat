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
                               <a href="<?= base_url('admin/akun') ?>" class="nav-link active">
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
                       <!-- /.col -->
                       <div class="col-12">
                           <div class="card card-primary">
                               <div class="card-header">
                                   <h3 class="card-title">Update Akun Petugas</h3>
                               </div>
                               <!-- /.card-header -->
                               <!-- form start -->
                               <form method="POST" action="<?= base_url('admin/acteditpetugas/' . $dataselected['id_petugas']) ?>">
                                   <div class="card-body">
                                       <div class="form-group">
                                           <label for="exampleInputEmail1">Nama Petugas</label>
                                           <input type="hidden" class="form-control" id="id" name="id" value="<?= $dataselected['id_petugas'] ?>" placeholder="Masukkan ID">
                                           <input type="text" class="form-control" id="nama" name="nama" value="<?= $dataselected['nama_petugas'] ?>" placeholder="Masukkan Nama">
                                       </div>
                                       <div class="form-group">
                                           <label for="exampleInputEmail1">Username</label>
                                           <input type="text" class="form-control" id="username" name="username" value="<?= $dataselected['username'] ?>" placeholder="Masukkan Username">
                                       </div>
                                       <div class="form-group">
                                           <label for="exampleInputEmail1">Telp</label>
                                           <input type="text" class="form-control" id="telp" name="telp" value="<?= $dataselected['telp'] ?>" placeholder="Masukkan No Telp">
                                       </div>
                                       <!-- /.card-body -->
                                       <div class="card-footer">
                                           <button type="submit" class="btn btn-primary">Submit</button>
                                       </div>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
               <!-- /.container-fluid -->
           </section>
           <!-- /.content -->
       </div>
       <!-- /.content-wrapper -->