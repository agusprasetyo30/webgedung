<!-- Begin Page Content -->
<?php
$tgl_admin =date('d-m-Y');
//Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['reviewupdate'])) {
    if (reviewupdate($_POST) > 0) {
         echo "<script>
                alert('Laporan berhasil diupdate!');
                document.location.href ='?url=admin_ganti_rugi';
            </script>";
    
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('laporan gagal diupdate');
            </script>";
    }
}
?>
			
<div class="container-fluid">
<div class="card">
    <div class="card-body">
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Ubah Laporan</h4>
			<h6 class="m-0 font-weight text">*Silahkan masukan nominal denda</h6>
        </div>
        <div class="card-body">
        <!-- Horizontal Form -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="id_penyewa" class="col-sm-2 col-form-label">ID Sewa</label>
                <div class="col-sm-10">
				<input type="text" class="form-control" name="id_sewa" value="<?php echo $_GET['id_sewa'];?>" readonly required>	
				<input type="hidden" class="form-control" name="username" value="<?php echo $_GET['username'];?>" required>
				<input type="hidden" class="form-control" name="tgl_admin" value="<?= $tgl_admin ?>" required>
                </div>
            </div>
			<!-- Ubah nominal denda -->
			<div class="row mb-3">
                <label for="id_penyewa" class="col-sm-2 col-form-label">Denda (Rp)</label>
                <div class="col-sm-10">
				<input type="text" class="form-control" name="denda" value="<?php echo $_GET['denda'];?>"  required>	
                </div>
            </div>
			<!-- Ubah status -->
			<div class="row mb-3">
                <label for="id_penyewa" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
				<select class="form-control"name="status" id="status">
					<option value="0">Pilih salah satu</option>
					<option value="0">Pending</option>
					<option value="1">Success</option>
					<option value="2">Ditolak</option>
				</select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="id_paket" class="col-sm-2 col-form-label">Catatan</label>
                <div class="col-sm-10">
					<textarea  class="form-control" name="reviewdata" rows="10" cols="50"><?php echo $_GET['reviewdata'];?></textarea>
                </div>
            </div>
			
            <div class="text-center">
            <a href="?url=admin_ganti_rugi" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" name="reviewupdate">Kirim</button>
                
               
            </div>
        </form>
        <!-- End Horizontal Form -->
                </tbody>
            </table>
        </div>
    </div></div>
</div></div>



<!-- /.container-fluid -->
