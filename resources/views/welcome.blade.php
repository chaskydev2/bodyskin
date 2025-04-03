<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GymRun</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .jumbotron {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('https://img.freepik.com/foto-gratis/vista-angulo-hombre-musculoso-irreconocible-preparandose-levantar-barra-club-salud_637285-2497.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            padding: 100px 0;
        }
        .jumbotron h1 {
            font-size: 4rem;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .jumbotron p {
            font-size: 1.5rem;
            max-width: 800px;
            text-align: center;
            margin-bottom: 20px;
        }
        .jumbotron .btn {
            margin: 10px;
            font-size: 1.2rem;
            padding: 10px 20px;
        }
        .features {
            padding: 50px 0;
            background-color: white;
        }
        .features h2 {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .features p {
            font-size: 1.2rem;
            color: #555;
        }
        .features .col-md-4 {
            padding: 20px;
        }
    </style>
</head>
<body class="antialiased font-sans">
    <div class="jumbotron">
        <h1 class="display-4">Bienvenido a Nuestro Gimnasio</h1>
        <p class="lead">Únete a nosotros para alcanzar tus metas de fitness con los mejores entrenadores e instalaciones.</p>
        <hr class="my-4">
        <p>Regístrate hoy y comienza tu viaje de fitness con nosotros.</p>
        @if (Route::has('login'))
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-info btn-lg" role="button">Ir al Panel de Control</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg" role="button">Iniciar sesión</a>
                <a href="{{ route('register') }}" class="btn btn-secondary btn-lg" role="button">Registrarse</a>
            @endauth
        @endif
    </div>

    <div class="container features">
        <div class="row">
            <div class="col-md-4 text-center">
                <h2>Equipos de Última Generación</h2>
                <p>Nuestro gimnasio está equipado con las últimas máquinas de fitness y pesas libres para ayudarte a alcanzar tus objetivos.</p>
            </div>
            <div class="col-md-4 text-center">
                <h2>Entrenadores Expertos</h2>
                <p>Nuestros entrenadores certificados están aquí para guiarte con planes de entrenamiento personalizados y asesoramiento nutricional.</p>
            </div>
            <div class="col-md-4 text-center">
                <h2>Clases Grupales</h2>
                <p>Únete a nuestras clases grupales como yoga, spinning y crossfit para mantenerte motivado y divertirte.</p>
            </div>
        </div>
    </div>
</body>
</html>