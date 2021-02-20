<?php

namespace App\Http\Controllers;
use App\Models\Membership;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{

    protected $admin_email = 'usa.srao@gmail.com';
    protected $mailer;
    protected $toEmail = "";

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmail($code, $userEmail)
    {
        $this->toEmail = $userEmail;
        $this->mailer->send('emails.lead', ['code'=>$code, 'title' => 'New password'], function (Message $m){
            $m->from($this->admin_email)->to($this->toEmail)->subject('SelectiveTrades');
        });
    }

    public function __invoke()
    {
        return $this->index();
    }
    public function index()
    {
        return view("index");
    }
    public function forgetPassword()
    {
        return view("forget-password");
    }

    public function forgetPwd(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect('forget-password')
                ->withErrors('This email is required.');
        }

        $email = User::where("email", $request->email)->first()->email;

        if(!$email) {
            return redirect('forget-password')->withErrors("This email didn't match.");
        }

        return view('reset-password', compact('email'));

    }

    public function resetPwd(Request $request) {

        $email = $request->email;

        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            return view('reset-password', compact('email'))
                ->withErrors($validator);
        }

        $user = User::where("email", $email)->first();

        $user->password = $request->password;
        $user->save();

        $this->sendEmail($request->password, $email);

        return redirect('/')->with("success", "Reset your password");

    }

    public function login()
    {
        return view("login");
    }

    public function signupForTraining(Request $request)
    {
        // return $request->all();
        $needFields = [
            'email' => "required|unique:users",
            'first_name' => "required|min:3",
            'phone' => 'required|min:9',
            "agree" => "required",
            "phone_code"=> "required",
            'phone'=> 'required',
            'location'=> 'required',
            'city'=> 'required',
            'state'=> 'required',
            'country'=> 'required',
        ];
        $validated = $request->validate($needFields);

        $validated['last_name'] = $request->last_name;
        $validated['password'] = "";
        $validated['role_id'] = 1;
        if(User::create($validated))
        {
            return view("register_temp_success");
        }

        else
        {
            return 'Failed to register';
        }
    }

    public function registerTemp()
    {
        return view("register_temp");
    }

    public function signupStep2(Request $request)
    {

        $needFields = [
            'email' => "required|unique:users",
            'first_name' => "required|min:3",
            'phone' => 'required|min:9',
            "password" => "required|confirmed",
            "agree" => "required",
            "phone_code"=> "required",
            'price'=> 'required'
        ];
        if(strlen(trim($request->last_name)) > 0)
        {
            $needFields['last_name'] = "required|min:3";
        }
        

        return $request->all();
        $validated = $request->validate($needFields);

        
        $method = $request->method();
        // if (!$request->isMethod('post')) {
        //     return 'method is not post but why';
        // }
        // else
        // {
        //     return 'method is ' . $method;
        // }
        
        // return $request->price;
        // return 'hi';

        $validated["telegram_id"] = $request->telegram_id;
        $validated["twitter_id"] = $request->twitter_id;
        $validated['status'] = 2;

        /*
        if($request->type)
        {
            $fullname = explode(' ', $validated['name']);
            $validated['first_name'] = $fullname[0];
            $validated['last_name'] = isset($fullname[1]) && !empty(trim($fullname[1])) ? $fullname[1] : '';
        }
        if($request->type)
        {
            $validated['status'] = 2;
            $validated['password'] = "unknown";
            $message = "Thanks for your subscription.";
            $message_failed = "Failed to subscribe.";
        }
        */
        return view("register2", compact('validated'));
        
    }
    public function signupStep3(Request $request)
    {
        $method = $request->method();

        if (!$request->isMethod('post')) {
            return redirect()->route("main");
        }
        // return $request->all();

        // $needFields = [];
        // $needFields['email'] = "required|unique:users";
        // $needFields['first_name'] = "required|min:3";
        
        // $needFields['phone'] = 'required|min:9';
        // $needFields["password"] = "required|confirmed";
        // $needFields["agree"] = "required";
        
        // $needFields = [
        //     'email' => "required|unique:users",
        //     'first_name' => "required|min:3",
        //     'phone' => 'required|min:9',
        //     "password" => "required|confirmed",
        //     "agree" => "required"
        // ];


        // if(strlen(trim($request->last_name)) > 0)
        //     $needFields['last_name'] = "required|min:3";
        
        
        // $validated = $request->validate($needFields);
        // return 'goo';
        
        $needFields = [
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone_code . '-' .$request->phone,
            "password" => $request->password,
            "agree" => $request->agreed,
            "telegram_id"=> $request->telegram_id,
            "twitter_id"=> $request->twitter_id
        ];


        $role = Role::whereRole("user")->first();

        $needFields['role_id'] = $role->id;

        if(User::whereEmail($request->email)->first())
        {
            return redirect()->route("main")->with("failure", $request->email . " email is already register");
        }

//        $res = $this->handlePayment($request->price);

//        if($res['state'] == false) {
//            $message = '
//            <p class="text-center lead my-0">
//                Failed to Membership
//            </p>
//            ';
//            $status = false;
//            return view("register_success", compact('message', 'status'));
//        }

        if(User::create($needFields))
        {
            $membership = Membership::where('amount', $request->price)->first();

            $nowDate = date("M-d-Y");
            $nextDate = strtotime('+'. $membership->month . ' Months');
            $message = '<p class="text-center lead my-0">Joined at ';
            $message .= $nowDate;
            $message .= '</p><p class="text-center lead">You will pay at';
            $message .= date("M-d-Y", $nextDate);
            $message .= '</p>
        ';
            $status = true;
            
            return view("register_success", compact('message', 'status'));
        }
        else
        {
            $message = '
            <p class="text-center lead my-0">
                Failed to Signup
            </p>
            ';
            $status = false;
            return view("register_success", compact('message', 'status'));
        }
        
    }
    
    public function register()
    {
        return view("register");
    }
    public function subscribe()
    {
        return view("subscribe");
    }
    public function subscribeAction(Request $request)
    {
        $needFields = [];
        $needFields['name'] = "required";
        $needFields['email'] = "required|unique:users";
        // $role = Role::whereRole("user")->first();
        // $validated['role_id'] = $role->id;
        $validated = $request->validate($needFields);

        return view("pricing")->with('user', $validated);
    }
    public function contactUs()
    {
        return view("contact");
    }
    public function contactUsAction()
    {
        return redirect()->back();
    }

    public function termsCondations()
    {
        return view("terms-condations");
    }

    public function test_mail()
    {
        
    }


    public function subscriptionForm()
    {
        return view("pricing");
    }
    public function subscription()
    {
        
    }
}