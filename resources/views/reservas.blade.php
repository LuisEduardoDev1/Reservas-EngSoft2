@extends('layout.master')

@section('content')
<main>
    <!-- @if(session('success'))
        <div class="alert alert-success" role="alert">
            <i class="bi bi-check"></i>
            {{ session('success') }}
        </div>
    @endif -->
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1><i class="fas fa-home"></i> Bem-vindo ao Sistema de Reservas</h1>
        </div>
    </div>
</main>

@endsection