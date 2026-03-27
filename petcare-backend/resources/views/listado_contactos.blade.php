<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Listado de Contactos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #555;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #fafafa;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 12px;
            background-color: #3490dc;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #2779bd;
        }
        p {
            margin-top: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Listado de Contactos</h1>

    @if(count($registros) > 0)
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Dirección Secundaria</th>
                    <th>Sexo</th>
                    <th>Teléfono</th>
                    <th>Mensaje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro['nombre'] ?? '' }}</td>
                        <td>{{ $registro['apellidos'] ?? '' }}</td>
                        <td>{{ $registro['correo'] ?? '' }}</td>
                        <td>{{ $registro['direccion'] ?? '' }}</td>
                        <td>{{ $registro['direccion_secundaria'] ?? '' }}</td>
                        <td>{{ $registro['sexo'] ?? '' }}</td>
                        <td>{{ $registro['telefono'] ?? '' }}</td>
                        <td>{{ $registro['mensaje'] ?? '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay registros todavía.</p>
    @endif

    <a href="{{ route('form_contact') }}">Volver al formulario</a>
</body>
</html>
