<?php $no = 0 ?>
<div class="container">
    <h2>Data User</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Blokir?</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($user as $row): ?>
                    <?php
                    // Link edit, hapus, cetak
                    $link_edit = anchor('admin/user/edit/'.$row->id, '<span class="glyphicon glyphicon-edit"></span>', array('title' => 'Edit'));
                    $link_hapus = anchor('admin/user/hapus/'.$row->id,'<span class="glyphicon glyphicon-trash"></span>', array('title' => 'Hapus', 'data-confirm' => 'Anda yakin akan menghapus data ini?'));
                    ?>
                    <tr>
                        <td><?php echo ++$no ?></td>
                        <td><?php echo $row->username ?></td>
                        <td><?php echo $row->nama ?></td>
                        <td><?php echo $row->level ?></td>
                        <td><?php echo ($row->is_blokir) ?></td>
                        <td><?php echo $link_edit.'&nbsp;&nbsp;&nbsp;&nbsp;'.$link_hapus ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
        echo anchor('admin/user/tambah', 'Tambah', 'class="btn btn-primary"');
    ?>

</div> <!-- /container -->