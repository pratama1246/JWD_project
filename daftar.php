<?php
include 'conn.php';
require_once __DIR__ . '/vendor/autoload.php';

use Respect\Validation\Validator as v;

ob_start();
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
        <?php
        // Tampilkan notifikasi jika ada
        if (isset($_GET['status'])) {
            $alertType = 'danger';
            $message = '';

            switch ($_GET['status']) {
                case 'email_invalid':
                    $message = 'Email tidak valid.';
                    break;
                case 'nohp_invalid':
                    $message = 'Nomor HP hanya boleh angka.';
                    break;
                case 'ipk_invalid':
                    $message = 'IPK harus antara 0.00 hingga 4.00.';
                    break;
                case 'format_tidak_diperbolehkan':
                    $message = 'Format file tidak diperbolehkan.';
                    break;
                case 'upload_gagal':
                    $message = 'Upload berkas gagal.';
                    break;
                case 'gagal':
                    $message = 'Pendaftaran gagal.';
                    break;
                case 'berhasil':
                    $message = '🎉 Pendaftaran berhasil!';
                    $alertType = 'success';
                    break;
                case 'error':
                    $message = urldecode($_GET['msg']);
                    break;
            }

            if ($message) {
                echo "
                <div class='container mt-4'>
                    <div class='alert alert-$alertType alert-dismissible fade show' role='alert'>
                        $message
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>";
            }
        }
        ?>
    <div class="title text-center my-4">
        <h2>Pendaftaran Beasiswa</h2>
    </div>
    <div class="container my-5 d-flex justify-content-center align-items-center" style="min-height: 70vh;">
        <form action="<?php echo $server; ?>" method="post" id="beasiswaForm" class="p-4 bg-light rounded-4 shadow-lg" style="width: 100%; max-width: 800px; box-shadow: 0 8px 32px rgba(0,0,0,0.15);" enctype="multipart/form-data">
            <h4 class="text-left mb-4">Registrasi Beasiswa</h4>
            <div class="mb-3">
                <label for="nama" class="form-label">Masukkan Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Masukkan Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label">nomor HP</label>
                <input type="tel" class="form-control" id="no_hp" name="no_hp" pattern="[0-9]+" required>
            </div>

            <div class="mb-3">
                <label for="semester" class="form-label">Semester saat ini</label>
                <select class="form-select" id="semester" name="semester" required>
                    <option value="">Pilih Semester</option>
                    <option value="1">Semester 1</option>
                    <option value="2">Semester 2</option>
                    <option value="3">Semester 3</option>
                    <option value="4">Semester 4</option>
                    <option value="5">Semester 5</option>
                    <option value="6">Semester 6</option>
                    <option value="7">Semester 7</option>
                    <option value="8">Semester 8</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="ipk" class="form-label">IPK terakhir</label>
                <input type="text" name="ipk" id="ipk" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label for="beasiswa" class="form-label">Pilihan Beasiswa</label>
                <select class="form-select" id="beasiswa" name="beasiswa" required>
                    <option value="">Pilih Beasiswa</option>
                    <option value="1">Beasiswa Akademik</option>
                    <option value="2">Beasiswa Non-Akademik</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="upload_berkas" class="form-label">Upload Berkas</label>
                <input type="file" class="form-control" id="upload_berkas" name="upload_berkas" required>
            </div>
            
            <div class="mb-3 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Daftar</button>
                <button type="reset" class="btn btn-secondary">Batal</button>
            </div>
        </form>
    </div>
    </main>

    <footer class="bg-dark text-white text-center py-3">
        <p>Copyright &copy; kampuskuaja.ac.id</p>
    </footer>

<script>
  const namaInput = document.getElementById('nama');
  const ipkInput = document.getElementById('ipk');
  const beasiswaSelect = document.getElementById('beasiswa');
  const uploadBerkas = document.getElementById('upload_berkas');
  const submitButton = document.querySelector('button[type="submit"]');

  // Saat user berhenti mengetik di field nama (blur)
  namaInput.addEventListener('blur', function () {
    const nama = namaInput.value.trim();
    if (nama.length >= 3) {
      fetch('get_ipk.php?nama=' + encodeURIComponent(nama))
        .then(response => response.text())
        .then(data => {
          if (data === 'not_found') {
            ipkInput.value = 'Tidak ditemukan';
          } else {
            ipkInput.value = parseFloat(data).toFixed(2);
          }
          handleIPKChange(); // langsung cek IPK setelah nilai dimasukkan
        });
    }
  });

  // Cek nilai IPK dan aktifkan/nonaktifkan field lain
  function handleIPKChange() {
    let ipkValue = parseFloat(ipkInput.value);

    if (!isNaN(ipkValue)) {
      if (ipkValue < 3) {
        beasiswaSelect.disabled = true;
        uploadBerkas.disabled = true;
        submitButton.disabled = true;
      } else {
        beasiswaSelect.disabled = false;
        uploadBerkas.disabled = false;
        submitButton.disabled = false;
        beasiswaSelect.focus();
      }
    } else {
      // Kalau IPK bukan angka (misal "Tidak ditemukan")
      beasiswaSelect.disabled = true;
      uploadBerkas.disabled = true;
      submitButton.disabled = true;
    }
  }

  // Jalankan pengecekan IPK saat halaman pertama kali dibuka
  window.addEventListener('DOMContentLoaded', handleIPKChange);
</script>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'] ?? '';
    $email = $_POST['email'] ?? '';
    $no_hp = $_POST['no_hp'] ?? '';
    $semester = $_POST['semester'] ?? '';
    $ipk = $_POST['ipk'] ?? '';
    $beasiswa = $_POST['beasiswa'] ?? '';

    // Validasi dengan Respect\Validation
    $isValid = true;
    $errors = [];

    if (!v::email()->validate($email)) {
        $isValid = false;
        $errors[] = "Format email tidak valid.";
    }

    if (!v::number()->validate($no_hp)) {
        $isValid = false;
        $errors[] = "Nomor HP hanya boleh berisi angka.";
    }

    if (!v::number()->between(0, 4)->validate($ipk)) {
        $isValid = false;
        $errors[] = "Nilai IPK harus antara 0.00 sampai 4.00.";
    }

    if (!$isValid) {
        // Redirect dengan error yang dikodekan
        $errorMsg = urlencode(implode(', ', $errors));
        header("Location: daftar.php?status=error&msg=$errorMsg");
        exit();
    }

    // Upload file
    $nama_file = $_FILES['upload_berkas']['name'];
    $tmp = $_FILES['upload_berkas']['tmp_name'];
    $ekstensi = pathinfo($nama_file, PATHINFO_EXTENSION);
    $nama_baru = 'berkas_' . time() . '.' . $ekstensi;
    $path = 'uploads/' . $nama_baru;
    $ekstensi_diizinkan = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png'];

    if (!in_array($ekstensi, $ekstensi_diizinkan)) {
    header("Location: daftar.php?status=format_tidak_diperbolehkan");
    exit();
    }

    if (move_uploaded_file($tmp, $path)) {
        $query = "INSERT INTO pendaftaran_beasiswa 
                  (nama, email, no_hp, semester, ipk, beasiswa, upload_berkas, status_ajuan)
                  VALUES ('$nama', '$email', '$no_hp', '$semester', '$ipk', '$beasiswa', '$nama_baru', 'belum diverifikasi')";

        if (mysqli_query($conn, $query)) {
            header("Location: daftar.php?status=berhasil");
            exit();
        } else {
            header("Location: daftar.php?status=gagal");
            exit();
        }
    } else {
        header("Location: daftar.php?status=upload_gagal");
        exit();
    }
}
?>