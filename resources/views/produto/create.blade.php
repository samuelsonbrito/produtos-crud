@extends('produto.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Produto</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('produto.index') }}"> Voltar</a>
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
  
<form action="{{ route('produto.store') }}" method="POST">
    
	{{ csrf_field() }}
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<label for="NOME">NOME: <span class="text-danger">*</span></label>
				<input type="text" id="NOME" name="NOME" class="form-control" autofocus required>
			</div>
			<div class="form-group">
				<label for="DATA_NASCIMENTO">PREÇO: <span class="text-danger">*</span></label>
				<input type="text" id="PRECO" name="PRECO" class="form-control" required>
			</div>	
			<div class="form-group">
				<label for="DATA_CRIACAO">DATA_CRIACAO: <span class="text-danger">*</span></label>
				<input type="date" id="DATA_CRIACAO" name="DATA_CRIACAO" class="form-control" required>
			</div>			
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
   
</form>
@endsection