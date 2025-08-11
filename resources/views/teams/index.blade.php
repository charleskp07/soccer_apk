@extends('layout.base')

@section('content')



    <style>
        :root {
            --primary-color: #3498db;
            --primary-dark: #2980b9;
            --secondary-color: #2ecc71;
            --danger-color: #e74c3c;
            --dark-color: #2c3e50;
            --light-color: #ecf0f1;
            --gray-color: #95a5a6;
        }

        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .team-cards{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            padding: 0 20px
        }


        .team-card {
            width: 250px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            margin: 15px;
        }

        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .ecusson {
            width: 100%;
            height: 175px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            border-bottom: 1px solid #eee;
        }

        .ecusson img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            padding: 10px;
        }

        .texte-under-badge {
            padding: 15px;
            text-align: center;
        }

        .texte-under-badge span {
            display: block;
            margin-bottom: 8px;
            color: var(--dark-color);
        }

        .texte-under-badge span b {
            color: var(--primary-dark);
        }

        .buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px;
            margin-top: 15px;
        }

        .details-btn, 
        .edit-btn, 
        .delete-btn {
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .details-btn {
            background-color: var(--primary-color);
            color: white;
            border: 1px solid var(--primary-color);
        }

        .details-btn:hover {
            background-color: var(--primary-dark);
        }

        .edit-btn {
            background-color: var(--secondary-color);
            color: white;
            border: 1px solid var(--secondary-color);
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

        .buttons form {
            display: inline;
            margin: 0;
        }

        .separator {
            color: var(--gray-color);
            margin: 0 5px;
        }

        @media (max-width: 1000px) {
            .team-cards{
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                padding: 0 20px
            }
        }



        @media (max-width: 480px) {
            .team-cards{
                display: grid;
                grid-template-columns: 1fr 1fr;
                padding: 0 20px
            }
            .team-card {
                width: 100%;
                max-width: 300px;
                margin: 10px 0;
            }
            
            .buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .separator {
                display: none;
            }
        }

        @media (max-width: 380px) {
            .team-cards{
                display: grid;
                grid-template-columns: 1fr;
                padding: 0 20px
            }
        }
    </style>
    <h1>&nbsp;&nbsp;&nbsp;Liste des equipes</h1>

    @if ($message = Session::get('success'))
        <p>
            {{$message}}
        </p>
        
    @endif

    @if (Auth::check())
        <a href="{{route('teams.create')}}" class="add-btn">
            Ajouter une equipe
        </a>
    @endif



    <br/><br/><br/>

    <div class="team-cards">

        @foreach ($teams as $team)

            <div class="team-card">
                <div class="ecusson">
                    @if($team->team_badge)
                        <img src="{{ Storage::url($team->team_badge) }}" alt="{{ $team->name }}" class="" width="175" height="100%">
                    @else
                        <img src="{{ asset('images\ecusson par defaut.jpg')}}" alt="{{$team->name}}" class="" width="175" height="100%">
                    @endif

                </div>
                <br />

                <div class="texte-under-badge">
                    <span>
                        <b>{{$team->name}}</b>
                    </span>
                    <br />
                    <span> 
                        <b>Effectif : </b>{{$team->players->count()}}
                    </span>

                    <div class="buttons">
                        
                        <a href="{{ route('teams.show', $team->id) }}"  class="details-btn">

                            <img src="{{URL::asset('')}}" alt="">
                            Détails
                        </a> 
                        {{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}

                        @if (Auth::check())
                            |

                            <a href="{{ route('teams.edit', $team->id) }}" class="edit-btn">
                                {{-- <img src="{{URL::asset('images\icons\editer.png')}}" alt="" width="30px"> --}}

                                Modifier
                            </a>

                            <form action="{{ route('teams.destroy', $team->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer cette catégorie ? Cette action sera irréversible !')">
                                @csrf

                                @method('DELETE')
                                <button type="submit" class="delete-btn">
                                    {{-- <img src="{{URL::asset('images\icons\supprimer.png')}}" alt="" width="30"> --}}
                                    Supprimer
                                </button>
                            </form>
                        @endif





                    </div>

                </div>
            </div>
            
        @endforeach

    </div>





   
@endsection