<?php
/**
 * Created by PhpStorm.
 * User: smartworld
 * Date: 7/9/20
 * Time: 12:06 PM
 */

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\Blogcategories;
use App\Models\Blogpost;
use App\Models\Blogtag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blogpost::orderBy('created_at','desc')->get();
        return view('front.blogs.list')
            ->with('categories', Blogcategories::all())
            ->with('posts', $posts);

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


        return view('front.blogs.single')->with('post', $post)
            ->with('title',$post->title)
            //->with('settings',Setting::first())
            ->with('categories',Blogcategories::take(7)->get())
            ->with('next',Blogpost::find($next_id))
            ->with('prev',Blogpost::find($prev_id));




    }



    public function category($id)
    {


        $category = Blogcategories::find($id);
        return view('front.blogs.category')->with('category', $category)
            ->with('title',$category->name)
            //->with('settings',Setting::first())
            ->with('categories', Blogcategories::take(5)->get());
    }


    public function tag($id)
    {
        $tag = Blogtag::find($id);
        return view('front.blogs.tag')->with('tag',$tag)
            ->with('title', $tag->tag)
           // ->with('settings',Setting::first())
            ->with('categories', Blogcategories::take(5)->get());
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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