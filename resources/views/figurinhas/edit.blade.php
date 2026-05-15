<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Figurinha</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            color: #333;
            padding: 24px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            margin-bottom: 24px;
        }

        h1 {
            margin-bottom: 8px;
            font-size: 28px;
        }

        .breadcrumb {
            font-size: 14px;
            color: #6c757d;
        }

        .breadcrumb a {
            color: #007bff;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="file"]:focus,
        textarea:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25);
        }

        .required {
            color: #dc3545;
        }

        .image-preview {
            margin-top: 8px;
            max-width: 150px;
            border-radius: 4px;
            border: 1px solid #dee2e6;
            padding: 4px;
        }

        .current-image-wrapper {
            margin-bottom: 12px;
        }

        .current-image-label {
            font-size: 12px;
            color: #6c757d;
            margin-bottom: 4px;
            display: block;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        button {
            flex: 1;
            padding: 10px 16px;
            font-size: 14px;
            font-weight: 600;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .btn-primary {
            background: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .btn-secondary {
            background: #6c757d;
            color: #fff;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-secondary:hover {
            background: #545b62;
        }

        .error-message {
            color: #dc3545;
            font-size: 13px;
            margin-top: 4px;
        }

        .form-group.error input,
        .form-group.error textarea {
            border-color: #dc3545;
        }

        .alert {
            padding: 12px 16px;
            margin-bottom: 16px;
            border-radius: 4px;
            font-size: 14px;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .help-text {
            font-size: 12px;
            color: #6c757d;
            margin-top: 4px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Editar Figurinha</h1>
            <div class="breadcrumb">
                <a href="{{ route('figurinhas.index') }}">Catálogo</a> / Editar
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erro ao validar o formulário:</strong>
                <ul style="margin-top: 8px; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('figurinhas.update', $figurinha) }}" method="POST" enctype="multipart/form-data"
            id="formFigurinha">
            @csrf
            @method('PUT')

            <div class="form-group {{ $errors->has('nome') ? 'error' : '' }}">
                <label for="nome">Nome <span class="required">*</span></label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $figurinha->nome) }}"
                    placeholder="Ex: Cristiano Ronaldo" required>
                @error('nome')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group {{ $errors->has('pais') ? 'error' : '' }}">
                <label for="pais">País <span class="required">*</span></label>
                <input type="text" id="pais" name="pais" value="{{ old('pais', $figurinha->pais) }}"
                    placeholder="Ex: Portugal" required>
                @error('pais')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group {{ $errors->has('numero') ? 'error' : '' }}">
                <label for="numero">Número <span class="required">*</span></label>
                <input type="number" id="numero" name="numero" value="{{ old('numero', $figurinha->numero) }}"
                    placeholder="Ex: 1" min="1" required>
                <div class="help-text">O número deve ser único</div>
                @error('numero')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group {{ $errors->has('time') ? 'error' : '' }}">
                <label for="time">Time <span class="required">*</span></label>
                <input type="text" id="time" name="time" value="{{ old('time', $figurinha->time) }}"
                    placeholder="Ex: Manchester United" required>
                @error('time')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group {{ $errors->has('imagem') ? 'error' : '' }}">
                <label>Imagem</label>

                @if ($figurinha->imagem)
                    <div class="current-image-wrapper">
                        <span class="current-image-label">Imagem Atual:</span>
                        <img src="{{ asset('storage/' . $figurinha->imagem) }}" alt="{{ $figurinha->nome }}"
                            class="image-preview">
                    </div>
                @endif

                <label for="imagem">Alterar Imagem</label>
                <input type="file" id="imagem" name="imagem" accept="image/jpeg,image/png,image/jpg,image/gif">
                <div class="help-text">Formatos aceitos: JPEG, PNG, JPG, GIF (máx. 2MB). Deixe em branco para manter a
                    imagem atual.</div>
                @error('imagem')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">Atualizar Figurinha</button>
                <a href="{{ route('figurinhas.index') }}" class="btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('formFigurinha').addEventListener('submit', function (e) {
            const nome = document.getElementById('nome').value.trim();
            const pais = document.getElementById('pais').value.trim();
            const numero = document.getElementById('numero').value.trim();
            const time = document.getElementById('time').value.trim();

            if (!nome) {
                e.preventDefault();
                alert('Por favor, preencha o campo Nome');
                return;
            }

            if (!pais) {
                e.preventDefault();
                alert('Por favor, preencha o campo País');
                return;
            }

            if (!numero || numero <= 0) {
                e.preventDefault();
                alert('Por favor, preencha o campo Número com um valor válido');
                return;
            }

            if (!time) {
                e.preventDefault();
                alert('Por favor, preencha o campo Time');
                return;
            }

            const imagem = document.getElementById('imagem').files[0];
            if (imagem && imagem.size > 2 * 1024 * 1024) {
                e.preventDefault();
                alert('A imagem não pode exceder 2MB');
                return;
            }
        });
    </script>
</body>

</html>