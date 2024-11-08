<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos los Instrumentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div id="main-container" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="topics-container">
                    @if($instruments->isEmpty())
                        <h3 class="text-center text-muted">No hay instrumentos disponibles.</h3>
                    @else
                        @foreach($instruments as $instrument)
                            <div class="row mb-5">
                                <div class="col-md-4">
                                    <h1 class="page-title">{{ $instrument->name }}</h1>
                                    <p class="text-center text-muted">{{ $instrument->created_at->format('d M, Y') }}</p>
                                    <hr class="custom-hr-title">
                                    <p class="page-description">{{ $instrument->description }}</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex flex-wrap justify-content-around">
                                        @if ($instrument->hasMedia('instruments'))
                                            <img src="{{ $instrument->first_instrument_image_url }}" class="img-fluid rounded shadow border border-success mt-3 mb-3 content-image" alt="Imagen del Instrumento">
                                        @else
                                            <img src="{{ asset('/storage/images/alt-de-una-imagen.png') }}" class="img-fluid rounded shadow border border-success mt-3 mb-3 content-image" alt="Imagen por defecto">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="text-center">Productos Relacionados</h5>
                                    <hr class="related-products-hr">
                                    <br>
                                    <div class="row">
                                        @if($instrument->category->products->isEmpty())
                                            <p class="text-center text-muted">No hay productos relacionados disponibles.</p>
                                        @else
                                            @foreach($instrument->category->products as $product)
                                                <a href="{{ route('productsu.show', $product->id) }}" class="text-decoration-none col-md-6 mb-3">
                                                    <div class="card product-card">
                                                        <img src="{{ $product->first_product_image_url }}" class="card-img-top" alt="{{ $product->name }}">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $product->name }}</h5>
                                                            <p class="card-text">{{ $product->description }}</p>
                                                            <p class="card-text"><small class="text-muted">Precio: {{ number_format($product->price, 2) }} <b>BS</b></small></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .topics-container {
            max-width: 2000px !important;
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

        .related-products-hr {
            border: none;
            height: 3px;
            background-color: #28a745; /* Color verde */
            width: 100%; /* Tamaño en porcentaje */
            margin: 0 auto; /* Centrar el HR */
            border-radius: 5px;
        }

        .content-image {
            max-width: 200px; /* Tamaño más grande */
            transition: transform 0.3s ease-in-out; /* Transición para el zoom */
        }

        .content-image:hover {
            transform: scale(1.1); /* Efecto de zoom al pasar el ratón */
        }

        .product-card {
            transition: transform 0.3s ease-in-out; /* Transición para el zoom */
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            max-width: 100%;
            height: auto;
            transition: transform 0.3s ease-in-out; 
        }

        .card-img-top:hover {
            transform: scale(1.1); /* Efecto de zoom al pasar el ratón */
        }
    </style>
</x-app-layout>

