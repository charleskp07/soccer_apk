@extends('layout.base')
{{-- 
@section('content')
    <h1>Liste des Joueurs</h1>
    @if ($message=Session::get('success'))
        <p>
            {{ $message}}
        </p>
    @endif

    <a href="{{route('players.create')}}">
        Ajouter un joueur
    </a>

    @foreach ($players as $player)

        <div class="">
            @if($player->passport_photo)
                <img src="{{ Storage::url($player->passport_photo) }}" alt="{{ $player->lastname }}" class="" width="100" height="100%">
            @else
                <img src="{{ asset('images\default-avatar.jpg')}}" alt="{{$player->name}}" class="" width="100" height="100%">
            @endif
        </div>

        <b>Nom</b>{{$player->lastname}}
        <b>Equipe</b> {{$player->team->name}}

        <a href="{{ route('players.show', $player->id) }}">
            Détails
        </a> |
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

        
        
    @endforeach
@endsection
 --}}

@section('content')
    <div class="players-container">
        <div class="players-header">
            <h1 class="players-title">Liste des Joueurs</h1>
            
            @if ($message=Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif

            <a href="{{route('players.create')}}" class="add-player-btn">
                <i class="fas fa-plus"></i> Ajouter un joueur
            </a>
        </div>

        <div class="players-grid">
            @foreach ($players as $player)
            <div class="player-card">
                <div class="player-photo">
                    @if($player->passport_photo)
                        <img src="{{ Storage::url($player->passport_photo) }}" alt="{{ $player->lastname }}">
                    @else
                        <img src="{{ asset('images/default-avatar.jpg')}}" alt="{{$player->name}}">
                    @endif
                </div>

                <div class="player-info">
                    <h3 class="player-name">{{ $player->lastname }}</h3>
                    <div class="player-team">{{ $player->team->name }}</div>
                </div>

                <div class="player-actions">
                    <a href="{{ route('players.show', $player->id) }}" class="action-btn details-btn">
                        <i class="fas fa-eye"></i> Détails
                    </a>
                    <div class="action-group">
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
                </div>
            </div>
            @endforeach
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
        .players-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .players-header {
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .players-title {
            color: var(--dark-color);
            text-align: center;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .alert {
            padding: 15px;
            border-radius: var(--border-radius);
            text-align: center;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        /* Add Player Button */
        .add-player-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            text-decoration: none;
            border-radius: var(--border-radius);
            font-weight: 600;
            transition: transform 0.3s, box-shadow 0.3s;
            width: fit-content;
            margin: 0 auto;
        }

        .add-player-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            color: white;
        }

        /* Players Grid */
        .players-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }

        /* Player Card */
        .player-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            transition: transform 0.3s;
            display: flex;
            flex-direction: column;
        }

        .player-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .player-photo {
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
            border-bottom: 1px solid #eee;
        }

        .player-photo img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
            padding: 10px;
        }

        .player-info {
            padding: 15px;
            flex-grow: 1;
        }

        .player-name {
            color: var(--dark-color);
            margin-bottom: 5px;
            font-size: 1.2rem;
        }

        .player-team {
            color: var(--gray-color);
            font-size: 0.9rem;
        }

        /* Player Actions */
        .player-actions {
            padding: 15px;
            border-top: 1px solid #eee;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .action-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        /* Action Buttons */
        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.2s;
        }

        .details-btn {
            background-color: var(--primary-color);
            color: white;
            width: 100%;
            justify-content: center;
        }

        .details-btn:hover {
            background-color: var(--primary-dark);
        }

        .edit-btn {
            background-color: var(--secondary-color);
            color: white;
            flex: 1;
            justify-content: center;
        }

        .edit-btn:hover {
            background-color: #27ae60;
        }

        .delete-btn {
            background-color: white;
            color: var(--danger-color);
            border: 1px solid var(--danger-color);
            cursor: pointer;
            flex: 1;
            justify-content: center;
        }

        .delete-btn:hover {
            background-color: var(--danger-color);
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .players-grid {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            }
        }

        @media (max-width: 480px) {
            .players-grid {
                grid-template-columns: 1fr;
            }
            
            .player-actions {
                flex-direction: row;
                flex-wrap: wrap;
            }
            
            .details-btn {
                width: auto;
            }
        }
    </style>
@endsection