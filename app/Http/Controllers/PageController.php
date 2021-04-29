<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;
use App\Models\Slug;
use App\About;
use App\Sertificate;
use App\Slide;
use App\ProductsSection;
use App\Product;
use App\AboutSection;
use App\CarculatorSection;
use App\HomeSeo;
use App\NewsSeo;
use App\News;
use App\Size;
use App\Surface;
use App\Colour;
use App\Assorment;
use App\CalculatorOption;
use App\ContactSeo;
use App\Contact;
use App\ProductionsSeo;
use App\Production;
use App\VacanciesSeo;
use App\Vacancy;
use App\HeaderFooter;
use App\ProductsSeo;
use App\ContactUss;
use App\Models\Comment;
use App\Models\HomeDataAndSeo;
use App\Models\Slider;
use App\Models\Subscriber;
use App\SearchPage;
use Validator;
use Mail;
use Cookie;

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
                if (in_array($slug_url, ['pl', 'en'])) :
                    if (in_array($request->lang, ['pl'])) :
                        Session::put('locale', $request->lang);
                        App::setlocale($request->lang);
                        return $new_url = $protocol . $_SERVER['HTTP_HOST'] . '/' . $request->lang;
                    elseif (in_array($request->lang, ['pl'])) :
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
        return view('pages.index', compact("home_seo", "sliders", 'comments'));
    }


    public function about($locale)
    {
        $lang = $this->locale($locale);

        $menu = $this->menu();

        $slugs = Slug::withTranslation('en', 'ru')->orderBy('order')->get();

        $categories = Size::withTranslation('en', 'ru')->where('menu', 1)->get();

        $about = About::withTranslation('en', 'ru')->take(1)->get();
        $seo = $about;
        $sertificates = Sertificate::withTranslation('en', 'ru')->orderBy('id')->get();
        $headFoot = HeaderFooter::withTranslation('en', 'ru')->take(1)->get();

        return view('about', compact(['lang', 'menu', 'slugs', 'categories', 'about', 'sertificates', 'seo', 'headFoot']));
    }
    public function search(Request $request, $locale)
    {

        $text = $request->text;

        $lang = $this->locale($locale);

        $menu = $this->menu();
        $slugs = Slug::withTranslation('en', 'ru')->orderBy('order')->get();
        $categories = Size::withTranslation('en', 'ru')->where('menu', 1)->get();
        $headFoot = HeaderFooter::withTranslation('en', 'ru')->take(1)->get();
        $search = SearchPage::withTranslation('en', 'ru')->take(1)->get();

        $category = Size::whereTranslation('search_text', 'LIKE', '%' . $text . '%')->take(1)->get();
        if (count($category) > 0) :
            $products = Product::where('category', $category[0]->id)
                ->with('categoryData')
                ->get();
        else :
            $products = Product::whereTranslation('name', 'LIKE', '%' . $text . '%')
                ->with('categoryData')
                ->orWhere('sub_text', 'LIKE', '%' . $text . '%')
                ->orWhere('sub_title', 'LIKE', '%' . $text . '%')
                ->get();
        endif;

        return view('search', compact(['lang', 'menu', 'slugs', 'categories', 'headFoot', 'products', 'text', 'search']));
    }

    public function add_subscriber(Request $request) {
        $sub = new Subscriber();
        $sub->email = $request->email;
        if($sub->save()) {
            return redirect()->back();
        }
        return "error occurred";
    }
}
