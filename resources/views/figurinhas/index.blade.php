<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Figurinhas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 24px;
            background: #f8f9fa;
            color: #333;
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
    </style>
</head>

<body>
    <div class="topo">
        <h1>Catálogo de Figurinhas</h1>
        <a href="{{ route('figurinhas.create') }}" class="btn">Nova Figurinha</a>
    </div>

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
                        <a href="{{ route('figurinhas.edit', $figurinha) }}">Editar</a>
                        |
                        <form action="{{ route('figurinhas.destroy', $figurinha) }}" method="POST"
                            style="display:inline-block; margin:0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="background:none; border:none; color:#dc3545; cursor:pointer; padding:0;">Excluir</button>
                        </form>
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