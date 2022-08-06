<?php


//Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['tambah'])) {
    if (tambahjadwal($_POST) > 0) {
         echo "<script>
                alert('Terima Kasih');
                document.location.href ='?url=admin_jadwal';
            </script>";
    
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Maaf Anda Gagal Melakukan Penyewaan');
            </script>";
    }
}
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Jadwal</h5>
        <!-- Horizontal Form -->
        <form action="" method="POST" enctype="multipart/form-data">
			<div class="row mb-3">
                <label for="nama_penyewa" class="col-sm-2 col-form-label">ID Jadwal</label>
				<div class="col-sm-10">
				<!-- AutoGenerate ID -->
				<?php
					
					$query = mysqli_query($koneksi, "SELECT max(id_jadwal) as kodeTerbesar FROM jadwal_sewa");
					$data = mysqli_fetch_array($query);
					$idJad = $data['kodeTerbesar'];

					$urutan = (int) substr($idJad, 3, 3);
 
					$urutan++;

					$huruf = "SCH";
					$idJad = $huruf . sprintf("%03s", $urutan);
				?>
                <input type="text" class="form-control" name="id_jadwal" required="required" value="<?php echo $idJad ?>" readonly>
				</div>
            </div>
            <div class="row mb-3">
                <label for="alamat_penyewa" class="col-sm-2 col-form-label">Tanggal Pakai</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggalpakai" placeholder="Masukkan Alamat Lengkap Anda" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama_penyewa" class="col-sm-2 col-form-label">Tanggal Tempo</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggaltempo" placeholder="Masukkan Nama Sesuai KTP" required>
                </div>
            </div> 
			<!-- Masuk data base, jika value 1 maka paket -->
            <div class="row mb-3">
                <label for="telp_penyewa" class="col-sm-2 col-form-label">Gedung yang disewa</label>
                <div class="col-sm-10">
					<!-- <select name="paket" class="form-control" required> 
						<option value="">Pilih salah satu</option>
						<option value="0">Biasa</option>
						<option value="1">Paket</option>
					</select> -->
                    <select name="id_gedung" class="form-control" required> 
						<option value="0">Pilih salah satu</option>
						<?php
						$sql="SELECT * FROM gedung";
						$result = mysqli_query($koneksi,$sql);
						while($row = mysqli_fetch_array($result)) 
						{
						?>
							<option value = "<?php echo($row['id_gedung'])?>" >
							<?php echo($row['nama_gedung']);
							?>
							</option>
						<?php 
						} 
						?>
					</select>
                </div>
            </div>
            <div class="text-center">
            <a href="?url=admin_paket" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
               
            </div>
        </form>
        <!-- End Horizontal Form -->
                </tbody>
            </table>
        </div>
    </div>
