<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/welcome.css">
    <title>PetCare</title>
</head>
<body>
    <div class="menusticky">
  <nav>
    <a href="#welcome">Inicio</a>
    <a href="#us">Sobre nosotros</a>
    <a href="#services">Nuestros servicios</a>
    <form method="POST" action="{{ route('form_pet') }}" class="nav-form">
        @csrf
        <a href="{{route('form_pet')}}">Registrar Mascota</a>
    </form>
    <a href="#clients-opinion">Opiniones</a>
    <form method="POST" action="{{ route('form_contact') }}" class="nav-form">
        @csrf
        <a href="{{route('form_contact')}}">Contacto</a>
    </form>
    <form method="POST" action="{{ route('form_user') }}" class="nav-form">
        @csrf
        <a href="{{route('form_user')}}">Acceder</a>
    </form>
  </nav>
</div>
<div id="welcome" class="section">
  <h2>Bienvenido a PetCare: tu aliado en el cuidado de tus mascotas</h2>
  <p>
    En <strong>PetCare</strong> creemos que cada mascota merece la mejor atención. Por eso hemos creado una aplicación web pensada especialmente para ti, el dueño responsable y amante de los animales. Con PetCare puedes organizar fácilmente las vacunas, visitas al veterinario, alimentación, paseos y mucho más, todo desde un mismo lugar.
  </p>
  <p>
    Mantén a tus compañeros peludos felices y saludables con recordatorios personalizados, consejos veterinarios actualizados y herramientas que simplifican su cuidado diario.
  </p>
  <p><em>Tu mascota más feliz. Tú más tranquilo.</em></p>
</div>
<div id="us" class="section">
  <h2>Sobre Nosotros</h2>
  <p><strong>Nuestra misión es mejorar la vida de las mascotas y sus familias.</strong></p>
  <p>
    PetCare nació de la pasión por los animales y la necesidad de hacer más sencillo su cuidado. Somos un equipo de desarrolladores, veterinarios y amantes de los animales comprometidos con crear una herramienta práctica, intuitiva y confiable.
  </p>
  <p>
    Sabemos que cada mascota es única, y por eso diseñamos PetCare para adaptarse a cada necesidad. Queremos ayudarte a ofrecerle a tu mascota una vida plena y saludable, facilitando la organización de sus cuidados y fortaleciendo el vínculo entre humanos y animales.
  </p>
  <p><em>Cuidar de tu mascota nunca fue tan fácil.</em></p>
</div>
<div id="services" class="section">
  <h2>Nuestros Servicios</h2>
  <p>
    En <strong>PetCare</strong> ponemos a tu disposición una serie de funciones pensadas para el bienestar y la organización del cuidado de tus mascotas:
  </p>
  <ul>
    <li>
      🐕 <strong>Registro de Mascotas:</strong> Guarda toda la información importante de cada mascota: nombre, raza, edad, historial médico, alergias, y más.
    </li>
    <li>
      💉 <strong>Control de Vacunas y Visitas:</strong> No vuelvas a olvidar una cita. Recibe recordatorios automáticos para vacunas, desparasitaciones y revisiones veterinarias.
    </li>
    <li>
      🍖 <strong>Gestión de Alimentación:</strong> Crea rutinas y registra dietas específicas para cada mascota, con recomendaciones personalizadas según su edad y condición.
    </li>
    <li>
      🚶 <strong>Seguimiento de Paseos y Actividades:</strong> Organiza los paseos y controla su actividad física para mantener un estilo de vida saludable.
    </li>
    <li>
      🩺 <strong>Consejos Veterinarios:</strong> Consulta información y tips avalados por profesionales sobre salud, comportamiento y bienestar animal.
    </li>
  </ul>
  <p><em>PetCare: la forma más inteligente de cuidar a quienes más amas.</em></p>
</div>
<div id="clients-opinion" class="section">
  <h2>Opiniones de Nuestros Usuarios</h2>
  <p>Descubre lo que dicen los dueños de mascotas que ya confían en <strong>PetCare</strong>.</p>

  <div class="opinion">
    <p class="opinion-text">
      “Desde que uso PetCare nunca más olvidé una vacuna. Me encanta recibir los recordatorios y tener todo el historial de mis dos perros en un solo lugar.”
    </p>
    <p class="opinion-author">— Laura Gómez, dueña de Max y Luna 🐶🐶</p>
  </div>

  <div class="opinion">
    <p class="opinion-text">
      “Como cuidadora de mascotas, PetCare me facilita muchísimo organizar las rutinas de paseo y alimentación. Es práctica, rápida y muy completa.”
    </p>
    <p class="opinion-author">— Andrés Rodríguez, cuidador profesional 🐕‍🦺</p>
  </div>

  <div class="opinion">
    <p class="opinion-text">
      “Tengo tres gatos y siempre era un caos recordar las fechas de sus vacunas. Con PetCare todo está bajo control. ¡Una app imprescindible para cualquier amante de los animales!”
    </p>
    <p class="opinion-author">— Mariana Pérez, amante de los gatos 🐈</p>
  </div>

  <div class="opinion">
    <p class="opinion-text">
      “Lo que más me gusta son los consejos veterinarios. Aprendí a mejorar la alimentación de mi perro y ahora está mucho más activo y feliz.”
    </p>
    <p class="opinion-author">— Carlos Díaz, dueño de Rocky 🦴</p>
  </div>
</div>    
</body>
</html>