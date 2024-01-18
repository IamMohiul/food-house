<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductOption;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductOptionController extends Controller
{
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
            'name.required' => 'Product Option Name is required!',
            'name.max'=>'Product Option Max Length is 255',
            'price.required' => 'Product Option Price is required!',
            'price.numeric' => 'Product Option Price is have to be a number!',
        ]);

        $option = new ProductOption();
        $option->product_id = $request->product_id;
        $option->name = $request->name;
        $option->price = $request->price;
        $option->save();

        toastr('Created Successfully!', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : Response
    {
        try {
            $option = ProductOption::findOrFail($id);
            $option->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something Is not well!']);
        }
    }
}
