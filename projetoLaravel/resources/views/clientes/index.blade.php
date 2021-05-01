@extends('layouts.app')

@section('content')

<div class="container m-5">
  <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Cliente</h2>
          </div>
          <div class="pull-right">
              <a class="btn btn-success" href="{{ route('clientes.create') }}"> + Novo cliente</a>
          </div>
      </div>
  </div>

  <br>

  @if ($message = Session::get('success'))

  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>

  @endif


  <table class="table table-bordered">

  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Endereço</th>
    <th>Nascimento</th>
    <th width="280px">Ação</th>
  </tr>

  @foreach ($data as $key => $cliente)

    <tr>
      <td>{{ ++$index }}</td>
      <td>{{ $cliente->name }}</td>
      <td>{{ $cliente->email }}</td>
      <td>{{ $cliente->endereco }}</td>
      <td>{{ $cliente->nascimento }}</td>
      <td>

        @if(!empty($cliente->getRoleNames()))

          @foreach($cliente->getRoleNames() as $v)

            <label class="badge badge-success">{{ $v }}</label>

          @endforeach

        @endif

      </td>

      <td>
        <a class="btn btn-info" href="{{ route('clientes.show',$cliente->id) }}">Mostrar</a>
        <a class="btn btn-primary" href="{{ route('clientes.edit',$cliente->id) }}">Editar</a>

          {!! Form::open(['method' => 'DELETE','route' => ['clientes.destroy', $cliente->id],'style'=>'display:inline']) !!}

              {!! Form::submit('Apagar', ['class' => 'btn btn-danger']) !!}

          {!! Form::close() !!}

      </td>
    </tr>

  @endforeach

  </table>
</div>
{!! $data->render() !!}

@endsection