<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/form_contact.css">
    <title>PetCare - Contacto</title>
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
            <h2>Formulario de Contacto</h2>
            <form action="{{ route('contacto.enviar') }}" method="POST">
                @csrf
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Ej: Diego">

                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" required placeholder="Ej: Perez Perera">

                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" required placeholder="Ej: ejemplo@ejemplo.com">

                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" required placeholder="Ej: C/ Plaza Barranco la Ballena">

                <label for="direccion_secundaria">Dirección Secundaria:</label>
                <input type="text" id="direccion_secundaria" name="direccion_secundaria" placeholder="Opcional">

                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo" required>
                    <option value="hombre">Hombre</option>
                    <option value="mujer">Mujer</option>
                </select>

                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" pattern="[0-9]{9}" required placeholder="Ej: 123456789">

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="4" placeholder="Escribe tu mensaje aquí..."></textarea>

                <button type="submit">Enviar</button>
                  <button type="button" class="back-btn"><a href="{{ route('welcome') }}">Volver</a></button>
                    
            </form>

            @if(session('mensaje'))
                <p style="color: green; text-align: center; margin-top: 1rem;">{{ session('mensaje') }}</p>
            @endif

              <!-- Botón para ver la tabla de registros -->
            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ route('contacto.registros') }}" style="padding: 10px 15px; background-color: #3490dc; color: white; text-decoration: none; border-radius: 5px;">Ver todos los contactos</a>
            </div>
        </div>
    </div>
</body>
</html>