<div class="container">
    <?php $session_error = $this->session->flashdata('pesan_error') ?>
    <?php if (! empty($session_error)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $session_error ?>
        </div>
    <?php endif ?>
    <div class="jumbotron">
        <h2 class="h1">Selamat Datang!</h2>
        <p>Halo, <strong> <?php echo $this->session->userdata('username'); ?></strong>.</p>
        <p>Silakan memilih menu yang ada.</p>
    </div>
</div>