@extends('layouts.app')

@section('content')

<script type="application/javascript"
  src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
  crossorigin="anonymous"></script>
<script  type="application/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>

<div class="container">

    <div class="col-md-12 mb-4">
        <h4>Edição do cliente: {{ $cliente->nome }}</h4>
    </div>

    <form method="POST" action="/editar_cliente/{{ $cliente->id }}">
        @csrf

        <div class="col-md-12 form-group">
            <label for="nome">Nome: <span class="text-danger">*</span></label>
            <input class="form-control" type="text" id="nome" name="nome" required value="{{ $cliente->nome }}">
        </div>
        <div class="col-md-12 form-group">
            <label for="cpf">CPF: <span class="text-danger">*</span></label>
            <input class="form-control" type="text" id="cpf" name="cpf" required value="{{ $cliente->cpf }}">
        </div>
        <div class="col-md-12 form-group">
            <label for="telefone">Telefone: <span class="text-danger">*</span></label>
            <input class="form-control" type="text" id="telefone" name="telefone" required value="{{ $cliente->telefone }}">
        </div>
        <div class="col-md-12 form-group">
            <label for="email">Email: <span class="text-danger">*</span></label>
            <input class="form-control" type="email" id="email" name="email" required value="{{ $cliente->email }}">
        </div>
        <div class="col-md-12 form-group">
            <label for="data_nascimento">Data de Nascimento: <span class="text-danger">*</span></label>
            <input class="form-control" type="date" id="data_nascimento" name="data_nascimento" required value="{{ $cliente->data_nascimento }}">
        </div>
        <div class="col-md-12 text-center">
            <button class="btn btn-success" type="submit">
                <i class="fas fa-check"></i>
                Salvar
            </button>
            <a type="button" class="btn btn-secondary" href="/listagem_clientes">
                <i class="fas fa-chevron-left"></i>
                Voltar
            </a>
        </div>
    </form>

<script type="application/javascript">

    $(document).ready(function(){
        var cs_cpf_cnpjMaskBehavior = function (val) {
            return '000.000.000-009';
        },
        cs_options_maskCpf_cnpj = {
            onKeyPress: function(val, e, field, options) {
                field.mask(cs_cpf_cnpjMaskBehavior.apply({}, arguments), options);
            }
        };
        $('#cpf').attr('type', 'tel');
        $('#cpf').mask(cs_cpf_cnpjMaskBehavior, cs_options_maskCpf_cnpj);

        $('#telefone').mask('(00) 00000-0000');

        $('input[type=text].mask_cep,input[type=string].mask_cep').attr('type', 'tel');
        $('input.mask_cep').mask('00000-000');
    });

</script>

@endsection