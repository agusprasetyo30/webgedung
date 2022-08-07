<!-- Begin Page Content -->
<?php
// Memanggil atau membutuhkan file function.php


//Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['sewa'])) {
    if (sewa($_POST) > 0) {
         echo "<script>
                alert('Silahkan Melakukan Pembayaran');
                document.location.href ='?url=penyewa_sewabiasa.php';
            </script>";
    
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Maaf Anda Gagal Melakukan Penyewaan karena gedung sudah terisi pada tanggal tersebut');
            </script>";
    }
}
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Form Sewa Biasa Gedung</h5>

        <!-- Horizontal Form -->
        <form action="" method="POST" enctype="multipart/form-data">
		<!-- Record username login -->
		<input type="hidden" class="form-control" name="username" value="<?=$_SESSION['username'];?>" required>
		<!-- Karena ini biasa, id paket di 0 kan -->
		<input type="hidden" class="form-control" name="id_paket" value="0" required>
            <div class="row mb-3">
                <label for="id_penyewa" class="col-sm-2 col-form-label">ID Sewa</label>
                <div class="col-sm-10">
				
				<!-- AutoGenerate ID -->
				<?php
					$huruf = "REG";
                    $urutan = rand(0000001, 9999999);
					$idSewa = $huruf . sprintf("%03s", $urutan);
				?>
					<input type="text" class="form-control" name="id_sewa" required="required" value="<?php echo $idSewa ?>" readonly>
					
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama_penyewa" class="col-sm-2 col-form-label">Nama Penyewa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_penyewa" placeholder="Masukkan Nama Sesuai KTP" required>
                </div>
            </div>
			<div class="row mb-3">
                <label for="telp_penyewa" class="col-sm-2 col-form-label">Gedung</label>
                <div class="col-sm-10">
					<select name="id_gedung" class="form-control" required> 
						<option value="0" selected>Pilih salah satu</option>
						<?php
						$sql="SELECT * FROM gedung";
						$result = mysqli_query($koneksi,$sql);
						while($row = mysqli_fetch_array($result)) 
						{
						?>
							<option value="<?php echo($row['id_gedung'])?>" >
							<?php echo($row['nama_gedung']);
							?>
							</option>
						<?php 
						} 
						?>
					</select>
                </div>
            </div>
			<div class="row mb-3">
                <label for="telp_penyewa" class="col-sm-2 col-form-label">Fasilitas</label>
				<div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="0:Tanpa Fasilitas" name="fasilitas[]" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Tanpa Fasilitas
                        </label>
                    </div>
                    <?php
                        $sql="SELECT * FROM fasilitas";
                        $result = mysqli_query($koneksi,$sql);
                        while($row = mysqli_fetch_array($result)) {?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?php echo($row['harga_fsl'])?>:<?php echo($row['fasilitas'])?>" name="fasilitas[]" id="defaultCheck<?= $row["id"]?>">
                            <label class="form-check-label" for="defaultCheck<?= $row["id"]?>">
                                <?= $row['fasilitas']?>
                            </label>
                        </div>
                    <?php } ?>
				</div>
            </div>
            <div class="row mb-3">
                <label for="alamat_penyewa" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat_penyewa" placeholder="Masukkan Alamat Lengkap Anda" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="telp_penyewa" class="col-sm-2 col-form-label">No.Telp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telp_penyewa" placeholder="Masukkan No.Telp Anda" required>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="id_paket" class="col-sm-2 col-form-label">Tanggal Pakai</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggalpakai" placeholder="Masukkan Tanggal Pakai" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="id_paket" class="col-sm-2 col-form-label">Tanggal Tempo</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggaltempo" placeholder="Masukkan Tanggal Pakai" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="id_paket" class="col-sm-2 col-form-label">Lama Sewa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="lamasewa" placeholder="Lama sewa harian" required>
                </div>
            </div>
            <div class="text-center">
            <a href="?url=admin_paket" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" name="sewa">Sewa</button>
                
               
            </div>
        </form>
        <!-- End Horizontal Form -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container-fluid">
<div class="card">
    <div class="card-body">
    <div class="card-title">
    </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Sewa Biasa Saya</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>ID Sewa</th>
                <th>Penyewa</th>
               
                <th>Tanggal Pakai</th>
                <th>Tanggal Tempo</th>
                <th>Lama Pakai</th>
                <th>Total Bayar</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
			
			<!--  WHERE username='$_SESSION[username]'  -- perintah menampilkan data berdasarkan user login | &&id paket=0 yang biasa--> 
			<!-- fungsi ecplode untuk memecah data array fasilitas , setelah itu array sum dan ditambahkan ke harga total bayar-->
            <?php 
            $no = 1;
            $totalbayar = 0;

            $tampil = mysqli_query($koneksi, "SELECT * FROM sewa JOIN gedung ON gedung.id_gedung = sewa.id_gedung WHERE username='".$_SESSION['username']."' and id_paket is NULL ORDER BY id_sewa DESC;");

            while($hasil = $tampil->fetch_assoc()){
				$res = explode(',',$hasil['id_fasilitas']);
				$result = array_sum($res);
                
				$totalbayar =($hasil['harga_gdg'] * $hasil['lamasewa'])+$result;
                
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hasil['id_sewa']; ?></td>
                    <td><?= $hasil['nama_penyewa']; ?></td>
                    <td><?= $hasil['tanggalpakai']; ?></td>
                    <td><?= $hasil['tanggaltempo']; ?></td>
                    <td><?= $hasil['lamasewa']; ?></td>
                    <td><?php echo rupiah($totalbayar) ?></td>
                    <td>
					
                    <?php if ($hasil['sudahbayar'] == 0  ) :?>
                        <a href="penyewa_hapus_sewa.php?id_sewa=<?= $hasil['id_sewa'];?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin membatalkan penyewaan ?');"><i class="bi bi-trash-fill"></i>&nbsp;Batal Sewa</a>
                        <a href="penyewa_index.php?url=penyewa_bayarsewa.php&id_sewa=<?= $hasil['id_sewa'];?>&totalbayar=<?= $totalbayar ?>&nama_penyewa=<?= $hasil['nama_penyewa']; ?>&tanggalpakai=<?= $hasil['tanggalpakai']; ?>&tanggaltempo=<?= $hasil['tanggaltempo']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-trash-fill"></i>&nbsp;Bayar</a>
                    <?php elseif ($hasil['sudahbayar']  ==  1): ?> 
                        <a href="#" class="btn btn-primary btn-sm" style="font-weight: 600;"><i class="bi bi-trash-fill"></i>&nbsp;Sedang divalidasi</a>
                    <?php elseif ($hasil['sudahbayar']  ==  2): ?> 
                        <a href="#" class="btn btn-success btn-sm" style="font-weight: 600;"><i class="bi bi-trash-fill"></i>&nbsp;Sukses</a>
                    <?php elseif ($hasil['sudahbayar']  ==  3): ?> 
                        <a href="" class="btn btn-danger btn-sm" style="font-weight: 600;"><i class="bi bi-trash-fill"></i>&nbsp;Ditolak</a>
                        <a href="penyewa_index.php?url=penyewa_bayarsewa.php&id_sewa=<?= $hasil['id_sewa'];?>&totalbayar=<?= $totalbayar ?>&nama_penyewa=<?= $hasil['nama_penyewa']; ?>&tanggalpakai=<?= $hasil['tanggalpakai']; ?>&tanggaltempo=<?= $hasil['tanggaltempo']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-trash-fill"></i>&nbsp;Bayar</a>
                    <?php endif ?>
                    </td>
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
</div>
<!-- /.container-fluid -->
