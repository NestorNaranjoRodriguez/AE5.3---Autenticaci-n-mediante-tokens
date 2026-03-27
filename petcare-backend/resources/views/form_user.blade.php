<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticación</title>
    <link rel="stylesheet" href="/css/form_usuario.css">
</head>
<body>
    <div class="wrapper">
        <div class="card-switch">
            <label class="switch">
                <input class="toggle" type="checkbox">
                <span class="slider"></span>
                <span class="card-side"></span>
                <div class="flip-card__inner">
                    <div class="flip-card__front">
                        <div class="title">Iniciar Sesión</div>
                        <form action="{{ route('login') }}" method="POST" class="flip-card__form">
                            @csrf
                            <input type="email" placeholder="Email" name="email" class="flip-card__input" required>
                            <input type="password" placeholder="Contraseña" name="password" class="flip-card__input" required>
                            <button type="submit" class="flip-card__btn">Acceder</button>
                            <button type="button" onclick="window.history.back();" class="back-btn">Volver</button>
                        </form>
                    </div>
                    <div class="flip-card__back">
                        <div class="title">Registrarse</div>
                        <form action="{{ route('register') }}" method="POST" class="flip-card__form">
                            @csrf
                            <input type="text" placeholder="Nombre" name="name" class="flip-card__input" required>
                            <input type="email" placeholder="Email" name="email" class="flip-card__input" required>
                            <input type="password" placeholder="Contraseña" name="password" class="flip-card__input" required>
                            <input type="password" placeholder="Confirmar contraseña" name="password_confirmation" class="flip-card__input" required>
                            <button type="submit" class="flip-card__btn">Crear</button>
                            <button type="button" onclick="window.history.back();" class="back-btn">Volver</button>
                        </form>
                    </div>
                </div>
            </label>
        </div>   
    </div>
</body>
</html>