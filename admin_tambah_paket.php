<!-- Begin Page Content -->
<?php
// Memanggil atau membutuhkan file function.php
// require 'function.php';

//Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['simpan'])) {
    if (tambahpaket($_POST) > 0) {
         echo "<script>
                alert('Data paket berhasil ditambahkan!');
                document.location.href ='?url=admin_paket';
            </script>";
    
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Data paket gagal ditambahkan!');
            </script>";
    }
}
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Tambah Data Paket</h5>

        <!-- Horizontal Form -->
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="id_paket" class="col-sm-2 col-form-label">ID Paket</label>
                <div class="col-sm-10">
				<!-- AutoGenerate ID -->
                    <?php
					
					$query = mysqli_query($koneksi, "SELECT max(id_paket) as kodeTerbesar FROM paket");
					$data = mysqli_fetch_array($query);
					$idPak = $data['kodeTerbesar'];

					$urutan = (int) substr($idPak, 3, 3);
 
					$urutan++;

					$huruf = "P";
					$idPak = $huruf . sprintf("%03s", $urutan);
				?>
				<input type="text" class="form-control" name="id_paket" required="required" value="<?php echo $idPak ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="paket" class="col-sm-2 col-form-label">Paket</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="paket" required>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="harga" class="col-sm-2 col-form-label">Harga (Rp)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="harga" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="keterangan" required>
                </div>
            </div>
            
            <div class="text-center">
            <a href="?url=admin_paket" class="btn btn-secondary">Kembali</a>
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
