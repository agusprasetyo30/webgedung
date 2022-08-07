<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Style khusus accrodion aja -->
<style>
.accordion1 {
  background-color: white;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion1:hover {
  background-color: #eee; 
}

.panel1 {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</style>
</head>
<body>
<div class="container-fluid">
<div class="card">
    <div class="card-body">
    <div class="card-title">
    </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold  text-primary">Cara Pesan</h4>
			<h6 class="m-0  text">Berikut ini cara melakukan penyewaan Gedung kami</h6>
        </div>

<button class="accordion1">Langkah 1</button>
<div class="panel1">
  <p>Calon penyewa pilih menu sewa dengan cara klik menu sewa. Calon Penyewa dapat memilih jenis penyewaan(paket atau biasa).</p>
</div>

<button class="accordion1">Langkah 2</button>
<div class="panel1">
  <p>Calon penyewa mengisi form penyewaan berdasarkan jenis penyewaan yang dipilih.</p>
</div>

<button class="accordion1">Langkah 3</button>
<div class="panel1">
  <p>Kemudian penyewa dapat melakukan pembayaran dengan menginputkan bukti transaksi.</p>
</div>

<button class="accordion1">Langkah 4</button>
<div class="panel1">
  <p>Untuk pembayaran penyewa dapat membayar pada nomer rekening berikut :
    BCA : BCA123456
    BRI : BRI123456
  </p>
</div>

<button class="accordion1">Langkah 5</button>
<div class="panel1">
  <p>Penyewa dapat menunggu validasi dari pengolah gedung. jika validasi sukses, maka gedung yang disewa siap digunakan</p>
</div>

<button class="accordion1">Informasi Tambahan</button>
<div class="panel1">
  <p>Jika selama penyewaan terdapat fasilitas yang rusak,maka biaya ganti rugi ditanggung penyewa berdasarkan laporan yang dilakukan oleh tim pengecek fasilitas. 
    Pembayaran ganti rugi dilakukan diluar sistem ini. Untuk Bukti Laporan dapat diketahui pada menu Info Ganti Rugi</p>
</div>
</div></div></div></div>

<!-- Script collaps/not untuk accrodion-->
<script>
var acc = document.getElementsByClassName("accordion1");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

</body>
</html>
