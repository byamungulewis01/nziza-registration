<?php

namespace App\Http\Controllers;

use App\Mail\ProtaMail;
use Illuminate\Http\Request;
use App\Mail\ConfirmationEmail;
use App\Mail\RegistrationEmail;
use App\Models\ProtaRegistration;
use App\Models\TrainingRegistration;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class RegistrationController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:training_registrations,email',
            'phone' => 'required|unique:training_registrations,phone',
            'company' => 'nullable',
            'attendence_type' => 'required',
            'professional' => 'required',
            'location' => 'nullable',
        ]);
        try {
            $customer = TrainingRegistration::create($request->all());

            // Send confirmation email to client
            Mail::to($customer->email)->send(new ConfirmationEmail($customer));

            // Send notification email to your team
            Mail::to('mugisha.salvator@nzizaglobal.com')->send(new RegistrationEmail($customer));

            return to_route('success');
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th->getMessage());
            return back()->with('error', 'some thing went wrong please try again');
        }
    }
    public function protastructure_store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:prota_registrations,email',
            'phone' => 'required|unique:prota_registrations,phone',
            'company' => 'nullable',
            'location' => 'nullable',
            'attendence_type' => 'required',
            'college' => 'required',
        ]);
        try {
            $customer = ProtaRegistration::create($request->all());
            Mail::to('alexandre@nzizaglobal.com')->send(new ProtaMail($customer));
            return Redirect::to('https://nzizaglobal.co.tz');
        } catch (\Throwable $th) {
            return back()->with('error', 'some thing went wrong please try again');
        }
    }
    public function success()
    {
        return view('success');
    }
    public function protastructure()
    {
        return view('protastructure');
    }

}
