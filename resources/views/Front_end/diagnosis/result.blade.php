@extends('Layouts.Frontend')
@section('title','Home')
@section('content')

@section('content')
<h2>Hasil Diagnosis</h2>
@if (count($penyakitFinal) > 0)
    <ul>
        @foreach ($penyakitFinal as $penyakit)
            <li>{{ $penyakit->penyakit }}: {{ $penyakit->definisi }}</li>
        @endforeach
    </ul>
@else
    <p>Maaf, tidak ada penyakit yang cocok berdasarkan gejala yang Anda pilih.</p>
@endif
@endsection

