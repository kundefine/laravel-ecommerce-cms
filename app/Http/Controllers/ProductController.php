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
        $all_products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.product.index', compact('all_products'));

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
        $newProductId = Product::all()->last()->id + 1;

        $request->validate([
            'product_title' => 'required|min:3',
            'product_price' => 'required|numeric',
            'product_discount' => 'numeric|min:0|max:100',
            'product_measurement.color_name' => 'required',
            'product_measurement.size' => 'required',
        ]);

        $product_slug = Product::makeNewSlug(request('product_title'));

        // product images
        $fileUploadDir = public_path('product_images/product_'.$newProductId . '/');
        $uploadedFile = [];
        if( file_exists( $fileUploadDir ) && is_dir( $fileUploadDir ) ) {
            $uploadedFile = array_values(array_diff(scandir($fileUploadDir), ['.', '..'])); 
        }
        $thumbnail = 'nothumbnail.jpg';
        if(!empty($uploadedFile)) {
            foreach($uploadedFile as $index => $upFile) {
                if( strstr($upFile, 'thumbnail-' .  $newProductId) ) {
                    $thumbnail = trim($upFile, "\"");
                    unset($uploadedFile[$index]);
                    array_values($uploadedFile);
                    break;
                }
            }
        } else {
            $uploadedFile = null;
        }

        $discount_price = request('product_price');
        if(!empty(request('product_discount'))) {
            $discount_price = request('product_price') - ((request('product_price') * request('product_discount'))/ 100);
        } else {
            $discount_price = request('product_price') - ((request('product_price') * 0)/ 100);
        }

    

        Product::create([
            'id' => $newProductId,
            'cat_id' => request('cat_id'),
            'product_title' => request('product_title'),
            'product_slug' => $product_slug,
            'product_measurement_details' => json_encode( request('product_measurement') ),
            'product_discription' => request('product_discription'),
            'product_price' => request('product_price'),
            'product_discount' => !empty(request('product_discount')) ? request('product_discount') : 0,
            'product_price_after_discount' => $discount_price,
            'product_thumbnail' => $thumbnail,
            'product_images' => json_encode( $uploadedFile ),
            'product_stock' => request('product_stock'),
            'visibility' => request('visibility'),
        ]);


        return back()->with('success', 'Your product has been successfully added.');
    }

    public function addProductImages(Request $request) {
        $newProductId = Product::all()->last()->id + 1;
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
        $newProductId = Product::all()->last()->id + 1;
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
        $product->delete();
        return back()->with('success', 'Delete Successfull');
    }
}
