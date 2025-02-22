<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(?int $category_id = null): View
    {
        $productCollection = (is_null($category_id)) ?
            Product::with("category")->orderBy("id", "desc")->paginate(10) :
            Product::with("category")->where("category_id", $category_id)->orderBy("id", "desc")->paginate(10);
        $isCategoryFiltered = (!is_null($category_id));
        return view("products.index", compact("productCollection", "isCategoryFiltered"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::orderBy("name")->pluck("name", "id");
        return view("products.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['stock'] = $data['stock'] ?? 0;
        $data['description'] = $data['description'] ?? '';
        $data['image'] = $request->hasFile('image')
            ? $request->file('image')->store('products/images')
            : 'products/default.png';
        Product::create($data);
        return redirect()->route('products.index')->with('message', 'Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view("products.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        $categories = Category::orderBy("name")->pluck("name", "id")->toArray();
        return view("products.edit", compact("product", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();
        $data['stock'] = $data['stock'] ?? 0;
        $data['description'] = $data['description'] ?? '';
        $oldImage = $product->image;
        if ($request->hasFile('image')) {
            if (basename($oldImage) !== 'default.png' && Storage::exists($oldImage)) Storage::delete($oldImage);
            $data['image'] = $request->file('image')->store('products/images');
        } else {
            $data['image'] = $oldImage;
        }
        $product->update($data);
        return redirect()->route('products.index')->with('message', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $productImage = $product->image;
        if (basename($productImage) !== "default.png" && Storage::exists($productImage)) Storage::delete($productImage);
        $product->delete();
        return redirect()->route("products.index")->with("message", "Product deleted successly");
    }
}
