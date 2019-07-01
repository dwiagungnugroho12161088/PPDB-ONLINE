<div class="container">
<div class="row">
  <div class="col-sm-8">
    <p><b><h4>FORMULIR PENDATARAN CALON PESERTA DIDIK BARU KELAS VII</br>
      TAHUN PELAJARAN 2019/2020</h4></b></p>
  </div>
  <div class="col-sm-4">
    <ul class="list-group">
    <li class="list-group-item"><b>Nomor Peserta</b> : <?php echo ($peserta->id) ?></li>
    </ul>
  </div>
</div>
</div>
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm-8">

    <dl class="dl-horizontal">
        <dt>NISN</dt>
        <dd>: <?php echo $peserta->nisn ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Nama</dt>
        <dd>: <?php echo $peserta->nama ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Tempat, Tanggal Lahir</dt>
        <dd>: <?php echo $peserta->tempat_lahir ?>, <?php echo ($peserta->tanggal_lahir) ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Jenis Kelamin</dt>
        <dd>: <?php echo ($peserta->jenis_kelamin) ?></dd>
    </dl>

  </div>

  <div class="col-sm-4">
          <?php
          $nn1 = $peserta->nisn;
          $type=".png";
          $base = base_url()."asset/img";
         if (file_exists('asset/img/'.$nn1.$type)) {
           echo "<img src='$base/$nn1.png'  class='img-thumbnail' alt='Generic placeholder image' width='120' height='120'>"; ?>
         <?php
         } else { ?>
            <img src='holder.js/120x120?text=template photo'  class='img-thumbnail'  alt='Generic placeholder image'/>
         <?php } ?>

  </div>
  </div>

    <dl class="dl-horizontal">
        <dt>Agama</dt>
        <dd>: <?php echo $peserta->agama != '0' ? ($peserta->agama) : ($peserta->ket_agama); ?></dd>
    </dl>

    <dl class="dl-horizontal">
        <dt>Nama Orang tua</dt>
        <dd>: <?php echo $peserta->ort_nama_ayah ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Alamat</dt>
        <dd>: <?php echo $peserta->ort_alamat ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Nilai UN</dt>
        <dd>:
          <table class="table">
              <tbody>
              <tr>
                  <td>Bahasa Indonesia</td>
                  <td><?php echo $peserta->nil_bin_1 ?></td>
              </tr>
              <tr>
                <td>Matematika</td>
                <td><?php echo $peserta->nil_bin_2 ?></td>
              </tr>
              <tr>
                <td>IPA</td>
                <td><?php echo $peserta->nil_bin_3 ?></td>
              </tr>
              <tr>
                <td><b>Nilai Rata-rata</b></td>
                <td><b><?php echo ($peserta->nil_bin_1+$peserta->nil_bin_2+$peserta->nil_bin_3)/3;?></b></td>
              </tr>
              </tbody>
          </table>
        </dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Nama Sekolah</dt>
        <dd>: <?php echo $peserta->ska_nama ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Alamat</dt>
        <dd>: <?php echo $peserta->ska_alamat ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Nomor Ijazah</dt>
        <dd>: <?php echo $peserta->ska_no_ijazah ?></dd>
    </dl>
</div>

<div class="text-center">
    <?php echo anchor('dashboard/biodata-cetak', '&nbsp; &nbsp; Cetak &nbsp; &nbsp;', array('class' => 'btn btn-primary btn-lg', 'role' => 'button')); ?>
</div>
