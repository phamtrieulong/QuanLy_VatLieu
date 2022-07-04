<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReceivedNoteRequest;
use App\Models\ReceivedNote;
use App\Repositories\ReceivedNoteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceivedNoteController extends Controller
{
    protected $receivedNoteRepo;

    public function __construct(ReceivedNoteRepository $receivedNoteRepo)
    {
        $this->receivedNoteRepo = $receivedNoteRepo;
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
        $received_notes = ReceivedNote::where('received_notesid', 'LIKE', "%{$keyword}%")->paginate(10);

        return view('admin.received_note.index', compact('received_notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.received_note.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReceivedNoteRequest $request)
    {
        // dd($request)->all();
        $attributes = $request->only(['received_notesid','deliver']);
        $attributes = $attributes + ['user_id' => Auth::user()->id];

        $this->receivedNoteRepo->create($attributes);
        return to_route('admin.received-notes.index')->with('status','Thêm sản phẩm thành công');
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
        //
    }
}
