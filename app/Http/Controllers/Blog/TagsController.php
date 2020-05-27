<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;
use App\Models\Blogtag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blogs.tags.index')->with('tags',Blogtag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.blogs.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request ,[
                    
        //             'tag' => 'required'

        // ]);
        // Tag::create([
        //         'tag' => $request->tag
        // ]);
        // Session::flash('success','Tag created successfully');
        // return redirect()->back();

        $this->validate($request,[

                'tag' => 'required'


        ]);

        $tag = new Blogtag;
        $tag->tag = $request->tag;
        $tag->save();
        request()->session()->flash('success', 'You succesfully created a tag.');
        return redirect()->route('tags');


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
        $tag = Blogtag::find($id);
        return view('admin.blogs.tags.edit')->with('tag', $tag);
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
        $this->validate($request, [

            'tag' => 'required'

        ]);
        $tag = Blogtag::find($id);
        $tag->tag = $request->tag;
        $tag->save();
        request()->session()->flash('success','Tag Updated successfully');
        return redirect()->route('tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blogtag::destroy($id);
        request()->session()->flash('success', 'Tag deleted');
        return redirect()->back();
    }
}
