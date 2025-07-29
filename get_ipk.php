<?php
if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];
    include 'conn.php';
    $stmt = $conn->prepare("SELECT ipk FROM mahasiswa WHERE nama = ?");
    $stmt->bind_param("s", $nama);
    $stmt->execute();
    $stmt->bind_result($ipk);
    if ($stmt->fetch()) {
        echo $ipk;
    } else {
        echo "not_found";
    }
    $stmt->close();
    $conn->close();
}
?>
