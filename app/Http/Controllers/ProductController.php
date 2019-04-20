<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;


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
        $color_json = Storage::disk('public')->get('json/color_name.json');
        $size_json = Storage::disk('public')->get('json/product_size.json');
        $colors = json_decode($color_json, true);
        $sizes = json_decode($size_json, true);
        $categories = Catagory::where('visibility', '=', '1')->get();
        return view('admin.product.create', compact('categories', 'colors', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $newProductId = Product::all()->count() + 1;


        // product images
        $fileUploadDir = public_path('product_images/product_'.$newProductId . '/');
        $uploadedFile = [];
        if( file_exists( $fileUploadDir ) && is_dir( $fileUploadDir ) ) {
            $uploadedFile = array_values(array_diff(scandir($fileUploadDir), ['.', '..'])); 
        }


        dd(request()->all(), $uploadedFile);
    }

    public function addProductImages(Request $request) {
        $newProductId = Product::all()->count() + 1;
        $uploadedFile = $request->file('product_images');
        if($request->has('thumbnail')) {
            $filename = request('thumbnail') . '-' . $newProductId . '.' .$uploadedFile->getClientOriginalExtension();
        } else {
            $filename = time() . '-' .$uploadedFile->getClientOriginalName();
        }
        $fileUploadDir = 'product_images/product_'.$newProductId;
 
        Storage::disk('local')->putFileAs(
            $fileUploadDir,
            $uploadedFile,
            $filename
        );

        $uploadedFile->move(public_path($fileUploadDir), $filename);
        return response()->json(['filename'=> $filename, "new_product_id" => $newProductId, "req" => request('thumbnail')]);
    }

    public function deleteImage(Request $request) 
    {
        $newProductId = Product::all()->count() + 1;
        $filename =  $request->get('filename');
        $fileUploadDir = 'product_images/product_'.$newProductId;
        $p = 'product_images/product_'.$newProductId . '/'.$filename;
        if (Storage::exists($p)) {
            $delete = Storage::delete($p);
            $pelete = unlink(public_path($fileUploadDir . '/' . $filename) );
        } else {
            $delete = null;
        }
        return response()->json(['success'=> $filename, "new_product_id" => $newProductId, 'path' => $p, 'delete' => $delete, 'pdelete' => $pelete]);
    }


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
