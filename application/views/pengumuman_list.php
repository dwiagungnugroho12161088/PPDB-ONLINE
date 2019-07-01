<?php
$login_status = $this->session->userdata('login_status');
$user_level = $this->session->userdata('user_level');
?>
<div class="container">
    <h2>Pengumuman</h2>
    <hr>
    <?php if (!empty($pengumuman) && is_array($pengumuman)): ?>
    <div class="row">
        <div class="col-md-12">
        <?php foreach ($pengumuman as $row) : ?>
            <article>
                <h3><?php echo $row->judul ?></h3>
                <p class="text-danger"><strong><em><?php echo ($row->created_at) ?></em></strong></p>
                <?php echo word_limiter($row->isi, 100) ?>
                <!-- Link selengkapnya -->
                <?php
                if ($login_status === true && $user_level === 'peserta') {
                    echo anchor(site_url('dashboard/pengumuman/'.$row->slug), 'Baca Selengkapnya');
                } elseif ($login_status === true && $user_level === 'administrator') {
                    echo anchor(site_url('admin/pengumuman/'.$row->slug), 'Baca Selengkapnya');
                } else {
                    echo anchor(site_url('pengumuman/'.$row->slug), 'Baca Selengkapnya');
                }
                ?>
                <!-- Link selengkapnya end -->

                <!-- Link edit dan hapus -->
                <?php
                if ($login_status == true && $user_level == 'administrator') {
                    echo '<br>';
                    echo anchor('admin/pengumuman/edit/'.$row->id, 'Edit') . ' | ';
                    echo anchor('admin/pengumuman/hapus/'.$row->id, 'Hapus', 'data-confirm="Anda yakin akan menghapus data ini?"');
                }
                ?>
                <!-- /Link edit dan hapus -->
            </article>
        <?php endforeach ?>
        </div>
    </div>
    <?php else: ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <?php echo $pengumuman ?>
                </div>
            </div>
        </div>
    <?php endif ?>

    <hr>


    <div class="row">
        <div class="col-xs-12 col-md-6">
            <?php echo (! empty($paging)) ? $paging : '' ?>
        </div>

        <div class="col-xs-12 col-md-6">
            <?php
            if ($user_level == 'administrator' && $login_status == true) {
                echo anchor('admin/pengumuman/tambah', 'Tambah', 'class="btn btn-primary" id="btn-tambah-pengumuman"');
            }
            ?>
        </div>
    </div>

</div> <!-- /Container-->