<div class="container" id="hasil-seleksi">
    <p class="h2">Hasil Seleksi</p>
    <hr>

    <div class="row">
        <div class="col-xs-4 col-md-2">No Peserta</div>
        <div class="col-xs-8 col-md-10">: <strong><?php echo format_no_peserta($hasil->id); ?></strong></div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-md-2">NISN</div>
        <div class="col-xs-8 col-md-10">: <strong><?php echo $hasil->nisn; ?></strong></div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-md-2">Nama</div>
        <div class="col-xs-8 col-md-10">: <strong><?php echo $hasil->nama; ?></strong></div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-md-2">Asal Sekolah</div>
        <div class="col-xs-8 col-md-10">: <strong><?php echo $hasil->ska_nama; ?></strong></div>
    </div>

    <?php if ($hasil->status_seleksi == '0') : ?>
        <p>Berdasarkan hasil penilaian, Anda dinyatakan: </p>
        <div class="alert alert-danger alert-dismissible h1 text-center" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            TIDAK LULUS.
        </div>
    <?php else: ?>
        <p>Berdasarkan hasil penilaian, Anda dinyatakan: </p>
        <div id="hasil-seleksi" class="alert alert-success alert-dismissible h1 text-center" role="alert">
            <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            LULUS.
        </div>
        <p>Selanjutnya, silakan melakukan <strong>Daftar Ulang</strong> pada waktu yang telah ditentukan. Peserta yang LULUS namun tidak mendaftar ulang akan dinyatakan <strong>mengundurkan diri</strong>.</p>
    <?php endif ?>

</div> <!-- container -->