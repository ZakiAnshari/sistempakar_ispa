@extends('Layouts.Frontend')
@section('title','About')
@section('content')

<div class="container-fluid bg-breadcrumb" style="position: relative; background-image: url('{{ asset('Front_End/img/7.jpg') }}'); background-size: cover; background-position: center;">
    <!-- Overlay untuk menambahkan efek transparan -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div>
    
    <div class="container text-center py-5" style="max-width: 900px; position: relative; z-index: 2;">
        <h3 class="text-white display-3 mb-4">About Us</h3>
       
    </div>
</div>


<!-- About Start -->
<div class="container-fluid about py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="h-100" style="border: 15px solid; border-color: transparent #13357B transparent #13357B;">
                    <img src="{{ asset('https://via.placeholder.com/500x500') }}" class="img-fluid w-100 h-100" alt="Pemandangan Alam">
                </div>
            </div>
            <div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url({{ asset('Front_End/img/about-img-1.png') }});">
                <h5 class="section-about-title pe-3">Tentang Kami</h5>
                <h1 class="mb-4">Selamat Datang di <span class="text-primary">Pariwisata</span></h1>
                <p class="mb-4">Pariwisata adalah mitra ideal Anda dalam merencanakan liburan yang tak terlupakan. Kami menawarkan berbagai pilihan paket wisata yang dirancang untuk memuaskan setiap jenis pelancong, dari petualangan alam hingga pengalaman budaya yang mendalam. Temukan keindahan tempat-tempat eksotis dan nikmati perjalanan yang dirancang dengan sempurna untuk Anda.</p>
                <p class="mb-4">Kami berkomitmen untuk memberikan layanan terbaik dengan penawaran wisata yang terkurasi, akomodasi berkualitas, dan pengalaman yang memukau. Dari lokasi liburan yang menawan hingga kegiatan menarik, kami memastikan setiap detil perjalanan Anda memenuhi harapan dan lebih dari itu.</p>
                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Penginapan</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Surfing Trip</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Island Hopping</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Fishing</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Snorkeling</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Trekking</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Diving</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


@endsection