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

<form action="{{ route('usuario.update',$usuario->ID_USUARIO) }}" method="POST">
	{{ method_field('PATCH') }}
	{{ csrf_field() }}

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<label for="NOME">NOME: <span class="text-danger">*</span></label>
				<input type="text" name="NOME" id="NOME" value="{{ $usuario->NOME }}" class="form-control" placeholder="NOME">
			</div>
			<div class="form-group">
				<label for="SENHA">SENHA: <span class="text-danger">*</span></label>
				<input type="text" name="SENHA" id="SENHA" value="{{ $usuario->SENHA }}" class="form-control" placeholder="NOME">
			</div>
			<div class="form-group">
				<label for="CEP">CEP: <span class="text-danger">*</span></label>
				<input id="CEP" name="CEP" value="{{ $usuario->CEP }}" type="text" class="form-control" placeholder="CEP" />
				<button id='buscacep' class="btn btn-success" type='button'>Pesquisar CEP</button>
				<span id='statuscep'></span>
			</div>
			<div class="form-group">
				<label for="RUA">RUA: <span class="text-danger">*</span></label>
				<input type="text" id="RUA" value="{{ $usuario->RUA }}" name="RUA" class="form-control" autofocus required>
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