
<div class="container-fluid">
<div class="card">
    <div class="card-body">
    <div class="card-title">
    </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Informasi Jadwal Sewa Gedung</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>Tanggal Pakai</th>
                <th>Tanggal Tempo</th>
                <th>Gedung yang disewa</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM jadwal_sewa WHERE id_gedung=0 ORDER BY id_jadwal DESC");
            while($hasil = mysqli_fetch_array($tampil)){
                $id_gdg = $hasil['id_gedung'];
                $tampil2 = mysqli_query($koneksi, "SELECT * FROM gedung WHERE id_gedung = '$id_gdg'");
                $hasil2 = mysqli_fetch_array($tampil2);
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    
                    <td><?= $hasil['tanggalpakai']; ?></td>
                    <td><?= $hasil['tanggaltempo']; ?></td>
                    <td><?= $hasil2['nama_gedung']; ?></td> 
                    
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
        </div>
        </div>
        