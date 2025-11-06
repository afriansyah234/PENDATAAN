<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page - Pendataan Siswa</title>

  <style>
    /* ======== BASIC STYLES ======== */
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      color: #333;
      background-color: #f4f6f8;
      scroll-behavior: smooth;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    /* ======== NAVBAR ======== */
    header {
      background-color: #3A86FF;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 40px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 10;
    }

    .logo {
      font-weight: 700;
      font-size: 1.6em;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 25px;
      margin: 0;
      padding: 0;
    }

    nav ul li a {
      color: white;
      font-weight: 500;
      transition: 0.3s;
    }

    nav ul li a:hover {
      color: #FFB703;
    }

    /* ======== HERO SECTION ======== */
    .hero {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      height: 90vh;
      background: linear-gradient(135deg, #3A86FF, #00B4D8);
      color: white;
      padding: 0 20px;
    }

    .hero h1 {
      font-size: 2.8em;
      font-weight: 700;
      margin-bottom: 15px;
    }

    .hero p {
      font-size: 1.2em;
      max-width: 600px;
      margin-bottom: 30px;
    }

    .btn-container {
      display: flex;
      gap: 20px;
    }

    .btn {
      background-color: #FFB703;
      color: white;
      border: none;
      padding: 12px 30px;
      border-radius: 25px;
      cursor: pointer;
      font-size: 1em;
      font-weight: 600;
      transition: 0.3s;
    }

    .btn:hover {
      background-color: #fb8500;
    }

    .btn-outline {
      background: transparent;
      border: 2px solid white;
      color: white;
    }

    .btn-outline:hover {
      background: white;
      color: #3A86FF;
    }

    /* ======== FEATURES SECTION ======== */
    .features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      padding: 60px 40px;
      text-align: center;
    }

    .feature-card {
      background: white;
      border-radius: 15px;
      padding: 25px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
      transition: 0.3s;
    }

    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    }

    .feature-card h3 {
      color: #3A86FF;
    }

    /* ======== FOOTER ======== */
    footer {
      background-color: #3A86FF;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 40px;
    }

    /* ======== RESPONSIVE ======== */
    @media (max-width: 768px) {
      .hero h1 {
        font-size: 2em;
      }
      .hero p {
        font-size: 1em;
      }
      .btn-container {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <header>
    <div class="logo">SCHOOL DATA</div>
    <nav>
      <ul>
        <li><a href="#beranda">Beranda</a></li>
        <li><a href="#fitur">Fitur</a></li>
        <li><a href="#kontak">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <!-- HERO SECTION -->
  <section class="hero" id="beranda">
    <h1>Selamat Datang di Sistem Pendataan Siswa</h1>
    <p>Platform modern untuk mengelola data siswa, kelas, dan kegiatan sekolah secara efisien dan terpusat.</p>
    <div class="btn-container">
      <a href="#"><button class="btn">Login</button></a>
      <a href="#"><button class="btn btn-outline">Register</button></a>
    </div>
  </section>

  <!-- FITUR SECTION -->
  <section class="features" id="fitur">
    <div class="feature-card">
      <h3>📋 Manajemen Siswa</h3>
      <p>Tambahkan, ubah, dan hapus data siswa dengan cepat menggunakan tampilan yang mudah dipahami.</p>
    </div>
    <div class="feature-card">
      <h3>🏫 Kelas & Jurusan</h3>
      <p>Kelola struktur kelas, jurusan, dan pembimbing dengan sistem yang terintegrasi.</p>
    </div>
    <div class="feature-card">
      <h3>📊 Laporan Otomatis</h3>
      <p>Hasilkan laporan data siswa dan statistik akademik hanya dalam beberapa klik.</p>
    </div>
  </section>

  <!-- FOOTER -->
  <footer id="kontak">
    <p>&copy; {{ date('Y') }} Sekolah Pintar. Semua Hak Dilindungi.</p>
    <p>Hubungi kami di <a href="mailto:info@sekolahpintar.id" style="color:white; text-decoration:underline;">info@sekolahpintar.id</a></p>
  </footer>

</body>
</html>
