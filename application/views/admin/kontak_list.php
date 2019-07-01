<?php
// Nomor urut data di tabel.
$per_page = 2;

// Posisi nomor halaman.
$page = $this->uri->segment(4);

// Level user yang sedang login.
$user_level = $this->session->userdata('user_level');


// Nomor urut data di tabel.
// Ini karena library pagination menggunakan option 'use_page_numbers' => true.
if (empty($page)) {
    $offset = 0;
} else {
    $offset = ($page * $per_page - $per_page);
}
?>

<div class="container">
    <h2>Data Kontak</h2>
    <hr>

    <!-- Paging -->
    <div class="row navigasi_cari">
        <div class="col-xs-12 col-md-6">
            <?php echo (!empty($paging)) ? $paging : ''?>
        </div>
    </div>
    <!-- /Paging -->

    <?php if (!empty($kontak) && is_array($kontak)): ?>
    <div class="row">
        <div class="col-md-12">

            <table class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($kontak as $row): ?>
                    <?php
                    // Link edit
                    $link_balas = anchor('admin/kontak/balas/'.$row->id, '<span class="glyphicon glyphicon-share"></span>', array('title' => 'Balas'));                    
                    ?>
                    <tr>
                        <td><?php echo ++$offset ?></td>
                        <td><?php echo ($row->nama) ?></td>
                        <td><?php echo $row->email ?></td>
                        <td><?php echo $row->judul ?></td>
                        <td><?php echo $row->created_at ?></td>
                        <td><?php echo $link_balas ?></td>
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
                <?php echo $kontak ?>
            </div>
        </div>
    </div>
    <?php endif ?>

</div> <!-- /container -->