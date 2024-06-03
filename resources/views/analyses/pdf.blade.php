<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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

            position: fixed;
            border-top: 1px solid #e2e8f0;
            right: -10px;
            bottom: 0;
            width: 100%;
        }

        {{--    i want the image to be in the center--}}
       .logo-container {
            display: flex;
            text-align: center;
            height: 100vh; /* This ensures the container takes up the full height of the viewport */
        }

        .logo {
            width: 180px; /* adjust as needed */
            height: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="logo-container">
        <img class="logo" src="{{ public_path('assets/images/logoUni.png') }}" alt="Université" />
    </div>
    <div class="card">
        <div class="title">Bon D'Analyse Nº {{ $formulaireanalyse->id }}</div>

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

                                <p>{{ $user->name }}</p>

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
                            Directeur de Laboratoire
                        </label>
                        <label>
                            <input type="checkbox" checked>
                            Encadrant
                        </label>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="footer">
    Centre d&#39;Appui à la Recherche Scientifique, Université Ibn Tofail, Kénitra
    Présidence - Université Ibn Tofail
    Campus Universitaire B.P 242 -Kenitra<br>
    Tél.: +212 (0) 5 37 32 92 00 <br>
    E-mail: cars@uit.ac.ma - Site web: cars.uit.ac.ma<br>

</div>
</body>
</html>
