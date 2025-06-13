@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Selamat Datang {{ $user->name }} 🎉</h5>
                                    <p class="mb-4">
                                        Anda memainkan peran penting dalam membantu mendiagnosis dan menangani Infeksi
                                        Saluran Pernapasan Akut pada balita. Bersiaplah untuk memberikan kontribusi dalam
                                        meningkatkan kualitas kesehatan melalui penggunaan teknologi sistem pakar!
                                    </p>


                                    <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                    <img src="{{ asset('Back_End/assets/img/illustrations/man-with-laptop-light.png') }}"
                                        height="140" alt="View Badge User"
                                        data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                        data-app-light-img="illustrations/man-with-laptop-light.png" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center">
                                <h5 class="card-title text-center mb-3">Total Gejala</h5>
                                <div class="d-flex align-items-center gap-3">
                                    <i class="fa fa-chart-bar" style="font-size: 3rem;"></i>
                                    <span class="badge bg-label-warning rounded-pill"
                                        style="font-size: 1.5rem; padding: 0.5rem 1rem;">
                                        {{ $gejala_count }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center">
                                <h5 class="card-title text-center mb-3">Total Pasien</h5>
                                <div class="d-flex align-items-center gap-3">
                                    <i class="fa fa-user-injured" style="font-size: 3rem;"></i> <!-- Ikon pasien -->
                                    <span class="badge bg-label-warning rounded-pill"
                                        style="font-size: 1.5rem; padding: 0.5rem 1rem;">
                                        {{ $pasien_count }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center">
                                <h5 class="card-title text-center mb-3">Total Penyakit</h5>
                                <div class="d-flex align-items-center gap-3">
                                    <i class="fa fa-virus" style="font-size: 3rem;"></i>
                                    <!-- Ikon virus, relevan untuk penyakit -->
                                    <span class="badge bg-label-warning rounded-pill"
                                        style="font-size: 1.5rem; padding: 0.5rem 1rem;">
                                        {{ $penyakit_count }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 mb-4">
                  <div class="card">
                      <div class="card-body">
                          <div class="d-flex flex-column align-items-center">
                              <h5 class="card-title text-center mb-3">Total User</h5>
                              <div class="d-flex align-items-center gap-3">
                                  <i class="fa fa-users" style="font-size: 3rem;"></i> <!-- Ikon pengguna -->
                                  <span class="badge bg-label-warning rounded-pill" style="font-size: 1.5rem; padding: 0.5rem 1rem;">
                                      {{ $user_count }}
                                  </span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <!-- / Content -->


            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->

        @include('sweetalert::alert')

    @endsection
