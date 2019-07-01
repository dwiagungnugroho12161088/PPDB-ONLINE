<?php
// Nomor urut data di tabel.
$per_page = 2;

// Posisi nomor halaman (untuk paging) jika user login / tidak.
$login_status = $this->session->userdata('login_status');
$user_level = $this->session->userdata('user_level');
if ($login_status ==  true && $user_level == 'peserta') {
    $page = $this->uri->segment(4);
} else {
    $page = $this->uri->segment(3);
}

// Nomor urut data di tabel.
// Ini karena library pagination menggunakan option 'use_page_numbers' => true.
if (empty($page)) {
    $offset = 0;
} else {
    $offset = ($page * $per_page - $per_page);
}
?>

<div class="container">
    <h2>Data Peserta</h2>
    <hr>

    <!-- Paging dan form pencarian -->
    <div class="row navigasi_cari">
        <!-- Paging -->
        <div class="col-xs-12 col-md-6">
            <?php echo (!empty($paging)) ? $paging : ''?>
        </div>
        <!-- /Paging -->

        <!-- Form Pencarian -->
        <div class="col-xs-12 col-md-4 pull-right">
            <form method="get" action="<?php echo $form_action;?>" role="form" class="form-horizontal">
                <div class="input-group">
                    <input type="text" name="kata_kunci" class="form-control" placeholder="Masukkan Nomor Perserta, NISN atau Nama" id="kata_kunci" value="<?php echo $this->input->get('kata_kunci')?>">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /Form Pencarian -->
    </div>
    <!-- /Paging dan form pencarian -->

    <?php if (!empty($peserta) && is_array($peserta)): ?>
    <div class="row">
        <div class="col-md-12">

            <table class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                <tr>
                    <th>No</th>
                    <th>No Peserta</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Asal Sekolah</th>
                    <th>Status Biodata</th>
                    <th>Status Verifikasi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($peserta as $row): ?>
                    <tr>
                        <td><?php echo ++$offset ?></td>
                        <td><?php echo ($row->id) ?></td>
                        <td><?php echo $row->nisn ?></td>
                        <td><?php echo ($row->nama) ?></td>
                        <td><?php echo ($row->ska_nama) ?></td>
                        <?php echo ($row->status_biodata == '0') ? '<td class="status-danger">' : '<td>' ?><?php echo ($row->status_biodata) ?></td>
                        <?php echo ($row->status_verifikasi == '0') ? '<td class="status-danger">' : '<td>' ?><?php echo ($row->status_verifikasi) ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
    <?php else: ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible" role="alert">
                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <?php echo $peserta ?>
            </div>
        </div>
    </div>
    <?php endif ?>

</div> <!-- /container -->