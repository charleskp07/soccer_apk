@extends('layout.base')
{{-- 
@section('content')
    <h1>Détails du joueur {{$player->lastname}}</h1>

    <div class="">
        @if($player->passport_photo)
            <img src="{{ Storage::url($player->passport_photo) }}" alt="{{ $player->lastname }}" class="" width="250" height="100%">
        @else
            <img src="{{ asset('images\default-avatar.jpg')}}" alt="{{$player->name}}" class="" width="200" height="100%">
        @endif
    </div>

    <div>
        <div>
            <b>Equipe: </b> {{$player->team->name}} <br />
            <b>Nom : </b> {{$player->lastname}} <br />
            <b>Prénoms : </b> {{$player->firstname}} <br />
            <b>Âge : </b> {{$player->age}}  <b>Ans</b> <br />
            <b>Poids : </b> {{$player->weight}}  <b>Kg</b> <br />
            <b>Taille: </b> {{$player->size}} <b>cm</b>  <br />
            <b>Pays d'origine: </b> {{$player->country_of_origin}}   <br />

        </div>

        @if (Auth::check())
            
        
            <div>
                <a href="{{ route('players.edit', $player->id) }}">
                    Modifier
                </a> |

                <form action="{{ route('players.destroy', $player->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer ce joueur ? Cette action sera irréversible !')">
                    @csrf

                    @method('DELETE')
                    <button type="submit">
                        Supprimer
                    </button>
                </form>

            </div>

        @endif

    </div>

@endsection
 --}}


@section('content')
    <div class="player-detail-container">
        <h1 class="player-title">Détails du joueur {{$player->lastname}}</h1>

        <div class="player-profile">
            <div class="player-photo-container">
                @if($player->passport_photo)
                    <img src="{{ Storage::url($player->passport_photo) }}" alt="{{ $player->lastname }}" class="player-photo">
                @else
                    <img src="{{ asset('images/default-avatar.jpg')}}" alt="{{$player->name}}" class="player-photo">
                @endif
            </div>

            <div class="player-info">
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Équipe:</span>
                        <span class="info-value">{{$player->team->name}}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Nom:</span>
                        <span class="info-value">{{$player->lastname}}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Prénoms:</span>
                        <span class="info-value">{{$player->firstname}}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Âge:</span>
                        <span class="info-value">{{$player->age}} ans</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Poids:</span>
                        <span class="info-value">{{$player->weight}} kg</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Taille:</span>
                        <span class="info-value">{{$player->size}} cm</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Pays d'origine:</span>
                        <span class="info-value">{{$player->country_of_origin}}</span>
                    </div>
                </div>

                @if (Auth::check())
                    <div class="player-actions">
                        <a href="{{ route('players.edit', $player->id) }}" class="action-btn edit-btn">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                        <form action="{{ route('players.destroy', $player->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer ce joueur ? Cette action sera irréversible !')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete-btn">
                                <i class="fas fa-trash"></i> Supprimer
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        /* Variables */
        :root {
            --primary-color: #3498db;
            --primary-dark: #2980b9;
            --secondary-color: #2ecc71;
            --danger-color: #e74c3c;
            --dark-color: #2c3e50;
            --light-color: #ecf0f1;
            --gray-color: #95a5a6;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Base Styles */
        .player-detail-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 30px 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .player-title {
            color: var(--dark-color);
            margin-bottom: 30px;
            text-align: center;
            font-size: 2rem;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
        }

        /* Player Profile */
        .player-profile {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            background: white;
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .player-photo-container {
            flex: 0 0 300px;
            display: flex;
            justify-content: center;
        }

        .player-photo {
            max-width: 100%;
            height: auto;
            max-height: 350px;
            border-radius: var(--border-radius);
            object-fit: cover;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .player-info {
            flex: 1;
            min-width: 300px;
        }

        /* Info Grid */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: var(--border-radius);
        }

        .info-label {
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 5px;
            font-size: 0.9rem;
        }

        .info-value {
            color: var(--dark-color);
            font-size: 1.1rem;
        }

        /* Player Actions */
        .player-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: var(--border-radius);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
        }

        .edit-btn {
            background-color: var(--secondary-color);
            color: white;
        }

        .edit-btn:hover {
            background-color: #27ae60;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .delete-btn {
            background-color: var(--danger-color);
            color: white;
        }

        .delete-btn:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .player-profile {
                flex-direction: column;
                align-items: center;
            }
            
            .player-photo-container {
                flex: 0 0 auto;
                width: 100%;
                max-width: 300px;
            }
            
            .player-actions {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .player-title {
                font-size: 1.6rem;
            }
            
            .player-profile {
                padding: 20px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .player-actions {
                flex-direction: column;
            }
            
            .action-btn {
                justify-content: center;
            }
        }
    </style>



@endsection