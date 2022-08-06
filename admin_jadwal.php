<?php
$tgl_admin =date('Y-m-d');
?>
<div class="container-fluid">
<div class="card">
    <div class="card-body">
    <div class="card-title">
    <a href="?url=admin_tambah_jadwal.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</a>
    </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Jadwal Sewa Gedung</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>ID Jadwal</th>
                <th>Gedung yang disewa</th>
                <th>Tanggal Pakai</th>
                <th>Tanggal Tempo</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
			<!--  WHERE paket=1  -- perintah menampilkan data berdasarkan paket yang 0 --> 
          
            
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
                    <td><?= $hasil['id_jadwal']; ?></td> 
                    <td><?= $hasil2['nama_gedung']; ?></td> 
                    <td><?= $hasil['tanggalpakai']; ?></td>
                    <td><?= $hasil['tanggaltempo']; ?>/<?= $tgl_admin ?> </td>
                    
                    <td>               
                    <?php if ($hasil['tanggaltempo'] >=  $tgl_admin ) :?>           
                        <a href="" class="btn btn-secondary btn-sm" style="font-weight: 600;" onclick="return confirm('Maaf masih dalam pemakaian');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
                    <?php elseif ($hasil['tanggaltempo'] <=  $tgl_admin): ?>             
                        <a href="admin_hapus_jadwal.php?id_jadwal=<?= $hasil['id_jadwal'];?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data?');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
                    <?php endif ?></a>
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
        