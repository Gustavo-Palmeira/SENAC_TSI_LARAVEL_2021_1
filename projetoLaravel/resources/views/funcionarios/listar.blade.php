<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
        </tr>
        @foreach($funcionarios as $funcionario)
            <tr>
                <td>{{$funcionario->nome}}</td>
                <td>{{$funcionario->telefone}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>