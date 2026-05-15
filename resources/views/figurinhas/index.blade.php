<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Figurinhas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f8f9fa;
            color: #333;
        }

        .navbar {
            background: #007bff;
            padding: 16px 24px;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar h2 {
            margin: 0;
            font-size: 20px;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .navbar-user span {
            font-size: 14px;
        }

        .navbar-user form {
            margin: 0;
        }

        .btn-logout {
            background: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: background 0.2s ease;
        }

        .btn-logout:hover {
            background: #c82333;
        }

        .container {
            padding: 24px;
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            margin-bottom: 16px;
        }

        .topo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 14px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }

        th,
        td {
            padding: 10px 12px;
            border: 1px solid #dee2e6;
            text-align: left;
        }

        th {
            background: #e9ecef;
        }

        img {
            max-width: 80px;
            border-radius: 4px;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.85rem;
        }

        .badge-sim {
            background: #28a745;
            color: #fff;
        }

        .badge-nao {
            background: #6c757d;
            color: #fff;
        }

        .placeholder {
            color: #6c757d;
        }

        .alert {
            padding: 12px 16px;
            margin-bottom: 16px;
            border-radius: 4px;
            font-size: 14px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .actions a,
        .actions button {
            font-size: 13px;
            text-decoration: none;
            padding: 4px 8px;
            border-radius: 3px;
            border: none;
            cursor: pointer;
        }

        .actions a.edit {
            background: #007bff;
            color: #fff;
        }

        .actions a.edit:hover {
            background: #0056b3;
        }

        .actions button.delete {
            background: #dc3545;
            color: #fff;
        }

        .actions button.delete:hover {
            background: #c82333;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <h2>🏆 Álbum Copa do Mundo</h2>
        <div class="navbar-user">
            <span>{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-logout">Sair</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="topo">
            <h1>Catálogo de Figurinhas</h1>
            <a href="{{ route('figurinhas.create') }}" class="btn">Nova Figurinha</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>País</th>
                    <th>Número</th>
                    <th>Time</th>
                    <th>Imagem</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($figurinhas as $figurinha)
                    <tr>
                        <td>{{ $figurinha->id }}</td>
                        <td>
                            @if ($figurinha->imagem)
                                <img src="{{ asset('storage/' . $figurinha->imagem) }}" alt="{{ $figurinha->nome }}">
                            @else
                                <span class="placeholder">sem imagem</span>
                            @endif
                        </td>
                        <td>{{ $figurinha->nome }}</td>
                        <td>{{ $figurinha->pais }}</td>
                        <td>{{ $figurinha->numero }}</td>
                        <td>{{ $figurinha->time }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('figurinhas.edit', $figurinha) }}" class="edit">Editar</a>
                                <form action="{{ route('figurinhas.destroy', $figurinha) }}" method="POST"
                                    style="display:inline-block; margin:0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete"
                                        onclick="return confirm('Tem certeza que deseja excluir esta figurinha?');">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Nenhuma figurinha cadastrada ainda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
</body>

</html>