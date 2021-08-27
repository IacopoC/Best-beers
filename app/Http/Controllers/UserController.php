<?php

namespace App\Http\Controllers;
use App\Models\Beer;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('dashboard' , array('user'=> Auth::user()));

    }

    public function show() {
        if (Auth::check()) {

            $id = Auth::user()->id;
            $yourBeers = Beer::where('users_id', $id)->orderBy('created_at', 'desc')->get();

            return view('your-beer', array('yourBeers' => $yourBeers, 'user' => Auth::user()));
        }
    }

    public function update()
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
        }

        $user = User::find($id);

        $this->validate(request(), [
            'country' => 'nullable|max:255',
            'hometown' => 'nullable|max:255',
            'address' => 'nullable|max:255',
            'zip' => 'nullable|max:255',
            'province' => 'nullable|max:255'
        ]);

        $user->country = request('country');
        $user->hometown = request('hometown');
        $user->address = request('address');
        $user->zip = request('zip');
        $user->province = request('province');

        $user->save();

        return redirect()->route('dashboard');

    }
}
