
<?php

//Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['simpan'])) {
    if (tambahfasilitas($_POST) > 0) {
         echo "<script>
                alert('Data fasilitas berhasil ditambahkan');
                document.location.href ='?url=admin_fasilitas';
            </script>";
    
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Data fasilitas gagal ditambahkan!');
            </script>";
    }
}
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Tambah Data Fasilitas</h5>

        <!-- Horizontal Form -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="id_fasilitas" class="col-sm-2 col-form-label">ID Fasilitas</label>
                <div class="col-sm-10">
				<!-- AutoGenerate ID -->
				<?php
					
					$query = mysqli_query($koneksi, "SELECT max(id_fasilitas) as kodeTerbesar FROM fasilitas");
					$data = mysqli_fetch_array($query);
					$idSewa = $data['kodeTerbesar'];

					$urutan = (int) substr($idSewa, 3, 3);
 
					$urutan++;

					$huruf = "F";
					$idSewa = $huruf . sprintf("%03s", $urutan);
				?>
					<input type="text" class="form-control" name="id_fasilitas" required="required" value="<?php echo $idSewa ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="fasilitas" class="col-sm-2 col-form-label">Fasilitas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="fasilitas" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="jumlah" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" name="foto" id="foto" class="isian-formulir isian-formulir-border" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="jumlah" class="col-sm-2 col-form-label">Harga (Rp)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="harga_fsl" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="deskripsi" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="keterangan" required>
                </div>
            </div>
            
            <div class="text-center">
                <a href="?url=admin_fasilitas" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
               
            </div>
        </form><!-- End Horizontal Form -->
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
