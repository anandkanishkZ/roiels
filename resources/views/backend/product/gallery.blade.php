<div class="row" style="background-color: whitesmoke;padding:15px;border-radius: 2%;border: 1px solid #becdff;">
    <table class="table table-bordered" id="itineryTable">
        <div class="error-message"></div>
        <tr>
            <th>S.N</th>
            <th colspan="2">Image</th>
            <th>Action</th>
        </tr>
        @if($page == 'edit')
            @foreach($data['row']->images as $imgID => $image)
        <tr>
            <input type="hidden" name="productImageID[]" value="{{$image->id}}">
            <td>{{$imgID + 1}}</td>
            <td><input type="file" name="product_image[{{$image->id}}]"> </td>
            <td><img src="{{asset('images/product/gallery/' . $image->product_image)}}" height="120" width="190"></td>
            <td><button class="btn btn-danger productImageDeleteBtn" id="{{$image->id}}" onclick="return confirm('Are You Sure Do You Want To Delete This Image ?')"><i class="fa fa-trash"></i></button> </td>
        </tr>
            @endforeach

            <tr>
                <td></td>
                <td><input type="file" name="product_image[]" multiple></td>
                <td></td>
            </tr>
            @else
            <tr>
                <td></td>
                <td><input type="file" name="product_image[]" multiple></td>
                <td></td>
            </tr>
            @endif

    </table>
</div>
