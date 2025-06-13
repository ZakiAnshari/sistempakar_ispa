<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('Back_End/assets') }}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>ISPA |  @yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('Back_End/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('Back_End/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('Back_End/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('Back_End/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('Back_End/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('Back_End/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('Back_End/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('Back_End/assets/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        @include('menu_admin.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar" >
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="bx bx-menu bx-sm"></i>
                </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <!-- Search -->
                <div class="navbar-nav align-items-center">
                    <div class="nav-item d-flex align-items-center">
                   
                    </div>
                </div>
                <!-- /Search -->

                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <!-- Place this tag where you want the button to render. -->
                  

                    <!-- User -->
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                        <img src="{{ asset('Back_End/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                <img src="{{ asset('Back_End/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-semibold d-block">{{ $user->name }}</span>
                                <small class="text-muted">{{ $roles ? $roles->name : 'No Role' }}</small>
                            </div>
                            </div>
                        </a>
                        </li>
                       
                        <li>
                        <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/logout" onclick="confirmLogout(event)">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Log Out</span>
                            </a>
                        </li>
                    </ul>
                    </li>
                    <!--/ User -->
                </ul>
                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            @yield('content')

            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
                <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                    </div>
                    <div class="ms-auto mb-2 mb-md-0"> <!-- Menambahkan kelas ms-auto untuk menggeser ke kanan -->
                        Developer By Putri Amizah
                    </div>
                </div>
                
            </footer>
            <!-- / Footer -->

                            <div class="content-backdrop fade"></div>
                        </div>
                        <!-- Content wrapper -->
                        </div>
                        <!-- / Layout page -->
                    </div>

                <!-- Overlay -->
                <div class="layout-overlay layout-menu-toggle"></div>
                </div>
    <!-- / Layout wrapper -->

  

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('Back_End/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('Back_End/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('Back_End/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('Back_End/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('Back_End/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('Back_End/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('Back_End/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('Back_End/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- untuk logout --}}
    <script>
    function confirmLogout(event) {
        event.preventDefault(); // Mencegah tautan untuk langsung melakukan redirect

        Swal.fire({
            title: 'Konfirmasi Logout',
            text: "Apakah Anda yakin ingin keluar?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Logout!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna mengkonfirmasi, redirect ke halaman logout
                window.location.href = '/logout';
            }
        });
    }
    </script>
    {{-- //untuk menghapus  --}}
    <script>
        function confirmDelete(id, name) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: ` "${name}" tidak dapat dikembalikan setelah dihapus!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke URL penghapusan
                    window.location.href = `penginapan-destroy/${id}`;
                }
            });
        }
    </script>
    {{-- untuk format rupiah --}}
    <script>
        function formatRupiah(element) {
            let value = element.value.replace(/[^,\d]/g, ""); // Allow only numbers and commas
            let number = value.split(",")[0]; // Only handle integer part for now
            let formattedNumber = number.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            
            // Update visible field
            element.value = "Rp " + formattedNumber;
            
            // Update hidden field with raw number
            document.getElementById('hargaPerMalamHidden').value = value;
        }
    </script>
    <script>
        const hargaInput = document.getElementById('harga_per_malam');
    
        // Format angka menjadi Rupiah
        function formatRupiah(value) {
            return value.replace(/\D/g, '') // Hanya angka
                        .replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Tambahkan titik sebagai pemisah ribuan
        }
    
        // Event listener untuk format otomatis
        hargaInput.addEventListener('input', function (e) {
            const value = hargaInput.value;
            hargaInput.value = formatRupiah(value);
        });
    </script>
    {{-- untuk menampilkan gambar di bawah --}}
    <script>
        function previewImage(input, previewId) {
            const file = input.files[0];
            const preview = document.getElementById(previewId);
    
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Tampilkan gambar
                };
                reader.readAsDataURL(file); // Baca file sebagai Data URL
            } else {
                preview.src = '#';
                preview.style.display = 'none'; // Sembunyikan jika tidak ada file
            }
        }
    </script>
  </body>
</html>
