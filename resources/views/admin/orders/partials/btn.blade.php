<div class="container my-4">
    <div class="text-center d-flex justify-content-around">
        <a href="{{ route('orders.show', $id) }}" class="btn-custom">Ver</a>
        <a href="{{ route('orders.edit', $id) }}" class="btn-custompry">editar</a>
        <form action="{{ route('orders.destroy', $id) }}" method="POST" style="display: inline" class="formulario-eliminar">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-customwar">Eliminar</button>
        </form>
    </div>
</div>






