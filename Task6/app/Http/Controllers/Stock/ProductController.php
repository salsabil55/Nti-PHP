<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\media;

class ProductController extends Controller
{
    use media; // inherit all func in this trait
    public function index()
    {
        // query builder & orm (eloquent)
        $products = DB::table('products')
            ->select('id', 'name_en', 'price', 'quantity', 'status', 'created_at')
            ->get(); // get all product colomn

        return view('products.index', compact('products'));
    }
    public function create()
    {
        $brands = DB::table('brands')
            ->select('id', 'name_en')->where('status', '1')
            ->get();
        $subcategories = DB::table('subcategories')->where('status', '1')
            ->select('id', 'name_en')
            ->get();
        return view('products.create', compact('brands', 'subcategories'));
    }
    // take object from class request to retrieve data
    public function store(Request $request , StoreProductRequest $storeProductRequest)
    {
        // all = > built in method in request class retrieve data as array & convert object data to array

        // check validation before insert data in db
       // redirect automitcally to direction
        //upload image
        $photoName = $this->uploadMedia($request->image,'products'); // take image name that return in request object
        // insert product into database
        $data = $request->except('_token', 'image', 'page'); //not upload image beacuse it reurn file not image name
        $data['image'] = $photoName;
        // insert into db
        DB::table('products')->insert($data);
        // determin which button is clicked , return to according to button -> with success message
        return $this->returnAccordingButton($request);

    }
    public function update(Request $request,UpdateProductRequest $updateProductRequest , $id)
    {
        // check validation before insert data in db
        // check validation and request object return all data
        $data = $request->except('image', 'page', '_token', '_method'); //not upload image beacuse it reurn file not image name
        //upload photo if user change it and delete old one
        if ($request->has('image')) {
            // use first() funct to return one object but get()/all() return array
            $oldImageOfProduct = DB::table('products')->select('image')->where('id', $id)->first()->image;
            // create absloute path for image
            $this->deleteMedia($oldImageOfProduct,'products');
            //   upload image if new
            //upload image
             //not upload image beacuse it reurn file not image name
            $data['image'] = $this->uploadMedia($request->image,'products');
        }
        // update data in db
        DB::table('products')->where('id',$id)->update($data);

        return $this->returnAccordingButton($request);

    }

    public function edit($id)
    {
        $result = DB::table('products')->where('id', $id)->find($id);
        $brands = DB::table('brands')
            ->select('id', 'name_en')->where('status', '1')
            ->get();
        $subcategories = DB::table('subcategories')->where('status', '1')
            ->select('id', 'name_en')
            ->get();

        return view('products.edit', compact('result', 'brands', 'subcategories'));
    }

    public function destroy($id)
    {
        // find $id in model product
        // make function delete();
        // delete old image from server then delete record from db
        $oldImageOfProduct = DB::table('products')->select('image')->where('id', $id)->first()->image;
        $this->deleteMedia($oldImageOfProduct,'products');
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('products.index')->with('success', 'Operation Successfull');
    }

    private function returnAccordingButton($request){
        if ($request->page == 'index') {
            return redirect()->route('products.index')->with('success', 'Operation Successfull');
        }
        return redirect()->back()->with('success', 'Operation Successfull');
    }
}
