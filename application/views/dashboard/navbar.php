<?php
$login_status = $this->session->userdata('login_status');
$user_level = $this->session->userdata('user_level');
?>
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <!-- Navbar Link -->
        <ul class="nav navbar-nav navbar-left">
            <!-- Link Peserta -->
            <?php echo (isset($halaman) && $halaman == 'home') ? '<li class="active">' : '<li>'; ?> <?php echo anchor(site_url('dashboard'), '<span class="glyphicon glyphicon-home"></span> Home');?></li>

            <!-- Link Peserta -->
            <?php echo (isset($halaman) && $halaman == 'peserta') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('dashboard/peserta', '<span class="glyphicon glyphicon-list-alt"></span> Peserta');?></li>

            <!-- Dropdown Informasi -->
            <?php echo (isset($halaman) && preg_match('#(pengumuman|prosedur|jadwal)#', $halaman)) ? '<li class="active">' : '<li>'; ?>
            <?php echo anchor('#', '<span class="glyphicon glyphicon-info-sign"></span> Informasi<span class="caret"></span>', 'class="dropdown-toggle" data-toggle="dropdown"');?>
            <ul class="dropdown-menu" role="menu">
                <?php echo (isset($halaman) && $halaman == 'pengumuman') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('dashboard/pengumuman', '<span class="glyphicon glyphicon-bullhorn"></span> Pengumuman');?></li>
                <?php echo (isset($halaman) && $halaman == 'prosedur') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('dashboard/prosedur', '<span class="glyphicon glyphicon-sort"></span> Prosedur');?></li>
                <?php echo (isset($halaman) && $halaman == 'jadwal') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('dashboard/jadwal', '<span class="glyphicon glyphicon-calendar"></span> Jadwal');?></li>
            </ul>
            </li>
            <!-- Dropdown Informasi end -->

            <!-- Link Hasil Seleksi -->
            <?php if (config_item('ppdb_tahap_ppdb') == 'pengumuman') : ?>
                <?php echo (isset($halaman) && $halaman == 'hasil-seleksi') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('dashboard/hasil-seleksi', '<span class="glyphicon glyphicon-flag"></span> Hasil Seleksi'); ?></li>
            <?php endif ?>

            <!-- Link Kontak -->
            <?php echo (isset($halaman) && $halaman == 'kontak') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('dashboard/kontak', '<span class="glyphicon glyphicon-envelope"></span> Kontak'); ?></li>

            <!-- Link Dropdown Akun Saya -->
            <?php echo (isset($halaman) && preg_match('#(biodata|cetak-biodata)#', $halaman)) ? '<li class="active">' : '<li>'; ?>
            <?php echo anchor('#', '<span class="glyphicon glyphicon-user"></span> Akun Saya<span class="caret"></span>', 'class="dropdown-toggle" data-toggle="dropdown"');?>
                <ul class="dropdown-menu" role="menu">
                    <?php echo (isset($halaman) && $halaman == 'biodata') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('dashboard/biodata', '<span class="glyphicon glyphicon-book"></span> Biodata');?></li>
                    <?php echo (isset($halaman) && $halaman == 'cetak-biodata') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('dashboard/biodata-preview', '<span class="glyphicon glyphicon-print"></span> Cetak Biodata');?></li>
                </ul>
            </li>
            <!-- Link Dropdown Akun Saya -->
        </ul>
        <!-- Navbar Link end -->

        <!-- Informasi login -->
        <?php if (($login_status == true) && ($user_level == 'peserta')) : ?>
        <p class="navbar-text navbar-right">
            Login sebagai,
            <strong>
                <?php echo anchor('dashboard/logout',
                    '<span class="glyphicon glyphicon-user"></span> ' . $this->session->userdata('nama_panggilan'),
                    array('class' => 'navbar-link', 'data-confirm' => 'Anda yakin akan logout?')); ?>
            </strong>
        </p>
        <?php endif ?>
        <!-- end Informasi login -->

    </div> <!-- container -->
</nav>