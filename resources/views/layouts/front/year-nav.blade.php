<ul class="list-unstyled list-inline sidebar navbar-nav navbar-navside"> 
    @foreach($years as $year)
    <li> 
        @if($year->children()->count() > 0) @include('layouts.front.year-sub', ['subs' => $year->children])
        @else <a @if(request()->segment(2) == $year->slug) class="active" @endif
            href="{{route('front.year.slug', $year->slug)}}">{{$year->year}} </a> @endif</li> @endforeach
</ul>