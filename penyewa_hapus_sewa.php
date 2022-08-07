<?php

require 'function.php';
if(isset($_GET['id_sewa'])) {
    $id_sewa =htmlspecialchars($_GET["id_sewa"]);
    $sql ="delete from sewa where id_sewa = '$id_sewa'";
    $hasil = mysqli_query($koneksi,$sql);

    if($hasil){
        echo "<script>
                alert('Pemesanan berhasil di batalkan!');
                document.location.href ='penyewa_index.php?url=penyewa_dashboard';
             </script>";
    }else{
        echo "<script>
                alert('Maaf pembatalan sewa gagal!');
				document.location.href ='penyewa_index.php?url=penyewa_dashboard';
            </script>";
    }

}



