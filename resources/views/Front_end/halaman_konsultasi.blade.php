@extends('Layouts.Frontend')
@section('title', 'Form Pendaftaran')
@section('content')
<!-- Core CSS -->

<div class="container mt-5">
    <h3 class="text-center mb-4"></h3>
    
    <form action="{{ route('diagnose') }}" method="POST">
        @csrf
    
        <!-- Card for Patient Details -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Data Pasien</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <!-- Input data pasien -->
                        <div class="form-group mb-3">
                            <label for="nama_pasien">Nama Pasien</label>
                            <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror" id="nama_pasien" name="nama_pasien" value="{{ old('nama_pasien') }}" required>
                            @error('nama_pasien')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="usia_pasien">Usia Pasien</label>
                            <input type="number" class="form-control @error('usia_pasien') is-invalid @enderror" id="usia_pasien" name="usia_pasien" value="{{ old('usia_pasien') }}" required>
                            @error('usia_pasien')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="tgl_pemeriksaan">Tanggal Pemeriksaan</label>
                            <input type="date" class="form-control @error('tgl_pemeriksaan') is-invalid @enderror" id="tgl_pemeriksaan" name="tgl_pemeriksaan" min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" value="{{ old('tgl_pemeriksaan') }}" required>
                            @error('tgl_pemeriksaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="form-group mb-3">
                            <label for="alamat_pasien">Alamat</label>
                            <input type="text" class="form-control @error('alamat_pasien') is-invalid @enderror" id="alamat_pasien" name="alamat_pasien" value="{{ old('alamat_pasien') }}" required>
                            @error('alamat_pasien')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group mb-3">
                            <label for="jenis_kelamin_pasien">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin_pasien" name="jenis_kelamin_pasien" required>
                                <option value="">Pilih</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    
        <!-- Card for Parent's Details -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Data Orang Tua</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="nama_ortu">Nama Ortu</label>
                            <input type="text" class="form-control @error('nama_ortu') is-invalid @enderror" id="nama_ortu" name="nama_ortu" value="{{ old('nama_ortu') }}" required>
                            @error('nama_ortu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}" required>
                            @error('pekerjaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="no_hp">No HP</label>
                            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
                            @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group mb-3">
                            <label for="alamat_ortu">Alamat Ortu</label>
                            <input type="text" class="form-control @error('alamat_ortu') is-invalid @enderror" id="alamat_ortu" name="alamat_ortu" value="{{ old('alamat_ortu') }}" required>
                            @error('alamat_ortu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group mb-3">
                            <label for="no_nik">No NIK</label>
                            <input type="number" class="form-control @error('no_nik') is-invalid @enderror" id="no_nik" name="no_nik" value="{{ old('no_nik') }}" required>
                            @error('no_nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group mb-3">
                            <label for="jenis_kelamin_ortu">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin_ortu" name="jenis_kelamin_ortu" required>
                                <option value="">Pilih</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Card for Symptoms -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Gejala Pasien</h5>
            </div>
            <div class="card-body">
                <!-- Progress Indicator -->
                <div class="text-center mb-5">
                    <div id="numberBoxContainer" class="d-flex justify-content-center flex-wrap gap-3">
                        @foreach ($gejalas as $index => $gejala)
                            <button type="button" id="numberBox{{ $index + 1 }}" class="number-box btn btn-outline-primary" data-question="{{ $index + 1 }}">
                                {{ $index + 1 }}
                            </button>
                        @endforeach
                    </div>
                </div>
                <div id="questionsContainer">
                    @foreach ($gejalas as $index => $gejala)
                        <div class="question-box" data-question="{{ $index + 1 }}">
                            <label class="form-label d-block mb-3">{{ $gejala->nama_gejala }}?</label>
                            <div class="d-flex justify-content-center gap-3">
                                <label class="choice-box">
                                    <input type="radio" name="question{{ $index + 1 }}" value="1" required>
                                    <span class="choice-text">Ya</span>
                                </label>
                                <label class="choice-box">
                                    <input type="radio" name="question{{ $index + 1 }}" value="0" required>
                                    <span class="choice-text">Tidak</span>
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    
        <!-- Navigation and Reset Buttons -->
        <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
            <button type="button" id="prevBtn" class="btn btn-secondary">Sebelumnya</button>
            <button type="reset" id="resetBtn" class="btn btn-danger mx-auto">Reset</button>
            <button type="button" id="nextBtn" class="btn btn-primary">Selanjutnya</button>
        </div>
    
        <button type="submit" class="btn btn-primary btn-diagnosa">Diagnosa</button>
    </form>
    <br><br>
</div>

<style>
    .question-box .form-label {
        text-align: center;
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .choice-box {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .choice-text {
        font-size: 1rem;
    }

    .number-box {
        width: 40px;
        height: 40px;
        border-radius: 5px;
        font-size: 16px;
        text-align: center;
        line-height: 38px;
    }

    .number-box.active {
        background-color: #0099ff;
        color: white;
        font-weight: bold;
    }

    .question-box {
        display: none;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #f9f9f9;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .question-box.active {
        display: block;
    }

    .choice-box {
        display: flex;
        align-items: center;
        padding: 15px 30px;
        border: 1px solid #0099ff;
        border-radius: 10px;
        background-color: #e6f7ff;
        font-size: 18px;
        cursor: pointer;
    }

    .choice-box.selected {
        background-color: #0099ff;
        color: white;
        font-weight: bold;
    }

    .choice-box input {
        margin-right: 10px;
        transform: scale(1.5);
    }

    .choice-text {
        font-weight: bold;
        color: #333;
    }
</style>

<script>
    const questions = document.querySelectorAll(".question-box");
    const numberBoxes = document.querySelectorAll(".number-box");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const resetBtn = document.getElementById("resetBtn");
    let currentQuestion = 0;

    function showQuestion(index) {
        questions.forEach((question, i) => {
            question.classList.toggle("active", i === index);
        });
        numberBoxes.forEach((box, i) => {
            box.classList.toggle("active", i === index);
        });
        prevBtn.disabled = index === 0;
        nextBtn.disabled = index === questions.length - 1;
    }

    // Add event listener to update styles when an answer is selected
    const radios = document.querySelectorAll("input[type='radio']");
    radios.forEach((radio) => {
        radio.addEventListener("change", (e) => {
            const parentChoiceBox = e.target.closest(".choice-box");
            const siblingChoices = parentChoiceBox.parentElement.querySelectorAll(".choice-box");

            // Remove 'selected' class from all siblings
            siblingChoices.forEach((choice) => {
                choice.classList.remove("selected");
            });

            // Add 'selected' class to the selected answer
            parentChoiceBox.classList.add("selected");
        });
    });

    prevBtn.addEventListener("click", () => {
        if (currentQuestion > 0) {
            currentQuestion--;
            showQuestion(currentQuestion);
        }
    });

    nextBtn.addEventListener("click", () => {
        if (currentQuestion < questions.length - 1) {
            currentQuestion++;
            showQuestion(currentQuestion);
        }
    });

    resetBtn.addEventListener("click", () => {
        currentQuestion = 0;
        showQuestion(currentQuestion);

        // Remove all 'selected' classes
        radios.forEach((radio) => {
            const parentChoiceBox = radio.closest(".choice-box");
            parentChoiceBox.classList.remove("selected");
        });
    });

    // Initialize first question as active
    showQuestion(currentQuestion);
</script>

@endsection
