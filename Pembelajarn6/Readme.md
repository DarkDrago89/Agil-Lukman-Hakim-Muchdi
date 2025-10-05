# Pelatihan Bootstrap

## 1. Membuat Halaman Konten : [Bimbel](https://darkdrago89.github.io/Bootstrap1)

Sudah dibuat raw untuk Bootstraps-nya, saya mengganti beberapa elemen yang ada dan menambahkan beberapa konten didalamnya. Tidak lupa saya juga menginput link untuk pembelajarannya.

```html
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PWEB Pertemuan 6</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>
	.menu-accent {
		border-left: 4px solid #0d6efd;
		background: #f8f9fa;
		box-shadow: 0 2px 8px 0 rgba(13,110,253,0.04);
		padding-left: 1rem;
	}
	.menu-accent .card-title {
		letter-spacing: 0.5px;
	}
	.menu-list li {
		margin-bottom: 0.7rem;
		font-size: 1.08rem;
		display: flex;
		align-items: center;
		gap: 0.5rem;
	}
	.menu-list li:last-child {
		margin-bottom: 0;
	}
</style>
</head>
<body class="bg-light">
 
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<div class="container">
		<a class="navbar-brand fw-bold" href="#">PWEB Project</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="#pembelajaran">Pembelajaran</a></li>
				<li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
				<li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
			</ul>
		</div>
	</div>
</nav>
 

<!-- Hero Section -->
<section class="py-5 bg-light border-bottom">
	<div class="container text-center">
		<h1 class="display-5 fw-bold">Selamat Datang di Website Pembelajaran Web</h1>
		<p class="lead mb-4">Belajar HTML, CSS, JavaScript, dan Bootstrap dengan mudah dan interaktif.</p>
		<a href="#pembelajaran" class="btn btn-primary btn-lg">Mulai Belajar</a>
	</div>
</section>

<!-- Main Content -->
<div class="container my-5">
	<div class="row">
		<!-- Sidebar -->
		<aside class="col-md-3 mb-4">
			<div class="card mb-3 menu-accent">
				<div class="card-body">
					<h5 class="card-title"><i class="bi bi-list me-2"></i>Menu</h5>
					<ul class="list-unstyled mb-0 menu-list">
						<li><i class="bi bi-journal-code text-primary"></i><a href="#pembelajaran" class="link-primary text-decoration-none">Pembelajaran</a></li>
						<li><i class="bi bi-grid-1x2 text-success"></i><a href="#fitur" class="link-success text-decoration-none">Fitur</a></li>
						<li><i class="bi bi-envelope-at text-warning"></i><a href="#kontak" class="link-warning text-decoration-none">Kontak</a></li>
					</ul>
				</div>
			</div>
				<!-- Decorative Cards -->
				<div class="card mb-2 border-info bg-info bg-opacity-10 text-info text-center">
					<div class="card-body p-2">
						<i class="bi bi-lightbulb"></i>
						<div class="fw-bold">Tips</div>
						<small>Belajar rutin setiap hari!</small>
					</div>
				</div>
				<div class="card mb-2 border-success bg-success bg-opacity-10 text-success text-center">
					<div class="card-body p-2">
						<i class="bi bi-emoji-smile"></i>
						<div class="fw-bold">Motivasi</div>
						<small>Jangan takut mencoba hal baru.</small>
					</div>
				</div>
				<div class="card mb-2 border-warning bg-warning bg-opacity-10 text-warning text-center">
					<div class="card-body p-2">
						<i class="bi bi-star"></i>
						<div class="fw-bold">Fakta</div>
						<small>Bootstrap sangat populer di dunia web!</small>
					</div>
				</div>
		</aside>
		<!-- Konten Utama -->
		<main class="col-md-9">
			<!-- Section Pembelajaran -->
			<section id="pembelajaran" class="mb-5">
				<h2 class="fw-bold mb-4">Pembelajaran</h2>
				<div class="row g-4">
					<div class="col-md-6 col-lg-3">
						<div class="card h-100 border-primary">
							<div class="card-body">
								<h5 class="card-title text-primary">HTML</h5>
								<p class="card-text">Struktur dasar web, mulai dari heading, paragraf, gambar, dan link.</p>
							</div>
							<div class="card-footer bg-transparent border-0">
								<a href="https://www.w3schools.com/html/" target="_blank" class="btn btn-outline-primary btn-sm">Belajar HTML</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="card h-100 border-success">
							<div class="card-body">
								<h5 class="card-title text-success">CSS</h5>
								<p class="card-text">Mengatur tampilan web: warna, layout, font, dan animasi.</p>
							</div>
							<div class="card-footer bg-transparent border-0">
								<a href="https://www.w3schools.com/css/" target="_blank" class="btn btn-outline-success btn-sm">Belajar CSS</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="card h-100 border-warning">
							<div class="card-body">
								<h5 class="card-title text-warning">JavaScript</h5>
								<p class="card-text">Membuat web interaktif, validasi form, animasi, dan manipulasi data.</p>
							</div>
							<div class="card-footer bg-transparent border-0">
								<a href="https://www.w3schools.com/js/" target="_blank" class="btn btn-outline-warning btn-sm">Belajar JS</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="card h-100 border-info">
							<div class="card-body">
								<h5 class="card-title text-info">Bootstrap</h5>
								<p class="card-text">Framework CSS untuk membuat web responsif dan modern dengan cepat.</p>
							</div>
							<div class="card-footer bg-transparent border-0">
								<a href="https://getbootstrap.com/docs/5.3/getting-started/introduction/" target="_blank" class="btn btn-outline-info btn-sm">Belajar Bootstrap</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Section Fitur -->
			<section id="fitur" class="mb-5">
				<h2 class="fw-bold mb-4">Fitur Website</h2>
				<div class="row g-4">
					<div class="col-md-6">
						<div class="card bg-dark text-white h-100">
							<div class="card-body">
								<h5 class="card-title">Responsive Design</h5>
								<p class="card-text">Tampilan web menyesuaikan semua ukuran layar, baik desktop maupun mobile.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card bg-dark text-white h-100">
							<div class="card-body">
								<h5 class="card-title">Komponen Siap Pakai</h5>
								<p class="card-text">Menggunakan komponen Bootstrap seperti card, navbar, dan button untuk mempercepat pengembangan.</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Section Artikel Utama -->
			<section id="artikel" class="mb-5">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Artikel Utama</h5>
						<p class="card-text">Dapatkan tips dan tutorial terbaru seputar pengembangan web menggunakan HTML, CSS, JavaScript, dan Bootstrap. Tingkatkan skill Anda dengan latihan dan studi kasus nyata.</p>
					</div>
				</div>
			</section>
		</main>
	</div>
</div>
 
<!-- Footer -->
<footer id="kontak" class="bg-dark text-white py-4 mt-4">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6">
				<h5 class="mb-1">Hubungi Kami</h5>
				<p class="small mb-0">Email: agillukman89@gmail.com | Instagram: @agil_7852</p>
			</div>
			<div class="col-md-6 text-md-end mt-3 mt-md-0">
				<a href="#" class="btn btn-outline-light btn-sm me-2">Privacy</a>
				<a href="#" class="btn btn-outline-light btn-sm me-2">Terms</a>
				<a href="#" class="btn btn-light btn-sm">Support</a>
			</div>
		</div>
		<div class="text-center mt-3 small">© 2025 PWEB Project. All rights reserved.</div>
	</div>
</footer>
 
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```

## 2. Membuat Register : [Register](https://darkdrago89.github.io/Register1)

Diberikan contoh dan dibuat menggunakan Bootstraps

```html
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register - PWEB Project</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f4f6f9;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card-register {
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      margin-top: 60px;
    }

    .left-panel {
      background: linear-gradient(to bottom right, #007bff, #00c6ff);
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 60px 40px;
      text-align: center;
    }

    .left-panel h2 {
      font-weight: 700;
      margin-bottom: 10px;
    }

    .left-panel hr {
      width: 60px;
      height: 4px;
      border: none;
      background: linear-gradient(to right, #ffc107, #00ffcc);
      border-radius: 10px;
      margin: 15px 0 25px;
    }

    .left-panel p {
      font-size: 15px;
      line-height: 1.6;
    }

    .right-panel {
      background-color: #fff;
      padding: 50px 60px;
    }

    .gradient-line {
      height: 3px;
      background: linear-gradient(to right, #007bff, #00ffcc, #ffcc00);
      border-radius: 3px;
      margin-bottom: 20px;
    }

    .form-label {
      font-weight: 500;
    }

    .btn-register {
      background-color: #007bff;
      color: #fff;
      font-weight: 500;
    }

    .btn-register:hover {
      background-color: #0056b3;
      color: #fff;
    }

    .btn-signin {
      background-color: #198754;
      color: #fff;
      font-weight: 500;
    }

    .btn-signin:hover {
      background-color: #157347;
      color: #fff;
    }

    .form-check-label {
      font-size: 14px;
    }

    @media (max-width: 768px) {
      .right-panel {
        padding: 30px 25px;
      }
      .left-panel {
        padding: 40px 30px;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card card-register">
          <div class="row g-0">

            <!-- LEFT PANEL -->
            <div class="col-md-5 left-panel">
              <h2>Selamat Datang</h2>
              <hr>
              <p>Gabung dan mulai perjalanan belajarmu<br>
              bersama kami.<br>
              Belajar web development jadi lebih<br>
              mudah dan menyenangkan!</p>
            </div>

            <!-- RIGHT PANEL -->
            <div class="col-md-7 right-panel">
              <div class="gradient-line"></div>
              <h4 class="fw-semibold">Please Sign Up</h4>
              <p class="text-muted mb-4">It's free and always will be.</p>

              <form>
                <div class="row mb-3">
                  <div class="col">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
                  <div class="col">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label">Display Name</label>
                  <input type="text" class="form-control" placeholder="">
                </div>

                <div class="mb-3">
                  <label class="form-label">Email Address</label>
                  <input type="email" class="form-control" placeholder="">
                </div>

                <div class="row mb-3">
                  <div class="col">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="">
                  </div>
                  <div class="col">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="">
                  </div>
                </div>

                <div class="form-check mb-4">
                  <input class="form-check-input" type="checkbox" id="agreeCheck">
                  <label class="form-check-label" for="agreeCheck">
                    I Agree By clicking <strong>Register</strong> you agree to the 
                    <a href="#" class="text-decoration-none">Terms and Conditions</a> set out by this site, including our Cookie Use.
                  </label>
                </div>

                <div class="d-flex gap-2">
                  <button type="submit" class="btn btn-register w-50">Register</button>
                  <button type="button" class="btn btn-signin w-50">Sign In</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```
