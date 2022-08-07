<?php

require 'function.php';
if(isset($_GET['id_paket'])) {
    $id_paket =htmlspecialchars($_GET["id_paket"]);
    $sql ="delete from paket where id_paket = '$id_paket'";
    $hasil = mysqli_query($koneksi,$sql);

    if($hasil){
        echo "<script>
                alert('Data paket berhasil dihapus!');
                document.location.href ='admin_index.php?url=admin_paket';
             </script>";
    }else{
        echo "<script>
                alert('Data paket gagal ditambahkan!');
            </script>";
    }

}


