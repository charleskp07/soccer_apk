@extends('layout.base')

@section('content')
    <h1> Homes (matchs)</h1>

    @if ($message=Session::get('success'))
        <p>
            {{ $message}}
        </p>
    @endif


    <style>
        * {
            
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f5f5f5;
            padding: 20px;
        }

        .match-card {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .match-header {
            background: #2c3e50;
            color: white;
            padding: 12px 15px;
            text-align: center;
        }

        .match-teams {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .team {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 40%;
        }

        .team-logo {
            width: 50px;
            height: 50px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .team-name {
            font-weight: bold;
            text-align: center;
            margin-bottom: 5px;
        }

        .team-score {
            font-size: 1.8rem;
            font-weight: bold;
            color: #2c3e50;
        }

        .vs {
            font-size: 1.2rem;
            color: #7f8c8d;
            width: 20%;
            text-align: center;
        }

        .match-status {
            text-align: center;
            padding: 10px;
            background: #ecf0f1;
            font-size: 0.9rem;
        }

        .details-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s;
        }

        .details-btn:hover {
            background: #2980b9;
        }

        .match-details {
            padding: 0 15px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            background: #f9f9f9;
        }

        .match-details.show {
            max-height: 500px;
            padding: 15px;
        }

        .detail-item {
            margin-bottom: 8px;
            display: flex;
            justify-content: space-between;
        }

        .detail-label {
            font-weight: bold;
            color: #7f8c8d;
        }

        @media (max-width: 480px) {
            .team-logo {
                width: 40px;
                height: 40px;
            }
            
            .team-score {
                font-size: 1.5rem;
            }
        }
    </style>

    @if (Auth::check())
        <a href="{{route('matches.create')}}">
            Ajouter un match
        </a>
    @endif

    @foreach ($matches as $matche)
        <br /><br />
       <div class="match-card">
            <div class="match-header">
                {{$matche->competition}} - {{$matche->matchDate}}
            </div>

            <div class="match-teams">
                <div class="team">
                    <div class="team-name">{{$matche->team_one}}</div>
                    <div class="team-score">{{$matche->ScoreTeamOne}}</div>
                </div>

                <div class="vs">VS</div>

                <div class="team">
                    <div class="team-name"> {{$matche->team_two}}</div>
                    <div class="team-score">{{$matche->ScoreTeamTwo}}</div>
                </div>
            </div>

            <div class="match-status">
                Match {{$matche->matchStatus}} - {{$matche->matchDate}}
            </div>
            <div class="match-status">
                <b>Stade:</b>  {{$matche->stadium}}
            </div>
            <div class="match-status">
                <b>Lieu: </b> {{$matche->location}}
            </div>

            <a href="{{route('matches.show', $matche->id)}}" class="details-btn" style="text-decoration: none; text-align: center;">
                Voir les détails
            </a>

            
        </div>

        
            



        
        
    @endforeach

    



    
@endsection