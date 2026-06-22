<?php
if(isset($_POST['enviar'])){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];
    ?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mensaje Enviado - Pizza Róga</title>
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #FFF3E0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            .popup {
                background: white;
                border-radius: 15px;
                padding: 40px;
                text-align: center;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
                animation: aparecer 0.8s ease;
            }

            @keyframes aparecer {
                from { transform: scale(0.8); opacity: 0; }
                to { transform: scale(1); opacity: 1; }
            }

            .popup h2 {
                color: #8B4513;
                margin-bottom: 10px;
            }

            .popup p {
                color: #4E342E;
                margin-bottom: 25px;
            }

            .popup button {
                background-color: #8B4513;
                color: white;
                border: none;
                padding: 10px 25px;
                border-radius: 8px;
                cursor: pointer;
                font-size: 16px;
                transition: background 0.3s;
            }

            .popup button:hover {
                background-color: #A0522D;
            }

            .checkmark {
                font-size: 50px;
                color: #4CAF50;
                animation: bounce 0.7s ease;
            }

            @keyframes bounce {
                0% { transform: scale(0); }
                60% { transform: scale(1.2); }
                100% { transform: scale(1); }
            }
        </style>
    </head>
    <body>
        <div class="popup">
            <div class="checkmark">✔️</div>
            <h2>¡Mensaje Enviado!</h2>
            <p>Gracias <strong><?php echo htmlspecialchars($nombre); ?></strong>, tu mensaje fue recibido correctamente.</p>
            <button onclick="volver()">Volver al sitio</button>
        </div>

        <script>
            function volver(){
                window.location.href = 'contact.php';
            }
        </script>
    </body>
    </html>

    <?php
} else {
    header("Location: contact.php");
    exit;
}
?>
