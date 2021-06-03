<section class="forum-sec">
    <div class="container">
        <div class="forum-links">
            <ul>
                <li><a href="<?= base_url('user') ?>" title="">Laporan Terbaru</a></li>
                <li><a href="<?= base_url('user/pengaduan') ?>" title="">Buat Laporan</a></li>
                <li class="active"><a href="<?= base_url('user/myform') ?>" title="">Laporan Saya</a></li>
            </ul>
        </div>
        <!--forum-links end-->
        <div class="forum-links-btn">
            <a href="#" title=""><i class="fa fa-bars"></i></a>
        </div>
    </div>
</section>

<section class="forum-page">
    <div class="container">
        <div class="forum-questions-sec">
            <div class="row">
                <div class="col-lg-8">
                    <div class="forum-post-view">
                        <div class="usr-question">
                            <div class="usr_img">
                                <img src="http://via.placeholder.com/60x60" alt="">
                            </div>
                            <div class="usr_quest">
                                <h3><?= $haha['judul_pengaduan'] ?></h3>
                                <ul class="react-links">
                                <span><i class="fa fa-clock-o"></i><?= $haha['update_date']?></span>
                                </ul>
                                <ul class="quest-tags" style="margin-top : -0px">
                                    <li><a href="#" title=""><?= $haha['status'] ?></a></li>
                                </ul>
                                <p>
                                    <?= $haha['isi_laporan'] ?>
                                </p>
                                <div class="comment-section">
                                    <h3>Proses Pengaduan</h3>
                                    <div class="comment-sec">
                                        <ul>
                                            <?php if ($haha['status'] == "0") : ?>
                                                <li>
                                                    <div class="comment-list">
                                                        <div class="comment">
                                                            <h3>Pengaduan anda belum diverifikasi oleh Petugas</h3>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php elseif ($haha['status'] == "proses") : ?>
                                                <li>
                                                    <div class="comment-list">
                                                        <div class="comment">
                                                            <h3>Petugas</h3>
                                                            <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                            <p>Pengaduan anda sudah diverifikasi oleh Petugas</p>
                                                        </div>
                                                    </div>
                                                    <!--comment-list end-->
                                                </li>
                                                <li>
                                                    <div class="comment-list">
                                                        <div class="comment">
                                                            <h3>Petugas</h3>
                                                            <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                            <p>Pengaduan anda sudah dikirim ke <?= $haha['tujuan'] ?> oleh Petugas</p>
                                                        </div>
                                                    </div>
                                                    <!--comment-list end-->
                                                </li>
                                            <?php elseif ($haha['status'] == "ditolak") : ?>
                                                <li>
                                                    <div class="comment-list">
                                                        <div class="comment">
                                                            <h3>Pengaduan anda belum diverifikasi oleh Petugas</h3>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="comment-list">
                                                        <div class="comment">
                                                            <h3>Petugas</h3>
                                                            <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                            <p>Pengaduan anda sudah diverifikasi oleh Petugas</p>
                                                        </div>
                                                    </div>
                                                    <!--comment-list end-->
                                                </li>
                                                <li>
                                                    <div class="comment-list">
                                                        <div class="comment">
                                                            <h3>Petugas</h3>
                                                            <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                            <p>Pengaduan anda sudah dikirim ke <?= $haha['tujuan'] ?> oleh Petugas</p>
                                                        </div>
                                                    </div>
                                                    <!--comment-list end-->
                                                </li>
                                                <li>
                                                    <div class="comment-list">
                                                        <div class="comment">
                                                            <h3>Pengaduan anda ditolak oleh <?= $haha['tujuan'] ?></h3>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php elseif ($haha['status'] == "selesai") : ?>
                                                <li>
                                                    <div class="comment-list">
                                                        <div class="comment">
                                                            <h3>Petugas</h3>
                                                            <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                            <p>Pengaduan anda Di verifikasi oleh Petugas</p>
                                                        </div>
                                                    </div>
                                                    <!--comment-list end-->
                                                </li>
                                                <li>
                                                    <div class="comment-list">
                                                        <div class="comment">
                                                            <h3>Petugas</h3>
                                                            <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                            <p>Pengaduan anda sudah dikirim ke <?= $haha['tujuan'] ?> oleh Petugas</p>
                                                        </div>
                                                    </div>
                                                    <!--comment-list end-->
                                                </li>
                                                <li>
                                                    <div class="comment-list">
                                                        <div class="comment">
                                                            <h3><?= $haha['tujuan'] ?></h3>
                                                            <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                            <p><?= $hehe['tanggapan'] ?></p>
                                                        </div>
                                                    </div>
                                                    <!--comment-list end-->
                                                </li>
                                                <li>
                                                    <div class="comment-list">
                                                        <div class="comment">
                                                            <h3><?= $haha['tujuan'] ?></h3>
                                                            <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                            <p>Pengaduan akan kami tutup</p>
                                                        </div>
                                                    </div>
                                                    <!--comment-list end-->
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <!--comment-sec end-->
                                </div>
                            </div>
                            <!--usr_quest end-->
                        </div>
                        <!--usr-question end-->
                        <!--usr-question end-->
                    </div>
                    <!--forum-questions end-->
                </div>
                <div class="col-lg-4">
                    <div class="widget widget-user">
                        <h3 class="title-wd">Pengaduan Yang Selesai</h3>
                        <ul>
                            <li>
                            <?php foreach ($selesai as $s) : ?>
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3><?= $s['judul_pengaduan'] ?></h3>
                                            <p><?= $s['isi_laporan'] ?></p>
                                        </div>
                                        <div class="hr-rate">
                                            <span><?= $s['username'] ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </li>
                                
                        </ul>
                    </div>
                    <!--widget-user end-->
                </div>
            </div>
        </div>
        <!--forum-questions-sec end-->
    </div>
</section>
<!--forum-page end-->

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


