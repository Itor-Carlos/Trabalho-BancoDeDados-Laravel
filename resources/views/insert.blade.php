<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar User</title>
</head>
<body>
    <form method="POST" action="/users">

        @csrf

        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <input id="cpf" name="cpf" type="text" placeholder="CPF"/>
        <input id="name" name="name" type="text" placeholder="Nome"/>
        <input id="data_nascimento" name="data_nascimento" type="date" placeholder="Data de nascimento"/>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
