<?php

namespace App\Http\Controllers;

use App\user_record;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Integer;

class userController extends Controller
{
   public function login()
   {
       return view('login');
   }

    public function login_details(Request $request)
    {
        $password=$request->password;
        $username1=$request->email;
//        dd($username1,$password);
        $user = user_record::where([
            'email' => $request->email,
        ])->first();
        if ($user) {

            $username = $user->email;
            $id = $user->id;
            $hash_password = $user->password;

            if ((Hash::check($password, $hash_password))&& $username1===$username) {

                Session::put('username', $username);
                Session::put('id', $id);
                return redirect('dashboard')->with('success','User login Successfully.');;

            }
            else {
                return redirect()->back()->withErrors(['Please Check your Username or Password.']);
            }

        }
        else {

            return redirect()->back()->withErrors(['Please Check your Username or Password.']);
        }
    }

   public function dashboard()
   {
       $fetch_data=user_record::all();
//       dd($fetch_data);
//       $userId = "4";
////       $User = user_record::findOrFail($userId);
//       $yearsOfExperience = user_record::calcExperienceYearsForUser($userId);
//dd($yearsOfExperience);

       return view('user_dashboard',compact('fetch_data'));
   }

    public function edit_display(Request $request)
    {
        $edit_id=decrypt($request->id);

        $fetch_edit_data=user_record::where('id',$edit_id)->first();
//       dd($fetch_data);
        return redirect('user_dashboard',compact('fetch_edit_data'));
    }

    public function add(Request $request)
    {
//        dd("hello");
        $data=$request->all();
//        dd($data);
        $username = $request->session()->get('username');
        $user_id = $request->session()->get('id');
        $today_date=date('Y-m-d');

        $validator=Validator::make($data,[
            'email'=>'required|email',
            'full_name'=>  'required|string',
            'DOJ'=>'required|date',
            'DOL'=>'required|date',
            'image'=>'required|mimes:png,jpg,jpeg',

        ]);
        if($validator->fails())
        {
            return redirect("/dashboard")->withErrors('error',$validator->errors());

        }
//    validation file_upload uploading file
        $name1=Input::file('image');//from blade

        if($name1!=null) {
            $name = Input::file('image')->getClientoriginalName();
            $destinationPath = 'users_uploaded_images';//new folder in public
            $path = null;
            $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
            if ($extension != null)
            {
                $fileName = $today_date . "ran" . rand(11111, 99999) . '.' . $extension; // renameing image with todays date
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                $path = "/users_uploaded_images/$fileName";
            }
        }
        else {
            $path = null;
        }
        $dateOfBirth = $data['DOJ'];
        $dateOfBirth2 = $data['DOL'];
        $year = Carbon::parse( $dateOfBirth )->floatDiffInYears( $dateOfBirth2 );
        $years=round($year, 1);
        $wholeAsInt     = intval($years);  // 1
        $decimal        = substr($years-floor($years),2);
        $num=(int)$decimal;
        $exp=$wholeAsInt."years ".$num."months";
//        dd($exp);

        $add_user=user_record::create([
            'email' =>$data['email'],
            'full_name' =>$data['full_name'],
            'date_of_joining' => $data['DOJ'],
            'date_of_leaving' => $data['DOL'],
            'working_status' => $data['work'],
            'image' => $path,
            'exp' => $exp,
            'created_by' => $user_id,
            'password' => bcrypt('1234'),
        ]);
//        dd($add_user);
if($add_user)
{
    return redirect('dashboard')->with('success','User Record Added Successfully.');

}
        return redirect('dashboard')->with('error','Sorry,Please Enter Again.');

    }

    public function edit(Request $request)
    {
//        dd("hello");
        $data=$request->all();
        $edit_id=$request->edit_id;
//dd($edit_id);
        $username = $request->session()->get('username');
        $user_id = $request->session()->get('id');
        $today_date=date('Y-m-d');

        $validator=Validator::make($data,[
            'email'=>'required|email',
            'full_name'=>  'required|string',
            'DOJ'=>'required|date',
            'DOL'=>'required|date',
            'image'=>'required|mimes:png,jpg,jpeg',

        ]);
        if($validator->fails())
        {
            return redirect("/dashboard")->withErrors($validator->errors());

        }
//    validation file_upload uploading file
        $name1=Input::file('image');//from blade

        if($name1!=null) {
            $name = Input::file('image')->getClientoriginalName();
            $destinationPath = 'users_uploaded_images';//new folder in public
            $path = null;
            $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
            if ($extension != null)
            {
                $fileName = $today_date . "ran" . rand(11111, 99999) . '.' . $extension; // renameing image with todays date
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                $path = "/users_uploaded_images/$fileName";
            }
        }
        else {
            $path = null;
        }

        $dateOfBirth = $data['DOJ'];
        $dateOfBirth2 = $data['DOL'];
        $year = Carbon::parse( $dateOfBirth )->floatDiffInYears( $dateOfBirth2 );
        $years=round($year, 1);
        $wholeAsInt     = intval($years);  // 1
        $decimal        = substr($years-floor($years),2);
        $num=(int)$decimal;
        $exp=$wholeAsInt."years ".$num."months";
//        dd($exp);

        $edit_user=user_record::where('id',$edit_id)->first();
        $edit_user->email=$data['email'];
        $edit_user->full_name=$data['full_name'];
        $edit_user->date_of_joining=$data['DOJ'];
        $edit_user->date_of_leaving=$data['DOL'];
        $edit_user->exp=$exp;
        $edit_user->image=$path;
        $edit_user->updated_by=$user_id;
        $edit_user->save();

        if($edit_user)
        {
            return redirect('dashboard')->with('success','User Record Edited Successfully.');
        }
        return redirect('dashboard')->with('error','Sorry,Please Enter Again.');
    }

    public function get_id(Request $request)
    {
        $fetch_user_data=user_record::find($request->id);
        echo json_encode(["status" => "200", "result" => $fetch_user_data]);

    }

    public function delete(Request $request)
    {
//        dd("hello");
        $data=$request->all();
        $delete_id=decrypt($request->id);

        $username = $request->session()->get('username');
        $user_id = $request->session()->get('id');

        $delete_user=user_record::find($delete_id);
        $delete_user->fill($request->input())->delete();

        return redirect('dashboard')->with('success','User Deleted Successfully');
    }

    public function logout(Request $request)
    {
        Session::flush();
        return redirect('login');
    }

}
