@extends('usuario.layout')

@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Usuarios</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-primary" href="{{ route('usuario.index') }}"> Voltar</a>
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

<form action="{{ route('usuario.store') }}" method="POST">

	{{ csrf_field() }}

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<label for="NOME">NOME: <span class="text-danger">*</span></label>
				<input type="text" id="NOME" name="NOME" class="form-control" autofocus required>
			</div>
			<div class="form-group">
				<label for="SENHA">SENHA: <span class="text-danger">*</span></label>
				<input type="password" id="SENHA" name="SENHA" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="CEP">CEP: <span class="text-danger">*</span></label>
				<input id="CEP" name="CEP" type="text" class="form-control" placeholder="CEP" required/>
				<button id='buscacep' class="btn btn-success" type='button'>Pesquisar CEP</button>
				<span id='statuscep'></span>
			</div>

			<div class="form-group">
				<label for="RUA">RUA: <span class="text-danger">*</span></label>
				<input type="text" id="RUA" name="RUA" class="form-control" autofocus required>
			</div>
			
			<div class="form-group">
				<label for="DATA_CRIACAO">DATA_CRIACAO: <span class="text-danger">*</span></label>
				<input type="date" id="DATA_CRIACAO" name="DATA_CRIACAO" class="form-control" autofocus required>
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			<button type="submit" class="btn btn-primary">Salvar</button>
		</div>
	</div>

</form>

<script type="text/javascript">
	$('#buscacep').on('click', function() {
		var route = "http://viacep.com.br/ws/" + $('#CEP').val() + "/json/";
		$.ajax({
			type: 'get',
			url: route,
			//data:{'term':$('#CEP').val()},
			success: function(data) {
				$('#RUA').val(data.logradouro);				
			},
			error: function(data) {
				$('#statuscep').html('Erro!!!');
			}
		});
	})
</script>

@endsection