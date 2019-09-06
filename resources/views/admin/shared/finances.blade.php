@if(!$finances->isEmpty())
<table class="table">
    <thead>
        <tr>
            <th class="text-center" scope="col">Nombre</th>
            <th class="text-center" scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($finances as $finance)
        <tr>
            <td class="text-center">
                @if($user->hasPermission('view-finance'))
                <a href="{{ route('admin.finances.show', $finance->id) }}">{{ $finance->name }}</a> @else {{ $finance->name
                }} @endif
            </td>
            <td class="text-center">
                <form action="{{ route('admin.finances.destroy', $finance->id) }}" method="post"
                    class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                    <div class="btn-group">
                        @if($user->hasPermission('update-finance'))<a
                            href="{{ route('admin.finances.edit', $finance->id) }}" class="btn btn-primary btn-sm"><i
                                class="fa fa-edit"></i> Editar</a>@endif @if($user->hasPermission('delete-finance'))
                        <button onclick="return confirm('¿Estás Seguro?')" type="submit"
                            class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Borrar</button>@endif
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif