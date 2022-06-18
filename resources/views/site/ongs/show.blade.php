<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Ongs</title>
    </head>
    <body>
        <table>
            <tr><th>CNPJ</th><th>Nome</th><th>Proprietario</th><th></th><th></th>
            @foreach($ongs as $ong)
            <tr>
                <td>{{$ong->cnpj}}</td>
                <td>{{$ong->nome}}</td>
                <td>{{$ong->proprietario}}</td>
                <td><a href="{{ route('editarOng', ['id'=>$ong->id])}}" 
                        title="Editar Ong {{ $ong->nome }}">Editar</a></td>
                <td><a href="{{ route('excluirOng', ['id'=>$ong->id])}}" 
                        title="Excluir Ong {{ $ong->nome }}">Excluir</a></td>
            </tr>
            @endforeach
    </body>
</html>
