<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="main-container" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="topics-container">
                    <h1 class="page-title">{{ $product->name }}</h1>
                    <p class="text-center text-muted">{{ $product->created_at->format('d M, Y') }}</p>
                    <hr class="custom-hr-title">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="page-description">{{ $product->description }}</p>
                            <p class="text-muted">Precio: {{ number_format($product->price, 2) }} <b>BS</b></p>
                            <hr>
                            <!-- Números de contacto para la venta -->
                            <h5 class="text-center">Contacto para Venta</h5>
                            <p class="contact-info"><strong>María Galinet Rojas:</strong> 77807620</p>
                            <p class="contact-info"><strong>Aline Villarroel:</strong> 74942623</p>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-center">Imagen del Producto</h5>
                            <hr>
                            <div class="d-flex flex-wrap justify-content-around">
                                @if ($product->hasMedia('product_images'))
                                    <img src="{{ $product->first_product_image_url }}" class="img-fluid rounded shadow border border-success mt-3 mb-3 content-image" alt="Imagen del Producto">
                                @else
                                    <img src="{{ asset('/storage/images/alt-de-una-imagen.png') }}" class="img-fluid rounded shadow border border-success mt-3 mb-3 content-image" alt="Imagen por defecto">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .topics-container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 20px;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #28a745; /* Color verde */
            text-align: center;
        }

        .page-description {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 30px;
            white-space: pre-wrap;
        }

        .custom-hr-title {
            border: none;
            height: 5px;
            background-color: #28a745; /* Color verde */
            width: 100% !important;
            margin: 15px auto;
            border-radius: 5px;
        }

        .content-image {
            max-width: 200px; /* Tamaño más grande */
            transition: transform 0.3s ease-in-out; /* Transición para el zoom */
        }

        .content-image:hover {
            transform: scale(1.1); /* Efecto de zoom al pasar el ratón */
        }

        /* Estilo para la sección de contacto */
        .contact-info {
            font-size: 1rem;
            color: #333;
            margin: 10px 0;
            text-align: center;
        }

        .contact-info strong {
            color: #28a745; /* Color verde */
        }
    </style>
</x-app-layout>
