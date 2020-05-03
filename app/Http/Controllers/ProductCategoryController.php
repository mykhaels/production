<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.product-category.index',  ['categories'=>ProductCategory::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.product-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'product_category' => ['required', 'max:100'],
        ],[
            'product_category.required' => 'Kategori Produk harus diisi !'
        ]);


        // two way to insert
        //one like this
        // $productCategory = new ProductCategory();
        // $productCategory->category_product = $request->product_category;
        // $productCategory->product_type = $request->product_type;

        //the other using eloquent
        //must fill fillable in model otherwise error mass assignment
        // ProductCategory::create([
        //     'category_product' => $request->product_category,
        //     'product_type' => $request->product_type,
        // ]);

        //if u already using fillable u can also make it one line
        //the condition is the name in form have to be the same as column name
        ProductCategory::create($request->all());

        return redirect('/product-category')->with('status','Data Kategori Produk Berhasil Disimpan !');
        // return $request->all();
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('master.product-category.edit',compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {

        $request->validate([
            'product_category' => ['required', 'max:100'],
        ],[
            'product_category.required' => 'Kategori Produk harus diisi !'
        ]);

        ProductCategory::where('id', $productCategory->id)->update([
            'product_category' => $request->product_category,
            'product_type' => $request->product_type,
        ]);

        return redirect('/product-category')->with('status','Data Kategori Produk Berhasil Diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        ProductCategory::destroy($productCategory->id);
        return redirect('/product-category')->with('status','Data Kategori Produk Berhasil Dihapus !');
    }
}
