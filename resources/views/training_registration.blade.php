@extends('layout')
@section('content')
    <section id="landingContact" class="section-py bg-body landing-contact">
        <div class="container">
            <div class="row gy-4 justify-content-center">
                @if (session('status'))
                    <div class="alert alert-danger">
                        <p><strong class="text-danger">Opps Something went wrong {{ $message }}</strong></p>
                    </div>
                @endif
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            @php
                                $selectTraining = @$training[request('id')];
                            @endphp
                            <h4 class="mb-4">{{ $selectTraining->name ?? 'Training' }} Registration</h4>
                            {{-- <p class="text-muted mb-4">Uzinduzi wa mafunzo na utoaji vyeti vya kimataifa kwa watumiaji wa
                                ProtaStructure 2024</p> --}}
                            <form action="{{ route('training_registration_store') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-lg-12 col-md-12">
                                        <label class="form-label fs-6" for="name">Full Name<span
                                                class="text-danger">*</span></label>
                                        <input required type="text" name="name" value="{{ old('name') }}"
                                            class="form-control" id="name" placeholder="Provide Name" />
                                        <input type="hidden" name="traning_name" value="{{ @$selectTraining->name }}">
                                        <input type="hidden" name="venue" value="{{ @$selectTraining->venue }}">
                                        <input type="hidden" name="date" value="{{ @$selectTraining->date }}">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />

                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <label class="form-label fs-6" for="email">Work Email<span
                                                class="text-danger">*</span></label>
                                        <input required type="email" class="form-control" placeholder="email@gmail.com"
                                            name="email" id="email" value="{{ old('email') }}">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />

                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <label class="form-label fs-6" for="phone">Phone Number<span
                                                class="text-danger">*</span></label>
                                        <input required type="text" class="form-control" name="phone"
                                            value="{{ old('phone') }}" id="phone" placeholder="Phone Number" />
                                        <x-input-error :messages="$errors->get('phone')" class="mt-2 text-danger" />

                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <label class="form-label fs-6" for="company">Campany Name
                                            <strong>(Optional)</strong></label>
                                        <input name="company" value="{{ old('company') }}" type="text"
                                            class="form-control" id="company"
                                            placeholder="What company do you work for?" />
                                        <x-input-error :messages="$errors->get('company')" class="mt-2 text-danger" />

                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-check form-check-danger custom-option custom-option-basic checked">
                                            <label class="form-check-label custom-option-content" for="attendence_type1">
                                                <input
                                                    {{ old('attendence_type') == 'Physical with Breakfast & Lunch' ? 'checked' : '' }}
                                                    name="attendence_type" class="form-check-input" type="radio"
                                                    value="Physical with Breakfast & Lunch" id="attendence_type1"
                                                    @if (!old('attendence_type')) checked="" @endif>
                                                <span class="custom-option-header">
                                                    <span class="h6 mb-0">PHYSICAL</span>
                                                    <span class="text-danger">{{ $selectTraining->amount ?? '700,000' }}
                                                        TZS</span>
                                                </span>
                                                <span class="custom-option-body">
                                                    <small>BreakFast and Lunch included.</small>
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-check form-check-danger custom-option custom-option-basic">
                                            <label class="form-check-label custom-option-content" for="attendence_type3">
                                                <input {{ old('attendence_type') == 'Virtual' ? 'checked' : '' }}
                                                    name="attendence_type" class="form-check-input" type="radio"
                                                    value="Virtual" id="attendence_type3">
                                                <span class="custom-option-header">
                                                    <span class="h6 mb-0">VIRTUAL</span>
                                                    <span
                                                        class="text-danger">{{ $selectTraining->virtual_amount ?? '400,000' }}
                                                        TZS</span>
                                                </span>
                                                <span class="custom-option-body">
                                                    <small>Virtual Attendance .</small>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <label class="form-label fs-6" for="location">Your location</label>
                                        <input name="location" value="{{ old('location') }}" type="text"
                                            class="form-control" id="location" placeholder="What is your location ?" />
                                        <x-input-error :messages="$errors->get('location')" class="mt-2 text-danger" />

                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <label class="form-label fs-6" for="name">What you study in college <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" required name="college"
                                            placeholder="write what you study here" value="{{ old('college') }}" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="confirm" type="checkbox"
                                                value="Yes" id="confirm" required />
                                            <label class="form-check-label" for="confirm">I confirm that i will deposit
                                                my payment before the
                                                {{ $selectTraining->date ?? 'July 30, 2024' }}.</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-danger">Register
                                            Now</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
