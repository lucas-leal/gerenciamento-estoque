@extends('app')

@section ('content')

    <div class="row">
        <div class="col-md-8">
            <div class="mb-3">
                <h4 class="mb-3 d-inline">Relatório de movimentação</h4>
            </div>
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>SKU</th>
                        <th>Quantidade</th>
                        <th>Tipo</th>
                        <th>Origem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reportDays as $reportDay)
                        <tr>
                            <td colspan="4" class="text-center bg-light font-weight-bold">{{ $reportDay->date->format('d/m/Y') }}</td>
                        </tr>

                        @forelse ($reportDay->stockHandlings as $stockHandling)
                            <tr>
                                <td>{{ $stockHandling->product->sku }}</td>
                                <td>{{ $stockHandling->getAbsoluteAmount() }}</td>
                                <td>
                                    @if ($stockHandling->isAddition())
                                        <span class="badge badge-info">Adição</span>
                                    @else
                                        <span class="badge badge-secondary">Remoção</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-light">{{ $originPtBr[$stockHandling->origin] }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center font-weight-light">Não houve movimentações neste dia</td>
                            </tr>
                        @endforelse
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <h4 class="mb-3 d-inline">Estoque baixo</h4>
            </div>
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>SKU</th>
                        <th>Disponível</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productsInLowStock as $product)
                        <tr>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->calculateAmountInStock() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
