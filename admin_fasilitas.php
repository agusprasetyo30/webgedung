

<div class="container-fluid">
<div class="card">
    <div class="card-body">
    <div class="card-title">
    <a href="?url=admin_tambah_fasilitas.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</a>
    </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Fasilitas</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>ID Fasilitas</th>
                <th>Fasilitas</th>
                <th>Jumlah</th>
                <th>Foto</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
			
            <?php 
            $no = 1;

            $tampil = mysqli_query($koneksi, "SELECT * FROM fasilitas ORDER BY id_fasilitas DESC");

            while($hasil = mysqli_fetch_array($tampil)){
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hasil['id_fasilitas']; ?></td>
                    <td><?= $hasil['fasilitas']; ?></td>
                    <td><?= $hasil['jumlah']; ?></td>
                    <td><img style="width:120px;" src="img/<?= $hasil['foto']; ?>"></td>
                    <td><?php echo rupiah($hasil['harga_fsl']) ?></td>
                    <td><?= $hasil['keterangan']; ?></td>
                    <td>               
                        <a href= "admin_index.php?url=admin_edit_fasilitas.php&id_fasilitas=<?= $hasil['id_fasilitas']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Edit</a> |
                        <a href="admin_hapus_fasilitas.php?id_fasilitas=<?= $hasil['id_fasilitas'];?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
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
        