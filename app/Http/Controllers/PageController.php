<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;
use App\Models\Slug;
use App\Product;
use App\Size;
use App\Models\AboutDataAndSeo;
use App\Models\Barber;
use App\Models\Comment;
use App\Models\ContactDataAndSeo;
use App\Models\CustomerMessage;
use App\Models\GalleryCategory;
use App\Models\GalleryDataSeo;
use App\Models\GalleryImage;
use App\Models\HomeDataAndSeo;
use App\Models\PriceList;
use App\Models\PriceListDataAndSeo;
use App\Models\Product as ModelsProduct;
use App\Models\ProductCategory;
use App\Models\ProductsSeo as ModelsProductsSeo;
use App\Models\Service;
use App\Models\ServicesDataAndSeo;
use App\Models\Slider;
use App\Models\Subscriber;

use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session as FacadesSession;

class PageController extends Controller
{
    public function locale($locale)
    {
        if (in_array($locale, ['pl', 'en'])) :
            Session::put('locale', $locale);
            App::setlocale($locale);
        endif;

        return $lang = Session::get('locale');
    }

    public function lang(Request $request)
    {
        $explodeUrl = explode('/', $request->url);
        $count = count($explodeUrl) - 3;
        if (isset($_SERVER['HTTPS']))
            $protocol = "https://";
        else
            $protocol = "http://";
        // return str_replace('#', '', $explodeUrl[3]);
        if ($count == 1) :
            $slug_url = str_replace('#', '', rawurldecode($explodeUrl[3]));
            if ($slug_url !== '') :
                if (in_array($slug_url, ['en'])) :
                    if (in_array($request->lang, ['pl'])) :
                        Session::put('locale', $request->lang);
                        App::setlocale($request->lang);
                        return $new_url = $protocol . $_SERVER['HTTP_HOST'];
                    endif;
                else :
                    $data = Slug::whereTranslation('slug', $slug_url)->withTranslation('en')->get();
                    $trans = $data->translate($request->lang, 'fallbackLocale');
                    $response = $trans[0]->slug;

                    return $new_url = $protocol . $_SERVER['HTTP_HOST'] . '/' . $response;
                endif;
            else :
                Session::put('locale', $request->lang);
                App::setlocale($request->lang);
                if ($request->lang !== 'pl') :
                    return $new_url = $protocol . $_SERVER['HTTP_HOST'] . '/' . $request->lang;
                else :
                    return $new_url = $protocol . $_SERVER['HTTP_HOST'];
                endif;
            endif;
        elseif ($count == 2) :
            $data = Slug::whereTranslation('slug', str_replace('#', '', rawurldecode($explodeUrl[3])))->withTranslation('en')->get();
            $slug4 = str_replace('#', '', rawurldecode($explodeUrl[4]));
            if ($data[0]->widget == 'collections') :
                $slug4Data = Size::whereTranslation('slug', $slug4)->get();
                $trans = $slug4Data->translate($request->lang, 'fallbackLocale');
                $slug4 = $trans[0]->slug;
            endif;
            $trans = $data->translate($request->lang, 'fallbackLocale');
            $response = $trans[0]->slug;

            return $new_url = $protocol . $_SERVER['HTTP_HOST'] . '/' . $response . '/' . $slug4;
        elseif ($count == 3) :
            $slug = rawurldecode($explodeUrl[3]);
            $data = Slug::whereTranslation('slug', $slug)->withTranslation('en')->get();
            $slug4 = rawurldecode($explodeUrl[4]);
            $slug5 = str_replace('#', '', rawurldecode($explodeUrl[5]));

            $slug4Data = Size::whereTranslation('slug', $slug4)->get();
            $trans = $slug4Data->translate($request->lang, 'fallbackLocale');
            $slug4 = $trans[0]->slug;

            $slug5Data = Product::whereTranslation('slug', $slug5)->get();
            $trans = $slug5Data->translate($request->lang, 'fallbackLocale');
            $slug5 = $trans[0]->slug;

            $trans = $data->translate($request->lang, 'fallbackLocale');
            $response = $trans[0]->slug;

            return $new_url = $protocol . $_SERVER['HTTP_HOST'] . '/' . $response . '/' . $slug4 . '/' . $slug5;
        endif;
    }

    public function slug($slug1 = null, $slug2 = null, $slug3 = null)
    {

        if ($slug1 !== null) :

            $data = Slug::whereTranslation('slug', $slug1)->withTranslation('en')->get();

            if (count($data) == 0) :
                abort(404);
            else :
                $widget = $data[0]->widget;
                $lang = $data[0]->where('slug', $slug1)->get();
                if (count($lang) > 0) :
                    $lang = 'pl';
                else :
                    $lang = $data[0]->translations->where('value', $slug1);
                    foreach ($lang as $l)
                        $lang = $l->locale;
                endif;

                if ($slug2 !== null && $slug3 == null) :
                    return $this->$widget($lang, $slug2);
                elseif ($slug3 !== null) :
                    return $this->$widget($lang, $slug2, $slug3);
                else :
                    return $this->$widget($lang);
                endif;
            endif;
        else :
            Session::put('locale', 'pl');
            App::setlocale('pl');
            $lang = 'pl';
            return $this->index($lang);
        endif;
    }

    public function menu()
    {
        return Slug::withTranslation('en')->orderBy('order')->get();
    }

    public function index($locale) {
        
        $lang = $this->locale($locale);
        $menu = $this->menu();
        $home_seo = HomeDataAndSeo::withTranslation('en')->first();
        $sliders = Slider::withTranslation('en')->get();
        $comments = Comment::withTranslation('en')->get();
        $seo = $home_seo;
        return view('pages.index', compact("home_seo", "sliders", 'comments', 'menu', 'seo'));
    }


    public function about($locale)
    {
        $lang = $this->locale($locale);
        $menu = $this->menu();
        $home_seo = HomeDataAndSeo::withTranslation('en')->first();
        $seo = AboutDataAndSeo::withTranslation('en')->first();
        $barbers = Barber::withTranslation('en')->get();
        return view('pages.about', compact('menu', 'home_seo', 'seo', 'barbers'));
    }

    public function all_services($locale)
    {
        $lang = $this->locale($locale);
        $menu = $this->menu();
        $home_seo = HomeDataAndSeo::withTranslation('en')->first();
        $seo = ServicesDataAndSeo::withTranslation('en')->first();
        $services = Service::withTranslation('en')->get();
        return view('pages.services', compact('menu', 'seo', 'home_seo', 'services'));
    }

    public function gallery($locale) {
        $lang = $this->locale($locale);
        $menu = $this->menu();
        $home_seo = HomeDataAndSeo::withTranslation('en')->first();
        $seo = GalleryDataSeo::withTranslation('en')->first();
        $categories = GalleryCategory::withTranslation('en')->get();
        $images = GalleryImage::with('filter')->get();
        return view('pages.gallery', compact('menu', 'home_seo', 'seo', 'categories', 'images'));
    } 


    // Post functions begin
    public function add_subscriber(Request $request)
    {
        $sub = new Subscriber();
        $sub->email = $request->email;
        if ($sub->save()) {
            return redirect()->back();
        }
        return "error occurred";
    }

    // Products functions begin
    public function products($locale, $slug2 = null, $slug3 = null){
        if($slug2 and !$slug3) {
            return $this->products_filter($locale, $slug2);
        }
        if($slug2 and $slug3) {
            return $this->product_in($locale, $slug2, $slug3);
        }
        $lang = $this->locale($locale);
        $menu = $this->menu();
        $home_seo = HomeDataAndSeo::withTranslation('en')->first();
        $seo = ModelsProductsSeo::withTranslation('en')->first();
        $categories = ProductCategory::withTranslation('en')->get();
        $products = ModelsProduct::withTranslation('en')->with('category_data')->get();
        return view('pages.products', compact('menu', 'home_seo', 'seo','categories', 'products'));
    }
    public function products_filter($locale, $category) {
        $lang = $this->locale($locale);
        $menu = $this->menu();
        $home_seo = HomeDataAndSeo::withTranslation('en')->first();
        $seo = ModelsProductsSeo::withTranslation('en')->first();
        $category = ProductCategory::where('slug', $category)->first();
        $category =  $category['id'];
        $categories = ProductCategory::withTranslation('en')->get();
        $products = ModelsProduct::withTranslation('en')->whereTranslation('category', $category)->with('category_data')->get();
        return view('pages.products', compact('menu', 'home_seo', 'seo','categories', 'products'));
    }
    public function search_products(Request $query) {
        $menu = $this->menu();
        $home_seo = HomeDataAndSeo::withTranslation('en')->first();
        $seo = ModelsProductsSeo::withTranslation('en')->first();
        $categories = ProductCategory::withTranslation('en')->get();
        $products = ModelsProduct::withTranslation('en')->whereTranslation('name', 'LIKE','%' . $query['query'] . '%')->with('category_data')->get();
        
        return view('pages.products', compact('menu', 'home_seo', 'seo','categories', 'products'));
    }
    public function product_in($locale, $slug2, $slug3) {
        $lang = $this->locale($locale);
        $menu = $this->menu();
        $home_seo = HomeDataAndSeo::withTranslation('en')->first();
        $category = ProductCategory::where('slug', $slug2)->first();
        $category =  $category['id'];
        $product = ModelsProduct::withTranslation('en')->where('category', $category)->whereTranslation('slug', $slug3)->with('category_data')->first();
        $seo = ModelsProductsSeo::withTranslation('en')->first();
        return view('pages.product-in', compact('menu', 'product', 'home_seo', 'seo'));
    }
    // Products function end

    public function price($locale) {
        $lang = $this->locale($locale);
        $menu = $this->menu();
        $home_seo = HomeDataAndSeo::withTranslation('en')->first();
        $seo =  PriceListDataAndSeo::withTranslation('en')->first();
        $categories = ProductCategory::withTranslation('en')->get();
        $price_list = PriceList::withTranslation('en')->get();
        return view('pages.price', compact('menu', 'home_seo', 'seo', 'price_list'));
    }

    public function contact($locale) {
        $lang = $this->locale($locale);
        $menu = $this->menu();
        $home_seo = HomeDataAndSeo::withTranslation('en')->first();
        $seo =  ContactDataAndSeo::withTranslation('en')->first();
        $categories = ProductCategory::withTranslation('en')->get();
        $price_list = PriceList::withTranslation('en')->get();
        return view('pages.contact', compact('menu', 'home_seo', 'seo', 'price_list'));
    }

    public function add_message(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'message' => 'required|max:6000'
        ]);
        $message = new CustomerMessage();
        $message->name = $request['name'];
        $message->email = $request['email'];
        $message->message = $request['message'];
        if($message->save()) {
            FacadesSession::flash('success', "Thank you for message");
        } else {
            FacadesSession::flash('error', "There was an error");
        }
        return redirect()->back();
    }
}
