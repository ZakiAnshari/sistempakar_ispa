@extends('Layouts.Frontend')
@section('title','Home')
@section('content')

<!-- Carousel Start -->
<div class="carousel-header">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="{{ asset('Front_End/img/hu-chen-tCbTGNwrFNM-unsplash.jpg') }}" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h1 class="text-white mb-3" style="font-size: 2rem; text-transform: uppercase;">Tentukan Diagnosis ISPA Anak Anda Bersama Kami!</h1>
                        <p class="mb-4 fs-6">Dapatkan diagnosis yang cepat dan akurat dengan sistem pakar kami. Dengan bantuan metode Sistem Pakar Ispa, kami membantu Anda mendiagnosis Infeksi Saluran Pernapasan Akut pada balita secara efektif, memberikan solusi medis yang tepat untuk kesehatan si kecil.</p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="/login"> Konsultasi Sekarang</a>
                        </div>
                    </div>
                    
                </div>
            </div>
          
        </div>
       
    </div>
</div>
<!-- Carousel End -->

<!-- About Start -->
<div class="container-fluid about py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="h-100" style="border: 15px solid; border-color: transparent #13357B transparent #13357B;">
                    <img src="{{ asset('Front_End/img/balita.jpg') }}" class="img-fluid w-100 h-100" alt="Ilustrasi Sistem Pakar">
                </div>
            </div>
            <div class="col-lg-7" style="text-align: justify;">
                <h5 class="section-about-title pe-3">Tentang Sistem Pakar</h5>
                <h1 class="mb-4">Selamat Datang di <span class="text-primary">Sistem Pakar ISPA</span></h1>
                <p class="mb-4">Sistem Pakar ISPA menggunakan metode Sistem Pakar Ispa untuk membantu mendiagnosis Infeksi Saluran Pernapasan Akut pada balita. Aplikasi ini dirancang untuk mempermudah tenaga medis dan orang tua dalam mengidentifikasi gejala dan menentukan tindakan yang tepat.</p>
                <p class="mb-4">Dengan basis data gejala dan aturan yang terkurasi, sistem ini memberikan hasil diagnosis yang cepat dan akurat. Teknologi ini membantu dalam pengambilan keputusan yang lebih baik dengan memberikan rekomendasi berbasis pengetahuan.</p>
                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Identifikasi Gejala</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Penentuan Diagnosis</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Solusi Medis</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Rekomendasi Pengobatan</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Pengelolaan Data Gejala</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Proses Inferensi</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Konsultasi Cepat</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- About End -->




<!-- Services Start -->
<div class="container-fluid bg-light service py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3 text-primary">Layanan Kami</h5>
            <h1 class="mb-0">Apa yang Kami Tawarkan</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="row g-4">
                    <!-- Fitur pertama -->
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4">
                            <div class="service-icon p-3">
                                <div class="icon-bg rounded-circle d-flex align-items-center justify-content-center" style="background-color: #1E3A8A;">
                                    <i class="fa fa-stethoscope fa-2x text-white"></i>
                                </div>
                            </div>
                            <div class="service-content">
                                <h5 class="mb-3" style="color: #1E3A8A;">Diagnosa Cepat</h5>
                                <p class="mb-0" style="color: #555;">Sistem kami memberikan diagnosa cepat berdasarkan gejala yang dimasukkan menggunakan metode Sistem Pakar Ispa.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Fitur kedua -->
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4">
                            <div class="service-icon p-3">
                                <div class="icon-bg rounded-circle d-flex align-items-center justify-content-center" style="background-color: #1E3A8A;">
                                    <i class="fa fa-laptop-medical fa-2x text-white"></i>
                                </div>
                            </div>
                            <div class="service-content">
                                <h5 class="mb-3" style="color: #1E3A8A;">Basis Pengetahuan</h5>
                                <p class="mb-0" style="color: #555;">Akses basis pengetahuan kami yang berisi informasi lengkap tentang gejala, solusi, dan pencegahan ISPA.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Fitur ketiga -->
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4">
                            <div class="service-icon p-3">
                                <div class="icon-bg rounded-circle d-flex align-items-center justify-content-center" style="background-color: #1E3A8A;">
                                    <i class="fa fa-clipboard-check fa-2x text-white"></i>
                                </div>
                            </div>
                            <div class="service-content">
                                <h5 class="mb-3" style="color: #1E3A8A;">Penyarankan Solusi</h5>
                                <p class="mb-0" style="color: #555;">Dapatkan solusi yang disarankan berdasarkan hasil analisis gejala yang telah dimasukkan.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Fitur keempat -->
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4">
                            <div class="service-icon p-3">
                                <div class="icon-bg rounded-circle d-flex align-items-center justify-content-center" style="background-color: #1E3A8A;">
                                    <i class="fa fa-user-md fa-2x text-white"></i>
                                </div>
                            </div>
                            <div class="service-content">
                                <h5 class="mb-3" style="color: #1E3A8A;">Konsultasi Dokter</h5>
                                <p class="mb-0" style="color: #555;">Terhubung dengan dokter spesialis untuk mendapatkan penjelasan lebih lanjut tentang kondisi ISPA pada balita.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row g-4">
                    <!-- Fitur kelima -->
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4">
                            <div class="service-icon p-3">
                                <div class="icon-bg rounded-circle d-flex align-items-center justify-content-center" style="background-color: #1E3A8A;">
                                    <i class="fa fa-chart-line fa-2x text-white"></i>
                                </div>
                            </div>
                            <div class="service-content">
                                <h5 class="mb-3" style="color: #1E3A8A;">Pelaporan Statistik</h5>
                                <p class="mb-0" style="color: #555;">Lihat laporan statistik mengenai kasus ISPA berdasarkan data yang telah dimasukkan oleh pengguna.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Fitur keenam -->
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4">
                            <div class="service-icon p-3">
                                <div class="icon-bg rounded-circle d-flex align-items-center justify-content-center" style="background-color: #1E3A8A;">
                                    <i class="fa fa-search fa-2x text-white"></i>
                                </div>
                            </div>
                            <div class="service-content">
                                <h5 class="mb-3" style="color: #1E3A8A;">Pencarian Gejala</h5>
                                <p class="mb-0" style="color: #555;">Cari gejala secara spesifik dan lihat kemungkinan penyebab serta solusi yang relevan.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Fitur ketujuh -->
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4">
                            <div class="service-icon p-3">
                                <div class="icon-bg rounded-circle d-flex align-items-center justify-content-center" style="background-color: #1E3A8A;">
                                    <i class="fa fa-database fa-2x text-white"></i>
                                </div>
                            </div>
                            <div class="service-content">
                                <h5 class="mb-3" style="color: #1E3A8A;">Penyimpanan Data</h5>
                                <p class="mb-0" style="color: #555;">Sistem kami menyimpan riwayat diagnosa dan data gejala untuk mempermudah evaluasi di masa depan.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Fitur kedelapan -->
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4">
                            <div class="service-icon p-3">
                                <div class="icon-bg rounded-circle d-flex align-items-center justify-content-center" style="background-color: #1E3A8A;">
                                    <i class="fa fa-book fa-2x text-white"></i>
                                </div>
                            </div>
                            <div class="service-content">
                                <h5 class="mb-3" style="color: #1E3A8A;">Panduan Pengguna</h5>
                                <p class="mb-0" style="color: #555;">Dapatkan panduan lengkap untuk memahami cara menggunakan sistem pakar ini secara optimal.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- PERTANYAAN --}}
<div class="container-fluid bg-light py-5">
    <div class="container">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h3 class="section-title px-5" style="font-size: 1.9rem;">Pertanyaan yang Sering Diajukan</h3>
        </div>
        <div class="accordion" id="faqs">
            <!-- FAQ Item 1 -->
            <div class="accordion-item mb-3 border-0">
                <h2 class="accordion-header" id="faq1">
                    <button class="accordion-button bg-primary text-white shadow-sm rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                        Apa itu ISPA pada balita?
                    </button>
                </h2>
                <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqs">
                    <div class="accordion-body bg-white text-dark rounded-bottom shadow-sm">
                        ISPA (Infeksi Saluran Pernapasan Akut) adalah infeksi yang terjadi pada saluran pernapasan bagian atas dan bawah, yang umumnya disebabkan oleh virus atau bakteri. Pada balita, ISPA bisa menyebabkan gejala seperti batuk, pilek, demam, dan sesak napas.
                    </div>
                </div>
            </div>
            <!-- FAQ Item 2 -->
            <div class="accordion-item mb-3 border-0">
                <h2 class="accordion-header" id="faq2">
                    <button class="accordion-button collapsed bg-primary text-white shadow-sm rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        Apa gejala umum ISPA pada balita?
                    </button>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqs">
                    <div class="accordion-body bg-white text-dark rounded-bottom shadow-sm">
                        Gejala umum ISPA pada balita meliputi batuk, demam, pilek, hidung tersumbat, sesak napas, suara serak, dan nafsu makan yang menurun. Gejala ini dapat bervariasi tergantung pada tingkat keparahan infeksi.
                    </div>
                </div>
            </div>
            <!-- FAQ Item 3 -->
            <div class="accordion-item mb-3 border-0">
                <h2 class="accordion-header" id="faq3">
                    <button class="accordion-button collapsed bg-primary text-white shadow-sm rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                        Bagaimana sistem pakar ini membantu mendiagnosis ISPA?
                    </button>
                </h2>
                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqs">
                    <div class="accordion-body bg-white text-dark rounded-bottom shadow-sm">
                        Sistem pakar ini menggunakan metode **Forward Chaining**, yaitu mengumpulkan informasi mengenai gejala-gejala yang muncul pada balita, seperti demam, batuk, atau sesak napas, dan secara otomatis menyarankan kemungkinan diagnosis ISPA serta tingkat keparahannya.
                    </div>
                </div>
            </div>
            <!-- FAQ Item 4 -->
            <div class="accordion-item mb-3 border-0">
                <h2 class="accordion-header" id="faq4">
                    <button class="accordion-button collapsed bg-primary text-white shadow-sm rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                        Apa yang dimaksud dengan metode **Forward Chaining** dalam diagnosis ISPA?
                    </button>
                </h2>
                <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#faqs">
                    <div class="accordion-body bg-white text-dark rounded-bottom shadow-sm">
                        **Forward Chaining** adalah metode inferensi dalam sistem pakar yang dimulai dengan data (misalnya gejala), kemudian secara bertahap menghubungkannya dengan aturan yang telah ditentukan untuk menarik kesimpulan dan diagnosis, hingga didapatkan hasil akhir.
                    </div>
                </div>
            </div>
            <!-- FAQ Item 5 -->
            <div class="accordion-item mb-3 border-0">
                <h2 class="accordion-header" id="faq5">
                    <button class="accordion-button collapsed bg-primary text-white shadow-sm rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                        Apa yang harus dilakukan jika balita mengalami demam dan batuk?
                    </button>
                </h2>
                <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="faq5" data-bs-parent="#faqs">
                    <div class="accordion-body bg-white text-dark rounded-bottom shadow-sm">
                        Jika balita mengalami demam dan batuk, sistem pakar akan memeriksa apakah gejala ini sesuai dengan ISPA ringan seperti **ISPA RINGAN**, atau memerlukan penanganan lebih lanjut jika ada gejala lain seperti sesak napas atau muntah.
                    </div>
                </div>
            </div>
            <!-- FAQ Item 6 -->
            <div class="accordion-item mb-3 border-0">
                <h2 class="accordion-header" id="faq6">
                    <button class="accordion-button collapsed bg-primary text-white shadow-sm rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                        Jika balita mengalami suara serak dan pilek, apakah itu indikasi ISPA berat?
                    </button>
                </h2>
                <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="faq6" data-bs-parent="#faqs">
                    <div class="accordion-body bg-white text-dark rounded-bottom shadow-sm">
                        Tidak selalu. Suara serak dan pilek bisa menunjukkan **ISPA RINGAN**. Namun, jika gejala ini diiringi dengan kesulitan bernapas atau demam tinggi, sistem pakar dapat mendeteksi kemungkinan **ISPA SEDANG** atau lebih serius.
                    </div>
                </div>
            </div>
            <!-- FAQ Item 7 -->
            <div class="accordion-item mb-3 border-0">
                <h2 class="accordion-header" id="faq7">
                    <button class="accordion-button collapsed bg-primary text-white shadow-sm rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                        Bagaimana cara mendeteksi ISPA Berat pada balita?
                    </button>
                </h2>
                <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="faq7" data-bs-parent="#faqs">
                    <div class="accordion-body bg-white text-dark rounded-bottom shadow-sm">
                        **ISPA BERAT** umumnya ditandai dengan gejala seperti demam tinggi, sesak napas, batuk berat, suara serak, dan terkadang muntah. Jika balita menunjukkan kombinasi gejala ini, sistem pakar akan mengindikasikan **ISPA BERAT** dan menyarankan tindakan lebih lanjut.
                    </div>
                </div>
            </div>
            <!-- FAQ Item 8 -->
            <div class="accordion-item mb-3 border-0">
                <h2 class="accordion-header" id="faq8">
                    <button class="accordion-button collapsed bg-primary text-white shadow-sm rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                        Dapatkah sistem pakar ini membedakan antara ISPA ringan, sedang, dan berat?
                    </button>
                </h2>
                <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="faq8" data-bs-parent="#faqs">
                    <div class="accordion-body bg-white text-dark rounded-bottom shadow-sm">
                        Ya, sistem pakar ini dirancang untuk mendiagnosis **ISPA** berdasarkan kombinasi gejala yang muncul, seperti demam, batuk, sesak napas, dan suara serak. Berdasarkan pola gejala, sistem akan mengkategorikan diagnosis menjadi **ISPA RINGAN**, **ISPA SEDANG**, atau **ISPA BERAT**.
                    </div>
                </div>
            </div>
            <!-- FAQ Item 9 -->
            <div class="accordion-item mb-3 border-0">
                <h2 class="accordion-header" id="faq9">
                    <button class="accordion-button collapsed bg-primary text-white shadow-sm rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                        Apakah pengobatan untuk ISPA yang ringan sama dengan ISPA yang berat?
                    </button>
                </h2>
                <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="faq9" data-bs-parent="#faqs">
                    <div class="accordion-body bg-white text-dark rounded-bottom shadow-sm">
                        Pengobatan untuk **ISPA RINGAN** biasanya melibatkan obat penurun demam dan istirahat. Namun, untuk **ISPA BERAT**, sering kali memerlukan penanganan medis lebih lanjut, seperti antibiotik (jika disebabkan oleh infeksi bakteri) dan penanganan di rumah sakit untuk perawatan oksigen.
                    </div>
                </div>
            </div>
            <!-- FAQ Item 10 -->
            <div class="accordion-item mb-3 border-0">
                <h2 class="accordion-header" id="faq10">
                    <button class="accordion-button collapsed bg-primary text-white shadow-sm rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                        Apakah sistem pakar ini dapat membantu menentukan apakah pengobatan yang diberikan efektif?
                    </button>
                </h2>
                <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="faq10" data-bs-parent="#faqs">
                    <div class="accordion-body bg-white text-dark rounded-bottom shadow-sm">
                        Ya, sistem ini tidak hanya memberikan diagnosis awal, tetapi juga memantau perkembangan gejala. Jika gejala tidak membaik atau bahkan memburuk, sistem ini akan memberikan rekomendasi apakah perlu dilakukan evaluasi ulang dan pengobatan tambahan.
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>


<style>
  .service-content-inner {
    transition: all 0.3s ease;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: flex-start; /* Mengatur elemen di dalam kontainer menjadi sejajar ke kiri */
    gap: 20px; /* Menambahkan jarak antar elemen */
    }

    .service-icon {
        flex-shrink: 0; /* Memastikan ikon tidak menyusut */
    }

    .service-content {
        flex-grow: 1; /* Membuat konten teks mengambil sisa ruang yang tersedia */
    }

    .service-content-inner:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .icon-bg {
        width: 70px;
        height: 70px;
    }

    .service-content-inner:hover .service-icon .icon-bg {
        background-color: #e9ecef;
    }

    .service-content-inner:hover .service-icon i {
        color: #007bff;
    }

    @media (max-width: 768px) {
        .service-content-inner {
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 15px;
        }

        .service-icon {
            margin-bottom: 15px;
        }

        .service-content {
            text-align: center;
            margin-top: 10px;
        }
    }

</style>
<!-- Services End -->






@endsection