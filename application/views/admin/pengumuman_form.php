<div class="container">
    <h2>Pengumuman</h2>
    <hr>

    <?php echo form_open($form_action, array('id'=>'myform', 'class'=>'form-pengumuman', 'role'=>'form')) ?>

        <div class="form-group has-feedback <?php set_validation_style('judul')?>">
            <?php echo form_label('Judul', 'judul', array('class' => 'control-label')) ?>
            <?php echo form_input('judul', $values->judul, 'id="judul" class="form-control" placeholder="Judul Pengumuman" maxlength="64"') ?>
            <?php set_validation_icon('judul') ?>
            <?php echo form_error('judul', '<span class="help-block">', '</span>');?>
        </div>

        <div class="form-group has-feedback <?php set_validation_style('isi')?>">
            <?php echo form_label('Isi', 'isi', array('class' => 'control-label')) ?>
            <?php echo form_textarea('isi', $values->isi, 'id="isi" class="form-control mytextarea" placeholder="Isi Pengumuman"') ?>
            <?php set_validation_icon('isi') ?>
            <?php echo form_error('isi', '<span class="help-block">', '</span>');?>
        </div>

        <?php echo form_button(array('content'=>'Simpan', 'type'=>'submit', 'class'=>'btn btn-primary', 'data-confirm'=>'Anda yakin akan menyimpan pengumuman ini?')) ?>

    <?php echo form_close() ?>
    
</div>