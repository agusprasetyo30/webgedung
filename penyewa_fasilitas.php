
<div class="container-fluid">
<div class="card">
    <div class="card-body">
    <div class="card-title">
    </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Informasi Fasilitas</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>Fasilitas</th>
                <th>Jumlah</th>
                <th>Foto</th>
                <th>Harga</th>
                <th>Deskripsi</th>
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
                    <td><?= $hasil['fasilitas']; ?></td>
                    <td><?= $hasil['jumlah']; ?></td>
                    <td><img style="width:120px;" src="img/<?= $hasil['foto']; ?>"></td>
                    <td><?php echo rupiah($hasil['harga_fsl']); ?></td>
                    <td><?= $hasil['keterangan']; ?></td>
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
        