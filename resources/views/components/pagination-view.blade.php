<div class="flex justify-center gap-4 mt-8">
    @if ($pagination['page'] > 1)
    <a href="{{Request::url() . '?page=' . $pagination['page'] - 1}}" class="rounded-sm border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white transition ease-in-out duration-150 py-2 px-4">Previous</a>
    @else
    <span class="rounded-sm border border-orange-500 bg-orange-500 text-white py-2 px-4">Previous</span>
    @endif



    @for ($i = 1; $i <= $pagination['total_pages']; $i++) 
        @if($i === $doted && $pagination['page'] > $doted)
            <span class="rounded-sm border border-orange-500 text-orange-500 py-2 px-4">...</span>
        @elseif($i === $pagination['total_pages'] - ($doted) && $pagination['page'] < $pagination['total_pages'] - $doted )
            <span class="rounded-sm border border-orange-500 text-orange-500 py-2 px-4">...</span>
        @endif

        @if($i < $doted || ($pagination['page'] === $doted && $i === $doted) || $i > $pagination['total_pages'] - $doted +1)
            @if($i == $pagination['page'])
            <span class="rounded-sm border border-orange-500 bg-orange-500 text-white py-2 px-4">{{$i}}</span>
            @else
            <a href="{{Request::url() . "?page=" . $i}}" class="rounded-sm border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white transition ease-in-out duration-150 py-2 px-4">{{$i}}</a>
            @endif
        @elseif($pagination['page'] > $doted && $i <= $pagination['page'] + $doted && $i >= $pagination['page'])
            @if($i == $pagination['page'])
            <span class="rounded-sm border border-orange-500 bg-orange-500 text-white py-2 px-4">{{$i}}</span>
            @else
            <a href="{{Request::url() . '?page=' . $i}}" class="rounded-sm border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white transition ease-in-out duration-150 py-2 px-4">{{$i}}</a>
            @endif
        @endif
    @endfor


    @if ($pagination['page'] < $pagination['total_pages']) 
        <a href="{{Request::url() . '?page=' . $pagination['page'] + 1}}" class="rounded-sm border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white transition ease-in-out duration-150 py-2 px-4">Next</a>
    @else
        <span class="rounded-sm border border-orange-500 bg-orange-500 text-white py-2 px-4">Next</span>
    @endif
</div>