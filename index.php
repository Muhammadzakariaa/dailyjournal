<?php 
include "koneksi.php";

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemandangan Alam Indonesia Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
     <!-- Script Typing -->
   <script src="https://unpkg.com/typed.js@2.0.15/dist/typed.umd.js"></script>

 <!-- Style -->
<style>
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css");
/* ====== NAVBAR ====== */
.navbar {
  background: linear-gradient(90deg, #0f9b0f, #00b09b);
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
}

.navbar .nav-link,
.navbar .navbar-brand {
  font-weight: 500;
}

.navbar .nav-link:hover {
  color: #ffee88 !important;
}

/* ====== HERO SECTION ====== */
.hero, 
.gallery, 
.about-me {
  background: linear-gradient(180deg, #f0fff4 0%, #e6fffa 100%);
}

/* ====== ARTICLE CARD ====== */
.card {
  border: none;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 12px rgba(79, 68, 235, 0.2);
}

.dark-mode .card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 12px rgba(255, 193, 7, 0.45);
}


/* ====== GALLERY ====== */

.carousel-inner img {
  height: 450px; 
  width: 100%;
  object-fit: cover;
  border-radius: 15px;
}

.dropdown-menu li a{
  list-style: none;
}

.nama-section{
  font-weight: bold;
}

.section-about{
  width: 100%;
  padding: 20px;
}


/* ====== FOOTER ====== */
footer {
  background: linear-gradient(90deg, #11998e, #38ef7d);
  font-size: 0.95rem;
}
footer p {
  margin-bottom: 0.4rem;
}

/* ====== RESPONSIVE ====== */
@media (max-width: 768px) {
  .hero {
    text-align: center;
  }
  .hero img {
    max-width: 90%;
  }
  .navbar-nav .nav-item button {
    margin-bottom: 10px !important;
  }

}


body .dark-mode{
   background: #1a1a1a !important;
}

.dark-mode .nav-item a{
  color: white !important;
}

/* hero section */
.dark-mode .hero {
  background: #1a1a1a !important;
  color: white !important;
}

.dark-mode .custom-btn {
  color: white !important;
}

/* gallery section */
.dark-mode .gallery {
  background: #1a1a1a !important;
}


.dark-mode .article,
.dark-mode .schedule,
.dark-mode .about-me {
   background: #1a1a1a !important;
   color: white !important;
}

/* card */
.dark-mode .card {
  background-color: #333 !important;
  color: white !important;
}


/* text warna */
.dark-mode h1,
.dark-mode h2,
.dark-mode h5,
.dark-mode p,
.dark-mode small,
.dark-mode .major{
  color: #ffffff !important;
}


.foto-wrapper {
  width: 295px;
  height: 295px;
  background-color: #4da3ff;
  border-radius: 50%;
  overflow: hidden; /* WAJIB */
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.dark-mode .foto-wrapper:hover {
  transform: translateY(-5px);
  box-shadow:
  0 0 6px rgba(255, 193, 7, 0.45),
  0 0 30px rgba(255, 193, 7, 0.45);

}

.foto-wrapper img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

footer .social-icons a i:hover{
    color: yellow  !important;
}

    </style>

  </head>
  <body>

    <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    
    <a class="navbar-brand" href="#">
  <h1 class="ms-5 fs-4">My Daily Journal</h1>
</a>

    <!-- Tombol toggle (untuk tampilan mobile) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu di kanan -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#article">Article</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#gallery">Gallery</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="#schedule">Schedule</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="#about-me">About Me</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
    
         <!-- ICONS -->
     <li class="nav-item">
      <button class="nav-link px-3 me-3 rounded bg-secondary border-0" id="darkBtn">
        <i class="bi bi-moon-stars-fill"></i>
      </button>
    </li>
    <li class="nav-item">
      <button class="nav-link px-3 me-3 rounded bg-success border-0" id="lightBtn">
        <i class="bi bi-sun-fill"></i>
      </button>
    </li>
      </ul>
    </div>
  </div>
</nav>

<!-- HERO SECTION -->
<section class="hero py-5 bg-light mb-0">
  <div class="container d-flex flex-column flex-lg-row align-items-center">
    <div class="hero-text me-lg-5">
      <h1 class="display-5 fw-bold">Every day is a story Yesterday is history Tomorrow is a mystery
</h1>
      <p class="lead fw-semibold">Hallo, <span id="typing-text" class="text-warning fw-semibold"></span></p>
      <span id="tanggal"></span>
      <span id="jam"></span>
      <br>
    </div>
    <div class="hero-image mt-4 mt-lg-0">
      <img src="image/airterjun.jpg" class="img-fluid rounded" alt="Hero Image">
    </div>
  </div>
  <div class="mb-5"></div>
</section>


<!-- article section -->
 <section id="article" class="article text-center p-5">
  <div class="container mt-5">
    <h1 class="fw-bold display-4 pb-3">article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
  <?php
  $sql = "SELECT * FROM article ORDER BY tanggal DESC";
  $hasil = $conn->query($sql); 
 
  while($row = $hasil->fetch_assoc()){

  ?>
      <!-- Col Begin -->
      <div class="col">
        <div class="card h-100">
          <img src="image/<?= $row["gambar"]?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-tittle"><?= $row["judul"]?></h5>
            <p class="card-text"><?= $row["isi"]?></p>
          </div>
          <div class="card-footer">
            <small>
             <?= $row["tanggal"]?></small>
          </div>
        </div>
      </div>
        <!-- Col End -->
         <?php 
          }
         ?>   
    </div>
  </div>

 </section>

<!-- GALLERY SECTION -->
<section id="gallery" class="gallery py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-4">Gallery</h2>
    <div id="galleryCarousel" class="carousel slide" data-bs-ride="false">
      <div class="carousel-inner rounded-4">
        <div class="carousel-item active">
          <img src="image/pantai.jpg" id="pantai" class="d-block w-100" alt="pantai">
        </div>
        <div class="carousel-item">
          <img src="image/hutan.jpg" id="hutan" class="d-block w-100" alt="hutan">
        </div>
        <div class="carousel-item">
          <img src="image/kawah.jpg" id="kawah" class="d-block w-100" alt="kawah">
        </div>
        <div class="carousel-item">
          <img src="image/matahari.jpg" id="matahari" class="d-block w-100" alt="matahari">
        </div>
        <div class="carousel-item">
          <img src="image/sungai.jpg" id="sungai" class="d-block w-100" alt="sungai">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>

<!-- SCHEDULE SECTION -->
<section id="schedule" class="schedule py-5">
  <div class="container">
    <h2 class="text-center mt-5 mb-4 fw-bold">Schedule</h2>

    <div class="row g-4 justify-content-center">

      <!-- Senin -->
      <div class="col-md-3 d-flex">
        <div class="card w-100 h-100 shadow-sm border border-primary">
          <div class="card-header bg-primary text-white text-center">
            Senin
          </div>
          <div class="card-body text-center">
            <p class="fw-bold mb-1">09.30 - 12.00</p>
            <p class="mb-1">Rekayasa Perangkat Lunak</p>
            <p class="mb-3">H.5.7</p>
          </div>
        </div>
      </div>

      <!-- Selasa -->
      <div class="col-md-3 d-flex">
        <div class="card w-100 h-100 shadow-sm border border-success">
          <div class="card-header bg-success text-white text-center">
            Selasa
          </div>
          <div class="card-body text-center">
            <p class="fw-bold mb-1">09.30 - 12.00</p>
            <p class="mb-1">Sistem Operasi</p>
            <p class="mb-3">H.5.10</p>

            <p class="fw-bold mb-1">14.10 - 15.50</p>
            <p class="mb-1">Pendidikan Kewarganegaraan</p>
            <p class="mb-0">Kulino</p>
          </div>
        </div>
      </div>

      <!-- Rabu -->
      <div class="col-md-3 d-flex">
        <div class="card w-100 h-100 shadow-sm border border-danger">
          <div class="card-header bg-danger text-white text-center">
            Rabu
          </div>
          <div class="card-body text-center">
            <p class="fw-bold mb-1">09.30 - 12.00</p>
            <p class="mb-1">Probabilitas dan Statistik</p>
            <p class="mb-3">H.3.2</p>

            <p class="fw-bold mb-1">14.10 - 15.50</p>
            <p class="mb-1">Pemrograman Berbasis Web</p>
            <p class="mb-0">D.2.J</p>
          </div>
        </div>
      </div>

      <!-- Kamis -->
      <div class="col-md-3 d-flex">
        <div class="card w-100 h-100 shadow-sm border border-primary">
          <div class="card-header bg-primary text-white text-center">
            Kamis
          </div>
          <div class="card-body text-center">
            <p class="fw-bold mb-1">07.00 - 08.40</p>
            <p class="mb-1">Basis Data</p>
            <p class="mb-3">H.5.2</p>

            <p class="fw-bold mb-1">09.30 - 12.00</p>
            <p class="mb-1">Logika Informatika</p>
            <p class="mb-0">H.4.6</p>
          </div>
        </div>
      </div>

      <!-- Jumat -->
      <div class="col-md-3 d-flex">
        <div class="card w-100 h-100 shadow-sm border border-success">
          <div class="card-header bg-success text-white text-center">
            Jum'at
          </div>
          <div class="card-body text-center">
            <p class="fw-bold mb-1">10.20 - 12.00</p>
            <p class="mb-1">Basis Data</p>
            <p class="mb-3">D.2.K</p>
          </div>
        </div>
      </div>

      <!-- Sabtu -->
      <div class="col-md-3 d-flex">
        <div class="card w-100 h-100 shadow-sm border border-primary">
          <div class="card-header bg-primary text-white text-center">
            Sabtu
          </div>
          <div class="card-body text-center">
            <p class="fw-bold mb-0">Tidak Ada Jadwal</p>
            
          </div>
        </div>
      </div>

      <!-- Minggu -->
      <div class="col-md-3 d-flex justify-content-center">
        <div class="card w-100 h-100 shadow-sm border border-warning">
          <div class="card-header bg-warning text-white text-center">
            Minggu
          </div>
          <div class="card-body text-center">
            <p class="fw-bold mb-0">Tidak Ada Jadwal</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ABOUT ME SECTION -->
 <section id="about-me" class="about-me py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-4 fw-bold">About Me</h2>
    <div class="row align-items-center justify-content-center g-5">

    <!-- FOTO -->
    <div class="col-md-4 text-center mb-4 mb-md-0">
      <div class="foto-wrapper mx-auto">
        <img src="image/muhzakaria.jpg" alt="Foto Profil">
      </div>
    </div>

    <!-- CARD DATA -->
    <div class="col-md-6">
      <div class="card shadow border-0 p-4">
        <h3 class="fw-bold">Muhammad Zakaria Putranto</h3>
        <p class="major text-muted">Mahasiswa Teknik Informatika</p>

        <hr>
        <p><strong>NIM:</strong> A11.2024.16031</p>
        <p><strong>Program Studi:</strong> Teknik Informatika</p>
        <p><strong>Email:</strong> 111202416031@mhs.dinus.ac.id</p>
        <p><strong>Telepon:</strong> +62 823 1301 6422</p>
        <p><strong>Alamat:</strong> Jl. Bulustalan III A, Kota Semarang</p>
      </div>
    </div>

  </div>
  </div>
</section>

 
<!-- FOOTER -->
<footer class="bg-dark text-center py-4">
  <div class="container">
    <div class="social-icons">
				<a href="https://www.instagram.com/zzacky_08?igsh=OHg0c2s1cWxhMnRr"><i class="bi bi-instagram h2 p-2 text-dark"></i></a>
				<a href="https://twitter.com/udinusofficial"><i class="bi bi-twitter h2 p-2 text-dark"></i></a>
				<a href="https://wa.me/+6282313016422"><i class="bi bi-whatsapp h2 p-2 text-dark"></i></a>
			</div>
    <p>Muhammad Zakaria Putranto © 2025</p>
  </div>
</footer>

<!-- Tombol Back to Top -->
    <button
      id="backToTop"
      class="btn btn-success rounded-circle position-fixed bottom-0 end-0 m-3">
      <i class="bi bi-arrow-up" title="Back to Top"></i>
    </button>


    <!-- JAVASCRIPT -->
<script type="text/javascript">

//Typing mengetik
  var typed = new Typed("#typing-text",{
  strings:["My Name is Muhammad Zakaria Putranto","Welcome to My Daily Journal "],
  typeSpeed: 55,
  backSpeed: 50,
  backDelay: 1000,
  loop: true
});

// Jam Realtime
function tampilWaktu(){
  const waktu = new Date();

  const tanggal = waktu.getDate();
  const bulan = waktu.getMonth() + 1;
  const tahun = waktu.getFullYear();
  const jam = waktu.getHours();
  const menit = waktu.getMinutes();
  const detik = waktu.getSeconds();

  const tanggal_full = tanggal + "/" + bulan + "/" + tahun;
  const jam_full = jam + ":" + menit + ":" + detik;

  document.getElementById("tanggal").innerHTML = tanggal_full;
  document.getElementById("jam").innerHTML = jam_full;

}

setInterval (tampilWaktu, 1000);

// Tombol dark dan light mode
// Cek localStorage saat awal load
if (localStorage.getItem("theme") === "dark") {
  document.body.classList.add("dark-mode");
}

function updateActiveBtn() {
  if (document.body.classList.contains("dark-mode")) {
    darkBtn.classList.add("active");
    lightBtn.classList.remove("active");
  } else {
    lightBtn.classList.add("active");
    darkBtn.classList.remove("active");
  }
}

// Klik Dark
darkBtn.addEventListener("click", () => {
  document.body.classList.add("dark-mode");
  localStorage.setItem("theme", "dark");
  updateActiveBtn();  // panggil setelah perubahan mode
});

// Klik Light
lightBtn.addEventListener("click", () => {
  document.body.classList.remove("dark-mode");
  localStorage.setItem("theme", "light");
  updateActiveBtn();  // panggil setelah perubahan mode
});

// Set awal
updateActiveBtn();


// backToTop
const backToTop = document.getElementById("backToTop");

  backToTop.addEventListener("click", function () {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });
  
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>