
<div class="container-fluid">
<div class="card">
    <div class="card-body">
    <div class="card-title">
    </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Informasi Gedung</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>Nama Gedung</th>
                <th>Foto Gedung</th>
                <th>Harga</th>
                <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;

            $tampil = mysqli_query($koneksi, "SELECT * FROM gedung ORDER BY id_gedung DESC");

            while($hasil = mysqli_fetch_array($tampil)){
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hasil['nama_gedung']; ?></td>
                    <td><img style="width:120px;" src="img/<?= $hasil['foto']; ?>"></td>
                    <td><?php echo rupiah($hasil['harga_gdg']); ?></td>
                    <td><?= $hasil['keterangan']; ?></td>
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