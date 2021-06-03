<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="main-left-sidebar">
                            <div class="user_profile" style="margin-top: 30px;">
                                <div class="user-pro-img" style="margin-top: 30px;">
                                    <?php if ($user['foto'] == NULL) : ?>
                                        <img src="https://s16.picofile.com/file/8414366276/105_1055656_account_user_profile_avatar_avatar_user_profile_icon.png" alt="" width="170" height="170">
                                    <?php else : ?>
                                        <img src="<?= base_url('assets/'); ?>foto/<?= $user['foto'] ?>" width="170" height="170" alt="">
                                    <?php endif; ?>
                                </div>
                                <!--user-pro-img end-->
                                <div class="user_pro_status">
                                    <ul class="flw-status" style="margin-bottom: 10px;">
                                        <li>
                                            <?php
                                            $datanik = $user['nik'];
                                            $this->load->model('user_model');
                                            $total = $this->user_model->totalPengaduanById($datanik)->num_rows();
                                            $total2 = $this->user_model->totalPengaduanSelesai($datanik)->num_rows();
                                            $total3 = $this->user_model->totalPengaduanDitolak($datanik)->num_rows();
                                            ?>
                                            <span>Total Pengaduan </span>
                                            <b><?= $total ?></b>
                                        </li>
                                    </ul>
                                    <ul class="flw-status" style="margin-bottom: 10px;">
                                        <li>
                                            <span>Pengaduan Selesai</span>
                                            <b><?= $total2 ?></b>
                                        </li>
                                    </ul>
                                    <ul class="flw-status" style="margin-bottom: 30px;">
                                        <li>
                                            <span>Pengaduan Ditolak</span>
                                            <b><?= $total3 ?></b>
                                        </li>
                                    </ul>
                                    <ul class="flw-status">
                                        <li><button type="button" class="btn btn-own" data-toggle="modal" data-target="#modal-default">
                                                <i class="fa fa-trash-o"></i> Hapus Akun
                                            </button></li>
                                    </ul>
                                </div>
                                <!--user_pro_status end-->
                            </div>
                            <!--user_profile end-->
                        </div>
                        <!--main-left-sidebar end-->
                    </div>
                    <div class="col-lg-9">
                        <div class="main-ws-sec">
                            <div class="user-tab-sec owntext">
                                <h3 style="margin-left: 20px;">Account Information</h3>
                                <br>
                                <div class="post-comment-box">
                                    <div class="user-poster">
                                        <div class="post_comment_sec" style="padding : 30px">
                                            <div class="owntext">
                                                <?php echo form_open_multipart('user/actupdateprofile') ?>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nama :</label>
                                                    <br>
                                                    </br>
                                                    <input type="hidden" class="form-control" name="nik" id="nik" aria-describedby="emailHelp" placeholder="Masukkan Nik" value="<?= $user['nik'] ?>">
                                                    <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" placeholder="Masukkan Nama" value="<?= $user['nama'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Username :</label>
                                                    <br>
                                                    </br>
                                                    <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Masukkan Username" value="<?= $user['username'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">No Telp :</label>
                                                    <br>
                                                    </br>
                                                    <input type="text" class="form-control" name="telp" id="telp" aria-describedby="emailHelp" placeholder="Masukkan No Telp" value="<?= $user['telp'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Foto Profil</label>
                                                    <br>
                                                    </br>
                                                    <div class="input-group">
                                                        <input type="file" name="foto" id="exampleInputFile">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-own">Update</button>
                                                </div>
                                                <?php echo form_close(); ?>
                                            </div>

                                        </div>
                                        <!--post_comment_sec end-->
                                    </div>
                                    <!--user-poster end-->
                                </div>
                                <!--post-comment-box end-->
                            </div>
                            <!--main-ws-sec end-->
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3>Apakah Anda Yakin Ingin Menghapus Akun Ini?</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <a href="<?= base_url('user/hapususer/' . $user['nik']) ?>">
                            <button type="button" class="btn btn-primary">Iya</button>
                        </a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
</main>


<footer>
    <div class="footy-sec mn no-margin">
        <div class="container">
            <ul>
                <li><a href="#" title="">Help Center</a></li>
                <li><a href="#" title="">Privacy Policy</a></li>
                <li><a href="#" title="">Community Guidelines</a></li>
                <li><a href="#" title="">Cookies Policy</a></li>
                <li><a href="#" title="">Career</a></li>
                <li><a href="#" title="">Forum</a></li>
                <li><a href="#" title="">Language</a></li>
                <li><a href="#" title="">Copyright Policy</a></li>
            </ul>
            <p><img src="images/copy-icon2.png" alt="">Copyright 2018</p>
            <img class="fl-rgt" src="images/logo2.png" alt="">
        </div>
    </div>
</footer>
<!--footer end-->




</div>
<!--theme-layout end-->