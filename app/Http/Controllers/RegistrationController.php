<?php

namespace App\Http\Controllers;

use App\Mail\ProtaMail;
use Illuminate\Http\Request;
use App\Models\ShortTraining;
use App\Mail\ConfirmationEmail;
use App\Mail\RegistrationEmail;
use App\Models\TanzaniaTraining;
use App\Models\ProtaRegistration;
use App\Mail\ShortTrainingRegister;
use App\Rules\UniqueFieldsTraining;
use App\Models\TrainingRegistration;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\TrainingResource;
use Illuminate\Support\Facades\Redirect;
use App\Mail\ShortTrainingConfirmationEmail;

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
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', new UniqueFieldsTraining($request->training_name, 'email')],
            'phone' => ['required', 'string', new UniqueFieldsTraining($request->training_name, 'phone')],
            'company' => 'nullable',
            'location' => 'nullable',
            'training_name' => 'nullable',
            'trainees' => 'nullable',
            'venue' => 'nullable',
            'date' => 'nullable',
            'attendence_type' => 'required',
            'college' => 'required',
        ]);
        try {
            $customer = ShortTraining::create($request->all());
            Mail::to('alexandre@nzizaglobal.com')->send(new ShortTrainingRegister($customer));
            // Mail::to('byamungu.lewis@nzizaglobal.com')->send(new ShortTrainingRegister($customer));
            Mail::to($customer->email)->send(new ShortTrainingConfirmationEmail($customer));
            if ($request->training_name == 'Technical Drafting') {
                # code...
                return to_route('success');
            } else {
                return Redirect::to('https://nzizaglobal.co.tz');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'some thing went wrong please try again');
        }
    }
    public function success()
    {
        return view('autocad-2025-success');
    }
    public function training_registration()
    {
        $id = request('id') ?? 0;
        @$selectTraining = TanzaniaTraining::findOrFail($id);
        return view('training_registration', compact('selectTraining'));
    }
    public function training_list($id)
    {
        $collection = new TrainingResource(TanzaniaTraining::findOrFail($id));
        return response()->json($collection);
    }
}
