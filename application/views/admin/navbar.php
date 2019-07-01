<?php $user_level = $this->session->userdata('user_level')?>

<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <!-- Link -->
        <ul class="nav navbar-nav navbar-left">
            <?php echo (isset($halaman) && $halaman == 'home') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('admin', '<span class="glyphicon glyphicon-home"></span> Home');?></li>

            <?php if ($user_level == 'administrator') : ?>
                <?php echo (isset($halaman) && $halaman == 'user') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('admin/user', '<span class="glyphicon glyphicon-user"></span> User');?></li>
            <?php endif ?>

            <?php echo (isset($halaman) && $halaman == 'peserta') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('admin/peserta', '<span class="glyphicon glyphicon-list-alt"></span> Peserta');?></li>
            <?php if ($user_level == 'administrator') : ?>
                <?php echo (isset($halaman) && $halaman == 'pengumuman') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('admin/pengumuman', '<span class="glyphicon glyphicon-bullhorn"></span> Pengumuman'); ?></li>
            <?php endif ?>
            <?php echo (isset($halaman) && $halaman == 'kontak') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('admin/kontak', '<span class="glyphicon glyphicon-envelope"></span> Kontak'); ?></li>
            <?php echo (isset($halaman) && $halaman == 'myadmin') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('admin/myadmin', '<span class="glyphicon glyphicon-user"></span> MyAdmin'); ?></li>

        </ul>
        <!-- end Link -->


        <!-- Informasi login -->
        <p class="navbar-text navbar-right">
            Login sebagai,
            <strong>
                <?php echo anchor('admin/logout',
                    '<span class="glyphicon glyphicon-user"></span> ' . $this->session->userdata('username'),
                    array('class' => 'navbar-link', 'data-confirm' => 'Anda yakin akan logout?')); ?>
            </strong>
        </p>
        <!-- end Informasi login -->

    </div> <!-- container -->
</nav>