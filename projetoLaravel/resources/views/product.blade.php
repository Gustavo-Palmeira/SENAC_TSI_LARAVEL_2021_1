@extends('layouts.externoproduct')
@section('title', 'Game of Thrones')
@section('content')
    <h1>Livros</h1>
    <h2>{{ $nome }}</h2>
    <p>Olá, você irá alugar o livro "{{ $nome }}".</p>
    @if ($paginas > 400 && $peso > 1)
        <p>Este livro é pesado, cuidado para transportá-lo!</p>
    @else 
        <p>Este livro é leve!</p>
    @endif

    @if ($estoque)
        <p>Edições disponíveis: </p>
        <ul>
            @foreach ($edicoes as $edicao)
                <li>Edição {{$edicao['edicao']}}</li>
            @endforeach
        </ul>
    @endif
    <h2>{{ $nome2 }}</h2>
    <p>Olá, você irá alugar o livro "{{ $nome2 }}".</p>
    @if ($paginas2 > 400 && $peso2 > 1)
        <p>Este livro é pesado, cuidado para transportá-lo!</p>
    @else 
        <p>Este livro é leve!</p>
    @endif

    @if ($estoque2)
        <p>Edições disponíveis: </p>
        <ul>
            @foreach ($edicoes2 as $edicao2)
                <li>Edição {{$edicao2['edicao2']}}</li>
            @endforeach
        </ul>
    @else 
        <p>Livro fora de estoque </p>
    @endif
@endsection