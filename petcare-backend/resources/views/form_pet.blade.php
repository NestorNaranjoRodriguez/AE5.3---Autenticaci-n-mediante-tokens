<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/form_contact.css">
    <title>PetCare - Registro de Mascotas</title>
</head>
<body>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                <div>
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            </ul>
        </div>
    @endif
    <div id="contact" class="section">
        <div class="formulario-container">
            <h2>Registrar Nueva Mascota</h2>
            <form action="{{ route('pet.enviar') }}" method="POST">
                @csrf

                <label for="nombre">Nombre de la Mascota:</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Ej: Firulais">

                <label for="especie">Especie:</label>
                <select id="especie" name="especie" required>
                    <option value="">Seleccione una especie</option>
                    <option value="perro">Perro</option>
                    <option value="gato">Gato</option>
                    <option value="conejo">Conejo</option>
                    <option value="ave">Ave</option>
                    <option value="roedor">Roedor</option>
                    <option value="reptil">Reptil</option>
                    <option value="otro">Otro</option>
                </select>

                <label for="raza">Raza (opcional):</label>
                <input type="text" id="raza" name="raza" placeholder="Ej: Labrador, Persa">

                <label for="edad">Edad (años humanos):</label>
                <input type="number" id="edad" name="edad" min="0" max="30" required placeholder="Ej: 3">

                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo" required>
                    <option value="macho">Macho</option>
                    <option value="hembra">Hembra</option>
                    <option value="desconocido">Desconocido</option>
                </select>

                <label for="peso">Peso (kg):</label>
                <input type="number" step="0.1" id="peso" name="peso" min="0.1" required placeholder="Ej: 8.5">

                <label for="fecha_nacimiento">Fecha de Nacimiento (opcional):</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">

                <label for="chip">Número de Chip (opcional):</label>
                <input type="text" id="chip" name="chip" placeholder="Ej: 123456789012345">

                <label for="esterilizado">¿Está esterilizado/a?</label>
                <select id="esterilizado" name="esterilizado" required>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>

                <label for="vacunado">¿Está al día con las vacunas?</label>
                <select id="vacunado" name="vacunado" required>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>

                <label for="observaciones">Observaciones (alergias, medicación, etc.):</label>
                <textarea id="observaciones" name="observaciones" rows="4" placeholder="Ej: Alergia al polen, toma medicación diaria..."></textarea>

                <button type="submit">Registrar Mascota</button>
                <button type="button" class="back-btn"><a href="{{ route('welcome') }}">Volver</a></button>
            </form>

            @if(session('mensaje'))
                <p style="color: green; text-align: center; margin-top: 1rem;">{{ session('mensaje') }}</p>
            @endif

            <!-- Botón para ver la tabla de registros de mascotas -->
            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ route('pet.registros') }}" style="padding: 10px 15px; background-color: #3490dc; color: white; text-decoration: none; border-radius: 5px;">Ver todas las mascotas registradas</a>
            </div>
        </div>
    </div>
</body>
</html>