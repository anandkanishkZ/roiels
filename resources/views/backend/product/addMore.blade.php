<script type="text/javascript">
    $(document).ready(function(){
        var x = 1;
        var y = 1;
    $(".btnAddMoreSpecifiction").click(function(){
    $("#specificationTable tr:last").after(
        '<tr>'
        + '<td><input type="text" name="specification_title[]" class="form-control" placeholder="Enter Title"></td>'
        + '<td><textarea name="specification_value[]" class="form-control"></textarea></td>'
        + '<td><button type="button" class="btn btn-danger removeSpecificationBtn" onclick="return confirm(\'Are You Sure  Do You Want To Delete This Data ?\')"><i class="fa fa-trash"></i></button></td>'
        + '</tr>'
    );
    });
    $("#specificationTable").on('click','.removeSpecificationBtn', function(){
        $(this).parents("tr").remove();
    });

    $(".btnAddMoreWholesale").click(function(){
        $("#wholesaleTable tr:last").after(
            '<tr>'
            + '<td><input type="number" name="wholesale_qty[]" class="form-control" placeholder="Enter Quantity"></td>'
            + '<td><input type="number" name="wholesale_price[]" class="form-control" placeholder="Enter Price"></td>'
            + '<td><button type="button" class="btn btn-danger removeWholesaleBtn" onclick="return confirm(\'Are You Sure  Do You Want To Delete This Data ?\')"><i class="fa fa-trash"></i></button></td>'
            + '</tr>'
        );
    });
        $("#wholesaleTable").on('click','.removeWholesaleBtn', function(){
            $(this).parents("tr").remove();
        });
    $(".btnAddMore").click(function(){
        x++;
        $("#sizeTable tr:last").after(
        '<tr>'
        + '<td>  <input type="text" name="size_title[]" class="form-control" placeholder="Enter Size "></td>'
        + '<td><button type="button" class="btn btn-danger removeBtn" onclick="return confirm(\'Are You Sure  Do You Want To Delete This Data ?\')"><i class="fa fa-trash"></i></button></td>'
        + '</tr>'
        );
    });
    $("#sizeTable").on('click', '.removeBtn', function(){
        $(this).parents('tr').remove().slideUp(2000);
        x--;
    });
    $(".btnAddMoreItinery").click(function(){
        y++;
        $("#colorTable tr:last").after(
        '<tr>'
        + '<td><input type="text" name="color_title[]" class="form-control" placeholder="Enter Color"></td>'
        + '<td><button type="button" class="btn btn-danger itineryRemoveBtn" onclick="return confirm(\'Are You Sure  Do You Want To Delete This Data ?\')"><i class="fa fa-trash"></i></button></td>'
        + '</tr>'
        );
    });
    $("#colorTable").on('click','.itineryRemoveBtn', function(){
        $(this).parents('tr').remove();
        y--;
    });
    });
</script>
