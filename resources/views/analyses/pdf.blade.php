<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Analyse</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7fafc;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1024px;
            margin: 0 auto;
            padding: 24px;
        }
        .card {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            padding: 24px;
            border: 1px solid #e2e8f0;
        }
        .title {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 24px;
        }
        .images {
            display: flex;
            justify-content: space-between;
            margin-bottom: 24px;
        }
        .images img {
            width: 48%;
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 24px;
        }
        table, th, td {
            border: 1px solid #e2e8f0;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f7fafc;
            font-weight: bold;
        }
        .checkboxes {
            display: flex;
            justify-content: space-around;
            margin-top: 12px;
        }
        .checkboxes label {
            display: flex;
            align-items: center;
        }
        .checkboxes input {
            margin-right: 8px;
        }
        .footer {
            text-align: center;
            font-size: 0.9rem;
            padding: 12px;
            border-top: 1px solid #e2e8f0;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
        .logo-container {
            display: flex;
            justify-content: space-between;
        }

        .logo-container img {
            width: 100px; /* adjust as needed */
            height: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="title">ID : {{ $formulaireanalyse->id }}</div>

        <table>
            <tr>
                <th>Demendeur</th>
                <td>
                    @php
                        $user = $formulaireanalyse->user;
                        $roles = $user->roles;
                    @endphp
                    @foreach ($roles as $role)
                        @if ($role->name == 'Etudiant')
                            Nom: {{ explode(" ", $user->name)[0] }}<br>
                            Prenom: {{ explode(" ", $user->name)[1] }}
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Telephone</th>
                <td>
                    @foreach($roles as $role)
                        @if($role->name == 'Etudiant')
                            {{ $user->phone }}
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    @foreach ($roles as $role)
                        @if ($role->name == 'Etudiant')
                            {{ $user->email }}
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Designation</th>
                <td>{{ $formulaireanalyse->designantion }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $formulaireanalyse->description }}</td>
            </tr>
            <tr>
                <th>Frais d'analyse</th>
                <td>{{ $formulaireanalyse->prix_total }}</td>
            </tr>
            <tr>
                <th>Validation</th>
                <td>
                    <div class="checkboxes">
                        <label>
                            <input type="checkbox" checked>
                            Centre d'analyse
                        </label>
                        <label>
                            <input type="checkbox" checked>
                            Directeur
                        </label>
                        <label>
                            <input type="checkbox" checked>
                            Enseignant
                        </label>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="footer">
    Angle Allal Fassi / FAR, B.P. 8027, Hay Riad, 10000 Rabat, MAROC<br>
    Tél.: +212 (0) 5 37 56 98 75 / 76 - Fax: +212 (0) 5 37 56 98 75<br>
    E-mail: uatrs@cnrst.ma - Site web: www.cnrst.ma<br>
    Compte CNRST: 310810100002470195700182 - Trésorerie Générale Rabat /// ICE n° 164 685 200 087 IF 40453159
</div>
</body>
</html>
