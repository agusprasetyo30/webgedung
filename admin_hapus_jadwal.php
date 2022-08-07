<?php

require 'function.php';
if(isset($_GET['id_jadwal'])) {
    $id_jadwal =htmlspecialchars($_GET["id_jadwal"]);
    $sql ="delete from jadwal_sewa where id_jadwal = '$id_jadwal'";
    $hasil = mysqli_query($koneksi,$sql);

    if($hasil){
        echo "<script>
                alert('Jadwal berhasil dihapus!');
                document.location.href ='admin_index.php?url=admin_jadwal';
             </script>";
    }else{
        echo "<script>
                alert('Data gedung gagal ditambahkan!');
            </script>";
    }

}


