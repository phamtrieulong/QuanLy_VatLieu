<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CatController extends Controller
{

    protected $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
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
        $categories = Category::where('name', 'LIKE', "%{$keyword}%")->paginate(10);

        return view('admin.product.list_cat',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.add_cat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $attributes = $request->only(['name','description']);

        $this->categoryRepo->create($attributes);
           return redirect('admin/cat/index')->with('status','Thêm danh mục thành công');
    
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/cat/index')->with('status','Xóa danh mục thành công');
    }
}
