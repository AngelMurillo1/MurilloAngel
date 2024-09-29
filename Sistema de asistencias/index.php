<!DOCTYPE html>
<html>
<head>
    <title>Login - Sistema de Asistencias</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .toggle {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    

    <form action="LogIn/procesar_login.php" method="POST">
    <h2>Iniciar Sesión</h2>
        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Contraseña:</label>
        <input type="password" name="contraseña" required><br>

        <button type="submit">Ingresar</button>
        <p>¿No tienes una cuenta? <a href="LogIn/registro.php">Regístrate aquí</a></p>
    </form>

    
</body>
</html>
