@extends('Layouts.Frontend')
@section('title', 'Form Pendaftaran')
@section('content')

<div class="container">
    <div id="welcomeMessage" class="alert alert-success">
        Selamat datang, {{ Auth::user()->name }}!
    </div>
    <div id="formStatusMessage" class="alert alert-info" style="display: none;">Data Pasien telah diisi.</div>
    <div id="formStatusMessage" class="alert alert-info" style="display: none;">Data Ortu telah diisi.</div>


    <form action="{{ route('diagnose') }}" method="POST">
        @csrf
        <div class="card shadow-sm mb-4" id="patientFormCard">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title" style="color: white;">Data Pasien dan Orang Tua</h5>
            </div>
            
            <div class="card-body">
                <!-- Data Pasien Section -->
                <div class="section-title bg-light py-2 px-3 mb-4 mx-5">
                    <h6 class="mb-0">Data Pasien</h6>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="nama_pasien">Nama Pasien</label>
                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="usia_pasien">Usia Pasien</label>
                            <input type="number" class="form-control" id="usia_pasien" name="usia_pasien" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="tgl_pemeriksaan">Tanggal Pemeriksaan</label>
                            <input type="date" class="form-control" id="tgl_pemeriksaan" name="tgl_pemeriksaan" required>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="form-group mb-3">
                            <label for="alamat_pasien">Alamat</label>
                            <input type="text" class="form-control" id="alamat_pasien" name="alamat_pasien" required>
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
        
                <!-- Divider -->
                <div class="my-4">
                    <hr>
                </div>
        
                <!-- Data Orang Tua Section -->
                <div class="section-title bg-light py-2 px-3 mb-4 mx-5">
                    <h6 class="mb-0">Data Orang Tua</h6>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="nama_ortu">Nama Ortu</label>
                            <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="no_hp">No HP</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp" required>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group mb-3">
                            <label for="alamat_ortu">Alamat Ortu</label>
                            <input type="text" class="form-control" id="alamat_ortu" name="alamat_ortu" required>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group mb-3">
                            <label for="no_nik">No NIK</label>
                            <input type="number" class="form-control" id="no_nik" name="no_nik" required>
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
        


        <div class="card shadow-sm mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="card-title" style="color: white;">Gejala Pasien</h5>
            </div>
            
            <div class="card-body">
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
                        <div class="question-box mb-4" data-question="{{ $index + 1 }}">
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
            <button type="reset" id="resetBtn" class="btn btn-danger">Reset</button>
            <button type="button" id="nextBtn" class="btn btn-primary">Selanjutnya</button>
        </div>
        
        <!-- Submit Button -->
        <div class="form-group text-center" style="float: right;">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    
    </form>
    
</div>
<style>
    /* General Styles */
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f5f5f5;
    }

    .question-box .form-label {
        text-align: center;
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }

    .choice-box {
        display: flex;
        align-items: center;
        padding: 15px 30px;
        border: 1px solid #0099ff;
        border-radius: 20px;
        background-color: #e6f7ff;
        font-size: 18px;
        cursor: pointer;
        transition: transform 0.2s, background-color 0.3s;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .choice-box.selected {
        background-color: #0099ff;
        color: white;
        font-weight: bold;
    }

    .choice-box:hover {
        background-color: #cceeff;
        transform: scale(1.05);
    }

    .choice-box input {
        margin-right: 10px;
        transform: scale(1.5);
    }

    .choice-text {
        font-weight: bold;
        color: #333;
    }

    .number-box {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        font-size: 16px;
        text-align: center;
        line-height: 45px;
        transition: background-color 0.3s, color 0.3s;
    }

    .number-box.active {
        background-color: #0099ff;
        color: white;
        font-weight: bold;
    }

    .question-box {
        display: none;
        padding: 25px;
        border: 1px solid #ddd;
        border-radius: 15px;
        background-color: #ffffff;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .question-box.active {
        display: block;
    }

    .btn {
        font-size: 1.1rem;
        border-radius: 25px;
        padding: 10px 20px;
    }

    .btn-outline-primary {
        border-color: #0099ff;
        color: #0099ff;
        transition: background-color 0.2s, color 0.2s;
    }

    .btn-outline-primary:hover {
        background-color: #0099ff;
        color: white;
    }

    .btn-outline-danger {
        border-color: #ff4d4d;
        color: #ff4d4d;
        transition: background-color 0.2s, color 0.2s;
    }

    .btn-outline-danger:hover {
        background-color: #ff4d4d;
        color: white;
    }

    .btn-primary {
        background-color: #0099ff;
        border-color: #0099ff;
        color: white;
        transition: background-color 0.2s, color 0.2s;
    }

    .btn-primary:hover {
        background-color: #007acc;
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
<br><br><br><br>
@endsection
