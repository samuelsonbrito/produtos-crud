@extends('produto.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Produtos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('produto.create') }}"> Novo Produto</a>
                <a class="btn btn-success" href="{{ route('usuario.index') }}"> Usuarios</a>
                <a class="btn btn-success" href="{{ route('venda.index') }}"> Vendas</a>
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
            <th>PREÇO</th>
            <th>DATA_CRIACAO</th>
            <th width="280px">AÇÕES</th>
        </tr>
        @foreach ($produto as $a)
        <tr>
            <td>{{ $a->NOME }}</td>
            <td>{{ $a->PRECO }}</td>
            <td>{{ \Carbon\Carbon::parse($a->DATA_CRIACAO)->format('d/m/Y') }}</td>
            <td>
                <form action="{{ route('produto.destroy',$a->ID_PRODUTO) }}" method="POST">
       
                    <a class="btn btn-primary" href="{{ route('produto.edit',$a->ID_PRODUTO) }}">Editar</a>
					
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
                    
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $produto->links() !!}
      
@endsection