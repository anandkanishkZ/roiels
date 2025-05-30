
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="row" style="background-color: whitesmoke;padding:15px;border-radius: 1%;border-right: 19px solid #fff;">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="title" class="required">Title</label>
                        {{Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Enter Title', 'id' => 'title'])}}
                        @include('backend.includes.single_input_validation', ['field' => 'title'])
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="slug" class="required">Slug</label>
                        {{Form::text('slug', old('slug'), ['class' => 'form-control', 'placeholder' => 'Enter Slug', 'id' => 'slug'])}}
                        @include('backend.includes.single_input_validation', ['field' => 'slug'])
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="price" class="required">Price</label>
                        {{Form::number('price', old('price'), ['class' => 'form-control', 'placeholder' => 'Enter Price'])}}
                        @include('backend.includes.single_input_validation', ['field' => 'price'])
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="offer" class="no-require">Offer Price</label>
                        {{Form::number('offer', old('offer'), ['class' => 'form-control', 'placeholder' => 'Offer Price'])}}
                        @include('backend.includes.single_input_validation', ['field' => 'offer'])
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="offer_text" class="no-require">Offer Text</label>
                        {{Form::text('offer_text', old('offer_text'), ['class' => 'form-control', 'placeholder' => 'Offer Text'])}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="offer_expire" class="no-require">Offer Expiry Date </label>
                        {{Form::date('offer_expire', old('offer_expire'), ['class' => 'form-control', 'placeholder' => 'Offer Expiry Date'])}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="qty" class="required">Stock Quantity</label>
                        {{Form::number('qty', old('qty'), ['class' => 'form-control', 'placeholder' => 'Stock Quantity'])}}
                        @include('backend.includes.single_input_validation', ['field' => 'qty'])
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="rank" class="required">Rank Number</label>
                        {{Form::number('rank', (isset($data['row']->rank)) ? $data['row']->rank : 99, ['class' => 'form-control', 'placeholder' => 'Rank Number'])}}
                        @include('backend.includes.single_input_validation', ['field' => 'rank'])
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="code" class="required">Product Code</label>
                        {{Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Product Code','id' => 'code'])}}
                        @include('backend.includes.single_input_validation', ['field' => 'code'])
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="brand">Subtitle</label>
                        {{Form::text('brand', null, ['class' => 'form-control', 'placeholder' => 'Brand','id' => 'brand'])}}
                        @include('backend.includes.single_input_validation', ['field' => 'brand'])
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="description" class="no-require">Description</label>
                        {{Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => 'Description'])}}
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="photo" class="required">Feature Image (Front Side)</label>
                        {{Form::file('photo', null, ['class' => 'form-control'])}}
                        @include('backend.includes.single_input_validation', ['field' => 'photo'])
                        <br/>
                        @if($page == 'edit')
                            <img src="{{asset($image_path . '/' . $data['row']->image)}}" height="90" width="90" alt="{{$data['row']->title}}">
                        @endif
                    </div>
                </div>
{{--                <div class="col-lg-7">--}}
{{--                    <div class="form-group">--}}
{{--                        <label>BEST SELLER</label>--}}
{{--                        {{Form::radio('best_selling',1, false)}} Enable--}}
{{--                        {{Form::radio('best_selling',0, true)}} Disable--}}
{{--                    </div>--}}
{{--                </div>--}}


<div class="col-lg-7">
<div class="form-group">
<label>ON SALE</label>
{{Form::radio('our_product',1, false)}} Enable
{{Form::radio('our_product',0, true)}} Disable
</div>
</div>

                <div class="col-lg-7">
                    <div class="form-group">
                        <label>Status</label>
                        {{Form::radio('status',1, true)}} Active
                        {{Form::radio('status',0)}} De Active
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="row " style="background-color: whitesmoke;padding:15px;border-radius: 1%;border-left: 1px solid #becdff;">
                <label>Choose Category</label>
            <div class="col-lg-12">
                 <div class="col-lg-12">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    
           @foreach($data['categories']->sortBy('created_at') as $category)
        <li class="nav-item has-treeview" style="line-height:10px;padding: 1px;">
            @if($page == 'edit')

              @if(in_array($category->id, $assignCategory))
             <input type="checkbox" name="category_id[]" style="margin-top:8px" value="{{$category->id}}" checked>
            @else
            <input type="checkbox" name="category_id[]" style="margin-top:8px" value="{{$category->id}}">
            @endif
            <a href="#" class="nav-link">
            <p>
              {{$category->title}}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          @else
          <input type="checkbox" name="category_id[]" value="{{$category->id}}">
           <a href="#" class="nav-link">
            <p>
              {{$category->title}}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          @endif
          <ul class="nav nav-treeview">
              @foreach($category->subcategories as $subcategory)
           <li class="nav-item has-treeview" style="margin-left:30px;border-bottom: solid 1px #eee;
line-height: 10px;
clear: both;">

                 @if($page == 'edit')
                  @if(in_array($subcategory->id, $assignedSubcategory))
                  <input type="checkbox" name="subcategory_id[]" value="{{$subcategory->id}}" style="margin-top:8px" checked>
                  @else
                  <input type="checkbox" name="subcategory_id[]" value="{{$subcategory->id}}" style="margin-top:8px">
                  @endif
                  @else
                  <input type="checkbox" name="subcategory_id[]" value="{{$subcategory->id}}" style="margin-top:8px">
                  @endif
                <a href="#" class="nav-link sub">
                <p>
                {{$subcategory->title}}
                  <!--<i class="right fas fa-angle-left"></i>-->
               </p>
              </a>
{{--              <ul class="nav nav-treeview">--}}
{{--                  @foreach($subcategory->lineProducts as $productLine)--}}
{{--                <li class="nav-item"  style="margin-left:30px;">--}}

{{--                    @if($page == 'edit')--}}
{{--                  @if(in_array($productLine->id, $assignProductLine))--}}
{{--                  <input type="checkbox" name="product_line_id[]" value="{{$productLine->id}}" checked>--}}
{{--                  @else--}}
{{--                  <input type="checkbox" name="product_line_id[]" value="{{$productLine->id}}">--}}
{{--                  @endif--}}
{{--                  @else--}}
{{--                  <input type="checkbox" name="product_line_id[]" value="{{$productLine->id}}">--}}
{{--                  @endif--}}
{{--                  <a href="#" class="nav-link">--}}
{{--                    <p>{{$productLine->title}}</p>--}}
{{--                  </a>--}}
{{--                </li>--}}
{{--                @endforeach--}}
{{--              </ul>--}}
{{--            </li>--}}
            @endforeach

          </ul>
        </li>
        @endforeach


      </ul>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
