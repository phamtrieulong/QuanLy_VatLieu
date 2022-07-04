<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBrandRequest;
use App\Models\Brand;
use App\Repositories\BrandRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class BrandController extends Controller
{

    protected $brandRepo;

    public function __construct(BrandRepository $brandRepo)
    {
        $this->brandRepo = $brandRepo;
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
        $brands = Brand::where('name', 'LIKE', "%{$keyword}%")->paginate(10);

        return view('admin.brand.list', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBrandRequest $request)
    {
        if($request->hasFile('img')){
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('storage/uploads/brandimg/',$filename);
        }
        
        $attributes = $request->only(['name','description','slug']);
        $attributes = $attributes + ['img' => $filename];

        $this->brandRepo->create($attributes);
    
           return redirect('admin/brand/list')->with('status','Thêm thành công');
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
        $brand = Brand::find($id);
        return view('admin/brand/edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateBrandRequest $request, $id)
    {
        $brand = Brand::find($id);
        if($request->hasFile('img')){
            $path = 'storage/uploads/brandimg/'.$brand->img;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $name = $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('public/uploads/brandimg',$name);
            $img = 'storage/uploads/brandimg/'.$name;

            Brand::where('id',$id)->update([
                'name' => $request->input('name'),
                'description'=> $request->input('description'),
                'slug'=> $request->input('slug'),
                'img' => $img,
            ]);

            return redirect('admin/brand/list')->with('status','Cập nhật thành công');
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
        $brand = Brand::find($id);
        $path = 'storage/uploads/brandimg/'.$brand->img;
        if(File::exists($path))
        {                
            File::delete($path);
        }
        $brand->delete();
        return redirect('admin/brand/list')->with('status','Xóa thương hiệu thành công');
    }
}
