<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mascotas Registradas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h2 {
            color: #2c3e50;
        }
        .message-success {
            color: green;
            margin: 15px 0;
            font-weight: bold;
            padding: 10px;
            background-color: #e6f4ea;
            border-radius: 4px;
            display: inline-block;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #fafafa;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 16px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        a:hover {
            background-color: #218838;
        }
        p {
            margin-top: 20px;
            font-style: italic;
            color: #666;
        }
        .boolean {
            font-weight: bold;
        }
        .boolean.si { color: green; }
        .boolean.no { color: red; }
    </style>
</head>
<body>

    <h2>Mascotas Registradas</h2>

    @if(session('mensaje'))
        <div class="message-success">{{ session('mensaje') }}</div>
    @endif

    @if(!empty($registros))
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Peso (kg)</th>
                    <th>Fecha Nac.</th>
                    <th>Chip</th>
                    <th>Esterilizado</th>
                    <th>Vacunado</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registros as $fila)
                    <tr>
                        <td>{{ $fila['nombre'] ?? '—' }}</td>
                        <td>{{ ucfirst($fila['especie'] ?? '') }}</td>
                        <td>{{ $fila['raza'] ?? '—' }}</td>
                        <td>{{ $fila['edad'] ?? '—' }}</td>
                        <td>{{ ucfirst($fila['sexo'] ?? '') }}</td>
                        <td>{{ isset($fila['peso']) ? number_format((float)$fila['peso'], 1) : '—' }}</td>
                        <td>{{ $fila['fecha_nacimiento'] ?? '—' }}</td>
                        <td>{{ $fila['chip'] ?? '—' }}</td>
                        <td>
                            @if(($fila['esterilizado'] ?? '0') == '1')
                                <span class="boolean si">Sí</span>
                            @else
                                <span class="boolean no">No</span>
                            @endif
                        </td>
                        <td>
                            @if(($fila['vacunado'] ?? '0') == '1')
                                <span class="boolean si">Sí</span>
                            @else
                                <span class="boolean no">No</span>
                            @endif
                        </td>
                        <td>{{ $fila['observaciones'] ?? '—' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay mascotas registradas aún.</p>
    @endif

    <a href="{{ route('form_pet') }}">Registrar Nueva Mascota</a>
</body>
</html>