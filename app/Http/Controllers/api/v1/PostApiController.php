<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::all();

        return response()->json(
            [
                'status' => 'success',
                'data' => $data,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Post::create($request->all());

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Post created successfully',
                'data' => $data,
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = Post::findOrFail($id);

            return response()->json(
                [
                    'status' => 'success',
                    'data' => $data,
                ]
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Post not found',
                ],
                404
            );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = Post::findOrFail($id);
            $data->update($request->all());

            return response()->json(
                [
                    'status' => 'success',
                    'data' => $data,
                ]
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Post not found',
                ],
                404
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Post::findOrFail($id);
            $data->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Post deleted successfully',
            ]
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Post not found',
                ],
                404
            );
        }
    }
}
