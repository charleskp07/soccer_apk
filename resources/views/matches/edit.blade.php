@extends('layout.base')

@section('content')
    
    <div class="container">
        <div class="form-header">
            <h1>Modifier le match</h1>
            <p>Mettez à jour les informations du match</p>
        </div>

        <form class="form-body" id="editMatchForm" method="POST" action="{{route('matches.update', $matche->id)}}">
            <!-- Section Statut du match -->
            @csrf


            @method('PUT')



            <div class="form-section">
                <h2>Statut du match</h2>
                <div class="match-status">
                    <span class="status-badge status-scheduled"> {{$matche->matchStatus}}</span>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label for="matchStatus">Changer le statut</label>
                        <select id="matchStatus" name="matchStatus">
                            <option value="à venir">à venir</option>
                            <option value="en cour">En cours</option>
                            <option value="terminé">Terminé</option>
                            <option value="Reporté">Reporté</option>
                            <option value="Annulé">Annulé</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Section Informations de base -->
            <div class="form-section">
                <h2>Informations de base</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="competition">Compétition *</label>
                        <select id="competition" name="competition" required>
                            <option value="">Modifier la compétition</option>
                            <option value="championnat" selected>Championnat National</option>
                            <option value="coupe">Coupe de France</option>
                            <option value="europe">Ligue des Champions</option>
                            <option value="amical">Match amical</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="matchDate">Modifier la Date du match *</label>
                        <input type="datetime-local" id="matchDate" name="matchDate" value="{{$matche->matchDate}}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="stadium">Stade *</label>
                        <input type="text" name="stadium" id="stadium" value="{{$matche->stadium}}" required>

                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="location">Lieu *</label>
                        <input type="text" name="location" id="location" value="{{$matche->location}}" required>
                    </div>
                </div>
            </div>

            <!-- Section Équipes -->
            <div class="form-section">
                <h2>Équipes participantes</h2>
                <div class="team-selection">
                    <div class="team-select">
                        <label for="team_one">Équipe 1 *</label>
                        <select id="team_one" name="team_one"  required>
                            <option value="{{$matche->team_one}}">{{$matche->team_one}}</option>
                            @foreach ($teams as $team)
                                <option value="{{$team->name}}">
                                    {{$team->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="vs">VS</div>
                    <div class="team-select">
                        <label for="team_two">Équipe 2*</label>
                        <select id="team_two" name="team_two" required>
                            <option value="{{$matche->team_two}}">{{$matche->team_two}}</option>
                            @foreach ($teams as $team)
                                <option value="{{$team->name}}">
                                    {{$team->name}}
                                </option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="ScoreTeamOne">Score equipe 1</label>
                        <input type="number" id="ScoreTeamOne" name="ScoreTeamOne" min="0" value="{{$matche->ScoreTeamOne}}">
                    </div>
                    <div class="form-group">
                        <label for="ScoreTeamTwo">Score equipe 2</label>
                        <input type="number" id="ScoreTeamTwo" name="ScoreTeamTwo" min="0" value="{{$matche->ScoreTeamTwo}}">
                    </div>
                </div>
            </div>

            <!-- Section Arbitrage -->
            <div class="form-section">
                <h2>Arbitrage</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="referee">Arbitre principal *</label>
                        <input type="text" name="referee" id="referee" value="{{$matche->referee}}">
                    </div>
                    
                </div>
            </div>



            <!-- Section Actions -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            </div>
        </form>
    </div>


     <style>
        /* Le CSS est identique au formulaire de création */
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --success-color: #2ecc71;
            --danger-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --gray-color: #95a5a6;
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
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
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

        .form-section {
            margin-bottom: 30px;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
        }

        .form-section:last-child {
            border-bottom: none;
        }

        .form-section h2 {
            color: var(--dark-color);
            font-size: 1.3rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-color);
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px 20px;
        }

        .form-group {
            flex: 1;
            min-width: 250px;
            padding: 0 15px;
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark-color);
        }

        input, select, textarea {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: border 0.3s;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .team-selection {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .team-select {
            flex: 1;
        }

        .vs {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--gray-color);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
        }

        .btn-secondary {
            background-color: var(--gray-color);
            color: white;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

    

        .match-status {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .status-scheduled {
            background-color: #f39c12;
            color: white;
        }

        .status-inplay {
            background-color: #2ecc71;
            color: white;
        }

        .status-finished {
            background-color: #95a5a6;
            color: white;
        }

        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
            }
            
            .team-selection {
                flex-direction: column;
            }
            
            .vs {
                margin: 10px 0;
            }
        }
    </style>



@endsection
