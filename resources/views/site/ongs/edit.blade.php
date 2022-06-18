<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar Nova Ong</title>
        <style>
            label{
                float: left;
                display: block;
                width: 90px;
            }
        </style>
    </head>
    <body>
        <form action="{{route('atualizarOng', ['id'=>$ong->id])}}" method="post">
        @csrf
            <div><label for="nome">Nome</label><input type="text" name="nome" id="nome" value="{{$ong->nome}}"></div>
            <div><label for="cnpj">CNPJ</label><input type="text" name="cnpj" id="cnpj" value="{{$ong->cnpj}}"></div>
            <div><label for="proprietario">Proprietario</label><input type="text" name="proprietario" id="proprietario" value="{{$ong->proprietario}}"></div>
            <button type="submit">Salvar</button>
            
        </form>
    </body>
</html>