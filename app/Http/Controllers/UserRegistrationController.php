<?php


namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Image;

class UserRegistrationController extends Controller
{
     public function showRegistrationForm(){
            if(Auth::user()->role=='Admin'){
             return view('admin.users.registration-form');                
            }else{
                  return redirect('/home');
            }
     }
     public function userSave(Request $request){
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
       // show all users data in a table
        $users = User::all();
        return view('admin.users.user-list',['users'=>$users]);
     }
     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'min:11', 'max:13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'role' => $data['role'],
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function userList(){
        if(Auth::user()->role=='Admin'){
            $users = User::all();
            return view('admin.users.user-list',['users'=>$users]);                        
        }else{
              return redirect('/home');
        }
    }

    public function userProfile($userId){
             $user = User::find($userId);
             return view('admin.users.user-profile',['user'=>$user]);
             //return $user;    
    }

    public function changeUserInfo($id){
             $user = User::find($id);
             return view('admin.users.change-user-info',['user'=>$user]);
    }
   // update user info validate
    public function userInfoUpdate(Request $request){
                $this->validate($request,[
                    'name' => ['required'],
                    'mobile' => ['required','min:11','max:13'],
                    'email' => ['required','string','email','max:255'],
                ]);
                $user = User::find($request->user_id);
                $user->name = $request->name;
                $user->mobile = $request->mobile;
                $user->email = $request->email;
                $user->save();

                return redirect("/user-profile/$request->user_id")->with('message','Update Successful.');
    }
 // change the profile picture of user
    public function changeUserAvatar($id){
        $user = User::find($id);
        return view('admin.users.change-user-avatar',['user'=>$user]);
    }
// photo upload function
    public function updateUserPhoto(Request $request){

          $user = User::find($request->user_id);
          
          $file = $request->file('avatar');
          $imageName = $file->getClientOriginalName(); // getClientOrginalName is a built function 
          $directory = 'admin/assets/avatar/'; // file path
          $imageUrl = $directory.$imageName;
          // file upload manually by using move() function
         // $file->move($directory,$imageUrl);
         // file upload by using intervention image package
         Image::make($file)->resize(300, 300)->save($imageUrl);
          $user->avatar = $imageUrl;
          $user->save();
          return redirect("/user-profile/$request->user_id")->with('message','Image Uplaod Successfully.');

    }
    public function changeUserPassword($id){
           $user = User::find($id);
          return view('admin.users.change-user-password',['user'=>$user]);
    }
    // user password update validation and redirect
    public function userPasswordUpdate(Request $request){
             $this->validate($request,[
                        'new_password' => 'required', 'string', 'min:8'
             ]);
             $oldPassword = $request->password;
             $user = User::find($request->user_id);
             if(Hash::check($oldPassword, $user->password)){
                   $user->password = Hash::make($request->new_password);
                   $user->save();
                  return redirect("/user-profile/$request->user_id")->with('message','Password update successful.');
             }else{
                   return back()->with('error_message','Your old password is not match.Please try again.');
             }
    }
}