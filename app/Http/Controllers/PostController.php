<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{

    public function index()
    {
        return view('post');
    }

    public function editView()
    {
        return view('update');
    }

    public function editInfo($id)
    {

        //   return response()->json([

        //     'user' => Post::find($id)

        //  ], Response::HTTP_OK);

        $user = Post::find($id);
        return compact('user');
    }

    public function showall()
    {
        return view('show');

    }

    function list() {
        // return response()->json([

        //     'users' => Post::all()

        // ], Response::HTTP_OK);

        $users = Post::all();
        return compact('users');

    }

    public function createPost(Request $request)
    {
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        $input['image'] = $imageName;
        request()->image->move(public_path('images'), $imageName);

        $post = new Post;
        $post->title = $request->title;
        $post->user_id = '12';
        $post->image = $input['image'];
        $post->desc = $request->desc;
        $post->save();

        return response()->json([
            'message' => 'New post created',
        ]);

    }

    public function update($id, Request $request)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->update();

        return response()->json([
            'message' => 'New post created',
        ]);

    }

    public function show($id)
    {
        $product = Post::find($id);
        return response()->json($product);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return response()->json('Data deleted!');
    }
}
