<div class="row" style="background-color: whitesmoke;padding:15px;border-radius: 2%;border: 1px solid #becdff;">
    <table class="table table-bordered" id="wholesaleTable">
        <div class="error-message"></div>
        <tr>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        @if($page == 'edit')
            @foreach($data['row']->wholesales as $wholesale)
                <tr id="{{$wholesale->id}}">
                    <td>
                        <input type="hidden" name="wholesaleID[]" value="{{$wholesale->id}}">
                        <input type="number" name="wholesale_qty[{{$wholesale->id}}]" class="form-control" placeholder="Enter Quantity" value="{{$wholesale->wholesale_qty}}">
                    </td>
                    <td>
                        <input type="number" name="wholesale_price[{{$wholesale->id}}]" class="form-control" placeholder="Enter Price" value="{{$wholesale->wholesale_price}}">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btnRemoveWholesale" id="{{$wholesale->id}}" onclick="return confirm('Are You Sure DO You Want To Delete This Data ?')"> <i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>
                    <input type="number" name="wholesale_qty[]" class="form-control" placeholder="Enter Quantity">
                </td>
                <td>
                    <input type="number" name="wholesale_price[]" class="form-control" placeholder="Enter Price">
                </td>
                <td>

                </td>
            </tr>
        @endif
    </table>
    <button type="button" class="btn btn-info btnAddMoreWholesale"> <i class="fa fa-plus"></i> Add More</button>
</div>
