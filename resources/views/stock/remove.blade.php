@extends('app')

@section ('content')

    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-3">Remover estoque</h4>
            <form action="{{ route('stock.remove') }}" method="post">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="sku">SKU</label>
                        <input type="text" name="sku" id="sku" value="{{ old('sku') }}" class="form-control @error('sku') is-invalid @enderror">
                        <div class="invalid-feedback">
                            @error('sku')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="amount">Quantidade</label>
                        <input type="number" name="amount" id="amount" value="{{ old('amount') }}" class="form-control @error('amount') is-invalid @enderror">
                        <div class="invalid-feedback">
                            @error('amount')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Remover</button>
            </form>
        </div>
    </div>

@endsection
