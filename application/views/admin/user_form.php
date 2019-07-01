<div class="container">
    <h2>User</h2>
    <hr>

    <?php echo form_open($form_action, array('id'=>'myform', 'class'=>'myform', 'role'=>'form')) ?>

        <!-- nama -->
        <div class="form-group has-feedback <?php set_validation_style('nama')?>">
            <?php echo form_label('Nama', 'nama', array('class' => 'control-label')) ?>
            <?php echo form_input('nama', $values->nama, 'id="nama" class="form-control" placeholder="Nama" maxlength="32"') ?>
            <?php set_validation_icon('nama') ?>
            <?php echo form_error('nama', '<span class="help-block">', '</span>');?>
        </div>

        <!-- Username -->
        <div class="form-group has-feedback <?php set_validation_style('username')?>">
            <?php echo form_label('Username', 'username', array('class' => 'control-label')) ?>
            <?php echo form_input('username', $values->username, 'id="username" class="form-control" placeholder="Username" maxlength="32"') ?>
            <?php set_validation_icon('username') ?>
            <?php echo form_error('username', '<span class="help-block">', '</span>');?>
        </div>

        <!-- Password -->
        <div class="form-group has-feedback <?php set_validation_style('password')?>">
            <?php echo form_label('Password', 'password', array('class' => 'control-label')) ?>
            <?php echo form_password('password', $values->password, 'id="password" class="form-control" placeholder="Password" maxlength="32"') ?>
            <?php set_validation_icon('password') ?>
            <?php echo form_error('password', '<span class="help-block">', '</span>');?>
        </div>

        <!-- Passconf -->
        <div class="form-group has-feedback <?php set_validation_style('passconf')?>">
            <?php echo form_label('Konfirmasi Password', 'passconf', array('class' => 'control-label')) ?>
            <?php echo form_password('passconf', $values->passconf, 'id="passconf" class="form-control" placeholder="Konfirmasi Password" maxlength="32"') ?>
            <?php set_validation_icon('passconf') ?>
            <?php echo form_error('passconf', '<span class="help-block">', '</span>');?>
        </div>

        <!-- Level -->
        <div class="form-group has-feedback <?php set_validation_style('level')?>">
            <?php echo form_label('Level', 'level', array('class' => 'control-label')) ?>
            <div class="radio">
                <label for="operator">
                    <?php echo form_radio('level', 'operator', (isset($values->level) && $values->level == 'operator') ? true : false, 'id ="operator"')?> Operator
                </label>
                <label for="administrator">
                    <?php echo form_radio('level', 'administrator', (isset($values->level) && $values->level == 'administrator') ? true : false, 'id ="administrator"')?> Administrator
                </label>
            </div>
            <?php echo form_error('level', '<span class="help-block">', '</span>');?>
        </div>

        <!-- Blokir -->
        <div class="form-group has-feedback <?php set_validation_style('is_blokir')?>">
            <?php echo form_label('Blokir?', 'is_blokir', array('class' => 'control-label')) ?>
            <div class="radio">
                <label for="0">
                    <?php echo form_radio('is_blokir', '0', (isset($values->is_blokir) && $values->is_blokir == '0') ? true : false, 'id ="0"')?> Aktif
                </label>
                <label for="1">
                    <?php echo form_radio('is_blokir', '1', (isset($values->is_blokir) && $values->is_blokir == '1') ? true : false, 'id ="1"')?> Blokir
                </label>
            </div>
            <?php echo form_error('is_blokir', '<span class="help-block">', '</span>');?>
        </div>

        <br>
        <?php echo form_button(array('content'=>'Simpan', 'type'=>'submit', 'class'=>'btn btn-primary', 'data-confirm'=>'Anda yakin akan mengirim pesan ini?')) ?>

    <?php echo form_close() ?>
</div>