<div class="container">
    <h2>Hasil Seleksi</h2>
    <hr>

    <?php echo form_open($form_action, array('id'=>'myform', 'class'=>'myform', 'role'=>'form', 'method'=>'post')) ?>

        <div class="form-group has-feedback <?php set_validation_style('no_peserta')?>">
            <?php echo form_label('Nomor Peserta', 'no_peserta', array('class' => 'control-label')) ?>
            <?php echo form_input('no_peserta', $values->no_peserta, 'id="no_peserta" class="form-control" placeholder="Nomor Peserta" maxlength="10"') ?>
            <?php set_validation_icon('no_peserta') ?>
            <?php echo form_error('no_peserta', '<span class="help-block">', '</span>');?>
        </div>
    
        <div class="form-group has-feedback <?php set_validation_style('nisn')?>">
            <?php echo form_label('NISN', 'nisn', array('class' => 'control-label')) ?>
            <?php echo form_input('nisn', $values->nisn, 'id="nisn" class="form-control" placeholder="NISN" maxlength="10"') ?>
            <?php set_validation_icon('nisn') ?>
            <?php echo form_error('nisn', '<span class="help-block">', '</span>');?>
        </div>

        <div class="form-group has-feedback <?php set_validation_style('email')?>">
            <?php echo form_label('Email', 'email', array('class' => 'control-label')) ?>
            <?php echo form_input('email', $values->email, 'id="email" class="form-control" placeholder="Email" maxlength="64"') ?>
            <?php set_validation_icon('email') ?>
            <?php echo form_error('email', '<span class="help-block">', '</span>');?>
        </div>

        <?php echo form_button(array('content'=>'Cek Hasil Seleksi', 'type'=>'submit', 'class'=>'btn btn-primary', 'data-confirm'=>'Anda yakin akan mengirim data ini?')) ?>

    <?php echo form_close() ?>

    <br>
    <p class="text-danger"><strong>Catatan:</strong></p>
    <p class="text-danger">Data yang Anda masukkan harus sesuai dengan data yang Anda masukkan ketika pendaftaran.</p>

</div>