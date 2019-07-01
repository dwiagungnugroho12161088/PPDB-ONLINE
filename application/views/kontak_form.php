<div class="container">
    <h2>Kontak</h2>
    <hr>

    <?php echo form_open($form_action, array('id'=>'myform', 'class'=>'myform', 'role'=>'form')) ?>

        <div class="form-group has-feedback <?php set_validation_style('nama')?>">
            <?php echo form_label('Nama', 'nama', array('class' => 'control-label')) ?>
            <?php echo form_input('nama', $values->nama, 'id="nama" class="form-control" placeholder="Nama" maxlength="64"') ?>            
            <?php set_validation_icon('nama') ?>
            <?php echo form_error('nama', '<span class="help-block">', '</span>');?>
        </div>

        <div class="form-group has-feedback <?php set_validation_style('email')?>">
            <?php echo form_label('Email', 'email', array('class' => 'control-label')) ?>
            <?php echo form_input('email', $values->email, 'id="email" class="form-control" placeholder="Email" maxlength="64"') ?>            
            <?php set_validation_icon('email') ?>
            <?php echo form_error('email', '<span class="help-block">', '</span>');?>
        </div>

        <div class="form-group has-feedback <?php set_validation_style('judul')?>">
            <?php echo form_label('Judul', 'judul', array('class' => 'control-label')) ?>
            <?php echo form_input('judul', $values->judul, 'id="judul" class="form-control" placeholder="Judul Pesan" maxlength="128"') ?>
            <?php set_validation_icon('judul') ?>
            <?php echo form_error('judul', '<span class="help-block">', '</span>');?>
        </div>

        <div class="form-group has-feedback <?php set_validation_style('isi')?>">
            <?php echo form_label('Isi Pesan', 'isi', array('class' => 'control-label')) ?>
            <?php echo form_textarea('isi', $values->isi, 'id="isi" class="form-control my_textarea" placeholder="Isi Pesan"') ?>
            <?php set_validation_icon('isi') ?>
            <?php echo form_error('isi', '<span class="help-block">', '</span>');?>
        </div>

        <p><?php echo $captcha; ?></p>
        <div class="form-group has-feedback <?php set_validation_style('captcha')?>">
            <?php echo form_label('Captcha', 'captcha', array('class' => 'control-label')) ?>
            <?php echo form_input('captcha', $values->captcha, 'id="captcha" class="form-control" placeholder="Masukkan 4 huruf / angka pada gambar di atas" maxlength="4"') ?>
            <?php set_validation_icon('captcha') ?>
            <?php echo form_error('captcha', '<span class="help-block">', '</span>');?>
        </div>

        <?php echo form_button(array('content'=>'Kirim', 'type'=>'submit', 'class'=>'btn btn-primary', 'data-confirm'=>'Anda yakin akan mengirim pesan ini?')) ?>

    <?php echo form_close() ?>

    <br>
    <p class="text-danger"><strong>Catatan:</strong></p>
    <p class="text-danger">Email harus diisi alamat email yang aktif, karena akan digunakan untuk mengirim informasi.</p>

</div>