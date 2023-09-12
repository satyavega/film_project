<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\FormController;
use App\Models\Post;
use App\Models\Genre;
use Illuminate\View\View;

    class AdminController extends Controller
    {
        public function AdminDashboard(){
            $totalUsers = User::where('role', 'user')->count();
            return view('admin.index', [
                'totalUsers' => $totalUsers,
            ]);
        }

        public function AdminLogout(Request $request)
        {
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/login');
        }
        public function AdminLogin(){

            return view('admin.admin_login');

        }
        public function AdminProfile(){

            $id = Auth::user()->id;
            $profileData = User::find($id);
            return view('admin.admin_profile', compact('profileData'));
        }
        public function AdminForm(){

            $genres = Genre::all();

            return view('admin.admin_form', compact('genres'));
        }
        public function FormAddMember(){

            return view('admin.form_member');
        }

        public function index(){

            $posts = Post::latest();
            $posts = Post::sortable()->paginate(999)->fragment('post'); // Misalnya, batasi 10 data per halaman

            return view('admin.admin_dashboard', compact('posts'));
        }


        public function edit(string $id){

            $post = Post::findOrFail($id);

            return view('admin.body.edit', compact('post'));
        }
        public function show(string $id): View
        {
            $post = Post::findOrFail($id);

            return view('admin.admin_show', compact('post'));
        }
    }
