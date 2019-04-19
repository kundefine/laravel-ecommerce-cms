<?php

namespace App\Http\Controllers;
<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;
=======
>>>>>>> refs/remotes/origin/master


use App\Product;
use App\Catagory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Catagory::where('visibility', '=', '1')->get();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD

    

    public function store(Request $request)
    {
        
        $newProductId = Product::all()->count() + 1;
        $uploadedFile = $request->file('product_images');
        $filename = uniqid().$uploadedFile->getClientOriginalName();
 
        Storage::disk('local')->putFileAs(
            'product_images/product_'.$newProductId,
            $uploadedFile,
            $filename
        );
        return response()->json(['filename'=> $filename, "new_product_id" => $newProductId]);
    }

    public function deleteImage(Request $request) {
        $newProductId = Product::all()->count() + 1;
        $filename =  $request->get('filename');
        $p = 'product_images/product_'.$newProductId . '/'.$filename;
        $path=storage_path().'/app/product_images/product_'.$newProductId . '/'.$filename;
        if (Storage::exists($p)) {
            $delete = Storage::delete($p);
        } else {
            $delete = null;
        }
        return response()->json(['success'=> $filename, "new_product_id" => $newProductId, 'path' => $path, 'delete' => $delete, $p]);
    }




=======
    public function store(Request $request)
    {
        dd(request()->file('file'));
    }

>>>>>>> refs/remotes/origin/master
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
