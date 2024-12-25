<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordReset;
use App\Models\Department;
use App\Models\SubDepartment;
use App\Models\Designation;
use App\Models\Post;
use App\Models\Group;
use App\Models\MessengerGroup;
use App\Models\Allocation;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class AuthController extends Controller
{
    ///* ------------------Register------------------------- */
    //load
    public function loadRegister(){
        if (Auth::user() &&  Auth::user()->super_admin == 1) {
            return redirect('/superAdmin/dashboard');
        }elseif(Auth::user() &&  Auth::user()->is_processed == 0){
            return redirect('/processing');
        }
        elseif(Auth::user() &&  Auth::user()->is_varified == 0){
            return redirect('/varification');
        }
        elseif(Auth::user() &&  Auth::user()->is_varified == 1){
            if(Auth::user() && Auth::user()->is_admin == 1){
                return redirect('/admin/adminDashboard');
            }elseif(Auth::user() && Auth::user()->is_admin == 0){
                return redirect('/dashboard');
            }
        }
        
        /* if (!Auth::check()) {
            // Redirect or return an error response
             // Change 'login' to your route name
            return redirect('/');
        }else{
                if(Auth::user() && Auth::user()->super_admin == 1){
                    return redirect('/superAdmin/dashboard');
                }elseif(Auth::user() && Auth::user()->is_admin == 1){
                    if(Auth::user()  && Auth::user()->is_processed == 1){
                        if(Auth::user() && Auth::user()->is_varified == 1){
                            return redirect('/admin/adminDashboard');
                        }elseif(Auth::user() && Auth::user()->is_varified == 0){
                            return redirect('/varification');
                        }
                        
                    }elseif(Auth::user() && Auth::user()->is_processed == 0){
                        return redirect('/processing');
                    }
                    //return redirect('/admin/adminDashboard');
                }elseif(Auth::user() && Auth::user()->is_admin == 0){
                    if(Auth::user()  && Auth::user()->is_processed == 1){
                        if(Auth::user() && Auth::user()->is_varified == 1){
                            return redirect('/dashboard');
                        }elseif(Auth::user() && Auth::user()->is_varified == 0){
                            return redirect('/varification');
                        }
                        
                    }elseif(Auth::user() && Auth::user()->is_processed == 0){
                        return redirect('/processing');
                    }
                    //return redirect('/admin/adminDashboard');
                }
         } */
            /* if(Auth::user() && Auth::user()->super_admin == 1){
                return redirect('/superAdmin/dashboard');
            }elseif(Auth::user() && Auth::user()->is_admin == 1){
                if(Auth::user()  && Auth::user()->is_processed == 1){
                    if(Auth::user() && Auth::user()->is_varified == 1){
                        return redirect('/admin/adminDashboard');
                    }elseif(Auth::user() && Auth::user()->is_varified == 0){
                        return redirect('/varification');
                    }
                    
                }elseif(Auth::user() && Auth::user()->is_processed == 0){
                    return redirect('/processing');
                }
                //return redirect('/admin/adminDashboard');
            }elseif(Auth::user() && Auth::user()->is_admin == 0){
                if(Auth::user()  && Auth::user()->is_processed == 1){
                    if(Auth::user() && Auth::user()->is_varified == 1){
                        return redirect('/dashboard');
                    }elseif(Auth::user() && Auth::user()->is_varified == 0){
                        return redirect('/varification');
                    }
                    
                }elseif(Auth::user() && Auth::user()->is_processed == 0){
                    return redirect('/processing');
                }
                //return redirect('/admin/adminDashboard');
            } */
        
         
        
        return view('Register.register');
    }
       //insert
    public function studentRegister(Request $request){
        $validator =  Validator::make($request ->all(),[
                'name'=> 'string|required|min:1',
                'email'=>'string|required|max:100|email|unique:users',
                'password'=>'string|required|min:6|confirmed',
                'image' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);

        if($validator->passes()){
            $student = new User;
            $student->name = $request->name;
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
           
            $student->token = 0;
            $student->phone = 0;
            
            //special because it give me pera
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = 'uploads/students/';
            $file->move($destinationPath, $fileName);
            $student->image = $fileName;

            $student->save();
            return response()->json(['success'=>'Registration Successfull']);
        }

        return response()->json(['error'=>$validator->errors()]);
        
    }
    
    //login
    
    public function loadLogin(){
        /*if(Auth::user() &&  Auth::user()->is_varified == 1){
            if(Auth::user() && Auth::user()->is_admin == 1){
                return redirect('/admin/adminDashboard');
            }elseif(Auth::user() && Auth::user()->is_admin == 0){
                return redirect('/dashboard');
            }
        }*/
        /* if(Auth::user() && Auth::user()->is_admin == 1 && Auth::user()->is_varified == 1){
            return redirect('/admin/adminDashboard');
        }elseif(Auth::user() && Auth::user()->is_admin == 0 && Auth::user()->is_varified == 1){
            return redirect('/dashboard');
        }  */
        
        return view('Register.login');
    }
    public function studentLogin(Request $request){
        $validator =  Validator::make($request ->all(),[
            'email'=>'string|required|email',
            'password'=>'string|required',
        ]);
      

        if($validator->passes()){
            $userCredential = $request->only('email','password');
            /* if(Auth::attempt($userCredential)){
                
                if(Auth::user()->is_admin ==1){
                    return response()->json(['is_admin'=>1]);
                }else{
                    return response()->json(['is_admin'=>0]);
                }
                return response()->json(['errors'=>'All Okey']);
            }else{
                return response()->json(['errors'=>'Password or Email address is incorrect']);
            } */
            /* if (Auth::attempt($userCredential)) {
                $request->session()->regenerate();
                if(Auth::user()->is_admin ==1){
                    return response()->json(['is_admin'=>1]);
                }else{
                    return response()->json(['is_admin'=>0]);
                }
               // return redirect()->intended('dashboard');
            }else{
                return response()->json(['errors'=>'Password or Email address is incorrect']);
            } */
            if (Auth::attempt($userCredential)) {
                $request->session()->regenerate();
                /* if(Auth::user()->is_admin ==1){
                    return response()->json(['is_admin'=>1]);
                }elseif (Auth::user()->super_admin == 1) {
                    return response()->json(['super_admin'=>1]);
                }
                else{
                    return response()->json(['is_admin'=>0]);
                } */
               if(Auth::user()->super_admin == 1){
                    return response()->json(['super_admin'=>1]);
               }else{
                    if (Auth::user()->is_processed ==1) {
                        if (Auth::user()->is_varified ==1) {
                            # code...
                            if(Auth::user()->is_admin ==1){
                                return response()->json(['is_admin'=>1]);
                            }else{
                                return response()->json(['is_admin'=>0]);
                            }
                        }else{
                            return response()->json(['is_varified'=>0]);
                        }
                    }else{
                        return response()->json(['is_processed'=>0]);
                    }
                    
               }
               // return redirect()->intended('dashboard');
            }
            else{
                
                return response()->json(['errors'=>'Password or Email address is incorrect']);
            }
    
           // return response()->json(['errors'=>'Password or Email address is incorrect']);
        }else{
            return response()->json(['error'=>$validator->errors()]);
        }
        
       
        
    } 
    
     /* 
                if(Auth::user()-> is_varified == 1){
                    if(Auth::user()->is_admin ==1){
                        return response()->json(['is_admin'=>1]);
                    }else{
                        return response()->json(['is_admin'=>0]);
                    }
                }else{
                    return response()->json(['is_varified'=>0]);
                } */
   
    //logout
    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
    //forget password load
    public function forgetPasswordLoad(){
        /* if (Auth::check()) {
            return redirect('/forget-password');
        } else {
            return redirect('/');
        } */
        return view('Register.forget-password');
    }
    //forget password
  /*   public function forgetPassword(Request $request){
        try {
            //code...
            $user = User::where('email',$request->email)->get();
            if (count($user) > 0) {
                # code...
                $token = Str::random(40);
                $domain = URL::to('/');
                $url = $domain.'/reset-password?token='.$token;
                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = 'Reset Password';
                $data['body'] = 'Plese click on the link below to reset password';
                //trying
                Mail::send('Register.forgetPasswordMail',['data'=>$data],function($message) use($data){
                    $message->to($data['email'])->subject($data['title']);
                });
                $dataTime = Carbon::now()->format('Y-m-d H:m:s');
                PasswordReset::updateOrCreate(
                    ['email'=>$request->email],
                    [
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => $dataTime

                    ]

                    
                );
                return back()->with('success','Please Check Your Mail');
            }else{
                return back()->with('error','This Email Address is not Exits!');
            }
        } catch (\Exception $e) {
            //throw $e;
            return back()->with('error', $e ->getMessage());
        }
    }
 */
    public function forgetPassword(Request $request){
        //return response()->json(['Error'=>'This Email Address is not Exits!']);
        $validator =  Validator::make($request ->all(),[
            'email'=>'string|required|email',
        ]);
        if($validator->passes()){
            try {
                //code...
                $user = User::where('email',$request->email)->get();
                if (count($user) > 0) {
                    # code...
                    $token = Str::random(40);
                    $domain = URL::to('/');
                    $url = $domain.'/reset-password?token='.$token;
                    $data['url'] = $url;
                    $data['email'] = $request->email;
                    $data['title'] = 'Reset Password';
                    $data['body'] = 'Please click on the link below to Reset password ';
                    //trying
                    Mail::send('Register.forgetPasswordMail',['data'=>$data],function($message) use($data){
                        $message->to($data['email'])->subject($data['title']);
                    });
                    //$token = "Atik Mahbub";
                    $dataTime = Carbon::now()->format('Y-m-d H:m:s');
                    PasswordReset::updateOrCreate(
                        ['email'=>$request->email],
                        [
                            'email' => $request->email,
                            'token' => $token,
                            'created_at' => $dataTime
    
                        ]
    
                        
                    );
                    //return back()->with('success','Please Check Your Mail');
                    return response()->json(['success'=>'Please Check Your Mail']);
                }else{
                    //return back()->with('error','This Email Address is not Exits!');
                    return response()->json(['Error'=>'This Email Address is not Exits!']);
                }
               // return response()->json(['error'=>'Password or Email address is incorrect']);
            } catch (\Exception $e) {
                //throw $e;
               // return back()->with('error', $e ->getMessage());
               return response()->json(['error'=>$e->errors()]);
            }
        }else{
            return response()->json(['error'=>$validator->errors()]);
        }
        
    }
   //reset password load
    public function resetPasswordLoad(Request $request){
       $resetData =  PasswordReset::where('token',$request->token)->get();
       if(isset($request->token) && count($resetData) > 0){
            $user = User::where('email',$resetData[0]['email'])->get();
            return view('Register.reset-password',compact('user'));
       }else{
            return view('Register.404');
       }
    }
    //reset password 
    public function resetPassword(Request $request){
        $validator =  Validator::make($request ->all(),[
            'password'=>'string|required|min:6|confirmed',
        ]);

        if($validator->passes()){
            $user = User::find($request->id);
            $user-> password = Hash::make($request->password);
            $user->save();


            PasswordReset::where('email',$user->email)->delete();
            return response()->json(['success'=>'Password Reset Properly!']);

        }else{
            return response()->json(['error'=>$validator->errors()]);
        }
    }
    //thankYou
    public function thankYou(){
        return view('Register.thankYou');
    }

    //super admin
    public function superAdminDashboard(){
        return view('Register.superAdminDashboard');  
    }
    //process view
    public function processingLoad(){
        /* if(Auth::user() && Auth::user()->is_processed == 1){
            return redirect('/varification');
        }elseif(Auth::user() && Auth::user()->is_processed == 0){
            //return redirect('/admin/adminDashboard');
            return redirect('/processing');
        } */
       /*  if (Auth::check()) {
            return redirect('/processing');
        } else {
            return redirect('/');
        } */
        return view('Register.processView');  
    }
    //varificationLoad
    public function varificationLoad(){
        /* if(Auth::user() && Auth::user()->is_varified == 1){
            if(Auth::user() && Auth::user()->is_admin == 1){
                return redirect('/admin/adminDashboard');
            }elseif(Auth::user() && Auth::user()->is_admin == 0){
                return redirect('/dashboard');
            }
        }elseif(Auth::user() && Auth::user()->is_varified == 0){
            return redirect('/varification');
        } */
        /* if (Auth::check()) {
            return redirect('/varification');
        } else {
            return redirect('/');
        } */
        return view('Register.varification');
    }
    //varification
    public function varification(Request $request){
        $user = User::find($request->id);
        if($user->token == $request->token){
            $dataTime = Carbon::now()->format('Y-m-d H:m:s');
             $user->is_varified ="1";
             $user->email_verified_at= $dataTime;
             $user->update();
             if($user->is_admin == 1){
                 return response()->json(['is_admin'=>1]);
             }else{
                 return response()->json(['is_admin'=>0]);
             }
        }else{
            return response()->json(['error'=>'Email Varification Token Missed Match!']); 
        }
       
        //return response()->json(['success'=>'Varification Successfull']);
    }

    /* -----------------------------Dashboards---------------------- */
    //admin
    public function adminDashboard(){
        /* $user = User::all(); */
        $is_active = 0 ; 
        $user = User::where('is_active',$is_active)->get();
        return view('admin.dashboard',['user'=>$user]);
    }
    /* ====================================varify====================== */
    public function varifyUser(Request $request){
        $user = User::find($request->id);
        /* return response()->json(['success'=>'This User has been Varified']);
        $user = User::find('id',$request->id); */
        $user->is_processed = 1;

        /* ----------------mail----------------- */
        $token = Str::random(10);
        $data['email'] = $user->email;
        $data['title'] = 'Email Varification';
        $data['token'] = $token;
        $data['body'] = 'This is Your Varification code for ';
        //trying
        Mail::send('Register.emailVarificationMail',['data'=>$data],function($message) use($data){
            $message->to($data['email'])->subject($data['title']);
        });
        $user-> token = $token ;
        $user->save();

        return response()->json(['success'=>'This User has been Varified']);

    }
    /* ==============================deactive================================ */
    public function deleteUser(Request $request){
        $user = User::find($request->id);
        /* return response()->json(['success'=>'This User has been Varified']);
        $user = User::find('id',$request->id); */
        $user->is_active = 1;

        
        $user->save();

        return response()->json(['success'=>'This User has been Deactivated']);

    }
 
    //student
    public function dashboard(){

        $posts = Post::with('users')->inRandomOrder()->get();
        return view('student.dashboard',['posts'=>$posts]);
    }

}
