<?php
// Memanggil atau membutuhkan file function.php
// require 'function.php';

    $id_gedung = $_GET['id_gedung'];
    $tampil = mysqli_query($koneksi, "SELECT * FROM gedung WHERE id_gedung = '$id_gedung'");
    $hasil = mysqli_fetch_array($tampil);

    if (isset($_POST['simpanperubahan'])) {
        if (editgedung($_POST) > 0) {
             echo "<script>
                    alert('Data gedung berhasil diubah!');
                    document.location.href ='admin_index.php?url=admin_gedung';
                </script>";
        
        } else {
            // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
            echo "<script>
                    alert('Data gedung gagal diubah!');
                </script>";
        }
    }
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Data Gedung</h5>

        <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="fotoLama" value="<?= $hasil['foto']; ?>">
            <div class="row mb-3">
                <label for="id_gedung" class="col-sm-2 col-form-label">ID Gedung</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id ="id_gedung" name="id_gedung" value="<?php echo $hasil['id_gedung'] ?>" readonly required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama_gedung" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_gedung" value="<?= $hasil['nama_gedung']; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="foto_gedung" class="col-sm-2 col-form-label">Foto</label>	
                <div class="col-sm-10">
                <img src="img/<?= $hasil['foto']; ?>" width=70px height=75px>
                <input type="file" name="foto" class="isian-formulir isian-formulir-border">
				
                </div>
            </div>
            <div class="row mb-3">
                <label for="deskripsi" class="col-sm-2 col-form-label">Harga (Rp)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="harga_gdg" value="<?= $hasil['harga_gdg']; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="deskripsi" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="keterangan" value="<?= $hasil['keterangan']; ?>" required>
                </div>
            </div>
            
            <div class="text-center">
            <a href="?url=admin_gedung" class="btn btn-secondary">Kembali</a>
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