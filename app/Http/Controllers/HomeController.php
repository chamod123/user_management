<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            $users = User::all();

            return view('home',
                ['users' => $users
                ]);
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }


    public function createUser()
    {
        try {
            return view('create');
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }


    public function storeUser(Request $data)
    {

//        return $data;
        try {
            $validator = Validator::make($data->all(), [
                'name_title' => 'required',
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'last_name' => 'required',
                'date_of_birth' => 'required',
                'gender' => 'required',
                'remark' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->getMessageBag()->toArray()], 200);
            }

            User::create([
                'name_title' => $data['name_title'],
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'last_name' => $data['last_name'],
                'date_of_birth' => $data['date_of_birth'],
                'gender' => $data['gender'],
                'remark' => $data['remark'],
            ]);

            return redirect('/home');
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }


    public function view_user_data($user_id)
    {
        try {
            $user = User::find($user_id);
            return $user;
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }


    public function view_user_edit($client_no)
    {
        try {
            $user = User::find($client_no);
            return view('edit',
                ['user' => $user
                ]);
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }


    //update client
    public function user_edit(Request $data)
    {
            try {
                $validator = Validator::make($data->all(), [
                    'name_title' => 'required',
                    'name' => 'required',
                    'email' => 'required',
                    'last_name' => 'required',
                    'date_of_birth' => 'required',
                    'gender' => 'required',
                    'remark' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->getMessageBag()->toArray()], 200);
                }

                $user = User::find($data->user_no);
                $user->name_title = $data['name_title'];
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->last_name = $data['last_name'];
                $user->date_of_birth = $data['date_of_birth'];
                $user->gender = $data['gender'];
                $user->remark = $data['remark'];


                $user->save();


                return redirect('/home');
            } catch (\Exception $e) {

                return $e->getMessage();
            }






    }


}
