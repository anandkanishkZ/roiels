<div class="col-md-12">
    <table class="table table-bordered" id="colorTable">
        <div class="error-message"></div>
        <tr>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>
                @if($page == 'create')
                <input type="text" name="title[]" class="form-control" placeholder="Enter Status" required>
                    @else
                    <input type="text" name="title" value="{{$data['row']->title}}" class="form-control" placeholder="Enter Status" required>
                    @endif
            </td>
        </tr>
    </table>
    @if($page == 'create')
    <button type="button" class="btn btn-info btnAddMoreItinery"> <i class="fa fa-plus"></i> Add More</button>
        @endif
</div>
