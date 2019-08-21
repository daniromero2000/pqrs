<ul class="list-unstyled" style="padding-left: 25px">
    @foreach($years as $year)
    <li>
        <div class="checkbox">
            <label>
                    <input
                            type="checkbox"
                            @if(isset($selectedIds) && in_array($year->id, $selectedIds))checked="checked" @endif
                            name="years[]"
                            value="{{ $year->id }}">
                            {{ $year->year }}
                </label>
        </div>
    </li>
    @endforeach
</ul>