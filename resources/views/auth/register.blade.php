<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Álbum Copa do Mundo</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .register-container {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        
        h1 {
            text-align: center;
            margin-bottom: 8px;
            color: #333;
            font-size: 28px;
        }
        
        .subtitle {
            text-align: center;
            color: #6c757d;
            margin-bottom: 24px;
            font-size: 14px;
        }
        
        .form-group {
            margin-bottom: 16px;
        }
        
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            transition: border-color 0.2s ease;
        }
        
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.25);
        }
        
        .error-message {
            color: #dc3545;
            font-size: 13px;
            margin-top: 4px;
        }
        
        .form-group.error input {
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
        
        .submit-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            border: none;
            border-radius: 4px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #6c757d;
        }
        
        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }

        .help-text {
            font-size: 12px;
            color: #6c757d;
            margin-top: 4px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Registrar</h1>
        <p class="subtitle">Álbum Copa do Mundo</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="form-group {{ $errors->has('name') ? 'error' : '' }}">
                <label for="name">Nome</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name') }}"
                    placeholder="Seu nome completo"
                    required
                >
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group {{ $errors->has('email') ? 'error' : '' }}">
                <label for="email">E-mail</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}"
                    placeholder="seu-email@exemplo.com"
                    required
                >
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group {{ $errors->has('password') ? 'error' : '' }}">
                <label for="password">Senha</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password"
                    placeholder="Mínimo 6 caracteres"
                    required
                >
                <div class="help-text">Mínimo 6 caracteres</div>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group {{ $errors->has('password_confirmation') ? 'error' : '' }}">
                <label for="password_confirmation">Confirmar Senha</label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation"
                    placeholder="Repita a senha"
                    required
                >
                @error('password_confirmation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="submit-btn">Registrar</button>
        </form>

        <div class="login-link">
            Já tem conta? <a href="{{ route('login') }}">Faça login aqui</a>
        </div>
    </div>
</body>
</html>
