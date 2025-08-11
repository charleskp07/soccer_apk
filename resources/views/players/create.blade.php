@extends('layout.base')
{{-- 
@section('content')
    <h1>Ajouter un joueur</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('players.store')}}" method="post" enctype="multipart/form-data">
    

        @csrf

        <div>
            <label for="team_id">Equipe</label>
            <select name="team_id" id="team_id" required>
                <option value="">Sélectionner une équipe</option>
                @foreach ($teams as $team)
                    <option value="{{$team->id}}">
                        {{$team->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <br />

        <div>
            <label for="">Photo d'identité : </label>
            <input type="file" name="passport_photo" id="passport_photo" accept="image/*">
        </div>
        <br />
        
        <div>
            <label for="lastname">Nom de famille </label>
            <input type="text" name="lastname" id="lastname" placeholder="saisir le nom de famille ici..." value="{{old('lastname')}}" required>
        </div>
        <br />

        <div>
            <label for="firstname">Prénoms </label>
            <input type="text" name="firstname" id="firstname" placeholder="saisir le nom de famille ici..." value="{{old('firstname')}}" required>
        </div>
        <br />

        <div>
            <label for="age">Âge </label>
            <input type="number" name="age" id="age" placeholder="saisir l'âge ici..." value="{{old('age')}}" required>
        </div>

        <br /> 

        <div>
            <label for="weight">Poids </label>
            <input type="number" name="weight" id="weight" step="0.1" placeholder="saisir le poids ici..." value="{{old('weight')}}">
        </div>
        <br /> 

        <div>
            <label for="size">Taille </label>
            <input type="number" name="size" id="size"  country_of_origin>
        </div>

        <br />
        <div>
            <label for="country_of_origin">Pays d'origine</label>
            <input type="text" name="country_of_origin" id="country_of_origin" placeholder="saisir le pays d'origine ici..." value="{{old('country_of_origin')}}">
        </div>

        <br />
        <button type="submit">
            Ajouter
        </button>


    </form>
@endsection
 --}}


@section('content')
    <div class="player-form-container">
        <h1 class="form-title">Ajouter un joueur</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <h3 class="alert-title">Erreurs de validation</h3>
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('players.store')}}" method="post" enctype="multipart/form-data" class="player-form">
            @csrf

            <div class="form-section">
                <h2 class="section-title">Informations générales</h2>
                
                <div class="form-group">
                    <label for="team_id" class="form-label">Équipe *</label>
                    <select name="team_id" id="team_id" class="form-select" required>
                        <option value="">Sélectionner une équipe</option>
                        @foreach ($teams as $team)
                            <option value="{{$team->id}}" {{ old('team_id') == $team->id ? 'selected' : '' }}>
                                {{$team->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="passport_photo" class="form-label">Photo d'identité</label>
                    <div class="file-upload">
                        <input type="file" name="passport_photo" id="passport_photo" accept="image/*" class="file-input">
                        <label for="passport_photo" class="file-label">
                            <i class="fas fa-cloud-upload-alt"></i> Choisir un fichier
                        </label>
                        <span class="file-name" id="file-name">Aucun fichier sélectionné</span>
                    </div>
                    <div class="image-preview" id="image-preview"></div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">Informations personnelles</h2>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="lastname" class="form-label">Nom de famille *</label>
                        <input type="text" name="lastname" id="lastname" class="form-input" 
                               placeholder="Saisir le nom de famille..." value="{{old('lastname')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="form-label">Prénoms *</label>
                        <input type="text" name="firstname" id="firstname" class="form-input" 
                               placeholder="Saisir les prénoms..." value="{{old('firstname')}}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="age" class="form-label">Âge *</label>
                        <input type="number" name="age" id="age" class="form-input" 
                               placeholder="Saisir l'âge..." value="{{old('age')}}" required min="16" max="50">
                    </div>

                    <div class="form-group">
                        <label for="country_of_origin" class="form-label">Pays d'origine</label>
                        <input type="text" name="country_of_origin" id="country_of_origin" class="form-input" 
                               placeholder="Saisir le pays d'origine..." value="{{old('country_of_origin')}}">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">Caractéristiques physiques</h2>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="weight" class="form-label">Poids (kg)</label>
                        <input type="number" name="weight" id="weight" class="form-input" step="0.1"
                               placeholder="Saisir le poids..." value="{{old('weight')}}" min="50" max="120">
                    </div>

                    <div class="form-group">
                        <label for="size" class="form-label">Taille (cm)</label>
                        <input type="number" name="size" id="size" class="form-input" 
                               placeholder="Saisir la taille..." value="{{old('size')}}" min="150" max="220">
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="submit-btn">
                    <i class="fas fa-user-plus"></i> Ajouter le joueur
                </button>
            </div>
        </form>
    </div>

    <style>
        /* Variables */
        :root {
            --primary-color: #3498db;
            --primary-dark: #2980b9;
            --secondary-color: #2ecc71;
            --danger-color: #e74c3c;
            --warning-color: #f39c12;
            --dark-color: #2c3e50;
            --light-color: #ecf0f1;
            --gray-color: #95a5a6;
            --border-radius: 6px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        /* Base Styles */
        .player-form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-title {
            color: var(--dark-color);
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            position: relative;
            padding-bottom: 10px;
        }

        .form-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: var(--primary-color);
        }

        /* Alert Styles */
        .alert {
            padding: 15px;
            border-radius: var(--border-radius);
            margin-bottom: 30px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-title {
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .error-list {
            padding-left: 20px;
        }

        .error-list li {
            margin-bottom: 5px;
        }

        /* Form Styles */
        .player-form {
            background: white;
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .form-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .form-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .section-title {
            color: var(--primary-dark);
            margin-bottom: 20px;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
        }

        .section-title::before {
            content: '';
            display: inline-block;
            width: 5px;
            height: 20px;
            background: var(--primary-color);
            margin-right: 10px;
            border-radius: 3px;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 15px;
        }

        .form-row .form-group {
            flex: 1;
            min-width: 250px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark-color);
        }

        .form-input, .form-select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-input:focus, .form-select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        /* File Upload */
        .file-upload {
            position: relative;
            margin-bottom: 10px;
        }

        .file-input {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .file-label {
            display: inline-block;
            padding: 12px 20px;
            background-color: var(--light-color);
            color: var(--dark-color);
            border: 2px dashed var(--gray-color);
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .file-label:hover {
            background-color: #e0e0e0;
            border-color: var(--primary-color);
        }

        .file-name {
            display: block;
            margin-top: 5px;
            font-size: 0.9rem;
            color: var(--gray-color);
        }

        .image-preview {
            margin-top: 15px;
            display: none;
        }

        .image-preview img {
            max-width: 150px;
            max-height: 150px;
            border-radius: var(--border-radius);
            border: 1px solid #ddd;
        }

        /* Submit Button */
        .form-actions {
            text-align: center;
            margin-top: 30px;
        }

        .submit-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 30px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            background: linear-gradient(135deg, var(--primary-dark), var(--dark-color));
        }

        /* Responsive */
        @media (max-width: 768px) {
            .player-form {
                padding: 20px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 15px;
            }
            
            .form-row .form-group {
                min-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .form-title {
                font-size: 1.6rem;
            }
            
            .player-form-container {
                padding: 20px 10px;
            }
        }
    </style>

    <script>
        // Aperçu du fichier image
        document.getElementById('passport_photo').addEventListener('change', function(e) {
            const fileName = document.getElementById('file-name');
            const preview = document.getElementById('image-preview');
            
            if (this.files.length > 0) {
                fileName.textContent = this.files[0].name;
                
                // Afficher l'aperçu de l'image
                if (this.files[0].type.match('image.*')) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        preview.innerHTML = '<img src="' + e.target.result + '" alt="Aperçu de l\'image">';
                        preview.style.display = 'block';
                    }
                    
                    reader.readAsDataURL(this.files[0]);
                } else {
                    preview.style.display = 'none';
                }
            } else {
                fileName.textContent = 'Aucun fichier sélectionné';
                preview.style.display = 'none';
            }
        });
    </script>
@endsection


