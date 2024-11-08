<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Contenido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="main-container" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('contents.update', $content->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                @include('admin.contents.partials._form', ['content' => $content])
                            </div>
                            <div class="text-right">
                                <button class="btn btn-success" type="submit">Actualizar</button>
                            </div>
                        </form>
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
            color: #007bff;
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
            background-color: #007bff;
            width: 96% !important;
            margin: 15px auto;
            border-radius: 5px;
        }

        .content-image {
            max-width: 150px;
            padding: 5px;
            margin: 10px;
            border-radius: 5px;
            border: 2px solid #007bff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .formulario-eliminar button {
            display: inline-block;
        }

        .card {
            margin: 20px; /* Espacio entre el borde y el contenido */
        }

        .card-header {
            border-bottom: 2px solid #007bff; /* Añadir una línea de separación en la cabecera */
        }

        .mb-3 {
            margin-bottom: 1rem; /* Añadir espacio entre los elementos del formulario */
        }

        .text-right {
            text-align: right; /* Alinear el botón de actualizar a la derecha */
        }
    </style>
</x-app-layout>
