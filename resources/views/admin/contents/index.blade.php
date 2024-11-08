<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="main-container" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div>
                    <h2 class="mb-4">Contenido</h2>
                    <div>
                        <a href="{{ route('contents.create') }}" class="btn btn-custom">Nuevo</a>
                    </div>
                    <br>
                    <div>
                        <table id="contents-table" class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Tipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .data-table th, .data-table td {
            padding: 12px 15px;
            text-align: left;
            white-space: nowrap;
        }

        .data-table {
            width: 100%;
            table-layout: auto;
        }

        .data-table th, .data-table td {
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .container {
            padding: 0 15px;
        }

        .btn-custom {
            display: inline-block;
            font-weight: 400;
            color: #fff;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: #28a745;
            border: 1px solid #28a745;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .btn-custompry {
            display: inline-block;
            font-weight: 400;
            color: #fff;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: #22c0e7;
            border: 1px solid #22c0e7;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .btn-customwar{
            display: inline-block;
            font-weight: 400;
            color: #fff;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: #ce0616;
            border: 1px solid #ce0616;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.3/dist/sweetalert2.all.min.js"></script>
    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            console.log('Formulario de eliminación enviado');
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¡No podrás revertir esto!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, bórralo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('Confirmado');
                    this.submit();
                }
            });
        });
    </script>

    <script src="{{ asset('js/datatable-language.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#contents-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.contents.datatables') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'type', name: 'type' },
                    { data: 'btn', name: 'btn', orderable: false, searchable: false },
                ],
                language: datatableLanguage,
                responsive: true,
                autoWidth: false,
                scrollX: true,
            });
        });
    </script>
</x-app-layout>






