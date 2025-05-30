<style>.col-md-2.cbox{line-height: 40px}</style>
<div class="row" style="background-color: whitesmoke;padding:15px;border-radius: 2%;border: 1px solid #becdff;">

    @foreach($data['sizes'] as $size)
        <div class="col-md-2 cbox">
            @if($page == 'edit')
                @if(in_array($size->id, $assignedSize))
                    <input type="checkbox" name="size_id[{{$size->id}}]" value="{{$size->id}}" checked> &nbsp; {{$size->title}}
                @else
                    <input type="checkbox" name="size_id[{{$size->id}}]" value="{{$size->id}}"> &nbsp; {{$size->title}}
                @endif
                @else
                <input type="checkbox" name="size_id[]" value="{{$size->id}}"> &nbsp; {{$size->title}}
                @endif
        </div>
    @endforeach

</div>
