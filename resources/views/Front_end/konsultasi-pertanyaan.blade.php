@extends('Layouts.Frontend')
@section('title', 'Test Online')
@section('content')

<br><br>
<section class="my-5">
    <div class="container my-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold mb-5" style="font-family: 'Roboto', sans-serif;">JAWABLAH PERTANYAAN BERIKUT</h2>
        </div>

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

        <!-- Form Pertanyaan -->
        <form id="diagnosisForm" method="POST" action="{{ route('diagnose') }}">
            @csrf
            <div id="questionsContainer">
                @foreach ($gejalas as $index => $gejala)
                <div class="question-box" data-question="{{ $index + 1 }}">
                    <label class="form-label d-block mb-3" style="font-size: 1.2rem; color: #333;">
                        {{ $gejala->nama_gejala }}?
                    </label>
                    <div class="d-flex justify-content-center gap-4">
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
          
            <!-- Navigation Buttons -->
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <button type="button" id="prevBtn" class="btn btn-outline-secondary rounded-pill px-4 py-2">Sebelumnya</button>
                <button type="reset" id="resetBtn" class="btn btn-outline-danger mx-auto rounded-pill px-4 py-2">Reset</button>
                <button type="button" id="nextBtn" class="btn btn-primary rounded-pill px-4 py-2">Selanjutnya</button>
            </div>
            <button type="submit" class="btn btn-primary rounded-pill px-5 py-2">Kirim</button>
        </form>
    </div>
</section>

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

@include('sweetalert::alert')
@endsection
