<?php

namespace App\Http\Controllers\api;

use App\Models\Brand;
use App\Models\Product;
use App\Http\traits\media;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\traits\responseApi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{

    use responseApi,media;
    private const Active = '1';

public function index()
{
    $products = Product::all(); // return array of objects
        return $this->returnData(compact('products'));
}

public function create()
{
   // return brand data
   $brands = Brand::where('status',self::Active)->get(); // return array of object
   // return subcategory data
   $subcategories = Subcategory::where('status',SELF::Active)->get();

   return $this->returnData(compact('brands','subcategories'));
}

public function edit($id)
{
    $product = Product::find($id); // check if id is exist and return data
        if($product){
            $brands = Brand::where('status',self::Active)->get();
            $subcategories = Subcategory::where('status',SELF::Active)->get();
            return $this->returnData(compact('product','brands','subcategories'));
        }else{
            return $this->returnErrorMessage("Invalid Id");
        }
}

public function store(Request $request,StoreProductRequest $StoreProductRequest)
{
    // use validation in store products
    // upload photo
    $data = $request->except('image');
    $data['image'] = $this->uploadMedia($request->image, 'products');
    // create product using create method
    Product::create($data);
    // return reponse
    return $this->returnSuccessMessage("Product Created Successfully");
}
public function update(Request $request , $id){
    // validate on id in request
    $idArray = compact('id'); // return all id in associative array toc heck if it exist in one of them
    $validator = Validator::make($idArray, [
        'id' => 'required|exists:products|integer', //manual validator
    ]);
    if ($validator->fails()) {
        return $this->returnErrorMessage("Invalid Id");
    }
    //return data except image &type of method use method in this because itis put so to can handle with it use post in form and sen method put in url
    $data = $request->except('image','_method');
    // update image if change it and delete old one
    if ($request->has('image')) {
        $productOldImage = Product::find($id)->image; // check if image exist delete it
        $this->deleteMedia($productOldImage, 'products');
        $data['image'] = $this->uploadMedia($request->image, 'products'); // upload new one
    }
    Product::where('id', $id)->update($data);
    return $this->returnSuccessMessage("Product Updated Successfully");
}
public function destroy($id)
    {
        // delete old photo
        $product = Product::find($id);
        if(!$product){ // return null or empty not find this id
            return $this->returnErrorMessage("Invalid Id");
        }
        $this->deleteMedia($product->image, 'products'); // use class in media trait
        $product->delete(); // delete product that return from function find
        return $this->returnSuccessMessage("Product Deleted Successfully");

    }

}
