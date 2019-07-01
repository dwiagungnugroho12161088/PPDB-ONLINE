<?php echo form_open_multipart($form_action, array('id'=>'myform', 'class'=>'form-horizontal', 'role'=>'form')) ?>
<div class="container">
<div class="row">
  <div class="col-sm-8">
    <p><b><h4>FORMULIR PENDAFTARAN CALON PESERTA DIDIK BARU KELAS VII</br>
      TAHUN PELAJARAN 2019/2020</h4></b></p>
  </div>
  <div class="col-sm-4">
    <ul class="list-group">
    <li class="list-group-item"><b>Nomor Peserta</b> : <?php echo ($values->id);?></li>
    </ul>
  </div>
</div>
</div>
<hr/>
<div class="container">
    <!-- hidden field -->
    <?php echo form_hidden('id', $values->id);?>
    <?php echo form_hidden('nisn', $values->nisn);?>

    <!-- no_peserta
    <div class="form-group form-group-sm">
        <?php echo form_label('Nomor Peserta', 'no_peserta', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-2">
            <p class="form-control-static"><?php echo ($values->id);?></p>
        </div>
    </div>-->
    <div class="row">
      <div class="col-sm-8">
    <!-- nisn -->
    <div class="form-group form-group-sm">
        <?php echo form_label('NISN', 'nisn', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-2">
            <p class="form-control-static"><?php echo $values->nisn;?></p>
        </div>
    </div>

    <!-- nama -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style('nama')?>">
        <?php echo form_label('Nama', 'nama', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-4">
            <?php echo form_input('nama', $values->nama, 'id="nama" class="form-control" placeholder="Nama" maxlength="64"') ?>
            <?php set_validation_icon('nama') ?>
        </div>
        <?php if (form_error('nama')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('nama', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>

    <!-- jenis_kelamin -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style('jenis_kelamin')?>">
        <?php echo form_label('Jenis Kelamin', 'jenis_kelamin', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-4">
            <label class="radio-inline" for="laki-laki">
                <?php echo form_radio('jenis_kelamin', 'L', (isset($values->jenis_kelamin) && $values->jenis_kelamin == 'L') ? true : false, 'id ="laki-laki"')?> Laki-laki
            </label>
            <label class="radio-inline" for="perempuan">
                <?php echo form_radio('jenis_kelamin', 'P', (isset($values->jenis_kelamin) && $values->jenis_kelamin == 'P') ? true : false, 'id ="perempuan"')?> Perempuan
            </label>
        </div>
        <?php if (form_error('jenis_kelamin')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('jenis_kelamin', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>

</div>

<div class="col-sm-4">
        <?php
        $nn1 = $values->nisn;
        $type=".png";
        $base = base_url()."asset/img";
       if (file_exists('asset/img/'.$nn1.$type)) {
         echo "<img src='$base/$nn1.png'  class='img-thumbnail' alt='Generic placeholder image' width='120' height='120'>"; ?>
       <?php
       } else { ?>
         <ul class="list-group">
           <li class="list-group-item">
         <label>Upload photo</label>
         <input type="file" name="image"/>
         <div id="caption">** file type png, ukuran file maksimal 100KB</div>
       </li>
       </ul>
       <?php } ?>

</div>
</div>

<div class="row">
  <div class="col-sm-8">

    <!-- agama -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style('agama')?>">
        <?php echo form_label('Agama', 'agama', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-2">
            <?php
            $agama = array(
                '' => '- Pilih -',
                '1' => 'Islam',
                '2' => 'Katolik',
                '3' => 'Protestan',
                '4' => 'Hindu',
                '5' => 'Budha',
                '6' => 'Konghucu',
                '0' => 'Lainnya',
            );
            $atribut_agama = 'class="form-control"';
            echo form_dropdown('agama', $agama, $values->agama, $atribut_agama);
            ?>
        </div>
        <?php if (form_error('agama')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('agama', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>

    <!-- tempat_lahir -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style('tempat_lahir')?>">
        <?php echo form_label('Tempat Lahir', 'tempat_lahir', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-3">
            <?php echo form_input('tempat_lahir', $values->tempat_lahir, 'id="tempat_lahir" class="form-control" placeholder="Tempat Lahir" maxlength="32"') ?>
            <?php set_validation_icon('tempat_lahir') ?>
        </div>
        <?php if (form_error('tempat_lahir')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('tempat_lahir', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>

    <!-- tanggal_lahir -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style('tanggal_lahir')?>">
        <?php echo form_label('Tanggal Lahir', 'tanggal_lahir', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-3">
            <div class="input-group date" data-date-format="dd-mm-yyyy">
                <?php echo form_input('tanggal_lahir', date($values->tanggal_lahir), 'id="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" maxlength="10"') ?>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
        </div>
        <?php if (form_error('tanggal_lahir')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('tanggal_lahir', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>

    <!-- tmp_alamat -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style('tmp_alamat')?>">
        <?php echo form_label('Alamat', 'tmp_alamat', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-5">
            <?php echo form_textarea('tmp_alamat', $values->tmp_alamat, 'class="form-control" id="tmp_alamat" placeholder="Alamat Tinggal"') ?>
        </div>
        <?php if (form_error('tmp_alamat')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('tmp_alamat', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>

    <!-- ort_wali -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style('ort_nama_ayah')?>">
        <?php echo form_label('Nama Orang tua atau wali', 'ort_nama_ayah', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-4">
            <?php echo form_input('ort_nama_ayah', $values->ort_nama_ayah, 'id="ort_nama_ayah" class="form-control" placeholder="Nama Ayah" maxlength="64"') ?>
            <?php set_validation_icon('ort_nama_ayah') ?>
        </div>
        <?php if (form_error('ort_nama_ayah')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('ort_nama_ayah', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>

    <!-- ort_alamat -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style('ort_alamat')?>">
        <?php echo form_label('Alamat', 'ort_alamat', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-5">
            <?php echo form_textarea('ort_alamat', $values->ort_alamat, 'class="form-control" id="ort_alamat" placeholder="Alamat Orang Tua"') ?>
        </div>
        <?php if (form_error('ort_alamat')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('ort_alamat', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>

    <!-- Nilai UN -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style(array('nil_bin_1', 'nil_bin_2', 'nil_bin_3'))?>">
        <label for="nil_bin_1" class="col-sm-3 control-label">Nilai UN</label>
        <div class="col-sm-2">
            <?php echo form_input('nil_bin_1', $values->nil_bin_1, 'id="nil_bin_1" class="form-control" placeholder="B.Indo" maxlength="3"') ?>
            <div id="caption">**Bahasa Indonesia</div>
        </div>
        <div class="col-sm-2">
            <?php echo form_input('nil_bin_2', $values->nil_bin_2, 'id="nil_bin_2" class="form-control" placeholder="mtk" maxlength="3"') ?>
            <div id="caption">**Matematika</div>
        </div>
        <div class="col-sm-2">
            <?php echo form_input('nil_bin_3', $values->nil_bin_3, 'id="nil_bin_3" class="form-control" placeholder="ipa" maxlength="3"') ?>
            <div id="caption">**IPA</div>
        </div>

        <!-- Form validation error Bahasa Indonesia -->
        <?php if (form_error('nil_bin_1') || form_error('nil_bin_2') || form_error('nil_bin_3')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('nil_bin_1', '<span class="help-block">', '</span>');?>
            </div>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('nil_bin_2', '<span class="help-block">', '</span>');?>
            </div>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('nil_bin_3', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>


    <!-- ska_nama -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style('ska_nama')?>">
        <?php echo form_label('Nama Sekolah', 'ska_nama', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-4">
            <?php echo form_input('ska_nama', $values->ska_nama, 'id="ska_nama" class="form-control" placeholder="Nama Sekolah" maxlength="64"') ?>
            <?php set_validation_icon('ska_nama') ?>
        </div>
        <?php if (form_error('ska_nama')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('ska_nama', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>


    <!-- ska_alamat -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style('ska_alamat')?>">
        <?php echo form_label('Alamat', 'ska_alamat', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-5">
            <?php echo form_textarea('ska_alamat', $values->ska_alamat, 'class="form-control" id="ska_alamat" placeholder="Alamat Sekolah"') ?>
        </div>
        <?php if (form_error('ska_alamat')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('ska_alamat', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>

    <!-- ska_no_ijazah -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style('ska_no_ijazah')?>">
        <?php echo form_label('Nomor Ijazah', 'ska_no_ijazah', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-3">
            <?php echo form_input('ska_no_ijazah', $values->ska_no_ijazah, 'id="ska_no_ijazah" class="form-control" placeholder="Nomor Ijazah" maxlength="32"') ?>
            <?php set_validation_icon('ska_no_ijazah') ?>
        </div>
        <?php if (form_error('ska_no_ijazah')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('ska_no_ijazah', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>

    <div class="form-group">
        <div class="col-sm-5 col-sm-offset-3">
            <?php echo form_button(array('content'=>'Simpan', 'type'=>'submit', 'class'=>'btn btn-primary', 'data-confirm'=>'Anda yakin akan menyimpan data ini?')) ?>
        </div>
    </div>

</div>
</div>

<?php echo form_close() ?>
<hr/>

</div>
