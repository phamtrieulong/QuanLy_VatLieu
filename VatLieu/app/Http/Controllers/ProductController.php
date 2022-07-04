<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Brand;
use App\Repositories\ProductRepository;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword ="";
        if($request->input('keyword')){
            $keyword = $request->input('keyword');
        }
        $products = Product::where('name', 'LIKE', "%{$keyword}%")->paginate(10);

        return view('admin.product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        $brands = Brand::all();
        return view('admin.product.add', [
            'cats' => $cats,
            'brands' => $brands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $attributes = $request->only(['name','slug','sku','price','selling_price','quantity','description','status','brand_id','category_id']);
        if(request()->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('storage/uploads/products/',$filename);
            $attributes = $attributes + ['image' => $filename]; 
        }
        $attributes = $attributes + ['trending' => TRUE ? '1':'0'];
        $this->productRepo->create($attributes);
        return redirect('admin/product/list')->with('status','Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        $cats = Category::all();
        $brands = Brand::all();
        return view('admin.product.edit', [
            'products' => $products,
            'cats' => $cats,
            'brands' => $brands
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProductRequest $request, $id)
    {
        $products = Product::find($id);
        if(request()->hasFile('image'))
        {
            $path = 'storage/uploads/products/'.$products->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('storage/uploads/products/',$filename);
            Product::where('id',$id)->update([
                'name' => $request->input('name'),
                'slug'=> $request->input('slug'),
                'sku'=> $request->input('sku'),
                'price'=> $request->input('price'),
                'selling_price'=> $request->input('selling_price'),
                'image'=> $filename,
                'trending' => TRUE ? '1':'0',
                'quantity'=> $request->input('quantity'),
                'description'=> $request->input('description'),
                'status'=> $request->input('status'),
                'brand_id'=> $request->input('brand_id'),
                'category_id'=> $request->input('category_id')
            ]); 
        
        return redirect('admin/product/list')->with('status','Cập nhật sản phẩm thành công');
    }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $path = 'storage/uploads/products/'.$products->image;
        if(File::exists($path))
        {                
            File::delete($path);
        }
        $products->delete();
        return redirect('admin/product/list')->with('status','Xóa sản phẩm thành công');
    }
}
