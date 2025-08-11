@extends('layout.base')
{{-- 
@section('content')
    <h1> Modifier les données du joueur {{$player->lastname}}</h1>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('players.update', $player->id)}}" method="post" enctype="multipart/form-data">
    

        @csrf

        @method('PUT')

        <div>
            <label for="team_id">Equipe</label>
            <select name="team_id" id="team_id" required>
                <option value="{{$player->team->name}}">Sélectionner une équipe</option>
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
            <input type="text" name="lastname" id="lastname" placeholder="saisir le nom de famille ici..." value="{{$player->lastname}}" required>
        </div>
        <br />

        <div>
            <label for="firstname">Prénoms </label>
            <input type="text" name="firstname" id="firstname" placeholder="saisir le nom de famille ici..." value="{{$player->firstname}}" required>
        </div>
        <br />

        <div>
            <label for="age">Âge </label>
            <input type="number" name="age" id="age" placeholder="saisir l'âge ici..." value="{{$player->age}}" required>
        </div>

        <br /> 

        <div>
            <label for="weight">Poids </label>
            <input type="number" name="weight" id="weight" step="0.1" placeholder="saisir le poids ici..." value="{{$player->weight}}">
        </div>
        <br /> 

        <div>
            <label for="size">Taille </label>
            <input type="number" name="size" id="size" placeholder="saisir la taille ici..." value="{{$player->size}}" >
        </div>

        <br />
        <div>
            <label for="country_of_origin">Pays d'origine</label>
            <input type="text" name="country_of_origin" id="country_of_origin" placeholder="saisir le pays d'origine ici..." value="{{$player->country_of_origin}}">
        </div>

        <br />
        <button type="submit">
            Ajouter
        </button>


    </form>

@endsection
 --}}

@section('content')
    <div class="player-edit-container">
        <h1 class="edit-title">Modifier les données du joueur <span class="player-name-highlight">{{$player->lastname}}</span></h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <div class="alert-header">
                    <i class="fas fa-exclamation-circle"></i>
                    <h3 class="alert-title">Erreurs à corriger</h3>
                </div>
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('players.update', $player->id)}}" method="post" enctype="multipart/form-data" class="player-edit-form">
            @csrf
            @method('PUT')

            <div class="form-section">
                <h2 class="section-title">Informations de l'équipe</h2>
                
                <div class="form-group">
                    <label for="team_id" class="form-label">Équipe *</label>
                    <select name="team_id" id="team_id" class="form-select" required>
                        <option value="">Sélectionner une équipe</option>
                        @foreach ($teams as $team)
                            <option value="{{$team->id}}" {{ $player->team_id == $team->id ? 'selected' : '' }}>
                                {{$team->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">Photo du joueur</h2>
                
                <div class="current-photo">
                    @if($player->passport_photo)
                        <img src="{{ Storage::url($player->passport_photo) }}" alt="Photo actuelle de {{$player->lastname}}" class="current-photo-img">
                    @else
                        <img src="{{ asset('images/default-avatar.jpg')}}" alt="Photo par défaut" class="current-photo-img">
                    @endif
                    <div class="photo-actions">
                        <span class="photo-label">Photo actuelle</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="passport_photo" class="form-label">Changer la photo</label>
                    <div class="file-upload">
                        <input type="file" name="passport_photo" id="passport_photo" accept="image/*" class="file-input">
                        <label for="passport_photo" class="file-label">
                            <i class="fas fa-camera"></i> Sélectionner une nouvelle photo
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
                               placeholder="Saisir le nom de famille..." value="{{ old('lastname', $player->lastname) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="form-label">Prénoms *</label>
                        <input type="text" name="firstname" id="firstname" class="form-input" 
                               placeholder="Saisir les prénoms..." value="{{ old('firstname', $player->firstname) }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="age" class="form-label">Âge *</label>
                        <input type="number" name="age" id="age" class="form-input" 
                               placeholder="Saisir l'âge..." value="{{ old('age', $player->age) }}" required min="16" max="50">
                    </div>

                    <div class="form-group">
                        <label for="country_of_origin" class="form-label">Pays d'origine</label>
                        <input type="text" name="country_of_origin" id="country_of_origin" class="form-input" 
                               placeholder="Saisir le pays d'origine..." value="{{ old('country_of_origin', $player->country_of_origin) }}">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="section-title">Caractéristiques physiques</h2>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="weight" class="form-label">Poids (kg)</label>
                        <input type="number" name="weight" id="weight" class="form-input" step="0.1"
                               placeholder="Saisir le poids..." value="{{ old('weight', $player->weight) }}" min="50" max="120">
                    </div>

                    <div class="form-group">
                        <label for="size" class="form-label">Taille (cm)</label>
                        <input type="number" name="size" id="size" class="form-input" 
                               placeholder="Saisir la taille..." value="{{ old('size', $player->size) }}" min="150" max="220">
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="submit-btn">
                    <i class="fas fa-save"></i> Enregistrer les modifications
                </button>
                <a href="{{ route('players.show', $player->id) }}" class="cancel-btn">
                    <i class="fas fa-times"></i> Annuler
                </a>
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
        .player-edit-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .edit-title {
            color: var(--dark-color);
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.8rem;
        }

        .player-name-highlight {
            color: var(--primary-dark);
            font-weight: 600;
        }

        /* Alert Styles */
        .alert {
            padding: 20px;
            border-radius: var(--border-radius);
            margin-bottom: 30px;
            background-color: #f8d7da;
            color: #721c24;
            border-left: 4px solid var(--danger-color);
        }

        .alert-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .alert-title {
            margin-left: 10px;
            font-size: 1.1rem;
        }

        .error-list {
            padding-left: 20px;
            margin-top: 10px;
        }

        .error-list li {
            margin-bottom: 5px;
        }

        /* Form Styles */
        .player-edit-form {
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

        /* Current Photo */
        .current-photo {
            text-align: center;
            margin-bottom: 20px;
        }

        .current-photo-img {
            max-width: 200px;
            max-height: 200px;
            border-radius: var(--border-radius);
            border: 1px solid #ddd;
            box-shadow: var(--box-shadow);
        }

        .photo-actions {
            margin-top: 10px;
        }

        .photo-label {
            font-size: 0.9rem;
            color: var(--gray-color);
            font-style: italic;
        }

        /* Form Layout */
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

        /* Form Actions */
        .form-actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }

        .submit-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 25px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            border-radius: var(--border-radius);
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

        .cancel-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 25px;
            background: white;
            color: var(--danger-color);
            border: 1px solid var(--danger-color);
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
        }

        .cancel-btn:hover {
            background-color: var(--danger-color);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .player-edit-form {
                padding: 20px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 15px;
            }
            
            .form-row .form-group {
                min-width: 100%;
            }
            
            .form-actions {
                flex-direction: column;
                gap: 10px;
            }
            
            .submit-btn, .cancel-btn {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .edit-title {
                font-size: 1.5rem;
            }
            
            .player-edit-container {
                padding: 20px 10px;
            }
            
            .current-photo-img {
                max-width: 150px;
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
                        preview.innerHTML = '<img src="' + e.target.result + '" alt="Aperçu de la nouvelle photo">';
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
