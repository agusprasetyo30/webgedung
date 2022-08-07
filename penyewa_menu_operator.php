<?php
    if(isset($_GET['url'])){
        $url =$_GET['url'];
        switch ($url){
//Menu Operator Penyewa
            case'penyewa_dashboard' :
                include"penyewa_dashboard.php";
                break;
            case'penyewa_gedung' :
                include"penyewa_gedung.php";
                break;
            case'penyewa_fasilitas' :
                include"penyewa_fasilitas.php";
                break;
            case'penyewa_paket' :
                include"penyewa_paket.php";
                break;
            case'penyewa_sewapaket.php' :
                include"penyewa_sewapaket.php";
                break;
            case'penyewa_sewabiasa.php' :
                include"penyewa_sewabiasa.php";
                break;
            case'penyewa_bayarsewa.php' :
                include"penyewa_bayarsewa.php";
                break;
            
            case'penyewa_jadwal' :                    
                include"penyewa_jadwal.php";
                break;
				
			case'penyewa_jadwal_paket' :                    
                include"penyewa_jadwal_paket.php";
                break;
			case'penyewa_ganti_rugi' :                    
                include"penyewa_ganti_rugi.php";
                break;
			case'carapesan' :                    
                include"penyewa_cara_pesan.php";
                break;
            default:
            echo "<center><h3>Maaf</h3></center>";
            break;
        }
    }
?>
