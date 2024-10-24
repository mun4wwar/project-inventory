<?php
if (isset($_POST['tambah'])) {
    // Pastikan session id_user sudah di-set sebelumnya
    $id_user = $_SESSION['id_user'];

    $kode_barang = mysqli_real_escape_string($db, $_POST['kode_barang']);
    $tgl_pinjam = mysqli_real_escape_string($db, $_POST['tgl_pinjam']);
    $tgl_kembali = mysqli_real_escape_string($db, $_POST['tgl_kembali']);
    $jumlah = mysqli_real_escape_string($db, $_POST['jumlah']);
    $status = "Dipinjam";

    // Pastikan untuk melakukan validasi atau cek stok barang sebelum menambahkan peminjaman
    $stok_query = $db->query("SELECT stok FROM barang WHERE kode_barang = '$kode_barang'");
    $barang = $stok_query->fetch_assoc();
    $stok_barang = $barang['stok'];

    if ($stok_barang >= $jumlah) {
        // Jika stok mencukupi, tambahkan peminjaman
        $query = "INSERT INTO peminjam (id_user, kode_barang, tgl_pinjam, tgl_kembali, jumlah, status)
                  VALUES ('$id_user', '$kode_barang', '$tgl_pinjam', '$tgl_kembali', '$jumlah', '$status')";

        if ($db->query($query)) {
            // Kurangi stok barang setelah berhasil melakukan peminjaman
            $new_stok = $stok_barang - $jumlah;
            $db->query("UPDATE barang SET stok = '$new_stok' WHERE kode_barang = '$kode_barang'");

            echo "<script>window.location.href='index.php?p=jpinjam'</script>";
            exit;
        } else {
            echo "Error saat menambahkan peminjaman: " . $db->error;
        }
    } else {
        echo "Stok barang tidak mencukupi untuk peminjaman.";
    }
}
?>
