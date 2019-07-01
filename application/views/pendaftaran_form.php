<div class="container">
    <h2>Form Pendaftaran</h2>
    <hr>

    <?php echo form_open('pendaftaran', array('id'=>'myform', 'class'=>'myform', 'role'=>'form', 'method'=>'post')) ?>

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

        <div class="form-group has-feedback <?php set_validation_style('nama')?>">            
            <?php echo form_label('Nama Lengkap', 'nama', array('class' => 'control-label')) ?>
            <?php echo form_input('nama', $values->nama, 'id="nama" class="form-control" placeholder="Nama Lengkap" maxlength="64"') ?>            
            <?php set_validation_icon('nama') ?>
            <?php echo form_error('nama', '<span class="help-block">', '</span>');?>
        </div>

        <div class="form-group has-feedback <?php set_validation_style('nama_panggilan')?>">            
            <?php echo form_label('Nama Panggilan', 'nama_panggilan', array('class' => 'control-label')) ?>
            <?php echo form_input('nama_panggilan', $values->nama_panggilan, 'id="nama_panggilan" class="form-control" placeholder="Nama Panggilan" maxlength="32"') ?>            
            <?php set_validation_icon('nama_panggilan') ?>
            <?php echo form_error('nama_panggilan', '<span class="help-block">', '</span>');?>
        </div>

        <p><?php echo $captcha; ?></p>
        <div class="form-group has-feedback <?php set_validation_style('captcha')?>">            
            <?php echo form_label('Captcha', 'captcha', array('class' => 'control-label')) ?>
            <?php echo form_input('captcha', $values->captcha, 'id="captcha" class="form-control" placeholder="Masukkan 4 huruf / angka pada gambar di atas" maxlength="4"') ?>
            <?php set_validation_icon('captcha') ?>
            <?php echo form_error('captcha', '<span class="help-block">', '</span>');?>
        </div>

        <?php echo form_button(array('content'=>'Daftar', 'type'=>'submit', 'class'=>'btn btn-primary', 'data-confirm'=>'Anda yakin akan menyimpan data ini?')) ?>

    <?php echo form_close() ?>

    <br>
    <p class="text-danger"><strong>Catatan:</strong></p>
    <p class="text-danger">Email harus diisi alamat email yang valid dan aktif, karena akan digunakan untuk mengirim informasi.</p>

</div>