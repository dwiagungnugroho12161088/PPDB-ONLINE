<!DOCTYPE html PUBLIC>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/css; charset=iso-8859-1" />
    <title>Data Pendaftar</title>
    <style type="text/css">
        h1 {text-align:center; font-size:18px;}
        h2 {font-size:14px;}
        .tengah {text-align:center;	font-size: 12px;}
        .kiri {padding-left:10px;}
        table.nilai {border-collapse: collapse;}
        table.nilai td {border: 1px solid #000000}
    </style>
</head>

<body>
  <h1>PEMERINTAH<br/>
      DINAS PENDIDIKAN<br/>
      </h1>
  <div class="tengah">Jalan BSI BSD WARUNG EMAK KUY!!!</div>
<hr />
<table width="500" border="0">
  <tr><td width="500">
FORMULIR PENDATARAN CALON PESERTA DIDIK BARU KELAS VII
TAHUN PELAJARAN 2019/2020
</td>
<td width="200">
  No Peserta : <?php echo number_format($peserta->id) ?>
</td>
</tr>
</table>
<br /><br/>
<table width="500" border="0">
    <tr>
        <td>NISN</td>
        <td>: <?php echo $peserta->nisn ?></td>
        <td width="240"></td><td rowspan="7">
          <?php
          $nn1 = $peserta->nisn;
          $type=".png";
          $base = base_url()."asset/img";
         if (file_exists('asset/img/'.$nn1.$type)) {
           echo "<img src='$base/$nn1.png'  class='img-thumbnail' alt='Generic placeholder image' width='120' height='120'>"; ?>
         <?php
         } else { ?>
            <img src='holder.js/120x120?text=template photo'  class='img-thumbnail'  alt='Generic placeholder image'/>
         <?php } ?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>: <?php echo $peserta->nama ?></td>
    </tr>
    <tr>
        <td>Tempat, Tanggal Lahir </td>
        <td>:
            <?php echo $peserta->tempat_lahir ?>, <?php echo ($peserta->tanggal_lahir) ?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin </td>
        <td>:
            <?php echo ($peserta->jenis_kelamin) ?></td>
    </tr>
    <tr>
        <td>Agama</td>
        <td>: <?php echo $peserta->agama != '0' ? ($peserta->agama) : ($peserta->ket_agama); ?></td>
    </tr>
    <tr>
        <td>Nama Orang Tua </td>
        <td>: <?php echo $peserta->ort_nama_ayah ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: <?php echo $peserta->tmp_alamat ?> </td>
    </tr>
    <tr>
        <td>Nilai UN</td>
        <td>: </td>
    </tr>
    <tr>
        <td></td><td>&nbsp;&nbsp;&nbsp;Bahasa Indonesia</td>
        <td>&nbsp;&nbsp;&nbsp;<?php echo $peserta->nil_bin_1 ?></td>
    </tr>
    <tr>
        <td></td><td>&nbsp;&nbsp;&nbsp;Matematika</td>
        <td>&nbsp;&nbsp;&nbsp;<?php echo $peserta->nil_bin_3 ?></td>
    </tr>
    <tr>
        <td></td><td>&nbsp;&nbsp;&nbsp;IPA</td>
        <td>&nbsp;&nbsp;&nbsp;<?php echo $peserta->nil_bin_3 ?></td>
    </tr>
    <tr>
        <td></td><td>&nbsp;&nbsp;&nbsp;<b>RATA-RATA</b></td>
        <td>&nbsp;&nbsp;&nbsp;<?php echo $n1 ?></td>
    </tr>
    <tr>
        <td>Nama Sekolah </td>
        <td>:  <?php echo $peserta->ska_nama ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: <?php echo $peserta->ska_alamat ?></td>
    </tr>
    <tr>
        <td>Nomor Ijazah </td>
        <td>: <?php echo $peserta->ska_no_ijazah ?></td>
    </tr>
</table>
<br />
<br />
<br />
<br />
<p>&nbsp;</p>
<table width="600" border="0">
    <tr>
        <td width="200">
        </td>
        <td width="200">&nbsp;</td>
        <td width="200"><br /><br>
            CALON PESERTA DIDIK
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <?php echo $peserta->nama ?>
        </td>
    </tr>
</table>
<p>&nbsp;</p>
<br/>
<br/>
<br />
<br />
Keterangan :<br/>
Formulir pendaftaran ini diserahkan kepada panitia pendaftaran, setelah diisi dengan melampirkan :
<ul>
  <li>Daftar Nilai SKHUN Asli atau Daftar Nilai Penilaian Hasil belajar bagi Program paket A</li>
  <li>Foto Copy STTB yang di sahkan Kepala Sekolah Asal (Sekolah Penyelenggara UN)</li>
  <li>Foto Copy Surat Kelahiran / Akta Kelahiran 1 lembar</li>
  <li>Piagam Kejuaran Asli minimal juara 1 tingkat kecamatan</li>
</ul>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<h1>PEMERINTAH<br/>
    DINAS PENDIDIKAN<br/>
    </h1>
<div class="tengah">Jalan BSI BSD WARUNG EMAK KUY!!!</div>
<hr />
No Peserta : <?php echo ($peserta->id) ?><br/><br/>
<div class="tengah">
KARTU PENDAFTARAN PENERIMAAN<br/>
CALON PESERTA DIDIK BARU KELAS VII TAHUN 2019/2020<br/>

</div>
<br/>
<table width="500" border="0">
    <tr>
        <td>Nama</td>
        <td>: <?php echo $peserta->nama ?></td>
    </tr>
    <tr>
        <td>Nama Sekolah </td>
        <td>:  <?php echo $peserta->ska_nama ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: <?php echo $peserta->ska_alamat ?></td>
    </tr>
</table>
<table width="600" border="0">
    <tr>
        <td width="200">
          <br>
          <br>
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
        </td>
        <td width="200">&nbsp;</td>
        <td width="200"><br /><br>
            PANITIA PENDAFTRAN <br>
            ONLINE
            <br>
            <br>
            <br>
            <br>
            <br>
            NIP.
        </td>
    </tr>
</table>
KETERANGAN : <br/>
<ul>
  <li>Kartu pendaftaran ini sebagai bukti untuk digunakan mendaftar ulang</li>
  <li>DAFTAR ULANG bagi yang DITERIMA tanggal 4,5,6 Juli 2017 pukul 08.00-12.00 WIB, kecuali hari jum'at (pukul 08.00-11.00 WIB)</li>
  <li>Pengumuman DITERIMA / TIDAK DITERIMA tanggal 3 juli 2015 pukul 10.00 WIB</li>
  <li>Pengumuman DITERIMA / TIDAK DITERMA diambil oleh orang tua siswa</li>
</ul>
<hr style="border: 1px dashed black;" />
<h1>PEMERINTAH<br/>
    DINAS PENDIDIKAN<br/>
    </h1>
<div class="tengah">Jalan BSI BSD WARUNG EMAK KUY!!!</div>
<hr />
No Peserta : <?php echo ($peserta->id) ?><br/><br/>
<div class="tengah">
KARTU PENDAFTARAN PENERIMAAN<br/>
CALON PESERTA DIDIK BARU KELAS VII TAHUN 2019/2020<br/>

</div>
<br/>
<table width="500" border="0">
    <tr>
        <td>Nama</td>
        <td>: <?php echo $peserta->nama ?></td>
    </tr>
    <tr>
        <td>Nama Sekolah </td>
        <td>:  <?php echo $peserta->ska_nama ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: <?php echo $peserta->ska_alamat ?></td>
    </tr>
</table>
<table width="600" border="0">
    <tr>
        <td width="200">
          <br>
          <br>
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
        </td>
        <td width="200">&nbsp;</td>
        <td width="200"><br />
             <br>
            PANITIA PENDAFTRAN <br>
            I
            <br>
            <br>
            <br>
            <br>
            <br>
            NIP.
        </td>
    </tr>
</table>
KETERANGAN : <br/>
<ul>
  <li>Kartu pendaftaran ini sebagai bukti untuk digunakan mendaftar ulang</li>
  <li>DAFTAR ULANG bagi yang DITERIMA tanggal 4,5,6 Juli 2017 pukul 08.00-12.00 WIB, kecuali hari jum'at (pukul 08.00-11.00 WIB)</li>
  <li>Pengumuman DITERIMA / TIDAK DITERIMA tanggal 3 juli 2015 pukul 10.00 WIB</li>
  <li>Pengumuman DITERIMA / TIDAK DITERMA diambil oleh orang tua siswa</li>
</ul>
</body>
</html>
