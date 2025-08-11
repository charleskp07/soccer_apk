@extends('layout.base')

@section('content')

    @if ($message=Session::get('success'))
        <p>
            {{ $message}}
        </p>
    @endif
    


        @if (Auth::check())
            <div class="btns" >

                <style>
                    .btns{
                        justify-self: center;
                        display: flex;
                        gap: 20px;
                        margin: 20px 0;

                        
                    }
                    .edit-btn{
                        text-decoration: none;
                        color: #fff;
                        background-color: var(--primary-dark);
                        padding: 5px 10px;
                        border-radius: 7px;
                    }

                    .edit-btn:hover{
                        background-color: var(--primary-color);
                        
                    }

                    .delete-btn {
                        padding: 7px 10px;
                        border: solid 1px var(--danger-color);
                        color: var(--danger-color);
                        font-size: 15px;
                        border-radius: 7px;
                    }

                    .delete-btn:hover {
                        background-color: var(--danger-color);
                        color: #fff;
                    
                    }


                </style>
                <a href="{{ route('matches.edit', $matche->id) }}" class="edit-btn">
                    <i class="fas fa-edit"></i> Modifier
                </a>
                <form action="{{ route('matches.destroy', $matche->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer ce joueur ? Cette action sera irréversible !')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn">
                        <i class="fas fa-trash"></i> Supprimer
                    </button>
                </form>
            </div>
        @endif


    <div class="match-container">
        <div class="match-header">
            <h1>Détails du Match</h1>
            <div class="match-date">{{$matche->matchDate}}</div>
            <div class="match-stadium"><b>Stade : </b>{{$matche->stadium}}</div>
            <div class="match-competition">{{$matche->competition}}</div>
            <div class="match-competition"><b>Arbitre principal : </b>{{$matche->referee}}</div>
        </div>
        
        <div class="teams-container">
            <div class="team home-team">
                <div class="team-name">{{$matche->team_one}}</div>
                <div class="team-score">{{$matche->ScoreTeamOne}}</div>
            </div>
            
            <div class="match-info">
                <div class="match-score">{{$matche->ScoreTeamOne}} - {{$matche->ScoreTeamTwo}}</div>
                <div class="match-status">{{$matche->matchStatus}}</div>
            </div>
            
            <div class="team away-team">
                <div class="team-score">{{$matche->ScoreTeamTwo}}</div>
                <div class="team-name"> {{$matche->team_two}}</div>
                
            </div>
        </div>

    </div>

    <style>
        /* Reset et styles de base */

        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }

        .match-container {
            max-width: 900px;
            margin: 20px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .match-header {
            padding: 20px;
            text-align: center;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: white;
        }

        .match-header h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .match-date, .match-stadium, .match-competition {
            font-size: 14px;
            margin-bottom: 3px;
            opacity: 0.9;
        }

        .teams-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: #f9f9f9;
            border-bottom: 1px solid #eee;
        }

        .team {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
        }

        .home-team {
            flex-direction: column;
        }

        .away-team {
            flex-direction: column;
        }

        .team-logo img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .team-name {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
            text-align: center;
        }

        .team-score {
            font-size: 36px;
            font-weight: bold;
            color: #1e3c72;
        }

        .match-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0 20px;
        }

        .match-score {
            font-size: 42px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .match-status {
            background: #4CAF50;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .match-minute {
            font-size: 14px;
            color: #666;
        }

        .match-details {
            padding: 20px;
        }

        .details-section {
            margin-bottom: 30px;
        }

        .details-section h2 {
            font-size: 20px;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 2px solid #eee;
            color: #1e3c72;
        }

        .match-events {
            list-style: none;
        }

        .event {
            display: flex;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px dashed #eee;
        }

        .event-minute {
            width: 50px;
            font-weight: bold;
            color: #666;
        }

        .event-icon {
            width: 30px;
            text-align: center;
            font-size: 18px;
        }

        .event-description {
            flex: 1;
        }

        .lineups-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .lineup {
            flex: 1;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
        }

        .lineup h3 {
            margin-bottom: 10px;
            color: #1e3c72;
            text-align: center;
        }

        .lineup ul {
            list-style: none;
        }

        .lineup li {
            padding: 5px 0;
            border-bottom: 1px solid #eee;
        }

        .stats-container {
            margin-top: 15px;
        }

        .stat-item {
            margin-bottom: 15px;
        }

        .stat-label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat-bars {
            display: flex;
            height: 25px;
            border-radius: 5px;
            overflow: hidden;
        }

        .stat-bar {
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        .home-stat {
            background: #1e3c72;
        }

        .away-stat {
            background: #d32f2f;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .teams-container {
                flex-direction: column;
            }
            
            .team {
                flex-direction: row;
                width: 100%;
                justify-content: space-between;
                margin-bottom: 15px;
            }
            
            .home-team {
                order: 1;
            }
            
            .match-info {
                order: 2;
                margin: 15px 0;
            }
            
            .away-team {
                order: 3;
            }
            
            .lineups-container {
                flex-direction: column;
            }
        }
    </style>
        
   


@endsection
