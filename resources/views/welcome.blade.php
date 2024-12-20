@extends('layout')
@section('content')
    <!-- Contact Us: Start -->
    <section id="landingContact" class="section-py bg-body landing-contact">
        <div class="container">
            <div class="text-center mb-3 pb-1">
                <span class="badge bg-label-primary">REMAING TIME</span>
            </div>

            <div class="countdown-container text-center">

                <div class="countdown">
                    <!-- day -->
                    <div class="day-container">
                        <h2 class="day">0</h2>
                        <p class="text-danger">Days</p>
                    </div>

                    <!-- hours -->
                    <div class="hour-container">
                        <h2 class="hour">0</h2>
                        <p class="text-danger">Hours</p>
                    </div>

                    <!-- minutes -->
                    <div class="minute-container">
                        <h2 class="minute">0</h2>
                        <p class="text-danger">Minutes</p>
                    </div>

                    <!-- seconds -->
                    <div class="second-container">
                        <h2 class="second">0</h2>
                        <p class="text-danger">Seconds</p>
                    </div>
                </div>
            </div>


            <div class="row gy-4">
                @if (session('status'))
                    <div class="alert alert-danger">
                        <p><strong class="text-danger">Opps Something went wrong {{ $message }}</strong></p>
                    </div>
                @endif

                <div class="col-lg-5">
                    <div class="contact-img-box position-relative border p-2 h-100">
                        <img src="{{ asset('assets/img/nziza/newProtaDodoma.jpg') }}" alt="contact customer service"
                            class="contact-img w-100 scaleX-n1-rtl" />
                        {{-- <div class="pt-3 px-4 pb-1">
                            <div class="row gy-3 gx-md-4">
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="d-flex align-items-center">
                                        <div class="badge bg-label-primary rounded p-2 me-2"><i
                                                class="ti ti-mail ti-sm"></i></div>
                                        <div>
                                            <p class="mb-0">Email</p>
                                            <h5 class="mb-0">
                                                <a href="mailto:info@nzizaglobal.co.tz"
                                                    class="text-heading">info@nzizaglobal.co.tz</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="d-flex align-items-center">
                                        <div class="badge bg-label-success rounded p-2 me-2">
                                            <i class="ti ti-phone-call ti-sm"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0">Phone</p>
                                            <h5 class="mb-0"><a href="https://wa.me/255775236096"
                                                    class="text-heading">+255 775 236 096</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="mb-0">ProtaStructure Registration</h4>
                            <p class="text-muted mb-4">ProtaStructure 2024 Official Training launch in Tanzania</p>
                            <form id="register" action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-lg-6 col-md-12">
                                        <label class="form-label fs-6" for="name">Full Name<span
                                                class="text-danger">*</span></label>
                                        <input required type="text" name="name" value="{{ old('name') }}"
                                            class="form-control" id="name" placeholder="Provide Name" />
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <label class="form-label fs-6" for="email">Work Email<span
                                                class="text-danger">*</span></label>
                                        <input required type="email" class="form-control" placeholder="email@gmail.com"
                                            name="email" id="email" value="{{ old('email') }}">
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <label class="form-label fs-6" for="phone">Phone Number<span
                                                class="text-danger">*</span></label>
                                        <input required type="text" class="form-control" name="phone"
                                            value="{{ old('phone') }}" id="phone" placeholder="Phone Number" />
                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <label class="form-label fs-6" for="company">Campany Name</label>
                                        <input name="company" value="{{ old('company') }}" type="text"
                                            class="form-control" id="company" placeholder="Company Name" />
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
                                                    <span class="text-danger">700,000 TZS</span>
                                                </span>
                                                <span class="custom-option-body">
                                                    <small>With breakfast & lunch .</small>
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
                                                    <span class="text-danger">300,000 TZS</span>
                                                </span>
                                                <span class="custom-option-body">
                                                    <small>Online Attending .</small>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div>
                                            <label class="form-label fs-6" for="name">What is your Profession ?<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" name="professional" aria-placeholder="Study"
                                                id="who" required>
                                                <option value="" selected disabled>-- Select Professional --</option>
                                                <option {{ old('professional') == 'Civil Engineer' ? 'selected' : '' }}
                                                    value="Civil Engineer">Civil Engineer</option>

                                                <option
                                                    {{ old('professional') == 'Contruction Professional' ? 'selected' : '' }}
                                                    value="Contruction Professional">Contruction Professional
                                                </option>
                                                <option {{ old('professional') == 'none' ? 'selected' : '' }}
                                                    value="none">
                                                    None Above</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <label class="form-label fs-6" for="location">Your location</label>
                                        <input name="location" value="{{ old('location') }}" type="text"
                                            class="form-control" id="location" placeholder="What is your location ?" />
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="confirm" type="checkbox"
                                                value="Yes" id="confirm" required />
                                            <label class="form-check-label" for="confirm">I confirm that i will deposit
                                                my payment before the July 30, 2024.</label>
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
