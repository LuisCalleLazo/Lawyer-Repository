{{-- ITEM NAV --}}

<a href="{{route($link)}}">
    <div class="flex justify-around hover:bg-gray-900 py-1
        {{request()->is($link) ? 'bg-gray-900' : ''}}">
        <div class="flex justify-center items-center h-8 w-20 min-w-20
        group-hover:scale-110 duration-75 ease-linear
        {{request()->is($link) ? 'scale-110' : ''}}">
            <i class="{{$icon}}"></i>
        </div>
        <div class="flex justify-center items-center h-8 flex-grow
        group-hover:text-lg duration-100 ease-linear hover:font-semibold
        {{request()->is($link) ? 'font-semibold text-lg' : ''}}">
            <h2 class="w-full">{{$title}}</h2>
        </div>
    </div>
</a>
