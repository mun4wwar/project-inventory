<?php
if(isset($_POST['tambah'])){

    $kode_barang = $_POST['kode_barang'];
    $tgl = $_POST['tanggal_mutasi'];
    $asal = $_POST['lokasi_asal'];
    $tujuan = $_POST['lokasi_tujuan'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];
   

    $query = "INSERT INTO barang_mutasi(kode_barang,tgl_mutasi,lokasi_asal,lokasi_tujuan,jumlah,keterangan) VALUES ('$kode_barang', '$tgl', '$asal', '$tujuan', '$jumlah', '$keterangan')";
    if ($db->query($query) === TRUE) {
        $update_query = "UPDATE barang SET stok = stok - '$jumlah' WHERE kode_barang= '$kode_barang'";
                if ($db->query($update_query) === TRUE) {
                    echo "<script>window.location.href='index.php?p=barangMutasi' </script>"; //redir?p=jbarangect
                    // header("Location: index.php?p=jbarang");
                    exit;
                } else {
                    echo "Error updating record: " . $db->error;
                }

                } else {
                    echo "Error: " . $query . "<br>" . $db->error;
                }

}
if(isset($_POST['edit'])){

    $nama_barang = $_POST['nama_barang'];
    $kode_barang = $_POST['kode_barang'];
    $tgl_mutasi = $_POST['tgl_mutasi'];
    $lokasi_asal= $_POST['lokasi_asal'];
    $lokasi_tujuan= $_POST['lokasi_tujuan'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $tgl_mutasi = $_POST['tgl_mutasi'];
        $jumlah = $_POST['jumlah'];
        $lokasi_asal = $_POST['lokasi_asal'];
        $lokasi_tujuan = $_POST['lokasi_tujuan'];
        $keterangan = $_POST['keterangan'];
    
        // Lakukan proses update ke database sesuai dengan data yang dikirimkan
        // ...
    }
    // var_dump($query);
    if ($db->query($query) === TRUE) {
        echo "<script>window.location.href='index.php?p=barangmutasi' </script>"; //redir?p=jbarangect
        // header("Location: index.php?p=jbarang");
        exit;
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }

}
?>