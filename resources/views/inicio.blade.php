@extends('layout.master')

@section('content')
<main id="inicio">
    
    <img id="logo" src="/img/logo.jpeg" width=70px heigth=70px alt="logo da uespi">
    <style>
        #logo {
            display: flex;
            justify-self: center;
            margin: 0 auto;
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

    <div style="display: flex; flex-direction:column; margin: 0 auto;" class="mb-3">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31793.118285114084!2d-42.8349926!3d-5.0810811!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x78e3833a901a8dd%3A0x22007e4628ca9089!2sUniversidade%20Estadual%20do%20Piau%C3%AD!5e0!3m2!1spt-BR!2sbr!4v1733420611754!5m2!1spt-BR!2sbr"
            width="900" height="400" style="border:0; margin: 0 auto; border-radius:10px;"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</main>

@endsection