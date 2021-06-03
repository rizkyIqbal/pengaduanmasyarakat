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
                    <?php if ($array == NULL) : ?>
                        <div class="forum-questions">
                            <div class="usr-question">
                                <div class="usr_quest">
                                    <h3>Anda Belum Melakukan Pengaduan. Silahkan lakukan pengaduan <a href="<?= base_url('user/pengaduan') ?>">disini</a></h3>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <?php foreach ($array as $sm) : ?>
                            <div class="forum-questions">
                                <div class="usr-question">
                                    <div class="usr_img">
                                        <img src="http://via.placeholder.com/60x60" alt="">
                                    </div>
                                    <div class="usr_quest">
                                        <a href="<?= base_url('user/isiform/' . $sm['id_pengaduan']) ?>" style="text-decoration: none; color: black;">
                                            <h3><?= $sm['judul_pengaduan'] ?></h3>
                                        </a>
                                        <br>
                                        <ul class="react-links">
                                            <li><a href="#" title=""><?= $sm['tujuan']?></a></li>
                                        </ul>
                                        <ul class="quest-tags">
                                            <li><a href="#" title=""><?= $sm['status'] ?></a></li>
                                        </ul>
                                    </div>
                                    <!--usr_quest end-->
                                    <span class="quest-posted-time"><i class="fa fa-clock-o"></i><?= $sm['created_date']?></span>
                                </div>
                                <!--usr-question end-->
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <!--forum-questions end-->
                </div>
                <div class="col-lg-4">
                    <div class="widget widget-user">
                        <h3 class="title-wd">Pengaduan Yang Selesai</h3>
                        <ul>
                            <?php foreach ($selesai as $s) : ?>
                                <li>

                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3><?= $s['judul_pengaduan'] ?></h3>
                                            <p><?= $s['isi_laporan'] ?></p>
                                        </div>
                                        <div class="hr-rate">
                                            <span><?= $s['username'] ?></span>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!--widget-user end-->
                    <!--widget-adver end-->
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