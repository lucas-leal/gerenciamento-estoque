@extends('app')

@section ('content')

    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-3">Novo produto</h4>
            <form action="{{ route('products.store') }}" method="post">
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

                    <div class="form-group col-md-9">
                        <label for="description">Descrição</label>
                        <input type="text" name="description" id="description" value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror">
                        <div class="invalid-feedback">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>

@endsection
