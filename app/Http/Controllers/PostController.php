<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use App\Models\Post;
use App\Models\User;
use App\Models\PostGenre;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * index
     *
     * @return View
     */

    public function index()
    {
        $totalUsers = User::where('role', 'user')->count();

        $posts = Post::all(); // Atau menggunakan query yang sesuai
        return view('landing',[
            'posts' => $posts], compact('posts'));
    }

    public function dashboard(Request $request): View
    {
        $cari = $request->query('cari');
        if(!empty($cari)){
            $posts = Post::sortable()
            ->where('posts.title','like','%' .$cari. '%')
            ->paginate(10)->fragment('post');
        } else{

            $posts = Post::sortable()->paginate(9)->fragment('post');
        }

        //get posts
        // $posts = Post::sortable()->paginate(10)->fragment('post');

        //render view with posts
        return view('admin.index', compact('posts'))->with(['posts' => $posts, 'cari' => $cari, ]);
    }

    public function create()
    {

    }
    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:4096',
            'title' => 'required|min:5',
            'slug' => 'min:5',
            'desc' => 'required|min:10',
            'time' => 'required|min:1',
            'genre_ids.*' => 'required|numeric',
        ]);

        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/posts/', $image->hashName());

        // Create post
        $post = Post::create([
            'image' => $image->hashName(),
            'title' => $validatedData['title'] ?? '',
            'slug' => $validatedData['slug'] ?? '',
            'desc' => $validatedData['desc'] ?? '',
            'time' => $validatedData['time'] ?? '',
        ]);



        foreach ($validatedData['genre_ids'] as $genre) {
            PostGenre::create([
                'post_id' => $post->id,
                'genre_id' => $genre,
            ]);
        }


        return redirect()->route('admin.dashboard')->with('success', 'Post has been created!');
}

    public function show(Post $post): View
    {
        //get post by ID
        // $post = Post::findOrFail($slug);

        //render view with post
        return view('admin.admin_show',[
        "post" => $post
    ], compact('post'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);
        //render view with post
        return view('admin.body.edit', compact('post'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required|min:5',
            'slug'      => 'min:5',
            'desc'      => 'required|min:10',
            'time'      => 'required|min:1',
            'genre'     => 'required|min:1'
        ]);

        //get post by ID
        $post = Post::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'slug'      => $request->slug,
                'desc'      => $request->desc,
                'time'      => $request->time,
                'genre'     => $request->genre
            ]);

        } else {

            //update post without image
            $post->update([
                'title'     => $request->title,
                'slugs'     => $request->slugs,
                'desc'      => $request->desc,
                'time'      => $request->time,
                'genre'     => $request->genre
            ]);
        }

        //redirect to index
        return redirect()->route('admin.dashboard')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //delete image
        Storage::delete('public/posts/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('admin.dashboard')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
