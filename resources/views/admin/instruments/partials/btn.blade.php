<div class="container my-4">
    <div class="text-center d-flex justify-content-around">
        <a href="{{ route('instruments.show', $id) }}" class="btn-custom">Ver</a>
        <a href="{{ route('instruments.edit', $id) }}" class="btn-custompry">editar</a>
        <form action="{{ route('instruments.destroy', $id) }}" method="POST" style="display: inline" class="formulario-eliminar">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-customwar">Eliminar</button>
        </form>
    </div>
</div>






