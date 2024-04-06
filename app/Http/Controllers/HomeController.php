<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }
    public function login(){
        return view('login');
    }

    public function user_dashboard()
    {
        return view('user_account.dashboard' );
    }

    public function my_orders()
    {
        return view('user_account.orders');
    }

    public function my_address()
    {
        return redirect()->back();
        return view('user_account.address');
    }

    public function account_details() 
    {
        return view('user_account.accountdetails');
    }
    public function user_profile()
    {
        return view('user_account.updateprofile');
    }
    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',

        ]);



        $user = auth()->user();
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone');

        if ($request->filled('password')) {
            if($request->input('password') === $request->input('password_confirmation')){
                $user->password = Hash::make($request->input('password'));
            }
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');

    }

    public function collect_request()
    {
        return view('user_account.request');
    }
    public function show_blogs($id)
    {
        $blogs = Blogs::all();
        $blog = Blogs::findOrFail($id);
        $blogs = Blogs::orderBy('created_at', 'desc')->get();


        return view('blog-post', compact('blog', 'blogs'));
    }

    public function blogs()
    {
        $blogs = Blogs::all();
        $blogs = Blogs::orderBy('created_at', 'desc')->get();
        return view('blogs', compact('blogs'));
    }

    public function store_request(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image_name = "image";

        if ($request->image) {
            $newImageName = time() . '-' . $image_name. '.' . $request->image->extension();
            $request->image->move(public_path('assets/images/orders'), $newImageName);
        }


        auth()->user()->requests()->create([
            'date' => $request->date,
            'time' => $request->time,
            'image' => $newImageName,
            'message' => $request->message,
            'user_id' => auth()->user()->id,
        ]);

        return back()->with('success', 'Request submitted successfully!');
    }
}
