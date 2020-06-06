@extends('layouts.app')

@section('content')

<script type="application/javascript"
  src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
  crossorigin="anonymous"></script>
<script type="application/javascript" src="https://unpkg.com/axios/dist/axios.min.js"></script>

<div class="container">

	<div class="col-md-12 form-group">
		<label for="cliente_id">Cliente: <span class="text-danger">*</span></label>
		<select class="form-control" id="cliente_id" name="cliente_id" required>
	</div>
		@foreach($clientes as $cliente)
				<option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
		@endforeach
	</select>

    <div class="mt-3 mb-3">
        <button type="button" class="btn btn-primary" onclick="adicionarLinha();">Adicionar Produto</button>
    </div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Produto</th>
				<th>Quantidade</th>
				<th>Valor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<tr class="linhaProduto">
				<td>
					<select class="form-control" onchange="popularValorUnitario(this);" name="produto_id">
						<option value="">Selecione um produto</option>
						@foreach($produtos as $produto)
							<option valor="{{ $produto->valor }}" value="{{ $produto->id }}">{{ $produto->nome }}</option>
						@endforeach
					</select>
				</td>
				<td>
					<input class="form-control" type="number" name="quantidade">
				</td>
				<td>
					<input class="form-control" type="number" name="valor" disabled>
				</td>
			</tr>
		</tbody>
	</table>

    <div class="col-md-12 text-center">
        <button class="btn btn-success" onclick="enviarForm()">
            <i class="fas fa-check"></i>
            Salvar
        </button>
        <a type="button" class="btn btn-secondary" href="/listagem_vendas">
            <i class="fas fa-chevron-left"></i>
            Voltar
        </a>
    </div>

</div>

<script type="application/javascript">

	function adicionarLinha()
	{
		let linha = $('.linhaProduto:last').clone();
		$('tr:last').after(linha);
	}

	function popularValorUnitario(select2)
	{
		$(select2).parent().parent().find('[name="valor"]').val('');

		valor = $('option:selected', select2).attr('valor');

		$(select2).parent().parent().find('[name="valor"]').val(parseFloat(valor));
	}

	function enviarForm()
	{
		let clienteId = $('#cliente_id').val();
		let produto = $('[name="produto_id"]')
		let quantidade = $('[name="quantidade"]');
		let valor = $('[name="valor"]');

		let data = {
			cliente_id: clienteId,
			produtos: []
		}

		let quantidadeProdutos = produto.length;

		for(let i = 0; i < quantidadeProdutos; i++)
		{
			data.produtos.splice(i, 0, {
				produto_id: produto[i].value,
				quantidade: quantidade[i].value,
				valor: valor[i].value,
			});
		}

		axios.post('/cadastrar_venda', data).then(() => {
			window.location.href = '/listagem_vendas';
		});
	}

</script>
@endsection