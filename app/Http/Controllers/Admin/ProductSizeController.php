<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\ProductOption;
use Illuminate\Http\RedirectResponse;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $productId) :View
    {
        $product = Product::findOrFail($productId);
        $sizes = ProductSize::where('product_id', $product->id)->get();
        $options = ProductOption::where('product_id', $product->id)->get();
        return view('admin.product.product-size.index', compact('product','sizes','options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'name'=>['required','max:255'],
            'product_id' =>['required', 'integer'],
            'price' => ['required','numeric']
        ],[
            'name.required' => 'Product Size Name is required!',
            'name.max'=>'Product Size Max Length is 255',
            'price.required' => 'Product Size Price is required!',
            'price.numeric' => 'Product Size Price is have to be a number!',
        ]);

        $size = new ProductSize();
        $size->product_id = $request->product_id;
        $size->name = $request->name;
        $size->price = $request->price;
        $size->save();

        toastr('Created Successfully!', 'success');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : Response
    {
        try {
            $size = ProductSize::findOrFail($id);
            $size->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully.']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something Is not well!']);
        }
    }
}
