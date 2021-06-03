<section class="forum-sec" style="margin-bottom: 50px">
    <div class="container">
        <div class="forum-links">
            <ul>
                <li class="active"><a href="<?= base_url('user') ?>" title="">Laporan Terbaru</a></li>
                <li><a href="<?= base_url('user/pengaduan') ?>" title="">Buat Laporan</a></li>
                <li><a href="<?= base_url('user/myform') ?>" title="">Laporan Saya</a></li>
            </ul>
        </div>
        <!--forum-links end-->
        <div class="forum-links-btn">
            <a href="#" title=""><i class="fas fa-bars"></i></a>
        </div>
    </div>
</section>
<div class="forum-page">
    <div class="container">
        <div class="forum-questions-sec">
            <div class="row">
                <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                    <div class="main-left-sidebar no-margin">
                        <div class="user-data full-width">
                            <div class="user-profile">
                                <div class="username-dt">
                                    <div class="usr-pic">
                                        <?php if ($user['foto'] == NULL) : ?>
                                            <img src="https://s16.picofile.com/file/8414366276/105_1055656_account_user_profile_avatar_avatar_user_profile_icon.png" width="100" height="100" alt="">
                                        <?php else : ?>
                                            <img src="<?= base_url('assets/'); ?>foto/<?= $user['foto'] ?>" width="100" height="100" alt="">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!--username-dt end-->
                                <div class="user-specs">
                                    <h3><?= $user['username'] ?></h3>
                                    <span><?= $user['level'] ?></span>
                                </div>
                            </div>
                            <!--user-profile end-->
                            <ul class="user-fw-status">
                                <?php
                                $datanik = $user['nik'];
                                $this->load->model('user_model');
                                $total = $this->user_model->totalPengaduanById($datanik)->num_rows();
                                $total2 = $this->user_model->totalPengaduanSelesai($datanik)->num_rows();
                                ?>
                                <li>
                                    <h4>Jumlah Pengaduan</h4>
                                    <span><?= $total; ?></span>
                                </li>
                                <li>
                                    <h4>Pengaduan Yang Selesai</h4>
                                    <span><?= $total2 ?></span>
                                </li>
                                <li>
                                    <a href="<?= base_url('user/profile') ?>" title="">View Profile</a>
                                </li>
                            </ul>
                        </div>
                        <!--user-data end-->
                        <div class="tags-sec full-width">
                            <ul>
                                <li><a href="#" title="">Help Center</a></li>
                                <li><a href="#" title="">About</a></li>
                                <li><a href="#" title="">Privacy Policy</a></li>
                                <li><a href="#" title="">Community Guidelines</a></li>
                                <li><a href="#" title="">Cookies Policy</a></li>
                                <li><a href="#" title="">Career</a></li>
                                <li><a href="#" title="">Language</a></li>
                                <li><a href="#" title="">Copyright Policy</a></li>
                            </ul>
                            <div class="cp-sec">
                                <img src="images/logo2.png" alt="">
                                <p><img src="images/cp.png" alt="">Copyright 2018</p>
                            </div>
                        </div>
                        <!--tags-sec end-->
                    </div>
                    <!--main-left-sidebar end-->
                </div>
                <div class="col-lg-6 col-md-8 no-pd">
                    <div class="main-ws-sec">
                        <div class="posts-section">
                            <?php if ($array == NULL) : ?>
                                <div class="post-bar">
                                    <div class="post_topbar">
                                        <div class="usy-dt">
                                            <h3>Tidak Ada Postingan Terbaru</h3>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <?php foreach ($array as $sm) : ?>
                                    <div class="post-bar">
                                        <div class="post_topbar">
                                            <div class="usy-dt">
                                                <?php if ($sm['foto'] == NULL) : ?>
                                                    <img src="https://s16.picofile.com/file/8414366276/105_1055656_account_user_profile_avatar_avatar_user_profile_icon.png" width="50" height="50" alt="">
                                                <?php else : ?>
                                                    <img src="<?= base_url('assets/'); ?>foto/<?= $sm['foto'] ?>" width="50" height="50" alt="">
                                                <?php endif; ?>
                                                <div class="usy-name">
                                                    <h3><?= $sm['username']; ?></h3>
                                                    <span><img src="images/clock.png" alt=""><?= $sm['created_date']; ?></span>
                                                </div>
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
                                            <span><img src="<?= base_url('assets/foto/') . $sm['foto_pengaduan']?>" width="200px" alt=""></span>
                                        </div>
                                        <?php if ($sm['status'] == "0") : ?>
                                            <div class="job-status-bar" style="margin-left: 5px; margin-bottom: -10px;">
                                                <ul class="like-com">
                                                    <li><a href="#" title="" class="com"><i class="fa fa-comment-o" aria-hidden="true"></i> Comment 1</a></li>
                                                </ul>
                                            </div>
                                            <div class="comment-section">
                                                <div class="comment-sec">
                                                    <ul>
                                                        <li>
                                                            <div class="comment-list" style="margin-left: 10px;" style="margin-left: 10px;">
                                                                <div class="bg-img">
                                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="comment">
                                                                    <h3>Pengaduan belum diverifikasi oleh Petugas</h3>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php elseif ($sm['status'] == "proses") : ?>
                                            <div class="job-status-bar" style="margin-left: 5px; margin-bottom: -10px;">
                                                <ul class="like-com">
                                                    <li><a href="#" title="" class="com"><i class="fa fa-comment-o" aria-hidden="true"></i> Comment 2</a></li>
                                                </ul>
                                            </div>
                                            <div class="comment-section">
                                                <div class="comment-sec">
                                                    <ul>
                                                        <li>
                                                            <div class="comment-list" style="margin-left: 10px;">
                                                                <div class="bg-img">
                                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="comment">
                                                                    <h3>Petugas</h3>
                                                                    <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                                    <p>Pengaduan anda sudah diverifikasi oleh Petugas</p>
                                                                </div>
                                                            </div>
                                                            <!--comment-list end-->
                                                        </li>
                                                        <li>
                                                            <div class="comment-list" style="margin-left: 10px;">
                                                                <div class="bg-img">
                                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="comment">
                                                                    <h3>Petugas</h3>
                                                                    <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                                    <p>Pengaduan anda sudah dikirim ke <?= $sm['tujuan'] ?> oleh Petugas</p>
                                                                </div>
                                                            </div>
                                                            <!--comment-list end-->
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php elseif ($sm['status'] == "ditolak") : ?>
                                            <div class="job-status-bar" style="margin-left: 5px; margin-bottom: -10px;">
                                                <ul class="like-com">
                                                    <li><a href="#" title="" class="com"><i class="fa fa-comment-o" aria-hidden="true"></i> Comment 4</a></li>
                                                </ul>
                                            </div>
                                            <div class="comment-section">
                                                <div class="comment-sec">
                                                    <ul>
                                                        <li>
                                                            <div class="comment-list" style="margin-left: 10px;">
                                                                <div class="bg-img">
                                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="comment">
                                                                    <h3>Pengaduan anda belum diverifikasi oleh Petugas</h3>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="comment-list" style="margin-left: 10px;">
                                                                <div class="bg-img">
                                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="comment">
                                                                    <h3>Petugas</h3>
                                                                    <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                                    <p>Pengaduan anda sudah diverifikasi oleh Petugas</p>
                                                                </div>
                                                            </div>
                                                            <!--comment-list end-->
                                                        </li>
                                                        <li>
                                                            <div class="comment-list" style="margin-left: 10px;">
                                                                <div class="bg-img">
                                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="comment">
                                                                    <h3>Petugas</h3>
                                                                    <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                                    <p>Pengaduan anda sudah dikirim ke <?= $sm['tujuan'] ?> oleh Petugas</p>
                                                                </div>
                                                            </div>
                                                            <!--comment-list end-->
                                                        </li>
                                                        <li>
                                                            <div class="comment-list" style="margin-left: 10px;">
                                                                <div class="bg-img">
                                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="comment">
                                                                    <h3>Pengaduan anda ditolak oleh <?= $sm['tujuan'] ?></h3>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php elseif ($sm['status'] == "selesai") : ?>
                                            <div class="job-status-bar" style="margin-left: 5px; margin-bottom: -10px;">
                                                <ul class="like-com">
                                                    <li><a href="#" title="" class="com"><i class="fa fa-comment-o" aria-hidden="true"></i> Comment 4</a></li>
                                                </ul>
                                            </div>
                                            <?php
                                            $idpengaduan = $sm['id_pengaduan'];
                                            //     $query3 = "SELECT *
                                            //  FROM pengaduan
                                            //  INNER JOIN tanggapan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan
                                            //  WHERE pengaduan.id_pengaduan = '$idpengaduan'";
                                            //     $hasil2 = $this->db->query($query3)->row_array();
                                            $gt = $this->user_model->getDataTanggapan2($idpengaduan)->row_array();
                                            ?>
                                            <div class="comment-section">
                                                <div class="comment-sec">
                                                    <ul>
                                                        <li>
                                                            <div class="comment-list" style="margin-left: 10px;">
                                                                <div class="bg-img">
                                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="comment">
                                                                    <h3>Petugas</h3>
                                                                    <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                                    <p>Pengaduan anda Di verifikasi oleh Petugas</p>
                                                                </div>
                                                            </div>
                                                            <!--comment-list end-->
                                                        </li>
                                                        <li>
                                                            <div class="comment-list" style="margin-left: 10px;">
                                                                <div class="bg-img">
                                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="comment">
                                                                    <h3>Petugas</h3>
                                                                    <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                                    <p>Pengaduan anda sudah dikirim ke <?= $sm['tujuan'] ?> oleh Petugas</p>
                                                                </div>
                                                            </div>
                                                            <!--comment-list end-->
                                                        </li>
                                                        <li>
                                                            <div class="comment-list" style="margin-left: 10px;">
                                                                <div class="bg-img">
                                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="comment">
                                                                    <h3><?= $sm['tujuan'] ?></h3>
                                                                    <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                                    <p><?= $gt['tanggapan'] ?></p>
                                                                </div>
                                                            </div>
                                                            <!--comment-list end-->
                                                        </li>
                                                        <li>
                                                            <div class="comment-list" style="margin-left: 10px;">
                                                                <div class="bg-img">
                                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="comment">
                                                                    <h3><?= $sm['tujuan'] ?></h3>
                                                                    <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                                    <p>Pengaduan akan kami tutup</p>
                                                                </div>
                                                            </div>
                                                            <!--comment-list end-->
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <!--posts-section end-->
                    </div>
                    <!--main-ws-sec end-->
                </div>
                <div class="col-lg-3 pd-right-none no-pd">
                    <div class="right-sidebar">
                        <div class="widget widget-jobs">
                            <div class="sd-title">
                                <h3>Pengaduan Yang Selesai</h3>
                                <i class="la la-ellipsis-v"></i>
                            </div>
                            <div class="jobs-list">
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
                            </div>
                            <!--jobs-list end-->
                        </div>
                        <!--widget-jobs end-->
                    </div>
                    <!--right-sidebar end-->
                </div>
            </div>
        </div><!-- main-section-data end-->
    </div>
</div>




<div class="post-popup pst-pj">
    <div class="post-project">
        <h3>Post a project</h3>
        <div class="post-project-fields">
            <form>
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" name="title" placeholder="Title">
                    </div>
                    <div class="col-lg-12">
                        <div class="inp-field">
                            <select>
                                <option>Category</option>
                                <option>Category 1</option>
                                <option>Category 2</option>
                                <option>Category 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <input type="text" name="skills" placeholder="Skills">
                    </div>
                    <div class="col-lg-12">
                        <div class="price-sec">
                            <div class="price-br">
                                <input type="text" name="price1" placeholder="Price">
                                <i class="la la-dollar"></i>
                            </div>
                            <span>To</span>
                            <div class="price-br">
                                <input type="text" name="price1" placeholder="Price">
                                <i class="la la-dollar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <textarea name="description" placeholder="Description"></textarea>
                    </div>
                    <div class="col-lg-12">
                        <ul>
                            <li><button class="active" type="submit" value="post">Post</button></li>
                            <li><a href="#" title="">Cancel</a></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
        <!--post-project-fields end-->
        <a href="#" title=""><i class="la la-times-circle-o"></i></a>
    </div>
    <!--post-project end-->
</div>
<!--post-project-popup end-->

<div class="post-popup job_post">
    <div class="post-project">
        <h3>Post a job</h3>
        <div class="post-project-fields">
            <form>
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" name="title" placeholder="Title">
                    </div>
                    <div class="col-lg-12">
                        <div class="inp-field">
                            <select>
                                <option>Category</option>
                                <option>Category 1</option>
                                <option>Category 2</option>
                                <option>Category 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <input type="text" name="skills" placeholder="Skills">
                    </div>
                    <div class="col-lg-6">
                        <div class="price-br">
                            <input type="text" name="price1" placeholder="Price">
                            <i class="la la-dollar"></i>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inp-field">
                            <select>
                                <option>Full Time</option>
                                <option>Half time</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <textarea name="description" placeholder="Description"></textarea>
                    </div>
                    <div class="col-lg-12">
                        <ul>
                            <li><button class="active" type="submit" value="post">Post</button></li>
                            <li><a href="#" title="">Cancel</a></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
        <!--post-project-fields end-->
        <a href="#" title=""><i class="la la-times-circle-o"></i></a>
    </div>
    <!--post-project end-->
</div>
<!--post-project-popup end-->


</div>
<!--theme-layout end-->