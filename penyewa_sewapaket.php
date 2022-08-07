<!-- Begin Page Content -->
<?php
// Memanggil atau membutuhkan file function.php


//Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['sewapaket'])) {
    $sewa = sewapaket($_POST);
    if ( $sewa > 0) {
         echo "<script>
                alert('Silahkan Melakukan Pembayaran');
                document.location.href ='?url=penyewa_sewapaket.php';
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
        <h5 class="card-title">Form Sewa Paket Gedung</h5>
    
        <!-- Horizontal Form -->
        <form action="" method="POST" enctype="multipart/form-data">
		<!-- Record username login -->
		<input type="hidden" class="form-control" name="username" value="<?=$_SESSION['username'];?>" required>
		<!-- Karena paket, yang biasa dikasih value 0 -->
		<input type="hidden" class="form-control" name="id_gedung" value="0" required>
		<input type="hidden" class="form-control" name="id_fasilitas" value="0" required>
		
            <div class="row mb-3">
                <label for="id_penyewa" class="col-sm-2 col-form-label">ID Sewa</label>
                <div class="col-sm-10">
				
				<!-- Tambah id sewa auto generate-->
				<?php
					$huruf = "PKT";
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
                <label for="telp_penyewa" class="col-sm-2 col-form-label">Paket</label>
                <div class="col-sm-10">
					<select name="id_paket" class="form-control" required> 
						<option value="0" selected disabled>Pilih paket</option>
						<?php
						$sql="SELECT * FROM paket";
						$result = mysqli_query($koneksi,$sql);
						while($row = mysqli_fetch_array($result)) 
						{
						?>
							<option value = "<?php echo($row['id_paket'])?>" >
							<?php echo($row['paket']);
							?>
							</option>
						<?php 
						} 
						?>
					</select>
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
                    <input type="date" class="form-control" name="tanggalpakai" id="tanggalpakai" placeholder="Masukkan Tanggal Pakai" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="id_paket" class="col-sm-2 col-form-label">Tanggal Tempo</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggaltempo" id="tanggaltempo" placeholder="Masukkan Tanggal Pakai" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="id_paket" class="col-sm-2 col-form-label">Lama Sewa</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="lamasewa" id="lamasewa" placeholder="Lama sewa harian" required readonly>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" name="hitung" id="hitung" type="button">Hitung</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
            <a href="?url=admin_paket" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" name="sewapaket">Sewa</button>
                
               
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
            <h4 class="m-0 font-weight-bold text-primary">Sewa Paket Saya</h4>
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
                <th>Total Bayar</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
			
			<!--  WHERE username='$_SESSION[username]'  -- perintah menampilkan data berdasarkan user login--> 
            <?php 
            $no = 1;
            $totalbayar = 0;

            $tampil = mysqli_query($koneksi, "SELECT * FROM sewa INNER JOIN paket on sewa.id_paket = paket.id_paket
             WHERE username='$_SESSION[username]' ORDER BY id_sewa DESC");

            while($hasil = $tampil->fetch_assoc()){
                $diff = getDiffDay($hasil['tanggalpakai'], $hasil['tanggaltempo']);
                $totalbayar =$hasil['harga'] * $diff;
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hasil['id_sewa']; ?></td>
                    <td><?= $hasil['nama_penyewa']; ?></td>
                    <td><?= $hasil['id_paket']; ?></td>
                    <td><?= $hasil['tanggalpakai']; ?></td>
                    <td><?= $hasil['tanggaltempo']; ?></td>
                    <td><?= $diff; ?></td>
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

<script>
    $(document).ready(function() {
        $('#hitung').click(function(){
            let tanggalPakai = new Date($('#tanggalpakai').val());
            let tanggalTempo = new Date($('#tanggaltempo').val());

            let jumlahHari = dayCounts(tanggalPakai, tanggalTempo);

            $('#lamasewa').val(jumlahHari)
        });

        function dayCounts(dateFirst, dateLast, addingDays = 1) {
            return ((dateLast.getTime() - dateFirst.getTime()) / (1000 * 3600 * 24)) + addingDays;
        }
    });
</script>