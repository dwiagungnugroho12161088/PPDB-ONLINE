<div class="container">

    <h2>Pengumuman</h2>
    <hr>
    <?php if (!empty($pengumuman) && is_object($pengumuman)): ?>
        <div class="row">
            <div class="col-md-12">
                <article>
                    <h3><?php echo $pengumuman->judul ?></h3>
                    <p class="text-danger"><strong><em><?php echo format_hari_tanggal($pengumuman->created_at) ?></em></strong></p>
                    <?php echo $pengumuman->isi ?>
                </article>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <?php echo $pengumuman ?>
                </div>
            </div>
        </div>
    <?php endif ?>

</div> <!-- /Container-->