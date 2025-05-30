<style>.col-md-2.cbox{line-height: 40px}</style>
<div class="row" style="background-color: whitesmoke;padding:15px;border-radius: 2%;border: 1px solid #becdff;">
    @foreach($data['colors'] as $color)
     <div class="col-md-2 cbox">
         @if($page == 'edit')
             @if(in_array($color->id, $assignedColor))
                 <input type="checkbox" name="color_id[{{$color->id}}]" value="{{$color->id}}" checked> &nbsp; {{$color->title}}
             @else
                 <input type="checkbox" name="color_id[{{$color->id}}]" value="{{$color->id}}"> &nbsp; {{$color->title}}
             @endif
             @else
             <input type="checkbox" name="color_id[]" value="{{$color->id}}"> &nbsp; {{$color->title}}
             @endif
     </div>
    @endforeach
</div>
