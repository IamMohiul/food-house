<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SectionTitle;
use App\Models\Slider;
use App\Models\WhyChooseUs;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class FrontendController extends Controller
{
    function index(): View
    {
        $sectionTitles = $this->getSectionTitles();
        $sliders = Slider::where('status', 1)->get();
        $whyChooseUs = WhyChooseUs::where('status', 1)->get();
        $categories = Category::where(['show_at_home'=>1, 'status'=>1])->get();
        return view('frontend.home.index',
        compact(
            'sliders',
            'sectionTitles',
            'whyChooseUs',
            'categories',
        ));
    }

    function getSectionTitles(): Collection{
        $keys = [
            'why_choose_us_top_title',
            'why_choose_us_main_title',
            'why_choose_us_sub_title',
        ];
        return SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
    }

    function productShow(string $slug) : View {
        $product = Product::with('ProductImages','ProductOptions','ProductSizes')->where(['slug' => $slug, 'status' => '1'])->firstOrFail();
        $relatedProducts =Product::where(['category_id' =>$product->category_id])->where('id', '!=', $product->id)->take(6)->latest()->get();
        return view('frontend.pages.product-view', compact('product','relatedProducts'));
    }
}
