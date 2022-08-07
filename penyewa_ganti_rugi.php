
<div class="container-fluid">
<div class="card">
    <div class="card-body">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Daftar Laporan</h4>
			<h6 class="m-0 font-weight text">*Silahkan hubungi kami. Data berdasarkan pesanan anda</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>ID Sewa</th>
				<th>Tanggal</th>
                <th>Review</th>
				<th>Foto Sebelum</th>
				<th>Foto Sesudah</th>
                <th>Denda</th>
                </tr>
            </thead>
            <tbody>
			
			 <!-- WHERE dissesuaikan dengan username login -->
            <?php 
            $no = 1;
           
            $tampil = mysqli_query($koneksi, "SELECT * FROM review_sesudah WHERE username='$_SESSION[username]' && status='1' ORDER BY id_sewa DESC");

            while($hasil = $tampil->fetch_assoc()){
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hasil['id_sewa']; ?></td>
					<td><?= $hasil['tgl_admin']; ?></td>
                    <td><?= $hasil['reviewdata']; ?></td>
					<?php 
					$tampil1 = mysqli_query($koneksi, "SELECT * FROM review ORDER BY id_sewa DESC");
					while($hasil1 = $tampil1->fetch_assoc()){
					?>
                    
					<td><a href="img/<?= $hasil1['foto']; ?>">Klik Disini</a></td>
					<?php } ?>
					
					<td><a href="img/<?= $hasil['foto']; ?>">Klik Disini</a></td>
					<td><?php echo rupiah($hasil['denda']); ?></td>
					
					
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
