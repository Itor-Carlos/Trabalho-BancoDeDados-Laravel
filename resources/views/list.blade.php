<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Users</title>
</head>
<body>
    <h1>Listagem de Users</h1>

    @foreach ($users as $user)
        <div class="user-card">
            <p>CPF: {{$user['cpf']}}</p>
            <p>Name: {{$user['name']}}</p>
            <p>Data de Nascimento: {{$user['data_nascimento']}}</p>
        </div>
        <br/>
    @endforeach
</body>
</html>
