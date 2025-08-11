@extends('layout.base')

@section('content')

    <h1>Modifier les données de l'equipe {{$team->name}} </h1>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors as $error)
                    <li>{{ $error}}</li>
                @endforeach
            </ul>
        </div>
        
    @endif

    @if ($message = Session::get('success'))
        <p>
            {{$message}}
        </p>
        
    @endif


    
    <form action="{{route('teams.update', $team->id)}}" method="post" enctype="multipart/form-data">
        @csrf


        @method('PUT')

        <div>
            <label for="team_badge">Ecussson de l'équipe : </label>
            <input type="file" name="team_badge" id="team_badge" accept="image/*">
        </div>
        <br />
        
        <div>
            <label for="name">Nom de l'équipe : </label> 
            <input type="text" name="name" id="name" placeholder="saisir le nom de l'equipe ici..." value="{{ $team->name}}" required>
        </div>
        <br />

        <div>
            <label for="creation_date">Date de création : </label>
            <input type="date" name="creation_date" id="creation_date" value="{{$team->creation_date}}">
        </div>
        <br />


        <button type="submit">
            Metttre à jour
        </button>

    </form>
    
    <style>
        :root {
            --primary-color: #3498db;
            --primary-dark: #2980b9;
            --secondary-color: #2ecc71;
            --dark-color: #2c3e50;
            --light-color: #ecf0f1;
            --gray-color: #95a5a6;
            --danger-color: #e74c3c;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .form-header {
            background: linear-gradient(135deg, var(--primary-color), var(--dark-color));
            color: white;
            padding: 20px;
            text-align: center;
        }

        .form-header h1 {
            font-size: 1.8rem;
            margin-bottom: 5px;
        }

        .form-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark-color);
        }

        input[type="text"],
        input[type="date"],
        input[type="file"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        input[type="text"]:focus,
        input[type="date"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        input[type="file"] {
            padding: 10px;
            border: 2px dashed var(--gray-color);
            background-color: var(--light-color);
        }

        input[type="file"]:focus {
            border-color: var(--primary-color);
            background-color: white;
        }

        .file-preview {
            margin-top: 10px;
            text-align: center;
        }

        .file-preview img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 4px;
            border: 1px solid #ddd;
            display: none;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
        }

        .btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-block {
            display: block;
            width: 100%;
        }

        .form-footer {
            margin-top: 30px;
            text-align: center;
        }

        @media (max-width: 480px) {
            .container {
                margin: 15px auto;
                border-radius: 0;
            }
            
            .form-body {
                padding: 20px;
            }
        }
    </style>


@endsection
