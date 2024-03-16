<!DOCTYPE html>
<html>
<head>
    <title>Restablecer contraseña</title>
    <style>
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: auto;
        }

        .logo {
            display: block;
            margin: auto;
        }

        .reset-link {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            background-color: #3490dc;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="email-container">
    <img class="logo" src="https://devricardoalvarez.com.co/images/sie-logo.webp" alt="Logo">

    <h1>Hola,</h1>
    <p>Recibimos una solicitud para restablecer tu contraseña. Si no hiciste esta solicitud, puedes ignorar este correo
        electrónico.</p>

    <a class="reset-link" href="https://devricardoalvarez.com.co/auth/reset-password?token={{ $token }}">Restablecer
        contraseña</a>

    <p>Si tienes problemas para hacer clic en el botón "Restablecer contraseña", copia y pega la URL a continuación en
        tu navegador web: https://https://devricardoalvarez.com.co/auth/reset-password?token={{ $token }}</p>

    <p>Gracias,<br>Soporte SIE APP</p>
</div>
</body>
</html>
