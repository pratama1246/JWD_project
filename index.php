<?php
// Koneksi ke database
include 'conn.php';
// Membuat Self Server
$server = $_SERVER['PHP_SELF'];
?>
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
    <main>
        <div class="container my-5">
        <div class="row row-cols-1 row-cols-md-2 g-4">

            <!-- Beasiswa Akademik -->
            <div class="col">
            <div class="card h-100 shadow-lg border-0 rounded-4" style="background: #e6f2ff;">
                <div class="card-body">
                <span class="badge bg-primary mb-2 fs-6 px-3 py-2">#1</span>
                <h5 class="card-title text-primary fw-bold">Beasiswa Akademik</h5>
                <p class="card-text">
                    🎓 Diberikan kepada mahasiswa berprestasi akademik tinggi.<br><br>
                    <strong>Syarat:</strong> IPK minimal <u>3.5</u>, aktif kegiatan kampus.<br>
                    <strong>Fasilitas:</strong> Potongan UKT hingga <u>100%</u>, sertifikat, pembinaan.<br>
                    <strong>Seleksi:</strong> Administrasi → Wawancara → Verifikasi.<br>
                    <strong>Kuota:</strong> 50 mahasiswa<br>
                    <strong>Deadline:</strong> 31 Agustus 2025
                </p>
                </div>
            </div>
            </div>

            <!-- Beasiswa Non-Akademik -->
            <div class="col">
            <div class="card h-100 shadow-lg border-0 rounded-4" style="background: #fff4e6;">
                <div class="card-body">
                <span class="badge bg-warning text-dark mb-2 fs-6 px-3 py-2">#2</span>
                <h5 class="card-title text-warning fw-bold">Beasiswa Non-Akademik</h5>
                <p class="card-text">
                    🏆 Diberikan kepada mahasiswa berprestasi non-akademik (olahraga, seni, organisasi).<br><br>
                    <strong>Syarat:</strong> Bukti prestasi wajib.<br>
                    <strong>Fasilitas:</strong> Dana pembinaan, potongan UKT, pelatihan khusus.<br>
                    <strong>Seleksi:</strong> Portofolio → Administrasi → Wawancara.<br>
                    <strong>Kuota:</strong> 30 mahasiswa<br>
                    <strong>Deadline:</strong> 31 Agustus 2025
                </p>
                </div>
            </div>
            </div>

        </div>
        </div>

    </main>
    
    <footer class="bg-dark text-white text-center py-3">
        <p>Copyright &copy; kampuskuaja.ac.id</p>
    </footer>


