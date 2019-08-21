<ul class="list-unstyled">
    @foreach($years as $year)
    <li>
        <div class="checkbox">
            <label>
                    <input
                            type="checkbox"
                            @if(isset($selectedIdsC) && in_array($year->id, $selectedIdsC))checked="checked" @endif
                            name="years[]"
                            value="{{ $year->id }}">
                    {{ $year->year }}
                </label>
        </div>
    </li>
    @if($year->children->count() >= 1)
    @include('admin.shared.year-children', ['years' => $year->children, 'selectedIds'
    => $selectedIdsC]) @endif @endforeach
</ul>