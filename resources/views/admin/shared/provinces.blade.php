@if(!$provinces->isEmpty())
<table class="table">
    <thead>
        <tr>
            <th class="text-center" class="col-md-4">Nombre</th>
            <th class="text-center" class="col-md-4">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($provinces as $province)
        <tr>
            <td class="text-center"> <a href="{{ route('admin.countries.provinces.show', [$country, $province['id']]) }}"></i>{{ $province['name'] }}</a></td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="{{ route('admin.countries.provinces.edit', [$country, $province['id']]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="box-footer">
    {{ $provinces->links() }}
</div>
@endif