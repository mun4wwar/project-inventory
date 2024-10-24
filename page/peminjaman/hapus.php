<?php

    if(isset($_GET['kembali'])){
        $id = $_GET['kembali'];

        $sql = "SELECT * FROM peminjam WHERE id_peminjam = '$id'";
        // var_dump($sql);
        // die();
        $hasil = $db->query($sql);
        $data = mysqli_fetch_assoc($hasil);

        $update = $db->query("UPDATE peminjam set status = 'dikembalikan' WHERE id_peminjam ='$id'");

        if($update){
            $query = "SELECT * FROM barang WHERE kode_barang = '$data[kode_barang]'";
            $result = $db->query($query);
            $dta = mysqli_fetch_assoc($result);
            $stok = $dta['stok'] + $data['jumlah'];
            

            $tambahStok = $db->query("UPDATE barang set stok = '$stok' WHERE kode_barang = '$data[kode_barang]'");
            if($tambahStok){
                echo "<script>window.location.href='index.php?p=jpinjam'</script>";
            }else{

            }

        }
        else{

        }


    }
    if(isset($_GET['id'])){
    $get_id = $_GET['id'];

    $sql = "DELETE FROM peminjam WHERE id_peminjam=$get_id";
    // var_dump($sql);
    // die();

    if ($db->query($sql) == TRUE) {
        echo "<script>window.location.href='index.php?p=jpinjam'</script>";
    }else {
        echo "Gagal menghapus data".$db->error;
    }
    }

?>