<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="main-container" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="topics-container">
                    <h1 class="page-title">{{ $content->title }}</h1>
                    <p class="text-center text-muted">{{ $content->created_at->format('d M, Y') }}</p>
                    <hr class="custom-hr-title">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="page-description">{!! $content->body !!}</p>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-center">Imágenes del Contenido</h5>
                            <hr>
                            <div id="content-images" class="d-flex flex-wrap justify-content-around">
                                @if ($content->hasMedia('content_images'))
                                    @foreach($content->getMedia('content_images') as $image)
                                        <img src="{{ $content->first_content_image_url }}" class="img-fluid rounded shadow border border-success mt-3 mb-3 content-image" alt="Imagen del Contenido">
                                    @endforeach
                                @else
                                    <img src="{{ asset('/storage/imagenes/sistema/alt-de-una-imagen.png') }}" class="img-fluid rounded shadow border border-success mt-3 mb-3 content-image" alt="Imagen por defecto">
                                @endif
                            </div>
                            <h5 class="text-center mt-4">Audio del Contenido</h5>
                            <hr>
                            @if ($content->hasMedia('content_audio'))
                                <audio controls>
                                    <source src="{{ $content->first_content_audio_url }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            @else
                                <p class="text-center">No hay audio para mostrar.</p>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="text-center d-flex justify-content-around mt-4">
                        <a href="{{ route('contents.index') }}" class="btn btn-secondary">Atras</a>
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
    </style>
</x-app-layout>


