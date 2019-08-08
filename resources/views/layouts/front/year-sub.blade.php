<ul class="nav nav-pills flex-column">
    <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#{{$year->slug}}" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="true">{{$year->year}} <span class="pull-right-container"> <i
                    class="fa fa-angle-down pull-right"> </i> </span></a>
        <div id="{{$year->slug}}" class="collapse">
            <ul class="nav flex-column ml-3">
                <li class="nav-item"> @foreach($subs as $sub)
                <li><a href="{{route('front.category.slug', $sub->slug)}}"><small>{{$sub->name}}</small></a></li>
                @endforeach
    </li>
</ul>
</div>
</li>
</ul>