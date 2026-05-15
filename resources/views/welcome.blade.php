<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Álbum Copa do Mundo</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(180deg, #eff6ff 0%, #dbeafe 100%);
            color: #111827;
        }
        .page {
            width: min(100%, 980px);
            padding: 36px;
            border-radius: 24px;
            background: #ffffff;
            box-shadow: 0 28px 80px rgba(15, 23, 42, 0.12);
            display: grid;
            gap: 32px;
        }
        .hero {
            display: grid;
            gap: 20px;
        }
        h1 {
            font-size: clamp(2rem, 3vw, 3.25rem);
            line-height: 1.05;
            color: #1d4ed8;
        }
        p {
            max-width: 660px;
            font-size: 1rem;
            line-height: 1.75;
            color: #475569;
        }
        .nav-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            align-items: center;
        }
        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 14px 24px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 700;
            transition: transform 0.2s ease, background-color 0.2s ease;
        }
        .button.primary {
            background: #2563eb;
            color: #ffffff;
        }
        .button.primary:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }
        .button.secondary {
            background: #e0efff;
            color: #1d4ed8;
            border: 1px solid #bfdbfe;
        }
        .button.secondary:hover {
            background: #dbeafe;
            transform: translateY(-1px);
        }
        .feature-grid {
            display: grid;
            gap: 18px;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        }
        .feature-card {
            padding: 22px;
            border-radius: 18px;
            border: 1px solid #dbeafe;
            background: #f8fbff;
            min-height: 160px;
        }
        .feature-card h2 {
            margin-bottom: 10px;
            font-size: 1.1rem;
            color: #1e40af;
        }
        .feature-card p {
            color: #475569;
        }
        .small-note {
            font-size: 0.95rem;
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="page">
        <section class="hero">
            <div>
                <h1>Álbum Copa do Mundo</h1>
                <p>Bem-vindo ao sistema de gerenciamento do álbum de figurinhas. Aqui você pode cadastrar jogadores, países, número da figurinha, time e imagem de cada carta.</p>
            </div>
            <div class="nav-actions">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('figurinhas.index') }}" class="button primary">Ver meu álbum</a>
                    @else
                        <a href="{{ route('login') }}" class="button primary">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="button secondary">Registrar</a>
                        @endif
                    @endauth
                @endif
            </div>
        </section>

        <section class="feature-grid">
            <div class="feature-card">
                <h2>Cadastro de figurinhas</h2>
                <p>Adicione novos jogadores com nome, país, número, time e imagem. Tudo para organizar seu álbum de forma completa.</p>
            </div>
            <div class="feature-card">
                <h2>Editar e excluir</h2>
                <p>Atualize informações ou remova figurinhas do álbum sempre que precisar, direto pela interface.</p>
            </div>
            <div class="feature-card">
                <h2>Login seguro</h2>
                <p>Controle o acesso com autenticação e mantenha seu álbum privado até você entrar no sistema.</p>
            </div>
        </section>
        <p class="small-note">Se já tiver uma conta, faça login. Caso contrário, registre-se para começar a usar o álbum.</p>
    </div>
</body>
</html>
