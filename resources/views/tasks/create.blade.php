<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f4f8;
            padding: 20px;
        }

        .form-container {
            background-color: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #007BFF;
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            background-color: #f8d7da;
            color: #842029;
            padding: 15px 20px;
            border-radius: 6px;
            margin-top: 20px;
        }

        .alert ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        .alert li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>Crear Tarea</h1>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            @method('post')

            <div>
                <label for="title">Título</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            </div>
            <div>
                <label for="description">Descripción</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
            </div>
            <button type="submit">Crear Tarea</button>
        </form>

        @if ($errors->any())
          <div class="alert">
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
