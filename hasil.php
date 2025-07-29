<!DOCTYPE html>
<head>
    <title>Form Daftar Beasiswa</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <nav class="mt-3 d-flex justify-content-start" style="max-width: 600px; margin-left: 30px;">
            <a href="index.php" class="btn btn-light me-2 flex-fill" style="min-width: 150px;">Pilihan Beasiswa</a>
            <a href="daftar.php" class="btn btn-light me-2 flex-fill" style="min-width: 150px;">Daftar</a>
            <a href="hasil.php" class="btn btn-light flex-fill" style="min-width: 150px;">Hasil</a>
        </nav>
    </header>
    <main class="container my-4">
        <?php
        //Memanggil data dari database
        include 'conn.php';

        $panggil = "SELECT * FROM pendaftaran_beasiswa";
        $hasil = mysqli_query($conn, $panggil);

        echo "<h4 class='mb-4'>DATA PENGADUAN MAHASISWA</h4>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-striped table-hover align-middle'>
        <thead class='table-primary'>
        <tr>
            <th scope='col'>No</th>
            <th scope='col'>Nama</th>
            <th scope='col'>Email</th>
            <th scope='col'>No HP</th>
            <th scope='col'>Semester</th>
            <th scope='col'>IPK</th>
            <th scope='col'>Beasiswa</th>
            <th scope='col'>Nama File</th>
            <th scope='col'>Status Ajuan</th>
        </tr>
        </thead>
        <tbody>";

        $nomer_urut = 0;
        while ($tampil = mysqli_fetch_array($hasil)) {
            $nama = $tampil['nama'];
            $email = $tampil['email'];
            $no_hp = $tampil['no_hp'];
            $semester = $tampil['semester'];
            $ipk = $tampil['ipk'];
            $beasiswa = $tampil['beasiswa'];
            $upload = $tampil['upload_berkas'];
            $status = $tampil['status_ajuan'];

            $nomer_urut++;
            echo "
            <tr>
                <td>$nomer_urut</td>
                <td>$nama</td>
                <td>$email</td>
                <td>$no_hp</td>
                <td>$semester</td>
                <td>$ipk</td>
                <td>$beasiswa</td>
                <td><a href='uploads/$upload' target='_blank' class='btn btn-sm btn-outline-primary'>$upload</a></td>
                <td>$status</td>
            </tr>";
        }
        echo "</tbody></table>";
        echo "</div>";
        ?>
    </main>
    
    <footer class="bg-dark text-white text-center py-3">
        <p>Copyright &copy; kampuskuaja.ac.id</p>
    </footer>


