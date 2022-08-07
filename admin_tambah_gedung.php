
<?php
// Memanggil atau membutuhkan file function.php
// require 'function.php';

//Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['simpan'])) {
    if (tambahgedung($_POST) > 0) {
         echo "<script>
                alert('Data berhasil ditambahkan');
                document.location.href ='?url=admin_gedung';
            </script>";
    
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Data pinjam gagal ditambahkan!');
            </script>";
    }
}
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Tambah Data Gedung</h5>

        <!-- Horizontal Form -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="id_gedung" class="col-sm-2 col-form-label">ID Gedung</label>
                <div class="col-sm-10">
				<!-- AutoGenerate ID -->
                    <?php
					
					$query = mysqli_query($koneksi, "SELECT max(id_gedung) as kodeTerbesar FROM gedung");
					$data = mysqli_fetch_array($query);
					$idGed = $data['kodeTerbesar'];

					$urutan = (int) substr($idGed, 3, 3);
 
					$urutan++;

					$huruf = "G";
					$idGed = $huruf . sprintf("%03s", $urutan);
				?>
				<input type="text" class="form-control" name="id_gedung" required="required" value="<?php echo $idGed ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama_gedung" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_gedung" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" name="foto" id="foto" class="isian-formulir isian-formulir-border" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama_gedung" class="col-sm-2 col-form-label">Harga (Rp)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="harga_gdg" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="keterangan" required>
                </div>
            </div>
            
            <div class="text-center">
                <a href="?url=admin_gedung" class="btn btn-secondary">Kembali</a>
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
