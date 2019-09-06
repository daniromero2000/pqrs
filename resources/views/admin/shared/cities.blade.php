<table class="table">
    <thead>
        <tr>
            <td class="text-center" class="col-md-4">Nombre</td>
            <td class="text-center" class="col-md-4">Opciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach($cities as $city)
        <tr>
            <td class="text-center">{{ $city['name'] }}</td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="{{ route('admin.countries.provinces.cities.edit', [$countryId, $province->id, $city['id']]) }}" class="btn btn-primary"><i class="fa fa-eye"></i> Editar</a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>