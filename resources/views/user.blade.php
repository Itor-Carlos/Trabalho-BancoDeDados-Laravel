@if($user)
    <h1>Dados do Usuário</h1>
    <p><strong>Nome:</strong> {{ $user->name }}</p>
    <p><strong>Data de Nascimento:</strong> {{ $user->data_nascimento }}</p>
    <p><strong>CPF:</strong> {{ $user->cpf }}</p>
@else
    <h1>{{$message}}</h1>
    <p>O CPF informado não corresponde a nenhum usuário no sistema.</p>
@endif
