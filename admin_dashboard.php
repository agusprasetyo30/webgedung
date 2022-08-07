
<?php 
$thn = 2022;
if (isset($_POST['submit'])) {
 $thn = date($_POST['tahun']);

 if (!empty($thn)) {
  // perintah tampil data berdasarkan periode tahun
 $q1 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 1 && YEAR(tanggalpakai)='$thn' && status=1");
 $q2 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 2 && YEAR(tanggalpakai)='$thn' && status=1");
 $q3 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 3 && YEAR(tanggalpakai)='$thn' && status=1");
 $q4 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 4 && YEAR(tanggalpakai)='$thn' && status=1");
 $q5 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 5 && YEAR(tanggalpakai)='$thn' && status=1");
 $q6 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 6 && YEAR(tanggalpakai)='$thn' && status=1");
 $q7 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 7 && YEAR(tanggalpakai)='$thn' && status=1");
 $q8 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 8 && YEAR(tanggalpakai)='$thn' && status=1");
 $q9 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 9 && YEAR(tanggalpakai)='$thn' && status=1");
 $q10 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 10 && YEAR(tanggalpakai)='$thn' && status=1");
 $q11 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 11 && YEAR(tanggalpakai)='$thn' && status=1");
 $q12 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 12 && YEAR(tanggalpakai)='$thn' && status=1");
 } else {
  // perintah tampil semua data 2022
 $q1 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 1 && YEAR(tanggalpakai)=2022 && status=1");
 $q2 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 2 && YEAR(tanggalpakai)=2022 && status=1");
 $q3 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 3 && YEAR(tanggalpakai)=2022 && status=1");
 $q4 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 4 && YEAR(tanggalpakai)=2022 && status=1");
 $q5 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 5 && YEAR(tanggalpakai)=2022 && status=1");
 $q6 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 6 && YEAR(tanggalpakai)=2022 && status=1");
 $q7 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 7 && YEAR(tanggalpakai)=2022 && status=1");
 $q8 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 8 && YEAR(tanggalpakai)=2022 && status=1");
 $q9 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 9 && YEAR(tanggalpakai)=2022 && status=1");
 $q10 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 10 && YEAR(tanggalpakai)=2022 && status=1");
 $q11 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 11 && YEAR(tanggalpakai)=2022 && status=1");
 $q12 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 12 && YEAR(tanggalpakai)=2022 && status=1");
 }
} else {
 // perintah tampil semua data 2022
 $q1 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 1 && YEAR(tanggalpakai)=2022 && status=1");
 $q2 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 2 && YEAR(tanggalpakai)=2022 && status=1");
 $q3 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 3 && YEAR(tanggalpakai)=2022 && status=1");
 $q4 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 4 && YEAR(tanggalpakai)=2022 && status=1");
 $q5 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 5 && YEAR(tanggalpakai)=2022 && status=1");
 $q6 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 6 && YEAR(tanggalpakai)=2022 && status=1");
 $q7 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 7 && YEAR(tanggalpakai)=2022 && status=1");
 $q8 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 8 && YEAR(tanggalpakai)=2022 && status=1");
 $q9 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 9 && YEAR(tanggalpakai)=2022 && status=1");
 $q10 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 10 && YEAR(tanggalpakai)=2022 && status=1");
 $q11 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 11 && YEAR(tanggalpakai)=2022 && status=1");
 $q12 = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= 12 && YEAR(tanggalpakai)=2022 && status=1");
}

// hitung jumlah data
$s1 = $q1->num_rows; 
$s2 = $q2->num_rows; 
$s3 = $q3->num_rows; 
$s4 = $q4->num_rows; 
$s5 = $q5->num_rows; 
$s6 = $q6->num_rows; 
$s7 = $q7->num_rows; 
$s8 = $q8->num_rows; 
$s9 = $q9->num_rows; 
$s10 = $q10->num_rows; 
$s11 = $q11->num_rows; 
$s12 = $q12->num_rows; 


?>

<body>
<div class="container-fluid">
<div class="card">
    <div class="card-body">
    <div class="card-title">
    </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight text-primary">Grafik Penyewaan</h4>
			<h6 class="m-0  text">*Hanya penyewa dengan pembayaran sukses</h6>
        </div>
        <div class="card-body">
    <div class="row">
     <div class="col-md-8">
      <form method="POST" action="" class="form-inline">
       <label for="date1">Tampilkan transaksi tahun  </label>
       <select class="form-control mr-2" name="tahun">
        <option value="">Pilih</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>

       </select>
       <button type="submit" name="submit" class="btn btn-primary">Tampilkan</button>
      </form>
     </div>
    </div>
	<hr>
	<div class="grafik" style="width:100%; height:400px;"></div>
  
   </div>
        </div>
        </div>
        </div>
        </div>
	
</body>
<!-- </html> -->

<!-- Script khusus grafik -->
<script type="text/javascript" src="vendor/jquery/jquery.slim.js"></script>
<script type="text/javascript" src="vendor/highcharts/highcharts.js"></script>
<script type="text/javascript" src="vendor/highcharts/modules/exporting.js"></script>
<script type="text/javascript" src="vendor/highcharts/modules/accessibility.js"></script>

<script type="text/javascript" src="vendor/chart.js/Chart.min.js"></script>

<script>  
    $('.grafik').highcharts({
      chart: {
        type: 'line',
        marginTop: 80
      },
      credits: {
        enabled: false
      }, 
      tooltip: {
        shared: true,
        crosshairs: true,
        headerFormat: '<b>Bulan {point.key}</b>'
      },
      title: {
        text: 'GRAFIK PENYEWAAN GEDUNG'
      },
      subtitle: {
        text: 'TAHUN <?= $thn ?>'
      },
      xAxis: {
        categories: [],
        labels: {
        rotation: 0,
        align: 'right',
        style: {
          fontSize: '10px',
          fontFamily: 'Verdana, sans-serif'
        }
        }
      },
      legend: {
        enabled: true
      },
      series: [{
        "name":"Penyewa",
        "data":[<?= $s1 ?>,<?= $s1 ?>,<?= $s2 ?>,<?= $s3 ?>,<?= $s4 ?>,<?= $s5 ?>,<?= $s6 ?>,<?= $s7 ?>,<?= $s8 ?>,<?= $s9 ?>,<?= $s10 ?>,<?= $s11 ?>,<?= $s12 ?>]
        },]
    });
  
</script>


