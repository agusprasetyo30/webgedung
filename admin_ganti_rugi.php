<!-- Begin Page Content -->
<?php
// Memanggil atau membutuhkan file function.php

//Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['reviewsend'])) {
    if (reviewsend($_POST) > 0) {
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
            <h4 class="m-0 font-weight-bold text-primary">Info Ganti Rugi</h4>
			<h6 class="m-0 font-weight text">*Jika status sukses data akan dikirim ke Penyewa</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                
                <th>ID Sewa</th>
                <th>Penyewa</th>
				<th>Tgl Review</th>
				<th>Tgl Admin</th>
                <th>Review</th>
                <th>Denda</th>
				<th>Foto Sebelum</th>
				<th>Foto Sesudah</th>
				<th>Status</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
			
		
            <?php 
    
           
            $tampil = mysqli_query($koneksi, "SELECT * FROM review_sesudah ORDER BY id_sewa DESC");

            while($hasil = $tampil->fetch_assoc()){
            ?>
                       
                <tr>
                    
                    <td><?= $hasil['id_sewa']; ?></td>
                    <td><?= $hasil['nama_penyewa']; ?></td>
					<td><?= $hasil['tgl']; ?></td>
					<td><?= $hasil['tgl_admin']; ?></td>
                    <td><?= $hasil['reviewdata']; ?></td>
					<td><?php echo rupiah($hasil['denda']); ?></td>
					
					<!-- /.Fungsi menampilkan foto sebelum -->
					<?php 
					$tampil1 = mysqli_query($koneksi, "SELECT * FROM review ORDER BY id_sewa DESC");
					while($hasil1 = $tampil1->fetch_assoc()){
                        
					?>
                    
					<td><a href="img/<?= $hasil1['foto']; ?>">Klik Disini</a></td>
					<?php } ?>
					
					<td><a href="img/<?= $hasil['foto']; ?>">Klik Disini</a></td>
					<td><a><?php if ($hasil['status'] == 1) : ?>
                            <span class="badge badge-pill badge-success">Success</span>
                         <?php elseif ($hasil['status'] == 2) : ?>
                           <span class="badge badge-pill badge-danger">Ditolak</span>
						 <?php else : ?>
                           <span class="badge badge-pill badge-warning">Pending</span>
                         <?php endif ?></a>
					</td>
                    <td>
						<a href="admin_hapus_gantirugi.php?id_sewa=<?= $hasil['id_sewa'];?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
						 | <a href="admin_index.php?url=admin_ubah_denda.php&username=<?= $hasil['username']; ?>&id_sewa=<?= $hasil['id_sewa'];?>&reviewdata=<?= $hasil['reviewdata'];?>&denda=<?= $hasil['denda'];?>&tgl=<?= $hasil['tgl'];?>" class="btn btn-primary btn-sm" style="font-weight: 600;"><i class="bi bi-trash-fill"></i>&nbsp;Ubah</a>
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


<!-- /.container-fluid -->
