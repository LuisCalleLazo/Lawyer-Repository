

<table class="bg-gray-900 w-full rounded-2xl">
    <thead>
        @foreach ( $titles as $title)
            <th class="py-4 border-b-[3px]">{{$title}}</th>
        @endforeach
    </thead>
    <tbody>


        {{-- FILAS --}}
        @foreach ( $fields as $field)

            <tr>
                {{-- CAMPOS --}}
                @for ($i = 1; $i < count($field); $i++)
                    @if ($hasIcon && $i == 1)
                        <td class="text-center py-3 border-t-[1px] flex justify-center items-center">
                            <img src="{{$field[1]}}" alt="" class=" w-14 rounded-full">
                        </td>
                    @else
                        <td class="text-center py-3 border-t-[1px]">{{$field[$i]}}</td>
                    @endif
                @endfor

                {{-- BUTTONS --}}
                @foreach ($buttons as $button)
                    <td class="text-center py-3 border-t-[1px]">
                        <x-button-icon icon="{{$button[0]}}" bg="{{$button[1]}}" color="{{$button[2]}}" function="{{$button[3]}}" :params="$field"/>
                    </td>
                @endforeach
            </tr>

        @endforeach



        <tr>
            <td colspan="{{count($titles)}}" class="text-center border-y-2">
                <div class="flex justify-center items-center w-[40vw] m-auto relative">
                    <button id="prevButton" class="bg-red-500 text-white px-5 py-1 mr-4 rounded-l-lg"><</button>
                    <div class="flex overflow-x-auto no-scrollbar">
                        <div class="flex whitespace-nowrap py-5" id="scrollContainer">
                            @for ($i = 1; $i <= $totalPages; $i++)
                                <button class="{{ $pageNumber == $i ? "bg-blue-400" : "bg-blue-700" }} w-[30px] h-[30px] rounded-lg  font-bold mx-4 min-w-[30px] hover:pointer
                                    duration-75 ease-in-out hover:cursor-pointer hover:scale-125 flex">
                                    <a href="{{route($link, ['pageNumber' => $i])}}" class="w-full h-full rounded-lg ">
                                        {{$i}}
                                    </a>
                                </button>
                            @endfor
                        </div>
                    </div>
                    <button id="nextButton" class="bg-red-500 text-white px-5 ml-4 py-1 rounded-r-lg">></button>
                </div>
            </td>
        </tr>
    </tbody>
</table>

<script>
    // document.addEventListener('DOMContentLoaded', function () {
        const scrollContainer = document.getElementById('scrollContainer');
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');
        const content = document.getElementById('content');

        nextButton.addEventListener('click', function () {
            scrollContainer.scrollLeft += scrollContainer.offsetWidth;
        });

        prevButton.addEventListener('click', function () {
            scrollContainer.scrollLeft -= scrollContainer.offsetWidth;
        });
    // });
</script>
