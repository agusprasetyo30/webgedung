

<div class="container-fluid">
<div class="card">
    <div class="card-body">
    <div class="card-title">
    <a href="?url=admin_tambah_paket.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</a>
    </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Paket</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>ID Paket</th>
                <th>Paket</th>
                <th>Gedung</th>
                <th>Fasilitas</th>
                <th>Harga</th>
                <th>Keterangan</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;

            $tampil = mysqli_query($koneksi, "SELECT * FROM paket p
                INNER JOIN gedung g ON p.id_gedung = g.id_gedung ORDER BY id_paket DESC");

            while($hasil = mysqli_fetch_array($tampil)){
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hasil['id_paket']; ?></td>
                    <td><?= $hasil['paket']; ?></td>
                    <td><?= $hasil['nama_gedung']; ?></td>
                    <td><?= $hasil['fasilitas']; ?></td>
                    <td><?php echo rupiah($hasil['harga']); ?></td>
                    <td><?= $hasil['keterangan']; ?></td>
                    <td>               
                        <a href= "admin_index.php?url=admin_edit_paket.php&id_paket=<?= $hasil['id_paket']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Edit</a> |
                        <a href="admin_hapus_paket.php?id_paket=<?= $hasil['id_paket'];?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
                    </td>
                </tr>
            <?php 
        } ?>
            </tbody>

        </table>

        </div>
		</div>
        </div>
        </div>
        </div>
        </div>
