<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductLine;
use App\Models\ProductSpecification;
use App\Models\ProductWholesale;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    protected $base_route = 'backend.product';
    protected $view_path = 'backend.product';
    protected $image_path = 'images/product';
    protected $panel =  'Product';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $action = 'List';
        $data['rows'] = Product::orderBy('created_at','desc')->get();
        return view($this->loadDataToView($this->view_path . '.index'), compact('action','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = 'Create';
        $data['categories'] = Category::where('status',1)->orderBy('created_at','desc')->get();
        $data['colors'] = Color::all();
        $data['sizes'] = Size::all();
        return view($this->loadDataToView($this->view_path . '.create'), compact('action','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'photo' => 'required',
            'rank' => 'required',
            'brand' => 'required',
        ]);
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($this->image_path . '/'), $imageName);
            $request->request->add(['image' => $imageName]);
        }

        if($request->hasFile('photo2')){
            $file = $request->file('photo2');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($this->image_path . '/'), $imageName);
            $request->request->add(['image2' => $imageName]);
        }
        if($request->vendor != ''){
            $request->request->add(['created_by' => Auth::guard('vendor')->user()->id]);
            $request->status->add(['status' => 0]);
            $request->request->add(['description' => $request->descriptionF]);
        } else {
            $request->request->add(['created_by' => Auth::user()->id]);
            $request->request->add(['description' => $request->description]);
            $request->request->add(['status' => 1]);
        }

        $data['row'] = Product::create($request->all());
        if($data['row']){
            $data['row']->colors()->attach($request->input('color_id'));
            $data['row']->sizes()->attach($request->input('size_id'));
            $data['row']->categories()->attach($request->input('category_id'));
            $data['row']->subcategories()->attach($request->input('subcategory_id'));
            $data['row']->productLines()->attach($request->input('product_line_id'));

            $specificationtitles = $request->specification_title;
            $specificationValues = $request->specification_value;
            if($specificationtitles != '') {
                foreach($specificationtitles as $sID => $specificationtitles){
                    if(!empty($specificationtitles[$sID])){
                        $productSpecificationData['specification_title'] = $specificationtitles[$sID];
                        $productSpecificationData['specification_value'] = $specificationValues[$sID];
                        $productSpecificationData['product_id'] = $data['row']->id;
                        ProductSpecification::create($productSpecificationData);
                    }
                }
            }
            $wholesaleQuantities = $request->wholesale_qty;
            $wholesalePrices = $request->wholesale_price;
            if($wholesaleQuantities != '') {
                foreach($wholesaleQuantities as $sID => $wholesaleQuantities){
                    if(!empty($wholesaleQuantities[$sID])){
                        $productWholesaleData['wholesale_qty'] = $wholesaleQuantities[$sID];
                        $productWholesaleData['wholesale_price'] = $wholesalePrices[$sID];
                        $productWholesaleData['product_id'] = $data['row']->id;
                        ProductWholesale::create($productWholesaleData);
                    }
                }
            }

            if(! empty($request->hasFile('product_image'))){
                $packageGalleryImage = $request->file('product_image');
                foreach($packageGalleryImage as $pgiID => $file){
                    $fileName = $packageGalleryImage[$pgiID];
                    if(! empty($fileName)){
                        $packageImageName = time() . '_' . $fileName->getClientOriginalName();
                        $packageGalleryImageData['product_image'] = $packageImageName;
                        $packageGalleryImageData['product_id'] = $data['row']->id;
                        $fileName->move(public_path($this->image_path . '/gallery/'), $packageImageName);
                        ProductImage::create($packageGalleryImageData);
                    }
                }
            }
            Alert::success('Product Created Successfully');
            $request->session()->flash('success_message', $this->panel . ' Created Successfully');
        } else {
            Alert::error('Sorry Product Cat not Create !');
            $request->session()->flash('error_message', $this->panel . ' Can not create');
        }
        return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $action = 'Show';
        $data['row'] = Product::find($id);
        return view($this->loadDataToView($this->view_path . '.show'), compact('action','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = 'Edit';
        $data['row'] = Product::find($id);
        $data['categories'] = Category::where('status',1)->orderBy('created_at','desc')->get();
        $data['colors'] = Color::all();
        $data['sizes'] = Size::all();
        $assignCategory = [];
        foreach($data['row']->categories as $category){
            array_push($assignCategory, $category->id);
        }
        $assignedSubcategory = [];
        foreach($data['row']->subcategories as $subcategory){
            array_push($assignedSubcategory, $subcategory->id);
        }
        $assignProductLine = [];
        foreach($data['row']->productLines as $productLine){
            array_push($assignProductLine, $productLine->id);
        }

        $data['images'] = $data['row']->images;
        $assignedColor = [];
        foreach($data['row']->colors as $color){
            array_push($assignedColor, $color->id);
        }
        $assignedSize = [];
        foreach ($data['row']->sizes as $size){
            array_push($assignedSize, $size->id);
        }
        return view($this->loadDataToView($this->view_path . '.edit'), compact('action','data','assignedColor','assignedSize','assignCategory','assignedSubcategory','assignProductLine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'rank' => 'required',
            'brand' => 'required',
        ]);
        $data['row'] = Product::find($id);
        $oldImage = $data['row']->image;
        $oldImage2 = $data['row']->image2;
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($this->image_path . '/'), $imageName);
            $request->request->add(['image' => $imageName]);
            if($oldImage) {
                if (file_exists(public_path($this->image_path . '/' . $data['row']->image))) {
                    unlink(public_path($this->image_path . '/' . $oldImage));
                }
            }
        }
        if($request->hasFile('photo2')){
            $file = $request->file('photo2');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($this->image_path . '/'), $imageName);
            $request->request->add(['image2' => $imageName]);
            if($oldImage2) {
                if (file_exists(public_path($this->image_path . '/' . $data['row']->image2))) {
                    unlink(public_path($this->image_path . '/' . $oldImage2));
                }
            }
        }
        if($request->vendor != ''){
            $request->request->add(['updated_by' => Auth::guard('vendor')->user()->id]);
            $request->request->add(['description' => $request->descriptionF]);
        } else{
            $request->request->add(['updated_by' => Auth::user()->id]);
            $request->request->add(['description' => $request->description] );
        }
        if($data['row']->update($request->all())){
            $data['row']->colors()->sync($request->color_id);
            $data['row']->sizes()->sync($request->size_id);
            $data['row']->categories()->sync($request->input('category_id'));
            $data['row']->subcategories()->sync($request->input('subcategory_id'));
            $data['row']->productLines()->sync($request->input('product_line_id'));

            $imageGalleryID = $request->productImageID;
            if($request->hasFile('product_image')){
                $imagenames = $request->file('product_image');
                foreach($imagenames as $piID => $imagename){
                    $file = $imagenames[$piID];
                    $imgName = time() . '_' . $file->getClientOriginalName();
                    if($file) {
                        if($imageGalleryID){
                            if(in_array($piID,$imageGalleryID )){
                                $imageData = ProductImage::find($piID);
                               $oldImageG = $imageData->product_image;
                               $gImageName = time() . '_' . $imagename->getClientOriginalName();
                                $imagename->move(public_path($this->image_path . '/gallery/'), $gImageName);
                                $imageData->product_image = $gImageName;
                                if($imageData->update()){
                                    if(file_exists(public_path($this->image_path . '/gallery/' . $gImageName))) {
                                        if($oldImageG) {
                                            unlink(public_path($this->image_path . '/gallery/' . $oldImageG));
                                        }
                                    }
                                }

                            } else{
                                $file->move(public_path($this->image_path . '/gallery/'), $imgName);
                                $productImageData['product_id'] = $data['row']->id;
                                $productImageData['product_image'] = $imgName;
                                ProductImage::create($productImageData);
                            }
                        } else{
                            $file->move(public_path($this->image_path . '/gallery/'), $imgName);
                            $productImageData['product_id'] = $data['row']->id;
                            $productImageData['product_image'] = $imgName;
                            ProductImage::create($productImageData);
                        }
                    }
                }
            }

            $specification_titles = $request->specification_title;
            $specification_values = $request->specification_value;
            $specificationID = $request->specificationID;
            if(!empty($specificationID)){
                if($specification_titles){
                    foreach ($specification_titles as $sID => $specification_title){
                        if(in_array($sID, $specificationID)){
                            $specificationData = ProductSpecification::find($sID);
                            if($specificationData){
                                $specificationData->specification_title = $specification_titles[$sID];
                                $specificationData->specification_value = $specification_values[$sID];
                                $specificationData->product_id = $data['row']->id;
                                $specificationData->update();
                            }
                        } else{
                            $specificationData1['specification_title'] = $specification_titles[$sID];
                            $specificationData1['specification_value'] = $specification_values[$sID];
                            $specificationData1['product_id'] = $data['row']->id;
                            ProductSpecification::create($specificationData1);
                        }
                    }
                }
            } else{
                if($specification_titles){
                foreach ($specification_titles as $sID => $specification_title) {
                    $specificationData1['specification_title'] = $specification_titles[$sID];
                    $specificationData1['specification_value'] = $specification_values[$sID];
                    $specificationData1['product_id'] = $data['row']->id;
                    ProductSpecification::create($specificationData1);
                } }
            }

            $wholesaleQuantities = $request->wholesale_qty;
            $wholesalePrices = $request->wholesale_price;
            $wholesaleId = $request->wholesaleID;
            if(!empty($wholesaleId)){
                if($wholesaleQuantities){
                    foreach ($wholesaleQuantities as $sID => $wholesaleQunatity){
                        if(in_array($sID, $wholesaleId)){
                            $wholesaleData = ProductWholesale::find($sID);
                            if($wholesaleData){
                                $wholesaleData->wholesale_qty = $wholesaleQuantities[$sID];
                                $wholesaleData->wholesale_price = $wholesalePrices[$sID];
                                $wholesaleData->product_id = $data['row']->id;
                                $wholesaleData->update();
                            }
                        } else{
                            $wholesaleData1['wholesale_qty'] = $wholesaleQuantities[$sID];
                            $wholesaleData1['wholesale_price'] = $wholesalePrices[$sID];
                            $wholesaleData1['product_id'] = $data['row']->id;
                            ProductWholesale::create($wholesaleData1);
                        }
                    }
                }
            } else{
                if($wholesaleQuantities){
                    foreach ($wholesaleQuantities as $sID => $wholesaleQunatity) {
                        $wholesaleData1['wholesale_qty'] = $wholesaleQuantities[$sID];
                        $wholesaleData1['wholesale_price'] = $wholesalePrices[$sID];
                        $wholesaleData1['product_id'] = $data['row']->id;
                        ProductWholesale::create($wholesaleData1);
                    } }
            }
            Alert::success('Product Updated Successfully !');
            $request->session()->flash('success_message', $this->panel . ' Updated Successfully');
        } else {
            $request->session()->flash('error_message', $this->panel . ' Can not update');
        }
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $data['row'] = Product::find($id);
        $oldImage = $data['row']->image;
        $oldImage2 = $data['row']->image2;
        if($data['row']->delete()){
            $data['row']->colors()->sync([]);
            $data['row']->sizes()->sync([]);
            $data['row']->categories()->sync([]);
            $data['row']->subcategories()->sync([]);
            $data['row']->productLines()->sync([]);
            if($oldImage) {
                if (file_exists(public_path($this->image_path . '/' . $data['row']->image))) {
                    unlink(public_path($this->image_path . '/' . $oldImage));
                }
            }
            if($oldImage2) {
                if (file_exists(public_path($this->image_path . '/' . $data['row']->image2))) {
                    unlink(public_path($this->image_path . '/' . $oldImage2));
                }
            }


            $productSpecifications = $data['row']->specifications;
            if($productSpecifications) {
                foreach ($productSpecifications as $productSpecifications) {
                    $productSpecifications->delete();
                }
            }
            $productImages = $data['row']->images;
            if($productImages) {
                foreach ($productImages as $productImage) {
                    $productOldImage = $productImage->product_image;
                    if ($productImage->delete()) {
                        if (file_exists(public_path($this->image_path . '/gallery/' . $productOldImage))) {
                            unlink(public_path($this->image_path . '/gallery/' . $productOldImage));
                        }
                    }

                }
            }

            $request->session()->flash('success_message', $this->panel . ' Deleted Successfully');
        } else {
            $request->session()->flash('error_message', $this->panel . ' Can not delete');
        }
        Alert::success('Product Deleted Successfully !');
        return back();
    }

    public function getSubcategoryByCategoryID(Request $request){
        $category_id = $request->input('category_id');
        $categories = Category::find($category_id);
        $options = '<option value="">Select Sub Category</option>';
        foreach($categories->subcategories as $subcategory){
            $options .= "<option value='$subcategory->id'>$subcategory->title</option>";
        }
        return $options;
    }

    public function getPackageByPackageID(Request $request){
        $id = $request->package_id;
        $packageCostInclude = PackageCostInclude::find($id);
        if($packageCostInclude->delete()){
            return 'success';
        } else {
            return 'error';
        }
    }

    public function getPackageCostExcludeByID(Request $request){
        $id = $request->id;
        $packageExclude = PackageCostExclude::find($id);
        if($packageExclude->delete()){
            return 'success';
        } else {
            return 'error';
        }
    }

    public function getPriceByID(Request $request){
        $id = $request->id;
        $packagePrice = PackagePrice::find($id);
        if($packagePrice->delete()){
            return 'success';
        } else {
            return 'error';
        }
    }

    public function getPackageItineryByID(Request $request){
        $id = $request->id;
        $packageItinery = PackageItinery::find($id);
        if($packageItinery->delete()){
            return 'success';
        } else {
            return 'error';
        }
    }

    public function deleteImageGalleryBYID(Request $request){
        $id = $request->id;
        $packageImage = ProductImage::find($id);
        if($packageImage->delete()){
            if(file_exists(public_path($this->image_path . '/gallery/' . $packageImage->product_image))){
                unlink(public_path($this->image_path . '/gallery/' . $packageImage->product_image));
                return 'success';
            }
        }
        else {
            return 'error';
        }

    }
    public function getproductLineBySubCategoryID(Request $request){
        $subcategory_id = $request->input('id');
        $subcategory = Subcategory::find($subcategory_id);
        $options = '<option value="">Select ProductLine</option>';
        if(count($subcategory->lineProducts) == 0){
            $options = '<option value="">Sorry Data Not Found Please Select Other Subcategory</option>';
        }
        foreach($subcategory->lineProducts as $productLine){
        $options .= "<option value='$productLine->id'>$productLine->title</option>";
        }
        return $options;
    }

    public function deleteProductSpecificationByID(Request $request){
       $id = $request->id;
       $data = ProductSpecification::find($id);
       if($data->delete()){
           return 'success';
       } else{
           return 'error';
       }
    }
    public function deleteProductWholesaleByID(Request $request){
        $id = $request->id;
        $data = ProductWholesale::find($id);
        if($data->delete()){
            return 'success';
        } else{
            return 'error';
        }
    }

}
