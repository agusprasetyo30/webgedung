<?php

require 'function.php';
if(isset($_GET['id_fasilitas'])) {
    $id_fasilitas =htmlspecialchars($_GET["id_fasilitas"]);
    $sql ="delete from fasilitas where id_fasilitas = '$id_fasilitas'";
    $hasil = mysqli_query($koneksi,$sql);

    if($hasil){
        echo "<script>
                alert('Data fasilitas berhasil dihapus!');
                document.location.href ='admin_index.php?url=admin_fasilitas';
             </script>";
    }else{
        echo "<script>
                alert('Data fasilitas gagal ditambahkan!');
            </script>";
    }

}


