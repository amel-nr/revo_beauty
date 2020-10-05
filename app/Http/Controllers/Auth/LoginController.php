<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use App\Customer;
use Illuminate\Http\Request;
use CoreComponentRepository;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    /*protected $redirectTo = '/';*/


    /**
      * Redirect the user to the Google authentication page.
      *
      * @return \Illuminate\Http\Response
      */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request, $provider)
    {
        try {
            if($provider == 'twitter'){
                $user = Socialite::driver('twitter')->user();
            }
            else{
                $user = Socialite::driver($provider)->stateless()->user();
            }
        } catch (\Exception $e) {
            flash("Something Went wrong. Please try again.")->error();
            return redirect()->route('user.login');
        }



        // check if they're an existing user
        $existingUser = User::where('provider_id', $user->id)->orWhere('email', $user->email)->first();



        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            // dd($user);

            return view('frontend.user_registration_sosmed',compact('user'));
            // $newUser                  = new User;
            // $newUser->name            = $user->name;
            // $newUser->email           = $user->email;
            // $newUser->email_verified_at = date('Y-m-d H:m:s');
            // $newUser->provider_id     = $user->id;


            // $newUser->last_name       = $request->last_name;
            // $newUser->gender          = $request->gender;
            // $newUser->tgl_lahir       = $datetime->createFromFormat('m/d/Y H:i:s', $request->tgl_lahir. '00:00:00');
            // $newUser->user_type       = 'customer';
            // $newUser->phone           = '+62'.$request->phone;
            // $newUser->email_verified_at = date('Y-m-d H:m:s');
            // $newUser->jenis_kulit     = $request->jenis_kulit;

            // // $extension = pathinfo($user->avatar_original, PATHINFO_EXTENSION);
            // // $filename = 'uploads/users/'.str_random(5).'-'.$user->id.'.'.$extension;
            // // $fullpath = 'public/'.$filename;
            // // $file = file_get_contents($user->avatar_original);
            // // file_put_contents($fullpath, $file);
            // //
            // // $newUser->avatar_original = $filename;
            // $newUser->save();

            // $customer = new Customer;
            // $customer->user_id = $newUser->id;
            // $customer->save();
            // $point_register = \App\BusinessSetting::where('type', 'club_point_user_registration')->first();
            // if($point_register != null)
            // {   
            //     $newUser->point = $newUser->point+ (int) $point_register->value;
            //     $newUser->save();
            //     $club_point = new \App\ClubPoint;
            //     $club_point->user_id = $newUser->id;
            //     $club_point->points = (int) $point_register->value;
            //     $club_point->keterangan = 'REGISTER POINT';
            //     $club_point->save();
            // }

            // auth()->login($newUser, true);
        }
        if(session('link') != null){
            return redirect(session('link'));
        }
        else{
            return redirect()->route('home');
        }
    }



    public function handleProviderCallbackOtp(Request $request)
    {

        // check if they're an existing user
        $existingUser = User::where('provider_id', $request->uid)->first();

        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $datetime = new \DateTime();
            $newUser                  = new User;
            $newUser->name            = $request->name;
            $newUser->last_name       = $request->last_name;
            $newUser->gender          = $request->gender;
            $newUser->tgl_lahir       = $datetime->createFromFormat('m/d/Y H:i:s', $request->tgl_lahir. '00:00:00');
            $newUser->user_type       = 'customer';
            $newUser->phone           = $request->phone;
            $newUser->email_verified_at = date('Y-m-d H:m:s');
            $newUser->provider_id     = $request->uid;
            $newUser->jenis_kulit     = $request->jenis_kulit;
            if($request->email)
            {
                $newUser->email = $request->email;
            }

            // $extension = pathinfo($user->avatar_original, PATHINFO_EXTENSION);
            // $filename = 'uploads/users/'.str_random(5).'-'.$user->id.'.'.$extension;
            // $fullpath = 'public/'.$filename;
            // $file = file_get_contents($user->avatar_original);
            // file_put_contents($fullpath, $file);
            //
            // $newUser->avatar_original = $filename;
            $newUser->save();

            $customer = new Customer;
            $customer->user_id = $newUser->id;
            $customer->save();

            $point_register = \App\BusinessSetting::where('type', 'club_point_user_registration')->first();
            if($point_register != null)
            {   
                $newUser->point = $newUser->point+ (int) $point_register->value;
                $newUser->save();
                $club_point = new \App\ClubPoint;
                $club_point->user_id = $newUser->id;
                $club_point->points = (int) $point_register->value;
                $club_point->keterangan = 'REGISTER POINT';
                $club_point->save();
            }
            auth()->login($newUser, true);
        }
        if(session('link') != null){
            return redirect(session('link'));
        }
        else{
            return redirect()->route('home');
        }
    }



    /**
        * Get the needed authorization credentials from the request.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return array
        */
       protected function credentials(Request $request)
       {
           $request['user_type'] = 'customer';
           if(filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)){
               return $request->only($this->username(), 'password','user_type');
           }
           return ['phone'=>$request->get('email'),'password'=>$request->get('password')];
       }

    /**
     * Check user's role and redirect user based on their role
     * @return
     */
    public function authenticated()
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff')
        {
            CoreComponentRepository::instantiateShopRepository();
            return redirect()->route('admin.dashboard');
        }
        elseif(session('link') != null){
            return redirect(session('link'));
        }
        else{
            return redirect()->route('home');
        }
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        flash(__('Invalid email or password'))->error();
        return back();
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        if(auth()->user() != null && (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff')){
            $redirect_route = 'home';
        }
        else{
            $redirect_route = 'home';
        }

        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route($redirect_route);
    }

    public function handleCaptcha(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.google.com/recaptcha/api/siteverify",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array('secret' => env('CAPTCHA_SERVER_KEY'),'response' => $request->respone),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return response()->json($response);
    }

    public function login_admin(Request $request)
    {
        $loggedIn = \Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'user_type' => 'admin',
        ], $request->remember);

        if(!$loggedIn)
        {
            $loggedIn = \Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'user_type' => 'staff',
            ], $request->remember);
        }

        if($loggedIn)
        {
            $existingUser = User::where('email', $request->email)->first();
            auth()->login($existingUser, true);
            return redirect()->route('admin.dashboard');
        }
        flash(__('Invalid email or password'))->error();
        return  redirect()->back();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
