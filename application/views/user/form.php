<section class="forum-sec">
    <div class="container">
        <div class="forum-links">
            <ul>
                <li><a href="<?= base_url('user') ?>" title="">Laporan Terbaru</a></li>
                <li class="active"><a href="<?= base_url('user/pengaduan') ?>" title="">Buat Laporan</a></li>
                <li><a href="<?= base_url('user/myform') ?>" title="">Laporan Saya</a></li>
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
                    <div class="post-comment-box">
                        <div class="user-poster">
                            <div class="post_comment_sec" style="padding : 30px">
                                <div class="owntext">
                                <?= $this->session->flashdata('message'); ?>
                                <?php echo form_open_multipart('user/pengaduan') ?>
                                        <h3>Form Pengaduan</h3>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Judul</label>
                                            <br>
                                            </br>
                                            <input type="text" class="form-control" name="judul" id="judul" aria-describedby="emailHelp" placeholder="Masukkan Judul">
                                            
                                            <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="kwkw" style="margin-bottom: 10px;">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Isi Laporan</label>
                                                <br>
                                                </br>
                                                <textarea style="margin-bottom: 10px;" rows="3" class="form-control" name="isi" id="isi" aria-describedby="emailHelp" placeholder="Masukkan Isi Laporan"></textarea>
                                                <?= form_error('isi', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="kwkw" style="margin-bottom: 10px;">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Pilih Manajemen Tujuan</label>
                                                <br>
                                                </br>
                                                <?php
                                                //  $wk = $this->petugas_model->getInstansi()->result_array();
                                                $nama = $this->petugas_model->getInstansiNama()->result_array();
                                                $nama2 = $this->petugas_model->getInstansiNama2()->result_array();
                                                $arr = array_column($nama2, "nama_instansi");
                                                // var_dump($arr);
                                                // $options = array('Dinas Pendidikan', 'Dinas Perhubungan', 'Badan Kepegawaian Daerah', 'Dinas Komunikasi, Informatika dan Kehumasan');
                                                ?>
                                                <select class="form-control" id="manajemen" name="manajemen">
                                                    <?php foreach ($arr as $option) : ?>
                                                        <?php if ($nama == $option) : ?>
                                                            <option value="<?= $option ?>"><?= $option ?></option>
                                                        <?php else : ?>
                                                            <option value='<?= $option ?>'><?= $option ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                    <label for="exampleInputFile">Foto</label>
                                                    <br>
                                                    </br>
                                                    <div class="input-group">
                                                        <input type="file" name="foto" id="exampleInputFile">
                                                    </div>
                                                </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-own">Submit</button>
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
                <div class="col-lg-4">
                    <div class="widget widget-user">
                        <h3 class="title-wd">Laporan Selesai</h3>
                        <ul>
                            <?php foreach ($limit as $m) : ?>
                                <li>
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3><?= $m['judul_pengaduan'] ?></h3>
                                            <p><?= $m['isi_laporan'] ?></p>
                                        </div>
                                        <div class="hr-rate">
                                            <span><?= $m['username'] ?></span>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
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



</div>
<!--theme-layout end-->