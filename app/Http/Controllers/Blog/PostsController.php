<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blogcategories;
use App\Models\Blogpost;
use App\Models\Blogtag;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blogs.posts.index')->with('posts', Blogpost::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Blogcategories::all();
        if($categories->count() == 0)
        {
            request()->session()->flash('info', 'You Must have Choose At least One Category');

            return redirect()->back();
        }
        return view('admin.blogs.posts.create')->with('categories',$categories)
                                         ->with('tags',Blogtag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'title' => 'required',
            'featured' => 'required|image',
            'body' => 'required',
            'category_id'=> 'required',
             'tags'=>'required'
            

        ]);

        $featured = $request->featured;
        $featuerd_new = time().$featured->getClientoriginalName();
        $featured->move('uploads/posts', $featuerd_new);

        $post = Blogpost::create([


                'title' => $request->title,
                'body' => $request->body,
                'featured' => 'uploads/posts/'. $featuerd_new,
                'category_id' => $request->category_id,
                'slug'=> str_slug($request->title),
                //'user_id'=>Auth::id()


        ]);

          $post->tags()->attach($request->tags);


        request()->session()->flash('success','Your post Created Succesfully');

       return redirect()->back();
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
        $posts = Blogpost::find($id);

        return view('admin.blogs.posts.edit')->with('posts',$posts)

                                       ->with('categories', Blogcategories::all())
                                       ->with('tags',Blogtag::all());
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
        

         $this->validate($request,[

            'title' => 'required',
            'body' => 'required',
            'category_id'=> 'required'
            

        ]);

        $posts = Blogpost::find($id);

        if($request->hasfile('featured')){


        $featured = $request->featured;
        $featuerd_new = time().$featured->getClientoriginalName();
        $featured->move('uploads/posts', $featuerd_new);
        $posts->featured ='uploads/posts/'.$featuerd_new;

        }


         $posts->title = $request->title;
         $posts->body = $request->body;
         $posts->category_id = $request->category_id;
         $posts->save();
         $posts->tags()->sync($request->tags);


        request()->session()->flash('success', 'You succesfully updated a Post.');
        return redirect()->route('posts');
       



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Blogpost::find($id);
        $posts->delete();
        request()->session()->flash('success', 'You succesfully deleted a Post.');
        return redirect()->back();
    }

    public function trashed()
    {
 
       $posts = Blogpost::onlyTrashed()->get();
      

       return view('admin.blogs.posts.trashed')->with('posts', $posts);

    }

    public function kill($id)
    {
       $posts = Blogpost::withTrashed()->where('id',$id)->first();
       $posts->forceDelete();
        request()->session()->flash('success', 'You succesfully deleted a Post Permanently.');
       return redirect()->back();
      
    }

    public function restore($id)

    {
        $posts = Blogpost::withTrashed()->where('id',$id)->first();
        $posts->restore();
        request()->session()->flash('success', 'You succesfully Restore a Post.');
        return redirect()->route('posts');


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function singlePost($slug)
    {

        $post = Blogpost::where('slug', $slug)->first();

        $next_id = Blogpost::where('id', '>', $post->id)->min('id');
        $prev_id = Blogpost::where('id', '<', $post->id)->max('id');


        return view('single')->with('post', $post)
            ->with('title',$post->title)
            ->with('categories',Blogcategories::take(7)->get())
            ->with('next',Blogpost::find($next_id))
            ->with('prev',Blogpost::find($prev_id));




    }



    public function category($id)
    {


        $category = Blogcategories::find($id);
        return view('category')->with('category', $category)
            ->with('title',$category->name)
            ->with('categories', Blogcategories::take(5)->get());
    }


    public function tag($id)
    {
        $tag = Blogtag::find($id);
        return view('tag')->with('tag',$tag)
            ->with('title', $tag->tag)
            ->with('categories', Blogcategories::take(5)->get());
    }
}
