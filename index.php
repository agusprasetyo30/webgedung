<?php 
require 'function.php';
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gedung Serbaguna Bahari Sejahtera</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link href="css/sb-admin-2.css" rel="stylesheet" />
        
    </head>
	<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">JADWAL SEWA GEDUNG</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="card shadow mb-4">
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>Tanggal Pakai</th>
                <th>Tanggal Tempo</th>
                <th>Gedung yang disewa</th>
                
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM jadwal_sewa WHERE id_gedung=0 ORDER BY id_jadwal DESC");
            while($hasil = mysqli_fetch_array($tampil)){
                $id_gdg = $hasil['id_gedung'];
                $tampil2 = mysqli_query($koneksi, "SELECT * FROM gedung WHERE id_gedung = '$id_gdg'");
                $hasil2 = mysqli_fetch_array($tampil2);
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    
                    <td><?= $hasil['tanggalpakai']; ?></td>
                    <td><?= $hasil['tanggaltempo']; ?></td>
                    <td><?= $hasil2['nama_gedung']; ?></td> 
                    
                </tr>
            <?php } ?>
            </tbody>

        </table>

        </div>
		</div>
        </div>

		<center>Silahkan masuk untuk melihat ketersediaan jadwal.</center>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
        
      </div>
    </div>
  </div>
   
  <body class="bg-gradient-dark">
				
    <div class="container">
    <div class="col-lg-9 offset-lg-2 text-center">
      <br><br><br>
        <img class="w-100" src="img/gedung.jpeg" alt="Image" /><br><br>
        <h3 class="Liberation Mono" ><a style="color:#F5F5DC">Gedung Serbaguna Bahari Sejahtera</a></h3>
        <p class="mb-2" style="color:#F5F5DC">Selamat Datang! <a style="color:#297ecf" data-toggle="modal" data-target="#myModal"><b>Cek Jadwal</b></a></p>
        <div class="dropdown">
  <button class="mainmenubtn">Masuk Sebagai</button>
  <div class="dropdown-child">
  <a href="login.php">Penyewa</a>
						<a href="login_admin.php">Admin</a>
						<a href="login_review.php">Pengecek</a>
  </div>
</div>
        

            
        </div>

    </div>
            </body>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <style>
img {
    max-width: 100%;
    height: auto;
}

.mainmenubtn {
    background-color: grey;
    color: white;
    border: none;
    cursor: pointer;
    padding:10px;
    margin-top:20px;
}
.mainmenubtn:hover {
    background-color: grey;
    }
.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-child {
    display: none;
    background-color: grey;
    min-width: 20px;
    
}
.dropdown-child a {
    color: white;
    padding: 5px;
    text-decoration: none;
    display: block;
}
.dropdown:hover .dropdown-child {
    display: block;
}

</style>

</body>

</html>