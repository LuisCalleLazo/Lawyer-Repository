

<button style="background-color: {{$bg}}; color: {{$color}}; width: {{$width ?? ''}}; height: {{$height ?? ''}}"
    class="p-2 px-7 rounded-lg hover:scale-110 ease-linear duration-150"
    onclick="{{$function}}('{{ isset($params) ? json_encode($params) : '{}' }}')">
    <i class="{{$icon}}" style="width: {{$width ?? ''}}"></i>
</button>
