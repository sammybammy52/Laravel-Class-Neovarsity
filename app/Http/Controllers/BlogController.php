<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();

        return response([
            'status' => 'success',
            'message' => 'Blogs Fetched successfully',
            'data' => $blogs
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $author = $request->author;
        $noOfWriters = $request->no_of_writers;
        $description = $request->description;

        $newBlog = Blog::create([
            'title' => $title,
            'author' => $author,
            'no_of_writers' => $noOfWriters,
            'description' => $description
        ]);

        return response([
            'status' => 'success',
            'message' => 'Blog Created Successfully',
            'data' => $newBlog
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        if (!$blog) {
            return response([
                'status' => 'fail',
                'message' => 'Blog not found',
            ], 404);
        }

        return response([
            'status' => 'success',
            'message' => 'Blog Found',
            'data' => $blog
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $blog = Blog::find($id);

        $blog->update($data);

        return response([
            'status' => 'success',
            'message' => 'Blog Updted Successfully',
            'data' => $blog
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        $blog->delete();

        return response([
            'status' => 'success',
            'message' => 'Blog Deleted successfully',
        ], 200);
    }
}
