<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Álbum Copa do Mundo</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
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
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
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
            box-shadow: 0 5px 20px rgba(37, 99, 235, 0.4);
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #6c757d;
        }

        .register-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Login</h1>
        <p class="subtitle">Álbum Copa do Mundo</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group {{ $errors->has('email') ? 'error' : '' }}">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    placeholder="seu-email@exemplo.com" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group {{ $errors->has('password') ? 'error' : '' }}">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" placeholder="Digite sua senha" required>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="submit-btn">Entrar</button>
        </form>

        <div class="register-link">
            Não tem conta? <a href="{{ route('register') }}">Registre-se aqui</a>
        </div>
    </div>
</body>

</html>