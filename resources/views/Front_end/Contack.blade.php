@extends('Layouts.Frontend')
@section('title','Contact')
@section('content')
<div class="container-fluid bg-breadcrumb" style="position: relative; background-image: url('{{ asset('Front_End/img/12.jpg') }}'); background-size: cover; background-position: center;">
    <!-- Overlay untuk menambahkan efek transparan -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div>
    
    <div class="container text-center py-5" style="max-width: 900px; position: relative; z-index: 2;">
        <h3 class="text-white display-3 mb-4">Contact Us</h3>
       
    </div>
</div>


<!-- Contact Start -->
<div class="container-fluid contact bg-light py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h3 class="section-title px-3 text-primary">Contact Us</h5>
           
        </div>
        <div class="row g-5 align-items-center">
            <div class="col-lg-4">
                <div class="bg-white rounded p-4 shadow-sm">
                    <div class="text-center mb-4">
                        <i class="fa fa-map-marker-alt fa-3x text-primary mb-3"></i>
                        <h4 class="text-primary">Address</h4>
                        <p class="mb-0">123 Ranking Street, <br> New York, USA</p>
                    </div>
                    <div class="text-center mb-4">
                        <i class="fa fa-phone-alt fa-3x text-primary mb-3"></i>
                        <h4 class="text-primary">Mobile</h4>
                        <p class="mb-0">+012 345 67890</p>
                       
                    </div>
                    <div class="text-center">
                        <i class="fa fa-envelope-open fa-3x text-primary mb-3"></i>
                        <h4 class="text-primary">Email</h4>
                        <p class="mb-0">pariwisata@example.com</p>
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <h3 class="mb-2">Send us a message</h3>
                <p class="mb-4">Have any questions? Fill out the form below and we’ll get back to you as soon as possible.</p>
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0 shadow-sm" id="name" placeholder="Your Name">
                                <label for="name"> Nama</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control border-0 shadow-sm" id="email" placeholder="Your Email">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0 shadow-sm" id="subject" placeholder="Subject">
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control border-0 shadow-sm" placeholder="Leave a message here" id="message" style="height: 160px"></textarea>
                                <label for="message">Pesan</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 mt-5">
                <div class="rounded shadow-sm">
                   
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255314.4285978604!2d100.22645333704122!3d-0.9342364123363704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b942e2b117bb%3A0xb8468cb5c3046ba5!2sPadang%2C%20Kota%20Padang%2C%20Sumatera%20Barat!5e0!3m2!1sid!2sid!4v1724218450046!5m2!1sid!2sid" class="rounded w-100" 
                    style="height: 450px; border: 0;" src="" 
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<style>
    .contact .form-control {
        border-radius: 0.5rem;
    }

    .contact .btn-primary {
        background-color: #1E3A8A;
        border: none;
        transition: background-color 0.3s ease;
    }

    .contact .btn-primary:hover {
        background-color: #1c6ed4;
    }

    .contact .form-floating label {
        padding-left: 1rem;
    }

    .contact .form-floating .form-control {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .contact .rounded {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .contact h3 {
        font-weight: 700;
        color: #1E3A8A;
    }

    .contact h1, .contact h5, .contact h4 {
        color: #1E3A8A;
    }
</style>


@endsection