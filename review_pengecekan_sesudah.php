<!-- Begin Page Content -->
<?php
// Memanggil atau membutuhkan file function.php


//Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['reviewsend'])) {
    if (reviewsendsesudah($_POST) > 0) {
         echo "<script>
                alert('Laporan berhasil terkirim!');
                document.location.href ='?url=review_pengecekan';
            </script>";
    
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Laporan dengan ID ini sudah ada. Silahkan delete dan isi kembali jika ingin merevisi');
            </script>";
    }
}
?>
			
<div class="container-fluid">
<div class="card">
    <div class="card-body">
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Form Laporan Pengecekan Sesudah</h4>
			<h6 class="m-0 font-weight text">*Hanya ID Sewa yang sukses terdaftar pada pengecekan sebelumnya</h6>
        </div>
        <div class="card-body">
        <!-- Horizontal Form -->
        <form action="" method="POST" enctype="multipart/form-data">
		
            <div class="row mb-3">
                <label for="id_penyewa" class="col-sm-2 col-form-label">ID Sewa</label>
                <div class="col-sm-10">
					<select name="id_sewa" class="form-control" required> 
					<!-- Pilih id sewa sesuai status1 -->
						<option value="0">Pilih salah satu</option>
						<?php
						$sql="SELECT * FROM review";
						$result = mysqli_query($koneksi,$sql);
						while($row = mysqli_fetch_array($result)) 
						{
						?>
							<option value = "<?php echo($row['id_sewa'])?>" >
							<?php echo($row['id_sewa']);
							?>
							</option>
							
						<?php 
						} 
						?>
					</select>
					
					<!-- Buat call data lagi-->
					<?php
						$tgl=date('d-m-Y');
						$sql="SELECT * FROM review ";
						$result = mysqli_query($koneksi,$sql);
						while($row = mysqli_fetch_array($result)) 
						{
						
						?>
						<!-- Post username, status pending, dan denda default sesuai id sewa-->
							<input type="hidden" class="form-control" name="username" value="<?= $row['username']; ?>" required>
							<input type="hidden" class="form-control" name="tgl" value="<?= $tgl ?>" required>
							<input type="hidden" class="form-control" name="nama_penyewa" value="<?= $row['nama_penyewa']; ?>" required>
							<input type="hidden" class="form-control" name="denda" value="0" required>
							<input type="hidden" class="form-control" name="status" value="0" required>
							
						<?php 
						} 
						?>
                </div>
            </div>
			<div class="row mb-3">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" name="foto" id="foto" class="isian-formulir isian-formulir-border" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="id_paket" class="col-sm-2 col-form-label">Catatan</label>
                <div class="col-sm-10">
					<textarea  class="form-control" name="reviewdata" rows="10" cols="50">Silahkan isi hasil pengecekan</textarea>
                </div>
            </div>
            <div class="text-center">
            <a href="?url=admin_paket" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" name="reviewsend">Kirim</button>
                
               
            </div>
        </form>
        <!-- End Horizontal Form -->
                </tbody>
            </table>
        </div>
    </div></div>
</div></div>

<div class="container-fluid">
<div class="card">
    <div class="card-body">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Daftar Laporan</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>ID Sewa</th>
                <th>Review</th>
				<th>Foto</th>
                </tr>
            </thead>
            <tbody>
			
			<!--  WHERE username='$_SESSION[username]'  -- perintah menampilkan data berdasarkan user login | &&id paket=0 yang biasa--> 
			<!-- fungsi ecplode untuk memecah data array fasilitas , setelah itu array sum dan ditambahkan ke harga total bayar-->
            <?php 
            $no = 1;
           
            $tampil = mysqli_query($koneksi, "SELECT * FROM review_sesudah ORDER BY id_sewa DESC");

            while($hasil = $tampil->fetch_assoc()){
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hasil['id_sewa']; ?></td>
                    <td><?= $hasil['reviewdata']; ?></td>
					<td><a href="img/<?= $hasil['foto']; ?>">Klik Disini</a></td>
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


<!-- /.container-fluid -->
