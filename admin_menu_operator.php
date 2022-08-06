<?php
    if(isset($_GET['url'])){
        $url =$_GET['url'];
        switch ($url){
//Menu Operator Admin
            case'admin_dashboard' :
                include"admin_dashboard.php";
                break;
            case'admin_gedung' :
                include"admin_gedung.php";
                break;
            case'admin_tambah_gedung.php' :
                include"admin_tambah_gedung.php";
                break;
            case'admin_hapus_gedung.php' :
                include"admin_hapus_gedung.php";
                break;
            case'admin_edit_gedung.php' :
                include"admin_edit_gedung.php";
                break;
            
            case'admin_fasilitas' :
                include"admin_fasilitas.php";
                break;
            case'admin_tambah_fasilitas.php' :                    
                include"admin_tambah_fasilitas.php";
                break;    
            case'admin_hapus_fasilitas.php' :
                include"admin_hapus_fasilitas.php";
                break;
            case'admin_edit_fasilitas.php' :
                include"admin_edit_fasilitas.php";
                break; 
            case'admin_ganti_rugi' :
                include"admin_ganti_rugi.php";
                break;
            case'admin_paket' :
                include"admin_paket.php";
                break;
            case'admin_tambah_paket.php' :                    
                include"admin_tambah_paket.php";
                break;    
            case'admin_hapus_paket.php' :
                include"admin_hapus_paket.php";
                break;
            case'admin_edit_paket.php' :
                include"admin_edit_paket.php";
                break; 

            case'admin_jadwal' :
                include"admin_jadwal.php";
                break;
            case'admin_tambah_jadwal.php' :                    
                include"admin_tambah_jadwal.php";
                break;
            case'admin_hapus_jadwal.php' :                    
                include"admin_hapus_jadwal.php";
                break;    
            case'admin_edit_paket.php' :
                include"admin_edit_jadwal.php";
                break; 
			case'admin_ubah_denda.php' :
                include"admin_ubah_denda.php";
                break; 
            
            case'admin_datapenyewa' :
                include"admin_datapenyewa.php";
                break; 
				
			case'admin_transaksi' :
                include"admin_transaksi.php";
                break; 
				
					
			case'admin_ubahstatus.php' :
                include"admin_ubahstatus.php";
                break; 
				
			case'admin_laporan_keuangan' :
                include"admin_laporan_keuangan.php";
                break; 
    

            default:
            echo "<center><h3>Maaf, anda salah alamat</h3></center>";
            break;
        }
    }
?>