<div class="container">
    <h2>Kontak</h2>
    <hr>

    <?php echo form_open('admin/kontak/balas/'.$values->id, array('id'=>'myform', 'class'=>'form-pengumuman', 'role'=>'form')) ?>

        <?php echo form_hidden('id', $values->id);?>
        <?php echo form_hidden('nama', $values->nama);?>
        <?php echo form_hidden('email', $values->email);?>

        <div class="form-group">
            <?php echo form_label('Kepada', 'nama', array('class' => 'control-label')) ?>
            <p class="form-control-static"><?php echo $values->nama;?></p>
        </div>

        <div class="form-group">
            <?php echo form_label('Email', 'email', array('class' => 'control-label')) ?>
            <p class="form-control-static"><?php echo $values->email;?></p>
        </div>

        <div class="form-group has-feedback <?php set_validation_style('judul')?>">
            <?php echo form_label('Judul', 'judul', array('class' => 'control-label')) ?>
            <?php echo form_input('judul', 'Balas : ' . $values->judul, 'id="judul" class="form-control" placeholder="Judul Pengumuman" maxlength="128"') ?>
            <?php set_validation_icon('judul') ?>
            <?php echo form_error('judul', '<span class="help-block">', '</span>');?>
        </div>

        <div class="form-group has-feedback <?php set_validation_style('isi')?>">
            <?php echo form_label('Isi', 'isi', array('class' => 'control-label')) ?>
            <?php echo form_textarea('isi', $values->isi, 'id="isi" class="form-control mytextarea" placeholder="Isi Pengumuman"') ?>
            <?php set_validation_icon('isi') ?>
            <?php echo form_error('isi', '<span class="help-block">', '</span>');?>
        </div>

    <?php echo form_button(array('content'=>'Kirim', 'type'=>'submit', 'class'=>'btn btn-primary', 'data-confirm'=>'Anda yakin akan mengirim pesan ini?')) ?>

    <?php echo form_close() ?>
</div>