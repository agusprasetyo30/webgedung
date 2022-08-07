
<div class="container-fluid">
<div class="card">
    <div class="card-body">
    <div class="card-title">
    </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Transaksi</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>ID Bayar</th>
                <th>ID Sewa</th>
				<th>Nama Penyewa</th>
				<th>Total</th>
				<th>Bukti Pembayaran</th>
				
                <th>Status</th>
				<th>Aksi</th>
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
					<td><?= $hasil['nama_penyewa']; ?></td>
					<td><?= ($hasil['totalbayar']); ?></td>
					<td><a href="img/<?= $hasil['foto']; ?>">Klik Disini</a></td>
					
					<!--  intruksi status --> 
					<td> <a><?php if ($hasil['status'] == 1) : ?>
                            <span class="badge badge-pill badge-success">Success</span>
                         <?php elseif ($hasil['status'] == 2) : ?>
                           <span class="badge badge-pill badge-danger">Ditolak</span>
						 <?php else : ?>
                           <span class="badge badge-pill badge-warning">Pending</span>
                         <?php endif ?></a>
                    </td>
					<td>
					<a href="admin_index.php?url=admin_ubahstatus.php&id_bayar=<?= $hasil['id_bayar'];?>" class="btn btn-primary btn-sm" style="font-weight: 600;"><i class="bi bi-trash-fill"></i>&nbsp;Ubah</a> | 
                    <a href="admin_hapus_transaksi.php?id_bayar=<?= $hasil['id_bayar'];?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
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