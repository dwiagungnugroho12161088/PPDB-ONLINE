<?php
// Nomor urut data di tabel.
$per_page = 2;

// Posisi nomor halaman (untuk paging) jika user login / tidak.
$login_status = $this->session->userdata('login_status');
$user_level = $this->session->userdata('user_level');
$page = $this->uri->segment(4);

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
            <form method="get" action="<?php echo site_url('admin/peserta/cari');?>" role="form" class="form-horizontal">
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
                    <th>Status Pendaftaran</th>
                    <th>Status Biodata</th>
                    <th>Status Verifikasi</th>
                    <th>Status Seleksi</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($peserta as $row): ?>
                    <?php
                    // Link edit, hapus, cetak
                    $link_edit = anchor('admin/biodata/edit/'.$row->id, '<span class="glyphicon glyphicon-edit"></span>', array('title' => 'Edit'));
                    $link_hapus = anchor('admin/peserta/hapus/'.$row->id,'<span class="glyphicon glyphicon-trash"></span>', array('title' => 'Hapus', 'data-confirm' => 'Anda yakin akan menghapus data ini?'));
                    $link_cetak = anchor('admin/peserta/cetak/'.$row->id,'<span class="glyphicon glyphicon-print"></span>', array('title' => 'Cetak'));

                    // Status pendaftaran
                    if ($row->status_pendaftaran == '0') {
                        $pendaftaran = '<td class="status-danger">' . anchor('admin/peserta/ubah-status-pendaftaran/'.$row->id, format_status_pendaftaran($row->status_pendaftaran), 'data-confirm="Mengubah status pendaftaran ke AKTIF"') . '</td>';
                    } else {
                        $pendaftaran = '<td class="status-biasa">' . anchor('admin/peserta/ubah-status-pendaftaran/'.$row->id, ($row->status_pendaftaran), 'data-confirm="Mengubah status pendaftaran ke MUNDUR"') . '</td>';
                    }

                    // Status biodata
                    if ($row->status_biodata == '0') {
                        $biodata = '<td class="status-danger">' . ($row->status_biodata) . '</td>';
                    } else {
                        $biodata = '<td class="status-biasa">' . ($row->status_biodata) . '</td>';
                    }
                    
                    // Status verifikasi
                    if ($row->status_verifikasi == '0') {
                        $verifikasi = '<td class="status-danger">' . anchor('admin/peserta/ubah-status-verifikasi/'.$row->id, ($row->status_verifikasi), 'data-confirm="Mengubah status verifikasi ke SUDAH?"') . '</td>';
                    } else {
                        $verifikasi = '<td class="status-biasa">' . anchor('admin/peserta/ubah-status-verifikasi/'.$row->id, ($row->status_verifikasi), 'data-confirm="Mengubah status verifikasi ke BELUM?"')  . '</td>';
                    }

                    // Status seleksi
                    if ($row->status_seleksi == '0') {
                        $seleksi = '<td class="status-danger">' . anchor('admin/peserta/ubah-status-seleksi/'.$row->id, ($row->status_seleksi), 'data-confirm="Mengubah status seleksi ke LULUS?"') . '</td>';
                    } else {
                        $seleksi = '<td class="status-biasa">' . anchor('admin/peserta/ubah-status-seleksi/'.$row->id, ($row->status_seleksi), 'data-confirm="Mengubah status seleksi ke TIDAK LULUS?"')  . '</td>';
                    }

                    ?>
                    <tr>
                        <td><?php echo ++$offset ?></td>
                        <td><?php echo ($row->id) ?></td>
                        <td><?php echo $row->nisn ?></td>
                        <td><?php echo ($row->nama) ?></td>
                        <td><?php echo ($row->ska_nama) ?></td>
                        <?php echo $pendaftaran ?>
                        <?php echo $biodata ?>
                        <?php echo $verifikasi ?>
                        <?php echo $seleksi ?>
                        <td>
                            <?php echo $user_level == 'administrator' ? $link_edit.'&nbsp;&nbsp;&nbsp;&nbsp;'.$link_hapus.'&nbsp;&nbsp;&nbsp;&nbsp;'.$link_cetak : $link_cetak ?>
                        </td>
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