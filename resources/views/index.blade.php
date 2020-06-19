@extends('layouts.app')

@section('body')

<div class="content">


        <div class="card-deck">
            <div class="card border border-primary pretty-box">
                <div class="card-body">
                    <h5 class="card-title"><strong>Vendas</strong></h5>
                    <p class="card-text mb-0 metas-fail">
                        <strong>Na semana:</strong> R$ 4.355,15 <i class="fas fa-angle-double-down"></i>
                    </p>
                    <p class="card-text">
                        <strong>No mês:</strong> R$ 8.687,48
                    </p>
                    <div class="home-button">
                        <a href="{{ route('nova_venda') }}" class="btn btn-default">Nova Venda</a>
                    </div>
                </div>
            </div>

            <div class="card border border-primary pretty-box">
                <div class="card-body">
                    <h5 class="card-title"><strong>Metas</strong></h5>
                    <p class="card-text mb-0">
                        <strong>Semanal:</strong> R$ 6.480,15
                    </p>
                    <p class="card-text">
                        <strong>Mensal:</strong> R$ 14.687,48
                    </p>
                    <div class="home-button">
                        <a href="/produtos" class="btn btn-default">Ver Metas</a>
                    </div>
                </div>
            </div>

            <div class="card border border-primary pretty-box">
                <div class="card-body">
                    <h5 class="card-title"><strong>Estoque</strong></h5>
                    <p class="card-text mb-0 metas-success">
                        <strong>Entrada</strong> 560
                    </p>
                    <p class="card-text metas-fail">
                        <strong>Saída</strong> 125
                    </p>
                    <div class="home-button">
                        <a href="{{ route('lista_estoque') }}" class="btn btn-default">Ver Estoque</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border mt-3 table-style">
            <div class="card-body">
                <h5 class="card-title">Ranking de Vendedores</h5>
                <table class="table table-ordered table-hover table-striped" id="table_products">
                    <thead>
                        <tr>
                            <th>Posição</th>
                            <th>Nome</th>
                            <th>Qtd. Vendas</th>
                            <th>Total</th>
                            <th>Satisfação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1°</td>
                            <td>Mariana Braga</td>
                            <td>25</td>
                            <td>R$ 1.465.20</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <td>2°</td>
                            <td>Paulina Bratcho</td>
                            <td>18</td>
                            <td>R$ 1.010.20</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <td>3°</td>
                            <td>Sabrina Sato</td>
                            <td>10</td>
                            <td>R$ 832.65</td>
                            <td>6</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

</div>

@endsection
