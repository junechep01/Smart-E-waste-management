<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Blogs;
use App\Models\Emails;
use Illuminate\Http\Request;
use App\Models\Requests;
use Illuminate\Validation\Rule;

class AdminPageController extends Controller
{   public function dashboard()
    {
        $users = User::all();
        $collection_requests = Requests::all();
        $emails = Emails::all();
        
     
        return view('admin.index', compact('users', 'collection_requests', 'emails')) ;
        
    }
    public function show_profile(){
        return view('admin.profile.user-profile');  
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['max:100'],
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
            'phone' => ['max:20'],
            'role' => ['max:1'],
        ]);
        

        auth()->user()->update([
            'name' => $request->get('firstname'),
            'email' => $request->get('email') ,
            'phone' => $request->get('phone'),
            'role' => $request->get('role'),
        ]);

        toastr()->success('Profile succesfully updated');

        return back();
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'old-password' => ['required'],
            'password' => ['required', 'min:5'],
            'confirm-password' => ['same:password']
        ]);

        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            if (password_verify($request->old_password, $existingUser->password)) {
                $existingUser->update([
                    'password' => $request->password
                ]);
                return redirect('login');
            } else {
                toastr()->error('Your old password does not match');
                return back();
            }
        } else {
            toastr()->error('Your email does not match the email who requested the password change');
            return back();
        }

        return redirect('login');
    }


    public function users(){
        $users = User::all();
        return view('admin.users', compact('users'));   
    }

    public function collection_requests(){
        $collection_requests = Requests::all();
        return view('admin.collection_requests', compact('collection_requests'));   
    }

    public function emails(){
        $emails = Emails::all();
        return view('admin.emails', compact('emails'));   
    }

    public function profile(){
        return view('admin.user-profile');   
    }

    public function blogs(){
        $blogs = Blogs::all();
        return view('admin.blogs', compact('blogs'));
    }
    public function create_blogs(){
      
        return view('admin.create-blog');
    }

    public function update_requests(Request $formRequest)
{
    

    $requestModel = Requests::findOrFail($formRequest->id);
    $requestModel->status = $formRequest->approval_status;
    $requestModel->points = $formRequest->points;
    $requestModel->save();

    return redirect()->back()->with('success', 'Request updated successfully!');
}


    public function store(Request $request)
    {
        // Validate the incoming request
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'body' => 'required|string',
        //     'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        // ]);

        if ($request->image) {
            $newImageName = time() . '-' . $request->title. '.' . $request->image->extension();
            $request->image->move(public_path('images/blogs'), $newImageName);
          
        }
        $post = new Blogs([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'image' => $newImageName,
        ]);

        $post->save();


        return redirect()->route('blogs')->with('success', 'Post created successfully!');
    }
}
