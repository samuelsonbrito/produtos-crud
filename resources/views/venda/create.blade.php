@extends('venda.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Nova Venda</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('venda.index') }}"> Voltar</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  
<form action="{{ route('venda.store') }}" method="POST">
    
	{{ csrf_field() }}
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<label for="NUMERO_VENDA">NUMERO VENDA: <span class="text-danger">*</span></label>
				<input type="text" id="NUMERO_VENDA" name="NUMERO_VENDA" class="form-control" autofocus required>
			</div>
			<div class="form-group">
				<label for="DATA_VENDA">DATA VENDA: </label>
				<input type="date" id="DATA_VENDA" name="DATA_VENDA" class="form-control" required>
			</div>			
			<div class="form-group">
				<label for="VENDEDOR_RESPONSAVEL">VENDEDOR: <span class="text-danger">*</span></label>
				<select name="VENDEDOR_RESPONSAVEL" class="form-control" required>
					<option>--Selecione--</option>
					@foreach($usuario as $c)
					 <option value="{{ $c->ID_USUARIO}}">{{ $c->NOME}}</option>
					@endforeach
				</select>
            </div>
            
            <div class="form-group">
				<label for="PRODUTO_ID">PRODUTO: <span class="text-danger">*</span></label>
				<select name="PRODUTO_ID" class="form-control" required>
					<option>--Selecione--</option>
					@foreach($produto as $c)
					 <option value="{{ $c->ID_PRODUTO}}">{{ $c->NOME}}</option>
					@endforeach
				</select>
			</div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">SALVAR</button>
        </div>
    </div>
   
</form>
@endsection