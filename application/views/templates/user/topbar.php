<header>
    <div class="container">
        <div class="header-data">
            <div class="wkwk" style="margin-top: 2px; margin-left: -7px;">
                <a href="<?= base_url('user') ?>" title=""><img src=" <?= base_url('assets/') ?>logo/logo.png" width="150" height="65" alt="">
                </a>
            </div>
            <!--logo end-->
            <!--search-bar end-->
            <div class="user-account">
                <div class="user-info">
                    <?php if ($user['foto'] == NULL) : ?>
                        <img src="https://s16.picofile.com/file/8414366276/105_1055656_account_user_profile_avatar_avatar_user_profile_icon.png" width="30" height="30" alt="">
                    <?php else : ?>
                        <img src="<?= base_url('assets/'); ?>foto/<?= $user['foto'] ?>" width="30" height="30" alt="">
                    <?php endif; ?>
                    <a href="#" title=""><?= $user['username'] ?></a>
                    <i class="la la-sort-down"></i>
                </div>
                <div class="user-account-settingss">
                    <ul class="us-links">
                        <li><a href="<?= base_url('user/profile') ?>" title="">View Profile</a></li>
                        <li><a href="#" title="">Privacy</a></li>
                        <li><a href="#" title="">Faqs</a></li>
                        <li><a href="#" title="">Terms & Conditions</a></li>
                    </ul>
                    <h3 class="tc"><a href="<?= base_url('auth/logout') ?>" title="">Logout</a></h3>
                </div>
                <!--user-account-settingss end-->
            </div>
        </div>
        <!--header-data end-->
    </div>
</header>
<!--header end-->