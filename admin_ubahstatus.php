<!-- Begin Page Content -->
<?php
// Memanggil atau membutuhkan file function.php
// require 'function.php';
$idbayar = $_GET['id_bayar'];

$tampil = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE id_bayar = '$idbayar' ");
$hasil = mysqli_fetch_array($tampil);
$idsewa = $hasil['id_sewa'];

//Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['kirim'])) {
    if (updatestatus($_POST) > 0) {
         echo "<script>
                alert('Berhasil diubah!');
                document.location.href ='?url=admin_transaksi';
            </script>";
    
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Status pembayaran gagal diubah');
            </script>";
    }
}
?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ubah Status</h5>
        <!-- Horizontal Form -->
		
        <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="id_sewa" value="<?= $idsewa ?>" readonly required>
			<!-- Record username login -->
            
            <div class="row mb-3">
                <label for="alamat_penyewa" class="col-sm-2 col-form-label">ID Bayar</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_bayar" value="<?= $idbayar ?>" readonly required>
                </div>
            </div>
			<div class="row mb-3">
                <label for="alamat_penyewa" class="col-sm-2 col-form-label">Status</label>
				<div class="col-sm-10">
                <select class="form-control"name="status" id="status">
					<option value="0">Pilih salah satu</option>
					<option value="0">Pending</option>
					<option value="1">Success</option>
					<option value="2">Ditolak</option>
				</select>
				</div>
            </div>
			
            
            <div class="text-center">
            <a href="?url=admin_transaksi" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" name="kirim">Kirim</button>
               
            </div>
        </form>
        <!-- End Horizontal Form -->
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>