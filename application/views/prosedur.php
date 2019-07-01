<div class="container" class="prosedur">
    <h2><?php echo $title ?></h2>
    <hr>
    <ol>
        <li>
            <strong>Pendaftaran.</strong> Calon peserta melakukan pendaftaran pada website PPDB Online, melalui halaman
            <?php echo anchor('pendaftaran', 'Pendaftaran'); ?>.
            Calon peserta yang sudah mendaftar akan mendapatkan username dan password yang akan digunakan untuk mengisi biodata.
        </li>
        <li><strong>Mengisi biodata.</strong> Melengkapi biodata dengan sebelumnya melakukan login dengan username dan password yang sudah diberikan.</li>
        <li>
            <strong>Mencetak Biodata dan Nilai</strong>. Biodata dan data nilai yang sudah dilengkapi kemudian dicetak di kertas A4. Untuk mencetak, masuk ke menu cetak. Menu ini akan tampil jika Anda sudah login.
            Biodata dan nilai yang sudah dicetak tersebut selajutnya dibawa ke Panitia PPDB untuk diverifikasi.
        </li>
        <li>
            <strong>Verifikasi data.</strong> Setelah melengkapi biodata, calon siswa dan orang tua melakukan verifikasi data dengan cara mendatangi
            panitia PPDB dan melengkapi semua berkas yang diperlukan. Petugas akan memeriksa
            kelengkapan biodata dan kelengkapan berkas. Selanjutnya, petugas akan mengubah status verifikasi calon
            peserta. Calon peserta yang sudah dinyatakan lulus verifikasi data akan mendapatkan tanda nomor peserta
            ujian dan berhak mengkikuti ujian seleksi. Peserta yang tidak melakukan verifikasi data sampai pada batas waktu yang ditentukan dinyatakan gugur / megundurkan diri.
        </li>
        <li><strong>Mengikuti ujian.</strong> Peserta mengikuti Ujian Seleksi pada waktu yang telah ditentukan. Peserta yang tidak mengikuti ujian akan otomatis dinyatakan gugur / mengundurkan diri.</li>
        <li><strong>Pengumuman hasil ujian.</strong> Pengumuman hasil seleksi akan diumumkan pada waktu yang telah ditentukan. (Lihat <?php echo anchor('jadwal', 'jadwal'); ?>).</li>
        <li>
            <strong>Her-registrasi.</strong> Peserta yang dinyatakan LULUS Ujian Seleksi, melakukan Her-registrasi dengan mendatangi panitia PPDB .
            Peserta yang dinyatakan LULUS namun tidak melakukan Her-registrasi sampai batas waktu yang ditentukan, akan dinyatakan gugur / mengundurkan diri.
        </li>
    </ol>
</div>