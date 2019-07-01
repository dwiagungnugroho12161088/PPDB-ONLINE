<div class="container">
    <div class="jumbotron">
        <p class="h1">Selamat Datang!</p>
        <p>Halo, <strong> <?php echo $this->session->userdata('nama_panggilan'); ?></strong>.</p>
        <p>Jika Anda belum melengkapi biodata, silakan melengkapinya. Klik tombol "<strong>Biodata</strong>" di bawah ini!</p>
        <p><?php echo anchor('dashboard/biodata', 'Biodata', 'class="btn btn-primary btn-lg" role="button"'); ?></p>
    </div>
</div>