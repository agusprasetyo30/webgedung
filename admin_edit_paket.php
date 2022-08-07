<?php
// Memanggil atau membutuhkan file function.php
// require 'function.php';

    $id_paket = $_GET['id_paket'];
    $tampil = mysqli_query($koneksi, "SELECT * FROM paket WHERE id_paket = '$id_paket'");
    $hasil = mysqli_fetch_array($tampil);

    if (isset($_POST['simpanperubahan'])) {
        if (editpaket($_POST) > 0) {
             echo "<script>
                    alert('Data paket berhasil diubah!');
                    document.location.href ='admin_index.php?url=admin_paket';
                </script>";
        
        } else {
            // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
            echo "<script>
                    alert('Data paket gagal diubah!');
                </script>";
        }
    }
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Data Paket</h5>
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="id_paket" class="col-sm-2 col-form-label">ID Paket</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id ="id_paket" name="id_paket" value="<?php echo $hasil['id_paket'] ?>" readonly required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="id_paket" class="col-sm-2 col-form-label">Paket</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id ="paket" name="paket" value="<?php echo $hasil['paket'] ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="telp_penyewa" class="col-sm-2 col-form-label">Gedung</label>
            <div class="col-sm-10">
                <select name="id_gedung" class="form-control" required> 
                    <option value="0" selected disabled>Pilih gedung</option>
                    <?php
                    $sql="SELECT * FROM gedung";
                    $result = mysqli_query($koneksi,$sql);
                    while($row = mysqli_fetch_array($result)) 
                    {
                    ?>
                        <option value="<?php echo($row['id_gedung'])?>" <?= $row['id_gedung'] == $hasil['id_gedung'] ? 'selected' : '' ?>>
                        <?php echo($row['nama_gedung']);
                        ?>
                        </option>
                    <?php 
                    } 
                    ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="id_paket" class="col-sm-2 col-form-label">Fasilitas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id ="fasilitas" name="fasilitas" value="<?php echo $hasil['fasilitas']?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="id_paket" class="col-sm-2 col-form-label">Harga (Rp)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id ="harga" name="harga" value="<?php echo $hasil['harga'] ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="deskripsi" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="keterangan" value="<?= $hasil['keterangan']; ?>" required>
            </div>
        </div>
        
            
            <div class="text-center">
            <a href="?url=admin_paket" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" name="simpanperubahan">Simpan Perubahan</button>      
            </div>
        </form><!-- End Horizontal Form -->
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
