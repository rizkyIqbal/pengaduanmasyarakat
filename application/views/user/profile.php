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
                                        <img src="https://s16.picofile.com/file/8414366276/105_1055656_account_user_profile_avatar_avatar_user_profile_icon.png" width="170" height="170" alt="">
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
                    <div class="col-lg-6">
                        <div class="main-ws-sec">
                            <div class="row">
                                <div class=" col-sm-6">
                                    <div class="user-tab-sec">
                                        <h3><?= $user['nama'] ?></h3>
                                        <div class="star-descp">
                                            <span><?= $user['username'] ?></span>
                                        </div>
                                    </div>
                                    <!--star-descp end-->
                                </div>
                                <div class="col-sm-6">
                                    <div class="message-btn">
                                        <a href="<?= base_url('user/editprofile') ?>" title=""><i class="fa fa-pencil"></i> Edit Profile</a>
                                    </div>
                                </div>
                            </div>
                            <!--user-tab-sec end-->
                            <?php
                            $username = $user['username'];
                            $query = "SELECT *
                            FROM pengaduan JOIN masyarakat 
                            ON pengaduan.nik = masyarakat.nik
                            WHERE username= '$username'
                            ORDER BY pengaduan.id_pengaduan desc
                            ";
                            $array = $this->db->query($query)->result_array();
                            ?>
                            <?php if ($array == NULL) : ?>
                                <div class="forum-questions">
                                    <div class="usr-question">
                                        <div class="usr_quest">
                                            <h3>Anda Belum Melakukan Pengaduan. </h3>
                                            <h3>Silahkan lakukan pengaduan <a href="<?= base_url('user/pengaduan') ?>">disini</a></h3>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <?php foreach ($array as $sm) : ?>
                                    <div class="post-bar">
                                        <div class="post_topbar">
                                            <div class="usy-dt">
                                                <?php if ($user['foto'] == NULL) : ?>
                                                    <img src="https://s16.picofile.com/file/8414366276/105_1055656_account_user_profile_avatar_avatar_user_profile_icon.png" width="50" height="50" alt="">
                                                <?php else : ?>
                                                    <img src="<?= base_url('assets/'); ?>foto/<?= $user['foto'] ?>" width="50" height="50" alt="">
                                                <?php endif; ?>
                                                <div class="usy-name">
                                                    <h3><?= $sm['username']; ?></h3>
                                                    <span><img src="images/clock.png" alt=""><?= $sm['created_date']; ?></span>
                                                </div>
                                            </div>
                                            <div class="ed-opts">
                                                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                <ul class="ed-options">
                                                    <li><a href="#" title="">Edit Post</a></li>
                                                    <li><a href="#" title="">Unsaved</a></li>
                                                    <li><a href="#" title="">Unbid</a></li>
                                                    <li><a href="#" title="">Close</a></li>
                                                    <li><a href="#" title="">Hide</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="job_descp">
                                            <ul class="job-dt">
                                                <li><a href="#" title=""><?= $sm['status']; ?></a></li>
                                            </ul>
                                            <h3><?= $sm['judul_pengaduan'] ?></h3>
                                            <p><?= $sm['isi_laporan']; ?></p>
                                            <ul class="skill-tags">
                                                <li><a href="#" title=""><?= $sm['tujuan']; ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <!--product-feed-tab end-->
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


<footer  style="margin-top : 35px;">
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


</div>
<!--theme-layout end-->


<script type="text/javascript" src="<?= base_url('assets/') ?>user/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>user/js/popper.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>user/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>user/js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>user/lib/slick/slick.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>user/js/scrollbar.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>user/js/script.js"></script>

</body>

</html>