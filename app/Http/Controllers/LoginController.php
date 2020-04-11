<?php
  
namespace App\Http\Controllers;
   
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
   
class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/checkauth';
    protected $username = 'phone';
    protected $guard = 'staff';
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLogin()
    {
        return view('login');
    }
   
    public function postLogin(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'phone' => 'required',
            'password' => 'required',
        ]);
   
        if(Auth::guard($this->guard)->attempt(array('phone' => $input['phone'], 'password' => $input['password'])))
        {
            return redirect()->route('staff.ticket.list.get');
        }else{
            return redirect()->route('guest.login.get')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }

    public function getLogout()
    {
        Auth::guard($this->guard)->logout();
    }
}