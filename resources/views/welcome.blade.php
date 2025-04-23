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
            height: calc(100vh - 64px); /* Restamos la altura de la navbar */
            background: url('https://img.freepik.com/foto-gratis/vista-angulo-hombre-musculoso-irreconocible-preparandose-levantar-barra-club-salud_637285-2497.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            position: relative;
        }
        .jumbotron::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
        .jumbotron > * {
            position: relative;
            z-index: 2;
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
        .features {
            padding: 80px 0;
            background-color: white;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .feature-card {
            text-align: center;
            padding: 30px;
        }
        .feature-card h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #1a1a1a;
        }
        .feature-card p {
            font-size: 1.1rem;
            color: #666;
            line-height: 1.6;
        }
        .cta-button {
            display: inline-block;
            background-color: #ff0000;
            color: white;
            padding: 20px 60px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: all 0.3s ease;
            margin-top: 30px;
            box-shadow: 0 4px 15px rgba(255, 0, 0, 0.3);
            animation: pulse 2s infinite;
        }
        .cta-button:hover {
            background-color: #cc0000;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 0, 0, 0.4);
        }
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }
    </style>
</head>
<body class="antialiased font-sans">
    <!-- Barra de navegación -->
    <nav class="bg-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-white font-bold text-2xl">
                        Fitness First
                    </a>
                </div>

                <!-- Botones de navegación -->
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-200">
                        TIMETABLE
                    </a>
                    <a href="#" class="text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-200">
                        BLOG
                    </a>
                    <a href="{{ route('login') }}" class="text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-200">
                        LOGIN
                    </a>
                    <a href="{{ route('register') }}" class="text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-200">
                        JOIN NOW
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="jumbotron">
        <h1 class="display-4">TRANSFORM YOUR LIFE</h1>
        <p class="lead">Join the ultimate fitness experience with world-class training and facilities</p>
        <a href="{{ route('register') }}" class="cta-button">
            ¡10% DE DESCUENTO!
        </a>
    </div>

    <!-- Features Section -->
    <div class="features">
        <div class="features-grid">
            <div class="feature-card">
                <h2>State-of-the-Art Equipment</h2>
                <p>Access to the latest fitness technology and premium exercise equipment for optimal results.</p>
            </div>
            <div class="feature-card">
                <h2>Expert Trainers</h2>
                <p>Work with certified professionals who will guide you through your fitness journey.</p>
            </div>
            <div class="feature-card">
                <h2>Diverse Classes</h2>
                <p>Choose from a wide range of group classes including yoga, HIIT, and strength training.</p>
            </div>
        </div>
    </div>
</body>
</html>