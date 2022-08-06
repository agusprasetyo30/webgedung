<?php
    if(isset($_GET['url'])){
        $url =$_GET['url'];
        switch ($url){
//Menu Operator Admin
            case'review_dashboard' :
                include"review_dashboard.php";
                break;
            case'review_jadwal' :
                include"review_jadwal.php";
                break;
			case'review_jadwal_paket' :
                include"review_jadwal_paket.php";
                break;
            case'review_transaksi' :
                include"review_transaksi.php";
                break; 
			case'review_pengecekan' :
                include"review_pengecekan.php";
                break; 
            case'review_pengecekan_sesudah' :
                include"review_pengecekan_sesudah.php";
                break;
            default:
            echo "<center><h3>Maaf</h3></center>";
            break;
        }
    }
?>