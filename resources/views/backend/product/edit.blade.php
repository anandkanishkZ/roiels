@extends('layouts.backend')
@section('title', $panel . ' ' . $action)
@section('css')
    <style>
        .required:after{
            color: red;
            font-size: 15px;
            font-family: Tahoma;
            content: '*';
        }
        .category-list{
            list-style: none;
            margin-left: -40px;
        }
        .category-list li {
            border-bottom: 1px solid #aeb5bb;
            margin-bottom: 15px;
        }
         input[type="checkbox"] {float: left; margin: 14px 0 0 0;}
    .sub{margin-bottom:0px;

    }
    </style>
@endsection
@section('js')
    @include($view_path . '.addMore')
    <script>
        $(document).ready(function(){
            $(".category").click(function(){
               var catId = $(this).attr('id');
               $("#" + catId).click(function(){
                  $(catId).toggle();
               });
            });
            $(".productImageDeleteBtn").click(function(){
                var id = $(this).attr('id');
                var path = '{{route('frontend.product.deleteImageGalleryBYID')}}';
                $.ajax({
                    type: 'DELETE',
                    data: {'id' : id},
                    url: path,
                    beforeSend: function(){
                        $(".error-message").html('Please Wait Data Is Deleting...').css({'background-color': '#dc3545','color': '#fff','padding': '8px'});
                    },
                    success: function(res){
                        if(res == 'success'){
                            $("#" + id).fadeOut();
                            $(".error-message").html('Data Deleted Successfuly').css({'background-color': 'green','color': '#fff','padding': '8px'});
                        }
                    },
                    error: function(){
                        alert('Sorry Data Can Not Delete !!!')
                    }
                });

            });
            $(".btnRemoveSpecification").click(function(){
                var id = $(this).attr('id');
                var path = '{{route('backend.product.deleteProductSpecificationByID')}}';
                $.ajax({
                    type: 'DELETE',
                    data: {'id' : id},
                    url: path,
                    beforeSend: function(){
                    $(".error-message").html('Please Wait Data Is Deleting...').css({'background-color': '#dc3545','color': '#fff','padding': '8px'});
                    },
                    success: function(res){
                        if(res == 'success'){
                            $("#" + id).fadeOut();
                            $(".error-message").html('Data Deleted Successfuly').css({'background-color': 'green','color': '#fff','padding': '8px'});
                        }
                    },
                    error: function(){
                        alert('Sorry Data Can Not Delete !!!')
                    }
                })
            });
            $(".btnRemoveWholesale").click(function(){
                var id = $(this).attr('id');
                var path = '{{route('backend.product.deleteProductWholesaleByID')}}';
                $.ajax({
                    type: 'DELETE',
                    data: {'id' : id},
                    url: path,
                    beforeSend: function(){
                        $(".error-message").html('Please Wait Data Is Deleting...').css({'background-color': '#dc3545','color': '#fff','padding': '8px'});
                    },
                    success: function(res){
                        if(res == 'success'){
                            $("#" + id).fadeOut();
                            $(".error-message").html('Data Deleted Successfuly').css({'background-color': 'green','color': '#fff','padding': '8px'});
                        }
                    },
                    error: function(){
                        alert('Sorry Data Can Not Delete !!!')
                    }
                })
            });
            $("#category_id").on('change', function(){
                var id = $(this).val();
                var path = '{{route('backend.productline.getSubcategoryByCategoryID')}}';
                $.ajax({
                    type: 'POST',
                    data: {'id' : id},
                    url: path,
                    beforeSend: function(){
                        $("#subcategory_id").html('<option>loading...</option>');
                    },
                    success: function(res){
                        $("#subcategory_id").empty();
                        $("#subcategory_id").html(res);
                    },
                    error: function(){
                        alert('Choose Category');
                    }
                });
            });
            $("#subcategory_id").on('change', function(){
                var id = $(this).val();
                var path = '{{route('backend.product.getproductLineBySubCategoryID')}}';
                $.ajax({
                    type: 'POST',
                    data: {'id' : id},
                    url: path,
                    beforeSend: function(){
                        $("#productline_id").html('<option>loading...</option>');
                    },
                    success: function(res){
                        $("#productline_id").empty();
                        $("#productline_id").html(res);
                    },
                    error: function(){
                        alert('Choose Subcategory');
                    }
                });
            });
            $("#deal_of").on('click', function(){
                var checkedValue = $("input[name='deal_of']:checked").val();
                if(checkedValue == 1){
                    $("#offerExpiry").show();
                } else{
                    $("#offerExpiry").hide();
                }
            });
        });
    </script>
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$panel}} Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">{{$action}} {{$panel}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$action}} {{$panel}}   <a href="{{route($base_route . '.index')}}" class="btn btn-info">  <i class="fa fa-pen"></i> Manage {{$panel}}</a></h3>
            </div>
            {{Form::model($data['row'], ['route' => [$base_route . '.update', $data['row']->id], 'method' => 'post', 'files' => true])}}
            @METHOD('put')
            <div class="card-body">
                @include('backend.includes.flash_messge')
                @include($view_path . '.mainForm', ['page' => 'edit'])
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-pen"></i> Update</button>
            </div>
        {{Form::close()}}
        <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection
