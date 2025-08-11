@extends('layout.base')
{{-- 
@section('content')
    <h1>Détails</h1>

    <div>
        <div class="ecusson">
            @if($team->team_badge)
                <img src="{{ Storage::url($team->team_badge) }}" alt="{{ $team->name }}" class="" width="200" height="100%">
            @else
                <img src="{{ asset('images\ecusson par defaut.jpg')}}" alt="{{$team->name}}" class="" width="200" height="100%">
            @endif
        </div>

        <div>
            <b>Nom de l'équipe : </b> {{$team->name}} <br />
            <b>Effectif : </b> {{$team->players->count()}} <br />
            <b>Date de création: </b> {{$team->creation_date}} <br />

            @if (Auth::check())
                
            
                |
                <a href="{{ route('teams.edit', $team->id) }}">
                    Modifier
                </a> |

                <form action="{{ route('teams.destroy', $team->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer cette catégorie ? Cette action sera irréversible !')">
                    @csrf

                    @method('DELETE')
                    <button type="submit">
                        Supprimer
                    </button>
                </form>

            @endif
        </div>
    </div>

    <h2>Liste des joueur de l'équipe {{$team->name}}</h2>

    @if ($message=Session::get('success'))
        <p>
            {{ $message}}
        </p>
    @endif

    @if (Auth::check())
        <a href="{{route('players.create')}}" class="add-btn">
            Ajouter un joueur
        </a>
    @endif

    @foreach ($team->players as $player)

        <div class="">
            @if($player->passport_photo)
                <img src="{{ Storage::url($player->passport_photo) }}" alt="{{ $player->lastname }}" class="" width="100" height="100%">
            @else
                <img src="{{ asset('images\default-avatar.jpg')}}" alt="{{$player->name}}" class="" width="100" height="100%">
            @endif
        </div>

        <div>
            <b>Nom</b>{{$player->lastname}} <br />
            <b>Equipe</b> {{$player->team->name}}
        </div>

        <div>
            <a href="{{ route('players.show', $player->id) }}">
                Détails
            </a> 
            @if (Auth::check())
                |
            
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
            @endif

        </div>

        
        
    @endforeach




@endsection
 --}}


@section('content')
    <div class="team-detail-container">
        <h1 class="page-title">Détails de l'équipe</h1>

        <div class="team-header">
            <div class="team-badge-container">
                @if($team->team_badge)
                    <img src="{{ Storage::url($team->team_badge) }}" alt="{{ $team->name }}" class="team-badge">
                @else
                    <img src="{{ asset('images/ecusson-par-defaut.jpg')}}" alt="{{$team->name}}" class="team-badge">
                @endif
            </div>

            <div class="team-info">
                <h2 class="team-name">{{ $team->name }}</h2>
                <div class="info-item">
                    <span class="info-label">Effectif :</span>
                    <span class="info-value">{{ $team->players->count() }} joueurs</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Date de création :</span>
                    <span class="info-value">{{ $team->creation_date }}</span>
                </div>

                @if (Auth::check())
                <div class="team-actions">
                    <a href="{{ route('teams.edit', $team->id) }}" class="action-btn edit-btn">
                        Modifier
                    </a>
                    <form action="{{ route('teams.destroy', $team->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer cette équipe ? Cette action sera irréversible !')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn delete-btn">
                            Supprimer
                        </button>
                    </form>
                </div>
                @endif
            </div>
        </div>

        <div class="players-section">
            <h2 class="section-title">Liste des joueurs de l'équipe {{ $team->name }}</h2>

            @if ($message=Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif

            @if (Auth::check())
                <a href="{{ route('players.create') }}" class="add-player-btn">
                    <i class="fas fa-plus"></i> Ajouter un joueur
                </a>
            @endif

            <div class="players-grid">
                @foreach ($team->players as $player)
                <div class="player-card">
                    <div class="player-photo">
                        @if($player->passport_photo)
                            <img src="{{ Storage::url($player->passport_photo) }}" alt="{{ $player->lastname }}">
                        @else
                            <img src="{{ asset('images/default-avatar.jpg')}}" alt="{{ $player->name }}">
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
                        @if (Auth::check())
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
                        @endif
                    </div>
                </div>
                @endforeach
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
        .team-detail-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .page-title {
            color: var(--dark-color);
            margin-bottom: 30px;
            text-align: center;
            font-size: 2.2rem;
        }

        /* Team Header */
        .team-header {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-bottom: 40px;
            background: white;
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .team-badge-container {
            flex: 0 0 250px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .team-badge {
            max-width: 100%;
            height: auto;
            max-height: 200px;
            object-fit: contain;
        }

        .team-info {
            flex: 1;
            min-width: 300px;
        }

        .team-name {
            color: var(--primary-dark);
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        .info-item {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .info-label {
            font-weight: 600;
            color: var(--dark-color);
            min-width: 150px;
        }

        .info-value {
            color: var(--dark-color);
        }

        .team-actions {
            display: flex;
            gap: 15px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        /* Players Section */
        .players-section {
            margin-top: 40px;
        }

        .section-title {
            color: var(--dark-color);
            margin-bottom: 20px;
            font-size: 1.6rem;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: var(--border-radius);
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .add-player-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            text-decoration: none;
            border-radius: var(--border-radius);
            margin-bottom: 25px;
            font-weight: 600;
            transition: transform 0.3s, box-shadow 0.3s;
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
            gap: 20px;
        }

        .player-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .player-card:hover {
            transform: translateY(-5px);
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
        }

        .player-info {
            padding: 15px;
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
        }

        .details-btn:hover {
            background-color: var(--primary-dark);
        }

        .edit-btn {
            background-color: var(--secondary-color);
            color: white;
        }

        .edit-btn:hover {
            background-color: #27ae60;
        }

        .delete-btn {
            background-color: white;
            color: var(--danger-color);
            border: 1px solid var(--danger-color);
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: var(--danger-color);
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .team-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            
            .info-item {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .team-actions {
                justify-content: center;
            }
            
            .players-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection
