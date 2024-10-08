<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category1;
use App\Models\Product;
use App\Traits\FileUploadTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Str;

class ProductController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */


     public function __construct()
     {
         $this->middleware(['permission:product index,admin'])->only('index');
         $this->middleware(['permission:product create,admin'])->only(['create', 'store']);
         $this->middleware(['permission:product update,admin'])->only(['edit', 'update']);
         $this->middleware(['permission:product delete,admin'])->only(['destroy']);
     }
    public function index(ProductDataTable $dataTable) : View|JsonResponse
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $category1s = Category1::all();
        return view('admin.product.create', compact('category1s'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request) : RedirectResponse
    {
        /** Handle image file */
        $imagePath = $this->handleFileUpload($request, 'image');

        $product = new Product();
        $product->thumb_image = $imagePath;
        $product->name = $request->name;
        $product->slug = generateUniqueSlug('Product', $request->name);
        $product->category_id = $request->category;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->sku = $request->sku;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->show_at_home = $request->show_at_home;
        $product->status = $request->status;
        $product->save();

        toast()->success('Create Successfully');

        return to_route('admin.product.index');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : View
    {
        $category1s = Category1::all();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('category1s', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id) : RedirectResponse
    {
                $product = Product::findOrFail($id);

                /** Handle image file */
                $imagePath = $this->handleFileUpload($request, 'image', $product->thumb_image);

                $product->thumb_image = !empty($imagePath) ? $imagePath : $product->thumb_image;
                $product->name = $request->name;
                $product->category_id = $request->category;
                $product->short_description = $request->short_description;
                $product->long_description = $request->long_description;
                $product->sku = $request->sku;
                $product->seo_title = $request->seo_title;
                $product->seo_description = $request->seo_description;
                $product->show_at_home = $request->show_at_home;
                $product->status = $request->status;
                $product->save();

                toast()->success('Update Successfully');

                return to_route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : Response
    {
        try{
            $product = Product::findOrFail($id);
            $this->removeImage($product->thumb_image);
            $product->delete();

            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        }catch(\Exception $e){
            return response(['status' => 'error', 'message' => 'something went wrong!']);
        }
    }
}
