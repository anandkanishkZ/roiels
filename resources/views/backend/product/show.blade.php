@extends('layouts.backend')
@section('title', $panel . ' ' . $action)
@section('css')
    <style>
        .image-gallery li{
            border: 1px solid #cfd1d6;
            width: 110px;
            height: 110px;
            padding: 5px;
            display: inline-block;
            margin-left: 10px;
            background-color: #f5f9ff;
            border-radius: 6px;
            position: relative;
        }
        .image-gallery li button{
            top:3px;
            right: 3px;
            position: absolute;
            background-color: red;
            padding: 0 4px;
            color: #fff;
        }
        .cat li{
            list-style-type: circle;
            margin-bottom: 10px;
        }

    </style>
    @endsection
@section('js')
    <script>
        $(document).ready(function(){
            $(".imageDelete").click(function(){
                var id = $(this).attr('id');
                alert(id);

            });
        });
    </script>
    @endsection
@section('content')
   @include('backend.includes.breadcrumb')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$action}} {{$panel}}  <a href="{{route($base_route . '.index')}}" class="btn btn-info">  <i class="fa fa-pen"></i> Manage {{$panel}} </a>  <a href="{{route($base_route . '.create')}}" class="btn btn-primary">  <i class="fa fa-plus"></i> Create {{$panel}}</a></h3>
            </div>
            <div class="card-body">
               <div class="table table-responsive">
                   <table class="table table-bordered">
                    <thead>
                    <th>Title</th>
                    <th>Value</th>
                    </thead>
                       <tbody>

                       <tr>
                           <td>Title</td>
                           <td>{{$data['row']->title}}</td>
                       </tr>
                       <tr>
                           <td>Slug</td>
                           <td>{{$data['row']->slug}}</td>
                       </tr>
                       <tr>
                           <td>Offer Price</td>
                           <td>{{$data['row']->offer}}</td>
                       </tr>
                       <tr>
                           <td>Offer Text</td>
                           <td>{{$data['row']->offer_text}}</td>
                       </tr>
                       <tr>
                           <td>Quantity</td>
                           <td>{{$data['row']->qty}}</td>
                       </tr>
                       <tr>
                           <td>Rank Number</td>
                           <td>{{$data['row']->rank}}</td>
                       </tr>
                       <tr>
                           <td>Product Code</td>
                           <td>{{$data['row']->code}}</td>
                       </tr>
                       <tr>
                           <td>Brand</td>
                           <td>{{$data['row']->brand}}</td>
                       </tr>

                       <tr>
                           <td>Description</td>
                           <td>{!! $data['row']->description !!}</td>
                       </tr>
                       <tr>
                           <td>Feature Image</td>
                           <td>
                               @if($data['row']->image != '')
                               <img src="{{asset($image_path . '/' . $data['row']->image)}}" alt="{{$data['row']->title}}" width="100" height="100" i>
                                @else
                                   <p class="text-danger">Image Not Found</p>
                               @endif
                           </td>
                       </tr>
                       <tr>
                           <td>Image Gallery</td>
                        <td>
                            <ul class="image-gallery">
                                @foreach($data['row']->images as $image)

                                <li id="{{$image->id}}"><img src="{{asset($image_path . '/gallery/' . $image->product_image)}}" height="100" width="100"></li>
                                    @endforeach
                            </ul>
                        </td>
                       </tr>
                       <tr>
                           <td>Size</td>
                           <td>
                              <table class="table table-bordered">
                                  <thead>
                                  <td>S.N</td>
                                  <td>Size</td>
                                  </thead>
                                  <tbody>
                                  @foreach($data['row']->sizes as $index => $size)
                                  <tr>
                                      <td>{{$index + 1}}</td>
                                      <td>{{$size->title}}</td>
                                  </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                           </td>
                       </tr>
                       <tr>
                           <td>Color</td>
                           <td>
                               <table class="table table-bordered">
                                   <thead>
                                   <td>S.N</td>
                                   <td>Title</td>
                                   </thead>
                                   <tbody>
                                   @foreach($data['row']->colors as $index => $color)
                                       <tr>
                                           <td>{{$index + 1}}</td>
                                           <td>{{$color->title}}</td>
                                       </tr>
                                   @endforeach
                                   </tbody>
                               </table>
                           </td>
                       </tr>
                       <tr>
                           <td>Specification</td>
                           <td>
                               <table class="table table-bordered">
                                   <thead>
                                   <td>S.N</td>
                                   <td>Title</td>
                                   <td>Description</td>
                                   </thead>
                                   <tbody>
                                   @foreach($data['row']->specifications as $index => $specification)
                                       <tr>
                                           <td>{{$index + 1}}</td>
                                           <td>{{$specification->specification_title}}</td>
                                           <td>{{$specification->specification_value}}</td>
                                       </tr>
                                   @endforeach
                                   </tbody>
                               </table>
                           </td>
                       </tr>
                       <tr>
                           <td>Meta Title</td>
                           <td>{{$data['row']->meta_title}}</td>
                       </tr>
                       <tr>
                           <td>Meta Keyword</td>
                           <td>{{$data['row']->meta_keyword}}</td>
                       </tr>
                       <tr>
                           <td>Meta Description</td>
                           <td>{{$data['row']->meta_description}}</td>
                       </tr>
                       <tr>
                           <td>Status</td>
                           <td>@if($data['row']->status == 1) <p class="text text-success">Active</p>@else <p class="text text-danger">De Active</p>@endif</td>
                       </tr>
                       <tr>
                           <td>Created By</td>
                           <td>{{\Illuminate\Support\Facades\Auth::user($data['row']->created_by)->name}}</td>
                       </tr>
                       <tr>
                           <td>Created At</td>
                           @php($create_at = date_create($data['row']->created_at))
                           <td>{{date_format($create_at, 'd F Y')}}</td>
                       </tr>
                       @if($data['row']->updated_by != '')
                       <tr>
                           <td>Updated By</td>
                           <td>{{\Illuminate\Support\Facades\Auth::user($data['row']->updated_by)->name}}</td>
                       </tr>
                       <tr>
                           <td>Updated At</td>
                           @php($updated_at = date_create($data['row']->updated_at))
                           <td>{{date_format($updated_at, 'd F Y')}}</td>
                       </tr>
                           @endif
                       </tbody>
                   </table>
               </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{route($base_route . '.edit', $data['row']->id)}}" class="btn btn-info"><i class="fa fa-pen"></i> Edit</a>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    @endsection
