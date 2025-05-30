<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Package;
use App\Models\PackageCostExclude;
use App\Models\PackageCostInclude;
use App\Models\PackageGallery;
use App\Models\PackageItinery;
use App\Models\PackagePrice;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    protected $base_route = 'backend.product';
    protected $view_path = 'backend.product';
    protected $image_path = 'images/product';
    protected $panel =  'Package';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $action = 'List';
        $data['rows'] = Package::all();
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
        $data['categories'] = Category::pluck('title','id');
        $data['subcategories'] = [];
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
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'country' => 'required',
            'day' => 'required',
            'grade' => 'required',
            'altitude' => 'required',
            'accommodation' => 'required',
            'transportation' => 'required',
            'photo' => 'required | mimes:jpeg,jpg,png,gif | max:1000',
            'rank' => 'required'
        ]);
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($this->image_path . '/'), $imageName);
            $request->request->add(['image' => $imageName]);
        }
        $request->request->add(['created_by' => Auth::user()->id]);
        $data['row'] = Package::create($request->all());
        if($data['row']){
            $costIncludeTitles = $request->cost_include_title;
            if(!empty($costIncludeTitles)) {
                foreach ($costIncludeTitles as $citID => $costIncludeTitle) {
                    if (!empty($costIncludeTitles[$citID])) {
                        $costIncludeData['cost_include_title'] = $costIncludeTitles[$citID];
                        $costIncludeData['package_id'] = $data['row']->id;
                        PackageCostInclude::create($costIncludeData);
                    }
                }
            }
            $costExcludeTitles = $request->cost_exclude_title;
            foreach($costExcludeTitles as $cetID => $costExcludeTitle){
                if(! empty($costExcludeTitles[$cetID])) {
                    $costExcludeData['cost_exclude_title'] = $costExcludeTitles[$cetID];
                    $costExcludeData['package_id'] = $data['row']->id;
                    PackageCostExclude::create($costExcludeData);
                }
            }
            $priceGroupSIzes= $request->group_size;
            $PriceCostPerPersons = $request->cost_per_person;
            $priceDiscounts = $request->discount;
            foreach($priceGroupSIzes as $pgsID => $priceGroupSIze){
                if(! empty($priceGroupSIzes[$pgsID])) {
                    $priceGroupSIzeData['group_size'] = $priceGroupSIzes[$pgsID];
                    $priceGroupSIzeData['cost_per_person'] = $PriceCostPerPersons[$pgsID];
                    $priceGroupSIzeData['discount'] = $priceDiscounts[$pgsID];
                    $priceGroupSIzeData['package_id'] = $data['row']->id;
                    PackagePrice::create($priceGroupSIzeData);
                }
            }
            $packageItineryTitles = $request->itinery_title;
            $packageItineryDescription = $request->itinery_description;
            foreach($packageItineryTitles as $pitID => $packageItineryTitle){
                if(! empty($packageItineryTitles[$pitID])) {
                    $packageItineryData['itinery_title'] = $packageItineryTitles[$pitID];
                    $packageItineryData['itinery_description'] = $packageItineryDescription[$pitID];
                    $packageItineryData['package_id'] = $data['row']->id;
                    PackageItinery::create($packageItineryData);
                }
            }
           if(! empty($request->hasFile('package_image'))){
               $packageGalleryImage = $request->file('package_image');
               foreach($packageGalleryImage as $pgiID => $file){
                   $fileName = $packageGalleryImage[$pgiID];
                   if(! empty($fileName)) {
                       $packageImageName = time() . '_' . $fileName->getClientOriginalName();
                       $packageGalleryImageData['image'] = $packageImageName;
                       $packageGalleryImageData['package_id'] = $data['row']->id;
                       $fileName->move(public_path($this->image_path . '/gallery/'), $packageImageName);
                       PackageGallery::create($packageGalleryImageData);
                   }
               }
           }
            $request->session()->flash('success_message', $this->panel . ' Created Successfully');
        } else {
            $request->session()->flash('error_message', $this->panel . ' Can not create');
        }
        return redirect()->route($this->base_route . '.create');


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
        $data['row'] = Package::find($id);
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
        $data['row'] = Package::find($id);
        $data['categories'] = Category::pluck('title','id');
        $data['subcategories'] = Subcategory::pluck('title','id');
        return view($this->loadDataToView($this->view_path . '.edit'), compact('action','data'));
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
        $data['row'] = Package::find($id);
        $oldImage = $data['row']->image;
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
        $request->request->add(['updated_by' => Auth::user()->id]);
        if($data['row']->update($request->all())){
            $packageImageID = $request->packageImageID;
            $packageImageTitles = $request->package_image;
            if(!empty($packageImageID)){
                if($packageImageTitles) {
                    foreach ($packageImageTitles as $pigID => $packageImageTitle) {
                        if (in_array($pigID, $packageImageID)) {
                            $packageImage = PackageGallery::find($pigID);
                            $oldImage = $packageImage->image;
                            $imageName = time() . '_' . $packageImageTitle->getClientOriginalName();
                            $packageImageTitle->move(public_path($this->image_path . '/gallery/'), $imageName);
                            $packageImage->image = $imageName;
                            if ($packageImage->update()) {
                                if (file_exists($this->image_path . '/gallery/' . $imageName)) {
                                    unlink(public_path($this->image_path . '/gallery/' . $oldImage));
                                }
                            }

                        } else {
                            $file = $packageImageTitles[$pigID];
                            $pImageName = time() . '_' . $file->getClientOriginalName();
                            $file->move(public_path($this->image_path . '/gallery/'), $pImageName);
                            $packageDataImage['image'] = $pImageName;
                            $packageDataImage['package_id'] = $data['row']->id;
                            PackageGallery::create($packageDataImage);
                        }
                    }
                }

            } else {
                if($packageImageTitles) {
                    foreach ($packageImageTitles as $pgimgID => $packageImageTitle) {
                        $file = $packageImageTitles[$pgimgID];
                        $pImageName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path($this->image_path . '/gallery/'), $pImageName);
                        $packageDataImage['image'] = $pImageName;
                        $packageDataImage['package_id'] = $data['row']->id;
                        PackageGallery::create($packageDataImage);
                    }
                }
            }

            $packageItineryID = $request->packageItineryID;
            $packageItineryTitles = $request->itinery_title;
            $packageItineryDescription = $request->itinery_description;
            if(!empty($packageItineryID)){
                foreach($packageItineryTitles as $ppiID => $packageItineryTitle){
                    if(in_array($ppiID, $packageItineryID)) {
                        $packageItinryData1 = PackageItinery::find($ppiID);
                        if($packageItinryData1) {
                            $packageItinryData1->itinery_title = $packageItineryTitles[$ppiID];
                            $packageItinryData1->itinery_description = $packageItineryDescription[$ppiID];
                            $packageItinryData1->update();
                        }
                    } else{
                        $packageItineryData['itinery_title'] = $packageItineryTitles[$ppiID];
                        $packageItineryData['itinery_description'] = $packageItineryDescription[$ppiID];
                        $packageItineryData['package_id'] = $data['row']->id;
                        PackageItinery::create($packageItineryData);

                    }
                }
            } else {
                foreach($packageItineryTitles as $pitID => $packageItineryTitle){
                    $packageItineryData['itinery_title'] = $packageItineryTitles[$pitID];
                    $packageItineryData['itinery_description'] = $packageItineryDescription[$pitID];
                    $packageItineryData['package_id'] = $data['row']->id;
                    PackageItinery::create($packageItineryData);
                }
            }

            $packagePriceID = $request->packagePriceID;
            $packagePriceGroupSizes = $request->group_size;
            $packagePricePerPersons = $request->cost_per_person;
            $packagePriceDiscounts = $request->discount;
            if(!empty($packagePriceID)){
                foreach($packagePriceGroupSizes as $ppgsID => $packagePriceGroupSize){
                    if(in_array($ppgsID, $packagePriceID)){
                        $packagePrice = PackagePrice::find($ppgsID);
                        if($packagePrice) {
                            $packagePrice->group_size = $packagePriceGroupSizes[$ppgsID];
                            $packagePrice->cost_per_person = $packagePricePerPersons[$ppgsID];
                            $packagePrice->discount = $packagePriceDiscounts[$ppgsID];
                            $packagePrice->update();
                        }
                    } else {
                        $packagePriceData['group_size'] = $packagePriceGroupSizes[$ppgsID];
                        $packagePriceData['cost_per_person'] = $packagePricePerPersons[$ppgsID];
                        $packagePriceData['discount'] = $packagePriceDiscounts[$ppgsID];
                        $packagePriceData['package_id'] = $data['row']->id;
                        PackagePrice::create($packagePriceData);
                    }
                }
            } else {
               foreach($packagePriceGroupSizes as $pgsID => $packagePriceGroupSiz){
                   $packagePriceData['group_size'] = $packagePriceGroupSizes[$pgsID];
                   $packagePriceData['cost_per_person'] = $packagePricePerPersons[$pgsID];
                   $packagePriceData['discount'] = $packagePriceDiscounts[$pgsID];
                   $packagePriceData['package_id'] = $data['row']->id;
                   PackagePrice::create($packagePriceData);
               }
            }
            $packageCostExcludeID = $request->packageCostExcludeID;
            $packageCostExcudeTitles = $request->cost_exclude_title;
            if(!empty($packageCostExcludeID)){
                foreach($packageCostExcudeTitles as $pcettID => $packageCostExcludeTitle){
                    if(in_array($pcettID, $packageCostExcludeID)){
                        $packageCostExcludeData1 = PackageCostExclude::find($pcettID);
                        if($packageCostExcludeData1) {
                            $packageCostExcludeData1->cost_exclude_title = $packageCostExcudeTitles[$pcettID];
                            $packageCostExcludeData1->update();
                        }
                    } else{
                        $packageCostExcludeData['cost_exclude_title'] = $packageCostExcudeTitles[$pcettID];
                        $packageCostExcludeData['package_id'] = $data['row']->id;
                        PackageCostExclude::create($packageCostExcludeData);
                    }
                }
            } else{
                foreach($packageCostExcudeTitles as $pcetID => $packageCostExcudeTitle){
                    $packageCostExcludeData['cost_exclude_title'] = $packageCostExcudeTitles[$pcetID];
                    $packageCostExcludeData['package_id'] = $data['row']->id;
                    PackageCostExclude::create($packageCostExcludeData);
                }
            }

            $costIncludeID = $request->costIncludeID;
            $costIncludeTitles = $request->cost_include_title;
            if(!empty($costIncludeID)){
                foreach($costIncludeTitles as $citID => $costIncludeTitle){
                    if(in_array($citID, $costIncludeID)){
                        $packageCostInclude = PackageCostInclude::find($citID);
                        if($packageCostInclude) {
                            $packageCostInclude->cost_include_title = $costIncludeTitles[$citID];
                            $packageCostInclude->update();
                        }
                    } else{
                        $costIncludeData['cost_include_title'] = $costIncludeTitles[$citID];
                        $costIncludeData['package_id'] = $data['row']->id;
                        PackageCostInclude::create($costIncludeData);
                    }
                }
            }
            else {
                foreach($costIncludeTitles as $citID => $costIncludeTitle) {
                    $costIncludeData['cost_include_title'] = $costIncludeTitles[$citID];
                    $costIncludeData['package_id'] = $data['row']->id;
                    PackageCostInclude::create($costIncludeData);
                }
            }


            $request->session()->flash('success_message', $this->panel . ' Updated Successfully');
        } else {
            $request->session()->flash('error_message', $this->panel . ' Can not update');
        }
        return redirect()->route($this->base_route . '.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $data['row'] = Package::find($id);
        $oldImage = $data['row']->image;
        if($data['row']->delete()){
            if($oldImage) {
                if (file_exists(public_path($this->image_path . '/' . $data['row']->image))) {
                    unlink(public_path($this->image_path . '/' . $oldImage));
                }
            }
            $packagePrices = $data['row']->prices;
            if($packagePrices) {
                foreach ($packagePrices as $packagePrice) {
                    $packagePrice->delete();
                }
            }
            $packageCostIncludes = $data['row']->costIncludes;
            if($packageCostIncludes) {
                foreach ($packageCostIncludes as $packageCostInclude) {
                    $packageCostInclude->delete();
                }
            }
            $packageCostExcludes = $data['row']->costExcludes;
            if($packageCostExcludes) {
                foreach ($packageCostExcludes as $packageCostExclude) {
                    $packageCostExclude->delete();
                }
            }
            $packageItineries = $data['row']->itineries;
            if($packageItineries) {
                foreach ($packageItineries as $packageItinery) {
                    $packageItinery->delete();
                }
            }

            $packageImages = $data['row']->images;
            if($packageImages) {
                foreach ($packageImages as $packageImage) {
                    $packageOldImage = $packageImage->image;
                    if ($packageImage->delete()) {
                        if (file_exists(public_path($this->image_path . '/gallery/' . $packageOldImage))) {
                            unlink(public_path($this->image_path . '/gallery/' . $packageOldImage));
                        }
                    }
                }
            }


            $request->session()->flash('success_message', $this->panel . ' Deleted Successfully');
        } else {
            $request->session()->flash('error_message', $this->panel . ' Can not delete');
        }
        return redirect()->route($this->base_route . '.index');
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

    public function getPackageImageByID(Request $request){
         $id = $request->id;
         $packageImage = PackageGallery::find($id);
         if($packageImage->delete()){
             if(file_exists(public_path($this->image_path . '/gallery/' . $packageImage->image))){
                 unlink(public_path($this->image_path . '/gallery/' . $packageImage->image));
                 return 'success';
             }
         } else {
             return 'error';
         }

    }
}
