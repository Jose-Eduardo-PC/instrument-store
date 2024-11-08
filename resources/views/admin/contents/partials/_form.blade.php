<div class="row">
    <div class="col-8 form-group mb-3">
        <label for="title">Título del Contenido</label>
        <input id="title" name="title" type="text" placeholder="Ej. Introducción al Contenido" class="form-control form-control-sm"
            value="{{ old('title', $content->title ?? '') }}" required autocomplete="title" />
        @error('title')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-4 form-group mb-3">
        <label for="type">Tipo de Contenido</label>
        <select id="type" name="type" class="form-control form-control-sm" required>
            <option value="">Seleccione un tipo</option>
            <option value="informativo" {{ old('type', $content->type ?? '') == 'informativo' ? 'selected' : '' }}>Informativo</option>
            <option value="cultural" {{ old('type', $content->type ?? '') == 'cultural' ? 'selected' : '' }}>Cultural</option>
            <option value="educacion" {{ old('type', $content->type ?? '') == 'educacion' ? 'selected' : '' }}>Educación</option>
        </select>
        @error('type')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-12 form-group mb-3">
        <label for="body">Cuerpo del Contenido</label>
        <textarea id="body" name="body" placeholder="Ej. Detalles sobre el contenido" class="form-control form-control-lg" rows="6" required>{{ old('body', $content->body ?? '') }}</textarea>
        @error('body')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-6 form-group mb-3">
        <label for="images" class="btn btn-primary btn-sm btn-block">
            <i class="fas fa-upload"></i> Cargar Imágenes
            <input type="file" name="images[]" id="images" multiple class="form-control-file d-none" accept="image/*">
        </label>
        @error('images')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div id="preview" class="mt-3"></div>
    </div>
    <div class="col-6 form-group mb-3">
        <label for="audio" class="btn btn-primary btn-sm btn-block">
            <i class="fas fa-upload"></i> Cargar Audio
            <input type="file" name="audio" id="audio" class="form-control-file d-none" accept="audio/*">
        </label>
        @error('audio')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div id="audio-preview" class="mt-3"></div>
    </div>
    <div class="col-12 form-group mb-3">
        <label for="video" class="btn btn-primary btn-sm btn-block">
            <i class="fas fa-upload"></i> Cargar Video
            <input type="file" name="video" id="video" class="form-control-file d-none" accept="video/*">
        </label>
        @error('video')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div id="video-preview" class="mt-3"></div>
    </div>
</div>

<script>
    document.getElementById('images').addEventListener('change', function(e) {
        let preview = document.getElementById('preview');
        preview.innerHTML = ''; // Limpiar vista previa anterior
        for (let i = 0; i < e.target.files.length; i++) {
            let file = e.target.files[i];
            if (!file.type.startsWith('image/')) {
                alert('Solo se permiten archivos de imagen.');
                continue;
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
        }
    });

    document.getElementById('audio').addEventListener('change', function(e) {
        let preview = document.getElementById('audio-preview');
        preview.innerHTML = ''; // Limpiar vista previa anterior
        let file = e.target.files[0];
        if (!file.type.startsWith('audio/')) {
            alert('Solo se permiten archivos de audio.');
            return;
        }
        let reader = new FileReader();
        reader.onload = function(event) {
            let audio = document.createElement('audio');
            audio.src = event.target.result;
            audio.controls = true;
            preview.appendChild(audio);
        };
        reader.readAsDataURL(file);
    });

    document.getElementById('video').addEventListener('change', function(e) {
        let preview = document.getElementById('video-preview');
        preview.innerHTML = ''; // Limpiar vista previa anterior
        let file = e.target.files[0];
        if (!file.type.startsWith('video/')) {
            alert('Solo se permiten archivos de video.');
            return;
        }
        let reader = new FileReader();
        reader.onload = function(event) {
            let video = document.createElement('video');
            video.src = event.target.result;
            video.controls = true;
            video.style.maxWidth = '50%';
            video.style.height = 'auto';
            preview.appendChild(video);
        };
        reader.readAsDataURL(file);
    });
</script>


