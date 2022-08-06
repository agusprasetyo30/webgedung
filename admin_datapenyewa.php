<?php
// Memanggil atau membutuhkan file function.php
// require 'function.php';
?>
<div class="container-fluid">
<div class="card">
    <div class="card-body">
    <div class="card-title">
    </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Sewa Paket</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>ID Sewa</th>
                <th>Penyewa</th>
                <th>Paket</th>
                <th>Tanggal Pakai</th>
                <th>Tanggal Tempo</th>
                <th>Lama Pakai</th>
				<!-- <th>Aksi</th> -->
                
                </tr>
            </thead>
            <tbody>
			
			
            <?php 
            $no = 1;

            $tampil = mysqli_query($koneksi, "SELECT * FROM sewa INNER JOIN paket on sewa.id_paket = paket.id_paket ORDER BY id_sewa DESC");

            while($hasil = $tampil->fetch_assoc()){
                $totalbayar =$hasil['harga'] * $hasil['lamasewa'];
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hasil['id_sewa']; ?></td>
                    <td><?= $hasil['nama_penyewa']; ?></td>
                    <td><?= $hasil['paket']; ?></td>
                    <td><?= $hasil['tanggalpakai']; ?></td>
                    <td><?= $hasil['tanggaltempo']; ?></td>
                    <td><?= $hasil['lamasewa']; ?></td>
					<!-- <td><a href="admin_hapus_datapenyewa.php?id_sewa=<?= $hasil['id_sewa'];?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
					</td> -->
                    
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
		</div>
        </div>
		<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Sewa Biasa</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>ID Sewa</th>
                <th>Penyewa</th>
                <th>Gedung</th>
                <th>Tanggal Pakai</th>
                <th>Tanggal Tempo</th>
                <th>Lama Pakai</th>
				<!-- <th>Aksi</th> -->
                
                </tr>
            </thead>
            <tbody>
			
            <?php 
            $no = 1;

            $tampil = mysqli_query($koneksi, "SELECT * FROM sewa WHERE id_paket='0' ORDER BY id_sewa DESC");

            while($hasil = $tampil->fetch_assoc()){
                $id_gdg = $hasil['id_gedung'];
                $tampil2 = mysqli_query($koneksi, "SELECT * FROM gedung WHERE id_gedung = '$id_gdg'");
                $hasil2 = mysqli_fetch_array($tampil2);
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hasil['id_sewa']; ?></td>
                    <td><?= $hasil['nama_penyewa']; ?></td>
                    <td><?= $hasil2['nama_gedung']; ?></td>
                    <td><?= $hasil['tanggalpakai']; ?></td>
                    <td><?= $hasil['tanggaltempo']; ?></td>
                    <td><?= $hasil['lamasewa']; ?></td>
					
                    
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
		</div>
        </div>
		
        </div>
        </div>
        </div>
        
        
		
		
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
