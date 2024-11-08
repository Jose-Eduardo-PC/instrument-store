<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="main-container" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div id="login-message" class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div id="welcome-message" class="p-6 text-gray-900" style="display: none;">
                    <h3 class="welcome-title">Bienvenido a nuestra Pagina donde se difunde la cultura</h3>
                    <hr class="custom-hr"> <!-- Línea horizontal después del título -->
                    <div class="flex flex-wrap justify-center mt-3">
                        <img src="{{ asset('storage/images/instrumentos.webp') }}" class="m-2 img-thumbnail img-fluid custom-img" alt="Instrumento 1">
                        <img src="{{ asset('storage/images/chovena.webp') }}" class="m-2 img-thumbnail img-fluid custom-img" alt="Instrumento 2">
                        <img src="{{ asset('storage/images/e_instrumentos.webp') }}" class="m-2 img-thumbnail img-fluid custom-img" alt="Instrumento 3">
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <p>Aquí encontrarás una gran variedad de instrumentos musicales echos de manera artesanal o de marca de la mejor calidad. ¡Explora nuestro catálogo y encuentra el instrumento perfecto para ti!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            var loginMessage = document.getElementById('login-message');
            loginMessage.style.display = 'none';
            var welcomeMessage = document.getElementById('welcome-message');
            welcomeMessage.style.display = 'block';
        }, 3000);
    </script>

    <style>
        .custom-img {
            max-width: 380px;
            height: auto;
            border: 2px solid #ccc;
            border-radius: 10px;
            transition: transform 0.3s;
            margin: 10px; /* Añadir margen para separar imágenes */
        }
        .custom-img:hover {
            transform: scale(1.05);
            border-color: #0fb934;
        }
        .welcome-title {
            font-size: 2.5rem; /* Tamaño más grande para el título */
            font-weight: bold;
            color: #0fb934; /* Color verde */
            text-align: center;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Sombra para el texto */
        }
        .custom-hr {
            border: 0;
            height: 2px;
            background-color: #0fb934;
            margin: 1rem 0;
        }
    </style>
</x-app-layout>
