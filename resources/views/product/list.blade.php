@extends('app')

@section ('content')

    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-3">Produtos</h4>
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>SKU</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
