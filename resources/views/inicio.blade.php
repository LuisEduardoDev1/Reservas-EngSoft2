@extends('layout.master')

@section('content')
<main id="inicio">
    
    <img id="logo" src="/img/logo.jpeg" width=70px heigth=70px alt="logo da uespi">
    <style>
        #logo {
            display: flex;
            justify-self: center;
            }
    </style>
    
    <section class="hero">
        <h1 class="">Bem-vindo ao Sistema de Reservas</h1>
        <p class="fs-5">Agende suas reservas de maneira rápida, confiável e sem complicações!</p>
    </section>

    <section class="features">
        <div class="feature">
            <i class="fa-solid fa-lock"></i>
            <h3>Confiabilidade</h3>
            <p>Nosso sistema garante a segurança e integridade de suas reservas.</p>
        </div>
        <div class="feature">
            <i class="fas fa-bolt"></i>
            <h3 class="">Velocidade</h3>
            <p>Realize suas reservas em poucos segundos com nossa plataforma otimizada.</p>
        </div>
        <div class="feature">
            <i class="fas fa-check-circle"></i>
            <h3>Facilidade de Uso</h3>
            <p>Interface simples e intuitiva para facilitar todo o processo de reserva.</p>
        </div>
    </section>
</main>

@endsection