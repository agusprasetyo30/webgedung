<?php

require 'function.php';
if(isset($_GET['id_sewa'])) {
    $id_sewa =htmlspecialchars($_GET["id_sewa"]);
    $sql ="delete from sewa where id_sewa = '$id_sewa'";
    $hasil = mysqli_query($koneksi,$sql);

    if($hasil){
        echo "<script>
                alert('Data sewa berhasil di hapus!');
                document.location.href ='admin_index.php?url=admin_datapenyewa';
             </script>";
    }else{
        echo "<script>
                alert('Penyewa ID ini telah membayar sewa. Silahkan cek!');
				document.location.href ='admin_index.php?url=admin_datapenyewa';
            </script>";
    }

}



