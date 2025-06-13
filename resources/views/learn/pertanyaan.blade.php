@extends('Layouts.Frontend')
@section('title', 'Form Pendaftaran')
@section('content')

<H1>Pertanyaan</H1> 
<div class="container">
    <form id="diagnosisForm" method="POST" action="{{ route('diagnose') }}">
        @csrf
        
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="card-title">Gejala Pasien</h5>
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
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
    
   
    
</div>
@endsection
