<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserImage;
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
    public function index(Request $request)
    {
        try {

            $from_date = $request->get("from_date");
            $to_date = $request->get("to_date");
            $first_name = $request->get("first_name");
            $last_name = $request->get("last_name");

            $users = User::select('users.*');
            if ($from_date != null && $from_date != '' && $to_date != null && $to_date != '') {
                $users->whereDate('users.date_of_birth', '<=', $to_date)
                    ->whereDate('users.date_of_birth', '>=', $from_date);
            }
            if ($first_name != null && $first_name != ''){
                $users->where('name', 'like', '%' . $first_name . '%');
            }
            if ($last_name != null && $last_name != ''){
                $users->where('last_name', 'like', '%' . $last_name . '%');
            }





            return view('home',
                ['users' => $users->get(),
                    'from_date' => $from_date,
                    'to_date' => $to_date,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
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

            $user_data = User::create([
                'name_title' => $data['name_title'],
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'last_name' => $data['last_name'],
                'date_of_birth' => $data['date_of_birth'],
                'gender' => $data['gender'],
                'remark' => $data['remark'],
            ]);

            $image = $data->file('img_1');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('user_images'), $imageName);

            $user_image = new UserImage();
            $user_image->user_id = $user_data->id;
            $user_image->image_name = $imageName;
            $user_image->save();

            $image2 = $data->file('img_2');
            $imageName2 = $image2->getClientOriginalName();
            $image2->move(public_path('user_images'), $imageName2);

            $user_image = new UserImage();
            $user_image->user_id = $user_data->id;
            $user_image->image_name = $imageName2;
            $user_image->save();

            return redirect('/home');
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }


    public function view_user_data($user_id)
    {
        try {
            $user = User::find($user_id);

            $user_images = UserImage::where('user_id','=',$user_id)->get();

            return ['user'=>$user,
                'user_images' =>$user_images];
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
