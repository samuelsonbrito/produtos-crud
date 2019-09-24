@extends('usuario.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>USUARIO</h2>
            </div> 
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('usuario.create') }}"> Novo Usuario</a>
                <a class="btn btn-success" href="{{ route('venda.index') }}"> Venda</a>
                <a class="btn btn-success" href="{{ route('produto.index') }}"> Produto</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>NOME</th>
            <th>CEP</th>
            <th>RUA</th>
            <th width="280px">AÇÕES</th>
        </tr>
        @foreach ($usuario as $a)
        <tr>
            <td>{{ $a->NOME }}</td>
            <td>{{ $a->CEP }}</td>
            <td>{{ $a->RUA }}</td>
            <td>
                <form action="{{ route('usuario.destroy',$a->ID_USUARIO) }}" method="POST">
       
                    <a class="btn btn-primary" href="{{ route('usuario.edit',$a->ID_USUARIO) }}">Editar</a>
					
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
                    
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
@endsection