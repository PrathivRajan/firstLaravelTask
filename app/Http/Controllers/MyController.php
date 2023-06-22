<?php

namespace App\Http\Controllers;
use App\Models\categoryModel;
use App\Models\productModel;
use Illuminate\Http\Request;
use DB;

class MyController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('auth', ['only' => ['create', 'store', 'edit', 'delete']]);
        //$this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $categoryDetails = categoryModel::all();
        $categoryCount   = categoryModel::count();
        $productCount      = productModel::count();
        return view('index', ['categoryCount' => $categoryCount,
                                         'productCount' => $productCount,
                                         'categoryDetails' => $categoryDetails
                                         ]);
    }
    public function category()
    {
        $categoryDetails = categoryModel::all();
        $categoryCount   = categoryModel::count();
        // $categoryCount = DB::table('category_lists')->count();
        return view('categoryPage', ['categoryDetails' => $categoryDetails, 'categoryCount' => $categoryCount]);
    }
    public function addCategory(Request $request)
    {
        // return $request;
        // categoryModel::create($request->all());
        $categoryList = new categoryModel;
        $categoryList->categoryName = $request->categoryName;
        $categoryList->save();
        return redirect()->back()->with('status', 'Category Name Added Successfully');
    }
    /* The `products` function is a controller method that handles the display of products on the
    product page. It takes in a `Request` object and a `categoryModel` object as parameters. The
    `` parameter is optional and defaults to `NULL`. */
    public function products(Request $request, categoryModel $category = NULL)
    {
        if ($category) {
            // $productDetails    = productModel::where('category_id', $id)->get();
            $productDetails    = $category->products;
        }
        else
        {
            if($request->has('search'))
            {
             $productDetails = productModel::where('productName', 'LIKE', '%'.$request->search.'%')->get();
            } else {
             $productDetails    = productModel::all();
            }


        }

        $categoryDetails   = categoryModel::all();

        return view('productPage', ['categoryDetails' => $categoryDetails,'productDetails' => $productDetails]);
    }

    /**
     * This function adds a new product to a product list with information provided in a request and
     * saves an image file if provided.
     *
     * @param Request request  is an instance of the Request class which contains the data sent
     * by the user through an HTTP request. It can contain data from the URL, form data, and other
     * types of data. In this case, it is used to retrieve the data sent by the user when adding a
     * product, such as
     *
     * @return a redirect back to the previous page with a success message in the session data.
     */
    public function addProduct(Request $request)
    {
         $productList = new productModel;
         $productList->category_id           = $request->category_id;
         $productList->productCode           = $request->productCode;
         $productList->productName           = $request->productName;
         $productList->productDescription    = $request->productDescription;
         $productList->productPrice          = $request->productPrice;

         if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move('uploads', $filename);
        }

         $productList->productImage          = $filename;
         $productList->save();

         return redirect()->back()->with('status', 'Product Added Successfully');
    }
    // public function showProduct($id)
    // {
    //     $categoryDetails   = categoryModel::all();
    //     $productDetails    = productModel::where('category_id', $id)->get();

    //     return view('productPage', ['categoryDetails' => $categoryDetails, 'productDetails' => $productDetails]);
    // }
    // if(isset(Request $request))
    // {
    // public function search(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'search' => 'required|string|max:255',
    //     ]);

    //     if($request->has('search'))
    //     {

    //         $productDetails    = productModel::where('productName', 'LIKE', '%'.$request->search.'%')->get();
    //     }
    //     else
    //     {

    //         return redirect()->route('route.Product');
    //     }
    //     $categoryDetails   = categoryModel::all();


    //     return view('productPage', ['categoryDetails' => $categoryDetails,'productDetails' => $productDetails]);
    // }
// }
// else
// {
    // public function search()
    // {


    //         return redirect()->route('route.Product');

    // }
// }
}
