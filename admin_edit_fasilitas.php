<?php
// Memanggil atau membutuhkan file function.php
// require 'function.php';

    $id_fasilitas = $_GET['id_fasilitas'];
    $tampil = mysqli_query($koneksi, "SELECT * FROM fasilitas WHERE id_fasilitas = '$id_fasilitas'");
    $hasil = mysqli_fetch_array($tampil);

    if (isset($_POST['simpanperubahan'])) {
        if (editfasilitas($_POST) > 0) {
             echo "<script>
                    alert('Data fasilitas berhasil diubah!');
                    document.location.href ='admin_index.php?url=admin_fasilitas';
                </script>";
        
        } else {
            // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
            echo "<script>
                    alert('Data fasilitas gagal diubah!');
                </script>";
        }
    }
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Data fasilitas</h5>

        <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="fotoLama" value="<?= $hasil['foto']; ?>">
        <div class="row mb-3">
                <label for="id_fasilitasg" class="col-sm-2 col-form-label">ID Fasilitas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id ="id_fasilitas" name="id_fasilitas" value="<?php echo $hasil['id_fasilitas'] ?>" readonly required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="id_fasilitasg" class="col-sm-2 col-form-label">Fasilitas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id ="fasilitas" name="fasilitas" value="<?php echo $hasil['fasilitas'] ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="id_fasilitasg" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id ="jumlah" name="jumlah" value="<?php echo $hasil['jumlah'] ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="foto_fasilitas" class="col-sm-2 col-form-label">Foto</label>	
                <div class="col-sm-10">
                <img src="img/<?= $hasil['foto']; ?>" width=70px height=75px>
                <input type="file" name="foto" class="isian-formulir isian-formulir-border">
				
                </div>
            </div>
            <div class="row mb-3">
                <label for="id_fasilitasg" class="col-sm-2 col-form-label">Harga (Rp)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id ="harga" name="harga_fsl" value="<?php echo $hasil['harga_fsl'] ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="deskripsi" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="keterangan" value="<?= $hasil['keterangan']; ?>" required>
                </div>
            </div>
            
            <div class="text-center">
            <a href="?url=admin_fasilitas" class="btn btn-secondary">Kembali</a>
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