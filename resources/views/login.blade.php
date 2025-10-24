<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesión</title>
  <style>
    /* Fuente moderna y fondo suave */
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #74ABE2, #5563DE);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }

    /* Contenedor principal */
    .register-container {
      background-color: #fff;
      padding: 2.5rem;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    h2 {
      color: #333;
      margin-bottom: 1.5rem;
    }

    /* Campos del formulario */
    label {
      display: block;
      text-align: left;
      font-weight: 600;
      color: #444;
      margin-top: 1rem;
      margin-bottom: 0.3rem;
    }

    input[type="email"],
    input[type="password"],
    input[type="text"] {
      width: 100%;
      padding: 0.8rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      outline: none;
      transition: border-color 0.3s;
    }

    input:focus {
      border-color: #5563DE;
    }

    /* Botón */
    button {
      width: 100%;
      margin-top: 1.5rem;
      padding: 0.9rem;
      background-color: #5563DE;
      color: #fff;
      font-weight: 600;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background-color: #4352C0;
    }

    /* Mensajes de error */
    .alert {
      margin-top: 1rem;
      padding: 0.8rem;
      border-radius: 8px;
      text-align: left;
      font-weight: 500;
    }

    .alert-danger {
      background-color: #F8D7DA;
      color: #721C24;
      border: 1px solid #F5C6CB;
    }

    /* Mensaje de éxito */
    .alert-success {
      background-color: #D4EDDA;
      color: #155724;
      border: 1px solid #C3E6CB;
    }

    ul {
      margin: 0;
      padding-left: 1.2rem;
    }

    a {
      color: #5563DE;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <h2>Iniciar sesión</h2>

    <!-- Mensaje si se registro correctamente el usuario -->
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('loginUser') }}" method="POST">
      @csrf
      @method('post')

      <label for="email">Correo Electrónico</label>
      <input type="email" name="email" id="email" value="{{ old('email') }}" required>

      <label for="password">Contraseña</label>
      <input type="password" name="password" id="password" required>

      <div>
        <p>¿No tienes una cuenta? <a href="{{ route('showRegister') }}">Regístrate</a></p>
      </div>

      <button type="submit">Ingresar</button>
    </form>

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{!! $error !!}</li>
            @endforeach
          </ul>
      </div>
    @endif
  </div>
</body>
</html>
