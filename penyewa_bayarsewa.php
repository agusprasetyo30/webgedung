<!-- Begin Page Content -->
<?php

//Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['kirim'])) {
    if (bayarsewa($_POST) > 0) {
         echo "<script>
                alert('Terima Kasih. Pembayaran anda segera kami validasi');
                document.location.href ='?url=penyewa_bayarsewa.php&id_sewa=PEMBAYARAN BERHASIL&totalbayar=0';
            </script>";
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Maaf Anda Gagal Melakukan Pembayaran, atau mungkin gedung yang anda sewa sudah tersewakan');
            </script>";
    }
}
?>
<div class="container-fluid">
<div class="card">
    <div class="card-body">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Form Pembayaran</h4>
        </div>
        <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
			<!-- Record username login -->
            <input type="hidden" class="form-control" name="username" value="<?=$_SESSION['username'];?>" required>
			<!-- kasih value status 0 dlu karena belum dicek -->
			<input type="hidden" class="form-control" name="status" value="0" required>
			<!-- post nama penyewa -->
			<input type="hidden" class="form-control" name="nama_penyewa" value="<?php echo $_GET['nama_penyewa'];?>" required>
			<!-- post tanggalpakai -->
			<input type="hidden" class="form-control" name="tanggalpakai" value="<?php echo $_GET['tanggalpakai'];?>" required>
			<input type="hidden" class="form-control" name="tanggaltempo" value="<?php echo $_GET['tanggaltempo'];?>" required>
			
            <div class="row mb-3">
                <label for="alamat_penyewa" class="col-sm-2 col-form-label">ID Sewa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_sewa" value="<?php echo $_GET['id_sewa'];?>" readonly required>
                </div>
            </div>
			<!-- Tambah ID BAYAR Auto generate -->
				<?php
					
					$query = mysqli_query($koneksi, "SELECT max(id_bayar) as kodeTerbesar FROM transaksi_sewa");
					$data = mysqli_fetch_array($query);
					$idBayar = $data['kodeTerbesar'];

					$urutan = (int) substr($idBayar, 3, 3);
					$urutan++;

					$huruf = "INV";
					$idBayar = $huruf . sprintf("%03s", $urutan);
				?>
					<input type="hidden" class="form-control" name="id_bayar" required="required" value="<?php echo $idBayar ?>" readonly>
					
            
            <div class="row mb-3">
                <label for="nama_penyewa" class="col-sm-2 col-form-label">No. Rekening</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="norek" placeholder="Masukkan No Rekening Anda" required>
                </div>
            </div> 
			<div class="row mb-3">
                <label for="alamat_penyewa" class="col-sm-2 col-form-label">Nominal Pembayaran</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="totalbayar" value="<?=( $_GET['totalbayar']);?>" readonly required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="foto" class="col-sm-2 col-form-label">Bukti Transaksi</label>
                <div class="col-sm-10">
                    <input type="file" name="foto" id="foto" class="isian-formulir isian-formulir-border" required>
                </div>
            </div>
            <div class="text-center">
            <a href="?url=admin_paket" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" name="kirim">Kirim
                
                </button>

               
            </div>
        </form>
        <!-- End Horizontal Form -->
                </tbody>
            </table>
        </div>
    </div>
</div></div>
<div class="container-fluid">
<div class="card">
    <div class="card-body">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Riwayat Pembayaran</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>ID Bayar</th>
                <th>ID Sewa</th>
                <th>Tanggal Pakai</th>
                <th>Tanggal Tempo</th>
                <th>Status</th>
                </tr>
            </thead>
            <tbody>
			
		
			
            <?php 
            $no = 1;

            $tampil = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa INNER JOIN sewa on transaksi_sewa.id_sewa = sewa.id_sewa
              ORDER BY id_bayar DESC");

            while($hasil = mysqli_fetch_array($tampil)){
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hasil['id_bayar']; ?></td>
                    <td><?= $hasil['id_sewa']; ?></td>
                    <td><?= $hasil['tanggalpakai']; ?></td>
                    <td><?= $hasil['tanggaltempo']; ?></td>
					
					<!--  intruksi status --> 
					<td> <?php if ($hasil['status'] == 1) : ?>
                            <span class="badge badge-pill badge-success">Success</span>
						 <?php elseif ($hasil['status'] == 2) : ?>
                           <span class="badge badge-pill badge-danger">Ditolak</span>
                         <?php else : ?>
                           <span class="badge badge-pill badge-warning">Pending</span>
                         <?php endif ?>
                    
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
