@extends('app')

@section ('content')

    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning" role="alert">
                Deseja remover este produto?
            </div>
            <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post">
                @method('DELETE')
                @csrf
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>SKU</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->description }}</td>
                        </tr>
                    </tbody>
                </table>
                
                <button type="submit" class="btn btn-danger">Sim</button>
                <a href="{{ route('products.list') }}" class="btn btn-secondary">Não</a>
            </form>
        </div>
    </div>

@endsection
