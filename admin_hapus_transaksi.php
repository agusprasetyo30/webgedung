<?php

require 'function.php';
if(isset($_GET['id_bayar'])) {
    $id_bayar =htmlspecialchars($_GET["id_bayar"]);
    $sql ="delete from transaksi_sewa where id_bayar = '$id_bayar'";
    $hasil = mysqli_query($koneksi,$sql);

    if($hasil){
        echo "<script>
                alert('Pembayaran berhasil di hapus!');
                document.location.href ='admin_index.php?url=admin_transaksi';
             </script>";
    }else{
        echo "<script>
                alert('Maaf data gagal dihapus!');
				document.location.href ='admin_index.php?url=admin_transaksi';
            </script>";
    }

}



