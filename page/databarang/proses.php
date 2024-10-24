<?php
if(isset($_POST['tambah'])){
    $nama_barang = $_POST['nama_barang'];
    $kode_barang = $_POST['kode_barang'];
    $stok = $_POST['stok'];
    $jenis= $_POST['jenis'];
    
   

    $query = "INSERT INTO barang(kode_barang, nama_barang, jenis, stok) 
    VALUES ('$kode_barang','$nama_barang','$jenis', '$stok')";
    if ($db->query($query) === TRUE) {
        echo "<script>window.location.href='index.php?p=jbarang' </script>"; //redir?p=jbarangect
        // header("Location: index.php?p=jbarang");
        exit;
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }

}
if (isset($_POST['edit'])) {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jenis = $_POST['jenis'];

    // Update hanya nama dan jenis
    $query = "UPDATE barang SET 
                nama_barang ='$nama_barang',
                jenis ='$jenis'
              WHERE kode_barang='$kode_barang'";

    if ($db->query($query) === TRUE) {
        echo "<script>window.location.href='index.php?p=jbarang'</script>";
        exit;
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }
}


?>