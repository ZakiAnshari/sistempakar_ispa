<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ISPA | @yield('title')</title>
    <link rel="icon" href="{{ asset('Front_End/img/blog-1.png') }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('Front_End/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Front_End/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('Front_End/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{ asset('Front_End/css/style.css') }}" rel="stylesheet">
</head>

<style>
    .packages-item:hover {
        box-shadow: 0 30px 30px rgba(0, 0, 0, 0.2); /* Tambahkan bayangan */
        transition: box-shadow 0.3s ease; /* Animasi halus untuk bayangan */
    }
    /* CSS untuk mengurangi padding atas dan bawah pada navbar */
    .navbar {
        padding-top: 10px;
        padding-bottom: 10px;
    }

    /* Atur ukuran logo atau judul agar tidak terlalu besar */
    .navbar-brand h1 {
        font-size: 24px; /* Sesuaikan ukuran font sesuai kebutuhan */
        margin: 0;
    }

    /* Atur ukuran item menu agar tidak terlalu besar */
    .navbar-nav .nav-link {
        padding-top: 28px;
        padding-bottom: 8px;
        font-size: 16px; /* Sesuaikan ukuran font sesuai kebutuhan */
    }
    .icon-fixed-width {
    width: 20px; /* Tentukan lebar yang sesuai */
    display: inline-block;
    text-align: center;}
    .btn-whatsapp {
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    bottom: 80px;
    right: 15px;
    z-index: 99;
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    color: white;
    background: linear-gradient(45deg, #25D366, #128C7E);
    border-radius: 50px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-whatsapp:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
    }

    .btn-whatsapp i {
        margin-right: 10px;
        font-size: 24px;
    }
    .row.bg-primary {
      padding: 10px; /* Menambahkan padding untuk ruang ekstra di sekitar tombol */
  }
  
  .btn-hover {
      transition: background-color 0.3s ease, transform 0.3s ease;
  }
  
  .btn-hover:hover {
      background-color: #e0e8f1; /* Warna latar belakang saat hover */
      transform: scale(1.05); /* Sedikit membesar saat hover */
  }
  
  .btn {
      border-radius: 4px; /* Sudut tombol membulat */
      font-weight: 600; /* Teks lebih tebal */
      font-size: 16px; /* Ukuran font yang konsisten */
      display: flex;
      align-items: center;
      justify-content: center; /* Menyusun ikon dan teks ke tengah tombol */
  }
  
 
  
</style>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-4 py-2 fixed-top shadow">
            <a href="/" class="navbar-brand">
                <h1 class="m-0 text-primary">Sistem Pakar Ispa</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center">
                    @if (!(Auth::check() && Auth::user()->role_id == 3))
                        <li class="nav-item">
                            <a href="/" class="nav-link {{ request()->is('/') ? '' : '' }}">Beranda</a>
                        </li>
                       
                    @endif
                    <li class="nav-item">
                        @if (Auth::check() && Auth::user()->role_id == 3)
                        <a class="dropdown-item d-flex align-items-center fw-bold" 
                        href="/logout" 
                        onclick="confirmLogout(event)" 
                        style="
                            transition: all 0.3s ease; 
                            border: 2px solid #dc3545; 
                            border-radius: 5px; 
                            padding: 8px 12px; 
                            display: inline-block; 
                            color: #dc3545; 
                            text-decoration: none; /* Menghapus garis bawah */
                        " 
                        onmouseover="this.style.backgroundColor='#dc3545'; this.style.color='white'; this.querySelector('i').style.color='white';"
                        onmouseout="this.style.backgroundColor=''; this.style.color='#dc3545'; this.querySelector('i').style.color='#dc3545';">
                        <i class="bx bx-power-off me-2" style="font-size: 1.2rem; color: #dc3545;"></i>
                        <span class="align-middle">Log Out</span>
                        </a>

                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-sm {{ request()->is('login') ? 'active' : '' }}">Login</a>
                        @endif
                    </li>
                    @if (!(Auth::check() && Auth::user()->role_id == 3))
                    <li class="nav-item">
                        <a href="/register" class="btn btn-success btn-sm <?php echo ($_SERVER['REQUEST_URI'] == '/register' ? 'active' : ''); ?>">Registrasi</a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
        <!-- CSS -->
        <style>
            /* Navbar fixed-top */
            .navbar {
                background-color: #ffffff !important;  /* Warna latar belakang putih */
                position: fixed !important;  /* Pastikan navbar tetap di atas */
                top: 0;
                left: 0;
                right: 0;
                z-index: 1030; /* Menjamin navbar berada di atas konten lain */
            }
    
            /* Mengatur warna teks link navbar */
            .navbar-light .navbar-nav .nav-link {
                color: #333 !important;
            }
    
            /* Navbar dengan shadow */
            .navbar.shadow {
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
    
            /* Menambahkan ruang padding-top untuk elemen berikutnya */
            body {
                padding-top: 80px; /* Sesuaikan dengan tinggi navbar jika perlu */
            }
    
            /* Menambah gaya untuk navbar item yang aktif */
            .nav-link.active {
                color: #007bff !important;
            }
    
            /* Memberikan jarak antar navbar item */
            .navbar-nav .nav-item {
                margin-left: 5px;
            }
    
            /* Styling untuk tombol login dan registrasi */
            .navbar-nav .btn {
                font-size: 16px;
                border-radius: 5px;
                margin-left: 10px;
                transition: background-color 0.3s;
            }
    
            /* Hover effect untuk tombol */
            .navbar-nav .btn:hover {
                background-color: #0056b3;
            }
    
            /* Styling untuk tombol login dan registrasi yang lebih besar */
            .navbar-nav .btn-sm {
                padding: 5px 15px;
            }
    
            .navbar-nav .btn-lg {
                padding: 10px 20px;
            }
    
            /* Responsif Navbar */
            @media (max-width: 768px) {
                .navbar-nav {
                    flex-direction: column;
                    align-items: center; /* Agar tombol dan menu sejajar secara vertikal */
                    width: 100%;
                }
    
                .navbar-nav .nav-item {
                    margin: 5px 0; /* Memberikan margin vertikal saat dalam mode mobile */
                    width: 100%;  /* Membuat item navbar memenuhi lebar penuh */
                    text-align: center; /* Membuat teks berada di tengah */
                }
    
                body {
                    padding-top: 120px; /* Memberikan ruang tambahan agar konten tidak tertutup navbar */
                }
            }
    
            /* Rapi kan posisi tombol secara vertikal */
            .navbar-nav {
                display: flex;
                align-items: center;
                justify-content: flex-end;
            }
    
            .navbar-nav .nav-item {
                display: flex;
                align-items: center;
                height: 100%;
            }
        </style>
    </div>
    
    
    

    @yield('content')



    <!-- Footer Start -->
<div class="container-fluid footer py-4" style="background-color: #1E3A8A;">
    <div class="container py-4">
        <div class="row g-5">
            <!-- Kontak -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">Kontak Kami</h4>
                    <a href="mailto:info@ispadiagnosis.com" class="text-white"><i class="fas fa-envelope me-2"></i> info@ispadiagnosis.com</a>
                    <a href="tel:+6234567890" class="text-white"><i class="fas fa-phone me-2"></i> +62 345 67890</a>
                    <a href="https://maps.google.com/?q=123+Street,+Bukittinggi,+IDN" class="text-white"><i class="fas fa-home me-2"></i> 123 Street, Pekan Baru, IDN</a>
                    <div class="d-flex align-items-center mt-3">
                        <i class="fas fa-share fa-2x text-white me-2"></i>
                        <a class="btn-square btn btn-success rounded-circle mx-1" href="">
                            <i style="font-size: 20px;" class="fab fa-facebook-f"></i>
                        </a>
                        <a class="btn-square btn btn-success rounded-circle mx-1" href="">
                            <i style="font-size: 20px;" class="fab fa-twitter"></i>
                        </a>
                        <a class="btn-square btn btn-success rounded-circle mx-1" href="">
                            <i style="font-size: 20px;" class="fab fa-instagram"></i>
                        </a>
                        <a class="btn-square btn btn-success rounded-circle mx-1" href="">
                            <i style="font-size: 20px;" class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">Tautan Penting</h4>
                    <a href="/" class="text-white">Beranda</a>
                    <a href="/konsultasi" class="text-white">Konsultasi ISPA</a>
                    <a href="/about" class="text-white">Tentang Kami</a>
                    <a href="/service" class="text-white">Layanan Kami</a>
                </div>
            </div>
            
            <!-- Popular Links -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">Links Populer</h4>
                    <a href="/gallery" class="text-white">Galeri Kesehatan</a>
                    <a href="/faq" class="text-white">FAQ</a>
                </div>
            </div>
            
            <!-- Newsletter -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">--</h4>
                    <form action="#" method="POST">
                        <input type="email" class="form-control" id="email" placeholder="Email" required>
                        <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center border-top mt-4 pt-4">
            <p class="m-0 text-white">&copy; <a class="text-white" href="/">Sistem Pakar Ispa </a> </p>
        </div>
    </div>
</div>
<!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" style="border-radius:30px;" class="btn btn-primary btn-square back-to-top">
        <i style="font-size: 20px;margin-right: 0px;" class="fas fa-arrow-up"></i>
    </a>
   
   

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('Front_End/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('Front_End/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('Front_End/lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('Front_End/js/main.js') }}"></script>
    <script>
        window.addEventListener('scroll', function() {
    var navbar = document.querySelector('.navbar');
    if (window.pageYOffset > 0) {
        navbar.classList.add('sticky-top');
    } else {
        navbar.classList.remove('sticky-top');
    }
});

    </script>
</body>

</html>
