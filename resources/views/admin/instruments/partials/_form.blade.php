<div class="row">
    <div class="col-8 form-group mb-3">
        <label for="name">Nombre del Instrumento</label>
        <input id="name" name="name" type="text" placeholder="Ej. Guitarra" class="form-control form-control-sm"
            value="{{ old('name', $instrument->name ?? '') }}" required autocomplete="name" />
        @error('name')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-4 form-group mb-3">
        <label for="category_id">Categoría del Instrumento</label>
        <select id="category_id" name="category_id" class="form-control form-control-sm" required>
            <option value="">Seleccione una categoría</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $instrument->category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-12 form-group mb-3">
        <label for="description">Descripción del Instrumento</label>
        <textarea id="description" name="description" placeholder="Ej. Detalles sobre el instrumento" class="form-control form-control-lg" rows="6" required>{{ old('description', $instrument->description ?? '') }}</textarea>
        @error('description')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-12 form-group mb-3">
        <label for="image" class="btn btn-primary btn-sm btn-block">
            <i class="fas fa-upload"></i> Cargar Imagen
            <input type="file" name="image" id="image" class="form-control-file d-none" accept="image/*">
        </label>
        @error('image')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div id="image-preview" class="mt-3"></div>
    </div>
</div>

<script>
    document.getElementById('image').addEventListener('change', function(e) {
        let preview = document.getElementById('image-preview');
        preview.innerHTML = ''; // Limpiar vista previa anterior
        let file = e.target.files[0];
        if (!file.type.startsWith('image/')) {
            alert('Solo se permiten archivos de imagen.');
            return;
        }
        let reader = new FileReader();
        reader.onload = function(event) {
            let img = document.createElement('img');
            img.src = event.target.result;
            img.className = 'img-thumbnail mb-2';
            img.style.maxWidth = '25%';
            img.style.height = 'auto';
            img.style.display = 'inline-block';
            preview.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
</script>




