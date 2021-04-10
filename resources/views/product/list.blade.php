@extends('app')

@section ('content')

    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <h4 class="mb-3 d-inline">Produtos</h4>
                <a href="{{ route('products.create') }}" class="btn btn-primary float-right">Novo</a>
            </div>
            <table class="table table-hover table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>SKU</th>
                        <th>Descrição</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <a href="{{ route('products.delete', ['id' => $product->id]) }}" class="btn btn-danger btn-sm float-right ml-2">Remover</a>
                                <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-secondary btn-sm float-right">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
