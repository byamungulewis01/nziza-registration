<?php

namespace App\Http\Controllers;

use App\Mail\ProtaMail;
use App\Mail\ShortTrainingConfirmationEmail;
use Illuminate\Http\Request;
use App\Models\ShortTraining;
use App\Mail\ConfirmationEmail;
use App\Mail\RegistrationEmail;
use App\Models\ProtaRegistration;
use App\Mail\ShortTrainingRegister;
use App\Rules\UniqueFieldsTraining;
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
            'email' => ['required', 'email', new UniqueFieldsTraining($request->training_name, 'email')],
            'phone' => ['required', 'string', new UniqueFieldsTraining($request->training_name, 'phone')],
            'company' => 'nullable',
            'location' => 'nullable',
            'training_name' => 'nullable',
            'venue' => 'nullable',
            'date' => 'nullable',
            'attendence_type' => 'required',
            'college' => 'required',
        ]);
        try {
            $customer = ShortTraining::create($request->all());
            // Mail::to('alexandre@nzizaglobal.com')->send(new ShortTrainingRegister($customer));
            Mail::to('byamungu.lewis@nzizaglobal.com')->send(new ShortTrainingRegister($customer));
            Mail::to($customer->email)->send(new ShortTrainingConfirmationEmail($customer));
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
            1 => (object) ['name' => 'Structural BIM Design', 'amount' => '700,000', 'virtual_amount' => '300,000' ,'venue' => 'Morogoro', 'date' => 'August 05, 2024', 'endOfRegistration' => 'July 15, 2024'],
            2 => (object) ['name' => 'Highway BIM Design', 'amount' => '700,000', 'virtual_amount' => '300,000' ,'venue' => 'Dar es Salaam', 'date' => 'August 26, 2024', 'endOfRegistration' => 'August 5, 2024'],
            3 => (object) ['name' => 'Water Distribution Design', 'amount' => '800,000', 'virtual_amount' => '450,000' ,'venue' => 'Morogoro', 'date' => 'September 16, 2024', 'endOfRegistration' => 'August 26, 2024'],
            4 => (object) ['name' => 'Protastructure Official Launch', 'amount' => '700,000', 'virtual_amount' => '300,000' ,'venue' => 'Dar es Salaam', 'date' => 'October 21, 2024', 'endOfRegistration' => 'September 30, 2024'],
            5 => (object) ['name' => 'Bridge Design', 'amount' => '800,000', 'virtual_amount' => '500,000' ,'venue' => 'Dar es Salaam', 'date' => 'December 02, 2024', 'endOfRegistration' => 'November 11, 2024'],
            6 => (object) ['name' => 'Engineering Drafting', 'amount' => '500,000', 'virtual_amount' => '300,000' ,'venue' => 'Dar es Salaam', 'date' => 'November 11, 2024', 'endOfRegistration' => 'October 28, 2024'],
            7 => (object) ['name' => 'Industrial Product Design', 'amount' => '700,000', 'virtual_amount' => '400,000' ,'venue' => 'Dar es Salaam', 'date' => 'December 2, 2024', 'endOfRegistration' => 'November 11, 2024'],
            8 => (object) ['name' => 'BIM for Infrastructure Projects', 'amount' => '1,100,000', 'virtual_amount' => '700,000' ,'venue' => 'Morogoro', 'date' => 'January 20, 2025', 'endOfRegistration' => 'December 30, 2024'],
        ];
        return view('training_registration',compact('training'));
    }

}
