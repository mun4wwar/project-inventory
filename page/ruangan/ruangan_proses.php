<?php
if (isset($_POST['tambah'])) {
    // $id = $_POST['id'];
    // $nama = $_POST['nama'];
    $ruangan = $_POST['nama_ruangan'];

    $query = "INSERT INTO ruangan (nama_ruangan) 
              VALUES ('$ruangan')";

    if ($db->query($query) ) {
        
        echo "<script>window.location.href='index.php?p=ruangan'</script>";
        exit;
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }
}


?>
