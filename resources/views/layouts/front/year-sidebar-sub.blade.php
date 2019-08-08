@foreach($subs as $sub) <a href="{{ route('front.year.slug', $year->slug) }}">{{ $year->year }}</a>
<ul class="list-unstyled sidebar-category-sub">
    <li @if(request()->segment(2) == $sub->slug) class="active" @endif ><a
            href="{{ route('front.year.slug', $sub->slug) }}">{{ $sub->name }}</a></li>
</ul> @endforeach