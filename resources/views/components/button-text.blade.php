

<button style="background-color: {{$bg}}; color: {{$color}}; width: {{$width ?? ''}}" id={{$id}}
    class="py-2 px-7 rounded-lg hover:scale-110 ease-linear duration-150"
    onclick="{{$function ?? ''}}{{ isset($params) ? '(' . json_encode($params) . ')' : '()' }}">
    {{ $slot }}{{$text}}
</button>
