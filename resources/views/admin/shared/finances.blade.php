@if(!$finances->isEmpty())
<table class="table">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Estado</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($finances as $finance)
        <tr>
            <td>{{ $finance->sku }}</td>
            <td>
                @if($admin->hasPermission('view-product'))
                <a href="{{ route('admin.finances.show', $finance->id) }}">{{ $finance->name }}</a> @else {{ $finance->name
                }} @endif
            </td>
            <td>{{ $finance->quantity }}</td>
            <td>{{ config('cart.currency_symbol') }} {{ number_format($finance->price, 0, '.', ',') }}</td>
                       <td>
                <form action="{{ route('admin.finances.destroy', $product->id) }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                    <div class="btn-group">
                        @if($user->hasPermission('update-finance'))<a href="{{ route('admin.finances.edit', $product->id) }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>@endif @if($user->hasPermission('delete-finance'))
                        <button onclick="return confirm('¿Estás Seguro?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Borrar</button>@endif
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif