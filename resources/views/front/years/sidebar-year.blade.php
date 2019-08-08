<ul class="navbar sidebar-menu"> @foreach($years as $year) @if($year->children()->count() > 0)<li>
        @include('layouts.front.year-sidebar-sub', ['subs' => $year->children])</li> @else<li @if(request()->
        segment(2) == $year->slug) class="active" @endif><a
            href="{{ route('front.year.slug', $year->slug) }}">{{ $year->year }}</a></li> @endif @endforeach
</ul>