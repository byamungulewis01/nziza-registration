<?php

namespace App\Http\Controllers;

use App\Mail\ProtaMail;
use Illuminate\Http\Request;
use App\Mail\ConfirmationEmail;
use App\Mail\RegistrationEmail;
use App\Models\ProtaRegistration;
use App\Mail\ShortTrainingRegister;
use App\Models\ShortTraining;
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
    public function training_registration_store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:short_trainings,email',
            'phone' => 'required|unique:short_trainings,phone',
            'company' => 'nullable',
            'location' => 'nullable',
            'traning_name' => 'nullable',
            'venue' => 'nullable',
            'date' => 'nullable',
            'attendence_type' => 'required',
            'college' => 'required',
        ]);
        try {
            $customer = ShortTraining::create($request->all());
            // Mail::to('alexandre@nzizaglobal.com')->send(new ShortTrainingRegister($customer));
            Mail::to('byamungu.lewis@nzizaglobal.com')->send(new ShortTrainingRegister($customer));
            return Redirect::to('https://nzizaglobal.co.tz');
        } catch (\Throwable $th) {
            return back()->with('error', 'some thing went wrong please try again');
        }
    }
    public function success()
    {
        return view('success');
    }
    public function training_registration()
    {
        $training = [
            1 => (object) ['name' => 'Road and Highway BIM Design', 'amount' => '700,000' ,'venue' => 'Dar es Salaam', 'date' => 'August 19, 2024'],
            2 => (object) ['name' => 'Structural Design and Analysis', 'amount' => '700,000' ,'venue' => 'UDS', 'date' => 'July 10, 2024'],
            3 => (object) ['name' => 'Architectural BIM Design', 'amount' => '800,000' ,'venue' => 'Dar es Salaam', 'date' => 'June 29, 2024'],
            4 => (object) ['name' => 'Structural BIM Design', 'amount' => '700,000' ,'venue' => 'Morogoro', 'date' => 'August 05, 2024'],
            5 => (object) ['name' => 'Water Distribution Design', 'amount' => '800,000' ,'venue' => 'Morogoro', 'date' => 'September 16, 2024'],
            6 => (object) ['name' => 'Engineering Drafting', 'amount' => '500,000' ,'venue' => 'Dar es Salaam', 'date' => 'October 08, 2024'],
            7 => (object) ['name' => 'Protastructure Official Launch', 'amount' => '700,000' ,'venue' => 'Dar es Salaam', 'date' => 'October 21, 2024'],
            8 => (object) ['name' => 'Industrial Product Design', 'amount' => '800,000' ,'venue' => 'Dar es Salaam', 'date' => 'November 11, 2024'],
            9 => (object) ['name' => 'Bridge Design', 'amount' => '700,000' ,'venue' => 'Dar es Salaam', 'date' => 'December 02, 2024'],
            10 => (object) ['name' => 'BIM for Infrastructure Projects', 'amount' => '1,100,000' ,'venue' => 'Morogoro', 'date' => 'January 20, 2025'],
        ];
        return view('training_registration',compact('training'));
    }

}
