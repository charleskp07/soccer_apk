@extends('layout.base')

@section('content')

    @if ($message=Session::get('success'))
        <p>
            {{ $message}}
        </p>
    @endif
    


        @if (Auth::check())
            <div class="">
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
            <div class="match-stadium">{{$matche->stadium}}</div>
            <div class="match-competition">{{$matche->competition}}</div>
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


        
   


@endsection
