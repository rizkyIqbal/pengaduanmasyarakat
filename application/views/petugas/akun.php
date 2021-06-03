<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | DataTables</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>petugas/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>petugas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>petugas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>petugas/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>petugas/dist/css/adminlte.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('admin/') ?>" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('admin/logout') ?>" class="nav-link">Logout</a>
                </li>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

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
                        <li class="nav-item">
                            <a href="<?= base_url('admin') ?>" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Laporan
                                </p>
                            </a>

                        </li>
                        <li class="nav-item ">
                            <a href="<?= base_url('admin/tanggapan') ?>" class="nav-link ">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Tanggapan
                                </p>
                            </a>

                        </li>
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
                            <h1>Akun Petugas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Akun</li>
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
                                    <h3 class="card-title">Data list akun para petugas dan admin</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Posisi</th>
                                                <th>Level</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $hasil = $this->db->get('petugas')->result_array();
                                            ?>
                                            <?php foreach ($hasil as $sm) : ?>
                                                <tr>
                                                    <td><?= $sm['nama_petugas'] ?></td>
                                                    <td><?= $sm['username'] ?></td>
                                                    <td><?= $sm['posisi'] ?></td>
                                                    <td><?= $sm['level'] ?></td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <a href="<?= base_url('admin/editpetugas/' . $sm['id_petugas']) ?>">
                                                                    <button type="button" class="btn btn-block btn-primary btn-sm">Edit</button>
                                                                </a>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <button type="button" class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#modal-default">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Posisi</th>
                                                <th>Level</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->

                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Buat Akun Petugas</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="POST" action="<?= base_url('admin/akun') ?>">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ID Petugas</label>
                                            <input type="text" class="form-control" id="id" name="id" placeholder="Masukkan ID">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Petugas</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Telp</label>
                                            <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukkan No Telp">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectRounded0">Level</label>
                                            <select class="custom-select rounded-0" id="exampleSelectRounded0" name="level">
                                                <option value="petugas">Petugas</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            //  $wk = $this->petugas_model->getInstansi()->result_array();
                                            $nama = $this->petugas_model->getInstansiNama()->result_array();
                                            $nama2 = $this->petugas_model->getInstansiNama2()->result_array();
                                            $arr = array_column($nama2, "nama_instansi");
                                            // var_dump($arr);
                                            // $options = array('Dinas Pendidikan', 'Dinas Perhubungan', 'Badan Kepegawaian Daerah', 'Dinas Komunikasi, Informatika dan Kehumasan');
                                            ?>
                                            <label for="exampleSelectRounded0">Posisi</label>
                                            <select class="custom-select rounded-0" id="exampleSelectRounded0" name="posisi">
                                                <?php foreach ($arr as $option) : ?>
                                                    <?php if ($nama == $option) : ?>
                                                        <option value="<?= $option ?>"><?= $option ?></option>
                                                    <?php else : ?>
                                                        <option value='<?= $option ?>'><?= $option ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Confirm Password</label>
                                            <input type="password" class="form-control" id="password2" name="password2" placeholder=" Confirm Password">
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="form-group">
                                    <h5>Apakah anda yakin ingin menghapus akun ini?</h5>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a href="<?= base_url('admin/deleteAkunPetugas/' . $sm['id_petugas']) ?>">
                                    <button type="button" class="btn btn-primary">Delete</button>
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
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/') ?>petugas/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/') ?>petugas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('assets/') ?>petugas/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/') ?>petugas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/') ?>petugas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/') ?>petugas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/') ?>petugas/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/') ?>petugas/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/') ?>petugas/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('assets/') ?>petugas/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('assets/') ?>petugas/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('assets/') ?>petugas/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets/') ?>petugas/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets/') ?>petugas/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/') ?>petugas/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets/') ?>petugas/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>