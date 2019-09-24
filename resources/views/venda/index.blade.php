@extends('venda.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Vendas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('venda.create') }}"> Nova Venda</a>
                <a class="btn btn-success" href="{{ route('usuario.index') }}"> Usuario</a>
                <a class="btn btn-success" href="{{ route('produto.index') }}"> Produto</a>
                <a class="btn btn-success" target='_blank' href="{{ url('relatorio') }}"> Relatório PDF</a>
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
            <th>DATA VENDA</th>
            <th width="280px">AÇÕES</th>
        </tr>
        @foreach ($venda as $a)
        <tr>
            <td>{{ \Carbon\Carbon::parse($a->DATA_VENDA)->format('d/m/Y') }}</td>
            <td>
                <form action="{{ route('venda.destroy',$a->ID_VENDA) }}" method="POST">
       
                    <a class="btn btn-primary" href="{{ route('venda.edit',$a->ID_VENDA) }}">Editar</a>
					
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
                    
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
      
@endsection