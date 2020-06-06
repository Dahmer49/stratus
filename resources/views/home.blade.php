@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-md-12">
                        <a style="width: 49.5%" type="button" class="btn btn-primary p-4 mb-3" href="/listagem_categorias">Categorias</a>
                        <a style="width: 49.5%" type="button" class="btn btn-success p-4 mb-3" href="/listagem_produtos">Produtos</a>
                    </div>
                    <div class="col-md-12">
                        <a style="width: 49.5%" type="button" class="btn btn-warning p-4 mb-3" href="/listagem_clientes">Clientes</a>
                        <a style="width: 49.5%" type="button" class="btn btn-info p-4 mb-3" href="/listagem_vendas">Vendas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
