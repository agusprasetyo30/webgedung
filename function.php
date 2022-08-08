<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "dbsewagedung");
if(!$koneksi){
    die("koneksi dengan database gagal: ".mysqli_connect_error());
}
//Tambah Rupiah
function rupiah($angka){
	
			$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
			return $hasil_rupiah;
 
			}
//Tambah gedung
function tambahgedung($data){
        global $koneksi;
    
        $id_gedung = htmlspecialchars($data['id_gedung']);
        $nama_gedung = htmlspecialchars($data['nama_gedung']);
        $foto = upload();
        $harga_gdg = htmlspecialchars($data['harga_gdg']);
        $keterangan = htmlspecialchars($data['keterangan']);
    
        if (!$foto) {
            return false;
        }
    
        $sql = "INSERT INTO gedung VALUES ('$id_gedung','$nama_gedung','$foto','$harga_gdg','$keterangan')";
    
        mysqli_query($koneksi, $sql);
        return mysqli_affected_rows($koneksi);
    
    }

// Membuat fungsi edit
function editgedung($data){
    global $koneksi;

    $id_gedung = htmlspecialchars($data['id_gedung']);
    $nama_gedung = htmlspecialchars($data['nama_gedung']);
    $harga_gdg = htmlspecialchars($data['harga_gdg']);
    $keterangan = htmlspecialchars($data['keterangan']);

    $fotoLama = $data['fotoLama'];

    if ($_FILES['foto']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }

    $sql = "UPDATE gedung SET  nama_gedung = '$nama_gedung', foto = '$foto', harga_gdg = '$harga_gdg',keterangan = '$keterangan' WHERE id_gedung = '$id_gedung'";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

//Tambah fasilitas
function tambahfasilitas($data){
    global $koneksi;
    
    $id_fasilitas = htmlspecialchars($data['id_fasilitas']);
    $fasilitas = htmlspecialchars($data['fasilitas']);
    $jumlah = htmlspecialchars($data['jumlah']);
    $harga_fsl = htmlspecialchars($data['harga_fsl']);
    $foto = upload();
    $keterangan = htmlspecialchars($data['keterangan']);

    if (!$foto) {
        return false;
    }

    $sql = "INSERT INTO fasilitas VALUES ('$id_fasilitas','$fasilitas','$jumlah','$foto','$harga_fsl','$keterangan')";

    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);

}

// Membuat fungsi edit
function editfasilitas($data){
global $koneksi;

$id_fasilitas= htmlspecialchars($data['id_fasilitas']);
$fasilitas= htmlspecialchars($data['fasilitas']);
$jumlah= htmlspecialchars($data['jumlah']);
$harga_fsl= htmlspecialchars($data['harga_fsl']);
$keterangan = htmlspecialchars($data['keterangan']);

$fotoLama = $data['fotoLama'];

if ($_FILES['foto']['error'] === 4) {
    $foto = $fotoLama;
} else {
    $foto = upload();
}

$sql = "UPDATE fasilitas SET fasilitas= '$fasilitas', jumlah = '$jumlah', foto = '$foto',harga_fsl = '$harga_fsl', keterangan = '$keterangan' WHERE id_fasilitas = '$id_fasilitas'";

mysqli_query($koneksi, $sql);

return mysqli_affected_rows($koneksi);
}

//Tambah paket
function tambahpaket($data){
    global $koneksi;

    $id_paket = htmlspecialchars($data['id_paket']);
    $id_gedung = htmlspecialchars($data['id_gedung']);
    $fasilitas = htmlspecialchars($data['fasilitas']);
    $paket = htmlspecialchars($data['paket']);
    $harga = htmlspecialchars($data['harga']);
    $keterangan = htmlspecialchars($data['keterangan']);

    $sql = "INSERT INTO paket VALUES ('$id_paket', '$id_gedung', '$fasilitas','$paket','$harga','$keterangan')";

    // return $sql;
    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi edit
function editpaket($data){
global $koneksi;

$id_paket = htmlspecialchars($data['id_paket']);
$id_gedung = htmlspecialchars($data['id_gedung']);
$paket = htmlspecialchars($data['paket']);
$fasilitas = htmlspecialchars($data['fasilitas']);
$harga = htmlspecialchars($data['harga']);
$keterangan = htmlspecialchars($data['keterangan']);

$sql = "UPDATE paket SET id_gedung= '$id_gedung',  paket= '$paket',fasilitas= '$fasilitas',harga= '$harga', keterangan = '$keterangan' WHERE id_paket = '$id_paket'";

mysqli_query($koneksi, $sql);

return mysqli_affected_rows($koneksi);
}
//Tambah paket
function tambahjadwal($data){
    global $koneksi;

    $id_jadwal = htmlspecialchars($data['id_jadwal']);
    $id_gedung = $data['id_gedung'];
    
    $tanggalpakai = htmlspecialchars($data['tanggalpakai']);
    $tanggalpakai = Date('Y-m-d', strtotime($tanggalpakai));
    $tanggaltempo = htmlspecialchars($data['tanggaltempo']);
    $tanggaltempo = Date('Y-m-d', strtotime($tanggaltempo));
    

    $sql = "INSERT INTO jadwal_sewa VALUES ('$id_jadwal','$tanggalpakai','$tanggaltempo','$id_gedung')";

    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);

}

function checkSewa($tanggalSewa, $lama, $id_gedung = null, $id_paket = null) {
    global $koneksi;
    if($id_gedung != null) {
        $whereLoc = 'id_gedung = "'.$id_gedung . '"';
    }else if($id_paket != null) {
        $whereLoc = 'id_paket = "'.$id_paket .'"';
    }

    $betweenDate = 'tanggalpakai BETWEEN " '.$tanggalSewa.' " AND " ' . date('Y-m-d', strtotime($tanggalSewa . '+ ' . $lama . ' days')) . ' " ';

    $sql = 'SELECT * FROM sewa WHERE ' . $whereLoc . ' and  '. $betweenDate;
    $result = mysqli_query($koneksi, $sql);
    return mysqli_fetch_row($result);

    // return $sql;
}

function checkSewaTest($tanggalPakai, $tanggalTempo, $jumlahHari, $id_gedung = null)
{
    global $koneksi;
    $checkResult = false;

    $tanggalPakaiInputMonth = date("m", strtotime($tanggalPakai));
    $tanggalTempoInputMonthMinus = date("m", strtotime($tanggalTempo . '-1 month')); // digunakan untuk melakukan sortir bulan sebelum
    $tanggalPakaiInputYear = date("Y", strtotime($tanggalPakai));

    // cek apakah bulan pada tanggalpakai apakah sama dengan tanggaltempo
    // if ($tanggalPakaiInputMonth == $tanggalTempoInputMonth) {
        // $sql = "SELECT * FROM sewa WHERE " .$whereLoc. " 
        //     AND MONTH(tanggalpakai) = '$tanggalPakaiInputMonth' 
        //     AND MONTH(tanggaltempo) = '$tanggalTempoInputMonth' 
        //     AND YEAR(tanggalpakai) = '$tanggalPakaiInputYear'";
    // } else {
    $sql = "SELECT * FROM sewa WHERE id_gedung = '$id_gedung' 
        AND MONTH(tanggalpakai) BETWEEN '$tanggalTempoInputMonthMinus' and '$tanggalPakaiInputMonth'  
        AND YEAR(tanggalpakai) = '$tanggalPakaiInputYear'";
    // }

    $result =  mysqli_query($koneksi, $sql);

    while($data = mysqli_fetch_array($result)) 
    {
        for ($i=0; $i < $jumlahHari; $i++) {  // perulangan yang terdapat pada tanggal yg dipilih
            $tanggalPakaiTemp = date("Y-m-d", strtotime($tanggalPakai . '+' .$i. ' day'));
            
            for ($j=0; $j < $data['lamasewa']; $j++) { // perulangan untuk data yang terdapat pada db
                $tanggalpakaiDBTemp = date("Y-m-d", strtotime($data['tanggalpakai'] . '+' .$j. ' day'));
                if ($tanggalPakaiTemp == $tanggalpakaiDBTemp) {
                    $checkResult = true;
                    break 3;
                }
            }
        }
    }

    return $checkResult;
}

//Proses Sewa Biasa
function sewa($data){
    global $koneksi;
	//Fungsi menambahkan multiple fasilitas dalam satu kolom
	$checkbox1=$_POST['fasilitas'];  
	$chk="";  
	foreach($checkbox1 as $chk1)  
    {  
        $chk .= $chk1.",";  
    }  
	
    $id_sewa = htmlspecialchars($data['id_sewa']);
    $nama_penyewa = htmlspecialchars($data['nama_penyewa']);
	$username = htmlspecialchars($data['username']);
    $alamat_penyewa = htmlspecialchars($data['alamat_penyewa']);
    $telp_penyewa = htmlspecialchars($data['telp_penyewa']);
    $tanggalPakaiInput = htmlspecialchars($data['tanggalpakai']);
    $tanggalpakai = Date('Y-m-d', strtotime($tanggalPakaiInput));

    $tanggalTempoInput = htmlspecialchars($data['tanggaltempo']);
    $tanggaltempo = Date('Y-m-d', strtotime($tanggalTempoInput));
    $lamasewa = htmlspecialchars($data['lamasewa']);
	$id_gedung = htmlspecialchars($data['id_gedung']) == "0" ? null : htmlspecialchars($data['id_gedung']) ;
    $sudahBayar ='0';

    // $check = checkSewa($tanggalpakai, $lamasewa , $id_gedung, null);
    $check = checkSewaTest($tanggalpakai, $tanggaltempo, $lamasewa, $id_gedung);

    if ($check == 'true') {
        return false;
    } 

    $sql = "INSERT INTO `sewa` (`id_sewa`, `nama_penyewa`, `username`, `alamat_penyewa`, `telp_penyewa`, `id_paket`, `tanggalpakai`, `tanggaltempo`, `lamasewa`, `id_gedung`, `id_fasilitas`, `sudahbayar`) VALUES ('$id_sewa','$nama_penyewa','$username', '$alamat_penyewa','$telp_penyewa',NULL,'$tanggalpakai','$tanggaltempo','$lamasewa','$id_gedung','$chk','$sudahBayar')";
    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

//Proses Sewa Paket
function sewapaket($data){
    global $koneksi; 

    $id_sewa = htmlspecialchars($data['id_sewa']);
    $nama_penyewa = htmlspecialchars($data['nama_penyewa']);
	$username = htmlspecialchars($data['username']);
    $alamat_penyewa = htmlspecialchars($data['alamat_penyewa']);
    $telp_penyewa = htmlspecialchars($data['telp_penyewa']);
    $id_paket = $data['id_paket'];
    $tanggalpakaiInput = htmlspecialchars($data['tanggalpakai']);
    $tanggalpakai = Date('Y-m-d', strtotime($tanggalpakaiInput));
    $tanggaltempoInput = htmlspecialchars($data['tanggaltempo']);
    $tanggaltempo = Date('Y-m-d', strtotime($tanggaltempoInput));
    $lamasewa = htmlspecialchars($data['lamasewa']);
	$id_fasilitas = htmlspecialchars($data['id_fasilitas']);
    $sudahBayar ='0';

    $sql = "SELECT id_gedung FROM paket WHERE id_paket = '$id_paket'";

    $result =  mysqli_query($koneksi, $sql);
    $id_gedung = mysqli_fetch_array($result)[0];

    $check = checkSewa($tanggalpakai, $lamasewa , null, $id_paket);
    $check = checkSewaTest($tanggalpakai, $tanggaltempo, $lamasewa, $id_gedung);
    if ($check == 'true') {
        return false;
    }
    $sql = "INSERT INTO `sewa` (`id_sewa`, `nama_penyewa`, `username`, `alamat_penyewa`, `telp_penyewa`, `id_paket`, `tanggalpakai`, `tanggaltempo`, `lamasewa`, `id_gedung`, `id_fasilitas`, `sudahbayar`) VALUES ('$id_sewa','$nama_penyewa','$username', '$alamat_penyewa','$telp_penyewa','$id_paket','$tanggalpakai','$tanggaltempo','$lamasewa', '$id_gedung' , '$id_fasilitas','$sudahBayar')";
    
    $query = mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);
}
function reviewsend($data){
    global $koneksi;
	
    $id_sewa = htmlspecialchars($data['id_sewa']);
    $reviewdata = htmlspecialchars($data['reviewdata']);
	$username = htmlspecialchars($data['username']);
	$nama_penyewa = htmlspecialchars($data['nama_penyewa']);
	$denda = htmlspecialchars($data['denda']);
	$status = htmlspecialchars($data['status']);
	$tgl = htmlspecialchars($data['tgl']);
    $tgl = Date('Y-m-d', strtotime($tgl));
    $foto = upload();
	
    $sql = "INSERT INTO review VALUES ('$id_sewa','$reviewdata','$username','$denda','$status','$foto','$nama_penyewa','$tgl')";

    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);

}


function reviewsendsesudah($data){
    global $koneksi;
	
    $id_sewa = htmlspecialchars($data['id_sewa']);
    $reviewdata = htmlspecialchars($data['reviewdata']);
	$username = htmlspecialchars($data['username']);
	$nama_penyewa = htmlspecialchars($data['nama_penyewa']);
	$denda = htmlspecialchars($data['denda']);
	$status = htmlspecialchars($data['status']);
	$foto = upload();
	$tgl = htmlspecialchars($data['tgl']);
    $tgl = Date('Y-m-d', strtotime($tgl));
    $tgl_admin = '0';
	
    $sql = "INSERT INTO review_sesudah VALUES ('$id_sewa','$reviewdata','$username','$denda','$status','$foto','$nama_penyewa','$tgl','$tgl_admin')";

    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);

}

function checkPembayaran($id_sewa) {
    global $koneksi;

    $data = mysqli_fetch_object(mysqli_query($koneksi, "SELECT * FROM `sewa` WHERE id_sewa = '$id_sewa';"));
    $sql = "SELECT * FROM `sewa` WHERE id_gedung = '$data->id_gedung' AND tanggalpakai = '$data->tanggalpakai' AND sudahbayar = '1';";
    return mysqli_fetch_object(mysqli_query($koneksi, $sql));
}

//Proses Bayar Sewa 
function bayarsewa($data){
    global $koneksi;

    $check = checkPembayaran($data['id_sewa']);
    if ($check) {
        return false;
    }
	
    $id_bayar = $data['id_bayar'];
    $id_sewa = $data['id_sewa'];
    $norek = htmlspecialchars($data['norek']);
    $foto = upload();
	$username = htmlspecialchars($data['username']);
	$status = htmlspecialchars($data['status']);
	$totalbayar = htmlspecialchars($data['totalbayar']);
	$nama_penyewa = htmlspecialchars($data['nama_penyewa']);
	$tanggalpakai = htmlspecialchars($data['tanggalpakai']);
	$tanggaltempo = htmlspecialchars($data['tanggaltempo']);
    $null = '1';

    $sql = "INSERT INTO transaksi_sewa (`id_bayar`, `id_sewa`, `norek`, `foto`, `username`, `status`, `totalbayar`, `nama_penyewa`, `tanggalpakai`, `tanggaltempo`) VALUES ('$id_bayar','$id_sewa','$norek','$foto','$username','$status','$totalbayar','$nama_penyewa','$tanggalpakai','$tanggaltempo')";
    $sql2 = "UPDATE sewa SET sudahbayar = '$null' WHERE id_sewa = '$id_sewa'";

    mysqli_query($koneksi, $sql);
    mysqli_query($koneksi, $sql2);
    return mysqli_affected_rows($koneksi);

}

function updatestatus($data){
    global $koneksi;

    $status = htmlspecialchars($data['status']);
    $id_bayar = htmlspecialchars($data['id_bayar']);
    $id_sewa = htmlspecialchars($data['id_sewa']);
    
    if ($status == 1){
        $null = '2';
    } elseif ($status == 2){
        $null = '3';
    } else {
        $null = '1';
    }

    $sql = "UPDATE transaksi_sewa SET status = '$status', notifedAdmin = 1, notifedUser = 1, notifedReview = 1, updatedAt = CURRENT_TIMESTAMP WHERE id_bayar = '$id_bayar'";
    $sql2 = "UPDATE sewa SET sudahbayar = '$null' WHERE id_sewa = '$id_sewa'";

    mysqli_query($koneksi, $sql);
    mysqli_query($koneksi, $sql2);

    return mysqli_affected_rows($koneksi);
}

function reviewupdate($data){
    global $koneksi;

    $id_sewa = htmlspecialchars($data['id_sewa']);
    $denda = $data['denda'];
	$reviewdata= htmlspecialchars($data['reviewdata']);
	$username= htmlspecialchars($data['username']);
	$status= htmlspecialchars($data['status']);
	
	$tgl_admin = htmlspecialchars($data['tgl_admin']);
    $tgl_admin = Date('Y-m-d', strtotime($tgl_admin));
	

    $sql = "UPDATE review_sesudah SET denda= '$denda',reviewdata= '$reviewdata', status='$status', tgl_admin= '$tgl_admin' WHERE id_sewa = '$id_sewa'";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}
// Membuat fungsi upload foto
function upload()
{
    // Syarat
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];


    // Jika tidak mengupload gambar atau tidak memenuhi persyaratan diatas maka akan menampilkan alert dibawah
    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
        return false;
    }

    // format atau ekstensi yang diperbolehkan untuk upload gambar adalah
    $extValid = ['jpg', 'jpeg', 'png'];
    $ext = explode('.', $namaFile);
    $ext = strtolower(end($ext));

    // Jika format atau ekstensi bukan gambar maka akan menampilkan alert dibawah
    if (!in_array($ext, $extValid)) {
        echo "<script>alert('Yang anda upload bukanlah gambar!');</script>";
        return false;
    }

    // Jika ukuran gambar lebih dari 3.000.000 byte maka akan menampilkan alert dibawah
    if ($ukuranFile > 3000000) {
        echo "<script>alert('Ukuran gambar anda terlalu besar!');</script>";
        return false;
    }

    // nama gambar akan berubah angka acak/unik jika sudah berhasil tersimpan
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ext;

    // memindahkan file ke dalam folde img dengan nama baru
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
    
}

function getDiffDay($start, $end) {
    $start_date = strtotime($start);
    $end_date = strtotime($end);
    $interval = $end_date - $start_date;
    $days = floor($interval / (60 * 60 * 24));
    return $days + 1;
}

?>