<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\OrderDetail;
use App\Models\Package;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductLine;
use App\Models\ProductWholesale;
use App\Models\Slider;
use App\Models\Subcategory;
use App\Models\Order;
use App\Models\Review;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class HomePageController extends Controller
{
    protected $base_route = 'frontend';
    protected $view_path = 'frontend';
    protected $image_path = 'images/';
    protected $panel = 'Homepage';

    public function homepage(){
        $action = 'Home Page';
      

        $data['sliders'] = Slider::where('status',1)->orderBy('id','desc')->get();
        $data['bestSellers'] = Product::where('status',1)->where('best_selling',1)->orderBy('created_at','desc')->limit(6)->get();
        $data['onSales'] = Product::where('status',1)->where('our_product', 1)->orderBy('created_at','desc')->limit(6)->get();
        $data['newProducts'] = Product::where('status',1)->orderBy('created_at','desc')->get();

        $data['subCategoryLeatherBags'] = Subcategory::where('id',1)->orderBy('created_at','desc')->where('status',1)->get()[0];
        $data['subCategoryLeatherBelts'] = Subcategory::where('id',2)->where('status',1)->orderBy('created_at', 'DESC')->get()[0];
        $data['subCategoryLeatherWallets'] = Subcategory::where('id',3)->orderBy('created_at','desc')->where('status',1)->get()[0];

    
       

        
        $data['featureProducts'] = Product::where('status',1)->where('feature_key',1)->orderBy('created_at','desc')->limit(8)->get();
        $data['brands'] = Product::where('status',1)->where('brand', '!=','')->orderBy('created_at','desc')->limit(10)->get();
        $data['advertises'] = Advertise::where('status',1)->orderBy('created_at','desc')->get()->toArray();
        return view($this->loadDataToView($this->view_path . '.home'), compact('action','data'));
    }

    public function productList($slug){
        $data['rows'] = Subcategory::where('slug', $slug)->where('status', 1)->orderBy('created_at','desc')->get();
        
        if(count($data['rows']) > 0) {
            $data['products'] = $data['rows'][0]->products()->paginate(60);
            if (count($data['products']) > 0) {
                $data['action'] = $data['rows'][0]->title;
                 $data['categories'] = Category::where('status',1)->get();
                 $data['on-sales'] = Product::where('status',1)->where('our_product',1)->limit(5)->get();
                $data['latest_products'] = Product::where('status', 1)->orderBy('created_at', 'desc')->limit(5)->get();
                return view($this->loadDataToView($this->view_path . '.product'), compact('data'));
            } else {
                Alert::error('Sorry', 'Data Not Found');
                return redirect()->route('frontend.home.index');
            }
        } else {
            Alert::error('Sorry', 'Data Not Found');
            return redirect()->route('frontend.home.index');
        }
    }

    public function productListBySearchKey(Request $request){
        $key = $request->key;
        $data['action'] = $key;
        $data['products'] = Product::where('title', 'like', '%' .$key. '%')->paginate(12);
        $data['categories'] = Category::where('status',1)->orderBy('created_at','desc')->limit(5)->get();
        $data['on-sales'] = Product::where('status',1)->orderBy('created_at','desc')->limit(5)->get();
        if(count($data['products']) > 0){
            return view($this->loadDataToView($this->view_path . '.product'), compact('data'));
        } else{
            Alert::error('Sorry Data Not Found !');
            return back();
        }
    }

    public function productDetail($slug){
        $data['rows'] = Product::where('slug', $slug)->get();       

        if(count($data['rows']) > 0){
            $data['row'] =  $data['rows'][0];
            $data['subcategories'] = $data['row']->subcategories;
        
            if(count($data['subcategories']) > 0){
                 $data['subcategory'] =  $data['subcategories'];                 
            } else{
                return back();
            }
            $data['categories']  = $data['row']->categories;
           
            return view($this->loadDataToView($this->view_path . '.detail'), compact('data'));
        } else{
            Alert::error('Sorry Data Not Found !', 'Invalid Request !');
             return redirect()->route('frontend.home.index');
        }
    }

    public function pageDetail($slug){
        $action= 'Detail';
        $data['rows'] = Page::where('slug', $slug)->get();
        if(count($data['rows']) > 0) {
            $data['row'] = $data['rows'][0];
            return view($this->loadDataToView($this->view_path . '.pageDetail'), compact('data', 'action'));
        } else {
        Alert::error('Sorry', 'Data Not Found');
         return redirect()->route('frontend.home.index');
        }

    }

    public function contactUs(){
        $action= 'Contact Us';
        $data['row'] = [];
        return view($this->loadDataToView($this->view_path . '.contact'), compact('data','action'));
    }

    public function contactUsStore(Request $request){
        $data['row'] = Contact::create($request->all());
        if($data['row']){
            alert()->success('Thank You', '<strong>For Contacting Us</strong>')->toHtml();
        } else {
            alert()->error('Sorry Data Can Not Submit !');
        }
        return back();
    }

    public function policy(){
        $action= 'Privacy Policy';
        $data['row'] = Page::where('type','policy')->where('id',5)->where('status',1)->orderBy('rank','asc')->get()[0];
        return view($this->loadDataToView($this->view_path . '.policy'), compact('data','action'));
    }

    public function blackFriday(){
        $currentDate = date('Y-m-d');
        $data['black_fridays'] = Product::where('black_friday',1)->where('status',1)->where('offer_expire','>', $currentDate)->orderBy('rank','asc')->paginate(12);
        $data['big_deals'] = Product::where('black_friday_deal',1)->where('status',1)->where('offer_expire','>', $currentDate)->orderBy('rank','asc')->paginate(12);
        return view($this->loadDataToView($this->view_path . '.blackFriday'), compact('data'));
    }

    public function getProductById(Request $request){
        $id = $request->id;
        $data['row'] = Product::find($id);
        return view($this->loadDataToView($this->view_path . '.modalView'), compact('data'));
    }

    public function orderTrack(){
        return view($this->loadDataToView($this->view_path . '.orderTrack'));
    }

    public function orderTrackCheck(Request $request){
      $code = $request->code;
      $orderDetail = Order::find($code);
      if(count($orderDetail->toArray()) > 0){
         $orderStatus = $orderDetail->order_status;
        Alert::success('Your order Status Is : ' . $orderStatus);
      } else{
          Alert::error(' Invalid Tracking Code Please Use Correct Code!');
      }
      return back();

    }

    public function sortByValue(Request $request)
    {
        $value = $request->value;
        $productParent = $request->productParent;
        dd($productParent);
        $data['categories'] = Category::where('title', $productParent)->get();
        dd($data['categories']);
        if(count($data['categories']) > 0){
            $data['rows'] = $data['categories'][0];
        }
        if($value == 2){
            $data['products'] = $data['rows']->products()->where('status',1)->get();
        }else if($value == 3){
            $data['products'] = $data['rows']->products()->where('status',1)->orderBy('created_at','asc')->get();
        } else if($value == 4){
            $data['products'] = $data['rows']->products()->where('status',1)->orderBy('offer','asc')->get();
        } else if($value == 5){
            $data['products'] = $data['rows']->products()->where('status',1)->orderBy('offer','desc')->get();
        } else {
            $data['products'] = $data['rows']->products()->where('status',1)->orderBy('title','asc')->get();
        }
        return view($this->loadDataToView($this->view_path . '.filter'), compact('data'));
    }

    public function limitData(Request $request)
    {
        $value = $request->value;
        $productParent = $request->productParent;
        $data['subcategories'] = Subcategory::where('slug', $productParent)->get();
        if(count($data['subcategories']) > 0){
            $data['rows'] = $data['subcategories'][0];
        }
        $data['productLines'] = ProductLine::where('slug', $productParent)->get();
        if(count($data['productLines']) > 0){
            $data['rows'] = $data['productLines'][0];
        }
            $data['products'] = $data['rows']->products()->where('status',1)->paginate($value);

        return view($this->loadDataToView($this->view_path . '.filter'), compact('data'));
    }

    public function productListByCategorySLug($slug){
        $category = Category::where('slug', $slug)->get();
        if(count($category->toArray()) > 0){
            $data['products'] = $category[0]->products()->paginate(12);
            $data['action'] =  $category[0]->title;
            $data['categories'] = Category::where('status',1)->get();
            $data['on-sales'] = Product::where('status',1)->where('our_product',1)->limit(5)->get();
            return view($this->loadDataToView($this->view_path . '.product'), compact('data'));
        } else{
            Alert::error('Sorry', 'Product Not Found !');
            return redirect()->route('frontend.home.index');
        }
    }

    public function productListByCategory(Request $request){
        $title = $request->title;
        $categorySlug = $request->category;
        if($categorySlug == 'all'){
            $data['action'] =  $title;
        $data['products'] =  Product::where('status',1)->where('title', 'like', '%' . $title . '%')->orderBy('created_at','desc')->paginate(10);
        } else {
        $category = Category::where('slug', $categorySlug)->where('status',1)->orderBy('created_at','desc')->get();
        $data['action'] = $category[0]->title;
        $data['products'] = $category[0]->products()->orWhere('title', 'like', '%' . $title . '%')->paginate(10);
        }
        $data['advertises'] = Advertise::where('status',1)->orderBy('created_at','desc')->get()->toArray();
        if(count($data['products'])> 0) {
            $data['latest_products'] = Product::where('status', 1)->orderBy('created_at','desc')->limit(5)->get();
            return view($this->loadDataToView($this->view_path . '.product'), compact('data'));
        } else{
            Alert::error('Sorry', 'Product Not Found !');
            return redirect()->route('frontend.home.index');
        }

    }

    public function productListByProductLine($slug){
        $data['productLines'] = ProductLine::where('slug', $slug)->get()[0];
        if($data['productLines']){
            $data['action'] = $data['productLines']->title;
        }
        $data['products'] = $data['productLines']->products()->where('status',1)->orderBy('created_at','desc')->paginate(15);
        if(count($data['products'])){
        return view($this->loadDataToView($this->view_path . '.product'), compact('data'));
        } else{
            Alert::error('Sorry', 'Product Not Found !');
            return redirect()->route('frontend.home.index');

        }
    }
    public function productFilterByPriceRange(Request $request){
        $min = $request->min;
        $max = $request->max;
        $productParent= $request->productParent;
        $data['subcategories'] = Subcategory::where('slug', $productParent)->get();
        if(count($data['subcategories']) > 0){
            $data['rows'] = $data['subcategories'][0];
        }
        $data['productLines'] = ProductLine::where('slug', $productParent)->get();
        if(count($data['productLines']) > 0){
            $data['rows'] = $data['productLines'][0];
        }
        $data['products'] = $data['rows']->products()->where('status',1)->whereBetween('price', [$min, $max])->get();

        return view($this->loadDataToView($this->view_path . '.filter'), compact('data'));
    }

    public function wholesalePrice(Request $request){
        $id = $request->id;
        if($id) {
            $productWholesale = ProductWholesale::find($id);
            $price =  $productWholesale->wholesale_price;
            return 'Total Price :  ' . " <span class='spical-price spical-price-2'> Rs $price</span>";
        }


    }
    
    public function reviewStore(Request $request){
         $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'review' => 'required',
            'rating' => 'required'
        ]);

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($this->image_path . '/'), $imageName);
            $request->request->add(['image' => $imageName]);
        }
        $data['row'] = Review::create($request->all());
        if($data['row']){
            Alert::success('Thank Your !', 'Your Review Has Been Successfully Submitted !');
            return back();
        } else {
            Alert::error('Error !', 'Sorry Review Can Not Submit !');
        }
        return back();
    }
}
