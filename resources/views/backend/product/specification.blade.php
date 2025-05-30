<div class="row" style="background-color: whitesmoke;padding:15px;border-radius: 2%;border: 1px solid #becdff;">
    <table class="table table-bordered" id="specificationTable">
        <div class="error-message"></div>
        <tr>
            <th>Title</th>
            <th>Value</th>
            <th>Action</th>
        </tr>
        @if($page == 'edit')
        @foreach($data['row']->specifications as $specification)
        <tr id="{{$specification->id}}">
            <td>
                <input type="hidden" name="specificationID[]" value="{{$specification->id}}">
                <input type="text" name="specification_title[{{$specification->id}}]" class="form-control" placeholder="Enter Title" value="{{$specification->specification_title}}">
            </td>
            <td>
                <textarea name="specification_value[{{$specification->id}}]" class="form-control">{{$specification->specification_value}}</textarea>
            </td>
            <td>
                <button type="button" class="btn btn-danger btnRemoveSpecification" id="{{$specification->id}}" onclick="return confirm('Are You Sure DO You Want To Delete This Data ?')"> <i class="fa fa-trash"></i></button>
            </td>
        </tr>
            @endforeach
            @else
            <tr>
                <td>
                    <input type="text" name="specification_title[]" class="form-control" placeholder="Enter Title">
                </td>
                <td>
                    <textarea name="specification_value[]" class="form-control"></textarea>
                </td>
                <td>

                </td>
            </tr>
            @endif
    </table>
    <button type="button" class="btn btn-info btnAddMoreSpecifiction"> <i class="fa fa-plus"></i> Add More</button>
</div>
