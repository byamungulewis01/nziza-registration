@extends('layout')
@section('content')
    @php
        use Carbon\Carbon;

    @endphp
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

                            <h4 class="mb-0">Registration form : Training on <span
                                    class="text-danger">{{ $selectTraining->software }}</span> </h4>
                            <p class="text-muted mb-4">#{{ strtoupper($selectTraining->name) }}</p>
                            @if (session('unqualified'))
                                <div class="alert alert-warning">
                                    <h5><strong class="text-warning">Your profession doesn't match with this training
                                            requirements.</strong></h5>
                                    <p>For further assistance, please reach out to us on </p>
                                    <a href="https://wa.me/255775236096" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="me-2" viewBox="0 0 24 24">
                                            <path
                                                d="M12 0C5.371 0 0 5.371 0 12c0 2.137.561 4.156 1.618 5.938L0 24l6.375-1.613A11.958 11.958 0 0012 24c6.629 0 12-5.371 12-12S18.629 0 12 0zm7.558 17.568c-.351.985-2.035 1.859-2.802 1.984-.739.12-1.693.173-2.702-.149-.619-.192-1.402-.455-2.439-.892-4.308-1.809-7.105-6.344-7.324-6.653-.215-.303-1.748-2.327-1.748-4.442 0-2.114 1.091-3.155 1.479-3.574.373-.404.81-.508 1.075-.508.203 0 .393.009.563.016.184.008.435-.07.687.527.27.63.911 2.164.991 2.323.08.161.135.357.04.559-.094.203-.14.334-.278.512-.145.185-.304.409-.433.55-.135.146-.278.308-.118.612.155.303.688 1.126 1.472 1.826.966.878 1.777 1.136 2.087 1.256.319.119.51.104.702-.063.193-.17.81-.947 1.028-1.276.213-.324.446-.271.752-.155.309.118 1.948.921 2.285 1.088.336.167.559.245.643.38.088.135.088.782-.262 1.767z" />
                                        </svg>
                                        WhatsApp
                                    </a>
                                </div>
                            @else
                                <form action="{{ route('training_registration_store') }}" method="POST">
                                    @csrf
                                    <div class="row g-3">

                                        <div class="col-lg-12 col-md-12">
                                            <label class="form-label fs-6" for="name">Full Name<span
                                                    class="text-danger">*</span></label>
                                            <input required type="text" name="name" value="{{ old('name') }}"
                                                class="form-control" id="name" placeholder="Provide full name" />
                                            <input type="hidden" name="training_name" value="{{ @$selectTraining->name }}">
                                            <input type="hidden" name="slug" value="{{ @$selectTraining->slug }}">
                                            <input type="hidden" name="training_id" value="{{ @$selectTraining->id }}">
                                            <input type="hidden" name="venue" value="{{ @$selectTraining->location }}">
                                            <input type="hidden" name="date" value="{{ @$selectTraining->start_date }}">
                                            <input type="hidden" name="endOfRegistration"
                                                value="{{ @Carbon::parse($selectTraining->start_date)->subWeeks(1)->toDateString() }}">
                                            <input type="hidden" name="software" value="{{ @$selectTraining->software }}">
                                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />

                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <label class="form-label fs-6" for="email">Work Email<span
                                                    class="text-danger">*</span></label>
                                            <input required type="email" class="form-control"
                                                placeholder="email@gmail.com" name="email" id="email"
                                                value="{{ old('email') }}">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />

                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <label class="form-label fs-6" for="phone">Phone Number<span
                                                    class="text-danger">*</span></label>
                                            <input required type="text" class="form-control" name="phone"
                                                value="{{ old('phone') }}" id="phone" placeholder="Phone number" />
                                            <x-input-error :messages="$errors->get('phone')" class="mt-2 text-danger" />

                                        </div>

                                        <div class="ol-lg-12 col-md-12">
                                            <small class="fw-medium d-block">SELECT HOW YOU ARE ATTENDING</small>
                                            <div class="form-check form-check-inline mt-3">
                                                <input class="form-check-input" type="radio" name="option" checked
                                                    id="individualOpt" value="individual">
                                                <label class="form-check-label" for="individualOpt">Individual</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="option"
                                                    id="companyOpt" value="company">
                                                <label class="form-check-label" for="companyOpt">Company</label>
                                            </div>

                                        </div>

                                        <div id="companyDiv" class="row mt-2" style="display: none;">

                                            <div class="col-lg-6 col-md-12">
                                                <label class="form-label fs-6" for="company">Campany Name <span
                                                        class="text-danger">*</span></label>
                                                <input name="company" value="{{ old('company') }}" type="text"
                                                    class="form-control" id="company"
                                                    placeholder="What company do you work for?" />
                                                <x-input-error :messages="$errors->get('company')" class="mt-2 text-danger" />

                                            </div>

                                            <div class="col-lg-6 col-md-12">
                                                <label class="form-label fs-6" for="trainees">Number of Trainees <span
                                                        class="text-danger">*</span></label>
                                                <input name="trainees" value="{{ old('trainees') }}" id="trainees"
                                                    type="number" min="1" class="form-control" id="trainees"
                                                    placeholder="Trainee number" />
                                                <x-input-error :messages="$errors->get('trainees')" class="mt-2 text-danger" />

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div
                                                class="form-check form-check-danger custom-option custom-option-basic checked">
                                                <label class="form-check-label custom-option-content"
                                                    for="attendence_type1">
                                                    <input
                                                        {{ old('attendence_type') == 'Physical with Breakfast & Lunch' ? 'checked' : '' }}
                                                        name="attendence_type" class="form-check-input" type="radio"
                                                        value="Physical with Breakfast & Lunch" id="attendence_type1"
                                                        @if (!old('attendence_type')) checked="" @endif>
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">PHYSICAL</span>
                                                        <span
                                                            class="text-danger">{{ number_format($selectTraining->price) ?? '700,000' }}
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
                                                <label class="form-check-label custom-option-content"
                                                    for="attendence_type3">
                                                    <input {{ old('attendence_type') == 'Virtual' ? 'checked' : '' }}
                                                        name="attendence_type" class="form-check-input" type="radio"
                                                        value="Virtual" id="attendence_type3">
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0">VIRTUAL</span>
                                                        <span
                                                            class="text-danger">{{ number_format($selectTraining->virtual_price) ?? '400,000' }}
                                                            TZS</span>
                                                    </span>
                                                    <span class="custom-option-body">
                                                        <small>Virtual Attendance .</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="alert alert-warning alert-dismissible mb-2 mt-2 p-4"
                                                role="alert" id="trainingAlert" style="position: relative;">
                                                <!-- Blinking Icon -->
                                                <span id="attentionIcon"
                                                    style="position: absolute; top: 10px; right: 10px; font-size: 70px; color: red; animation: blink 1s infinite;">&#9888;</span>

                                                <!-- Alert Heading and Message -->
                                                <h5 class="alert-heading mb-1 text-break" id="alertHeading"
                                                    style="font-weight: bold;">Mafunzo haya yanahitaji elimu ya ngazi ya
                                                    chuo
                                                    kikuu.</h5>
                                                <p class="mb-0" id="alertMessage">Je, una diploma au shahada ya chuo cha
                                                    ufundi inayohusiana na mafunzo haya?</p>

                                                <!-- Radio Options -->
                                                <div>
                                                    <div
                                                        class="form-check form-check-info form-check-inline text-dark mt-2">
                                                        <input class="form-check-input" type="radio" name="collegeOpt"
                                                            id="inlineRadio1" value="yes">
                                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline text-dark">
                                                        <input class="form-check-input" type="radio" name="collegeOpt"
                                                            id="inlineRadio2" value="no">
                                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="col-lg-6 col-md-12">
                                        <label class="form-label fs-6" for="location">Your location</label>
                                        <input name="location" value="{{ old('location') }}" type="text"
                                            class="form-control" id="location" placeholder="What is your location ?" />
                                        <x-input-error :messages="$errors->get('location')" class="mt-2 text-danger" />

                                    </div> --}}
                                        <div style="display: none;" id="collegeDiv" class="col-lg-12 col-md-12">
                                            <label class="form-label fs-6" for="college">What have you studied in college
                                                ?
                                                <span class="text-danger">*</span></label>
                                            <input class="form-control" id="college" required name="college"
                                                placeholder="Write what you studied in college"
                                                value="{{ old('college') }}" />
                                            <x-input-error :messages="$errors->get('college')" class="mt-2 text-danger" />

                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="confirm" type="checkbox"
                                                    value="Yes" id="confirm" required />
                                                <label class="form-check-label" for="confirm">I confirm that i will
                                                    deposit
                                                    my payment before the
                                                    {{ @Carbon::parse($selectTraining->start_date)->subWeeks(1)->format('F d, Y') ?? 'July 30, 2024' }}.</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-danger">Register
                                                Now</button>

                                        </div>
                                    </div>
                                </form>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('css')
<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
<style>
    @keyframes blink {
        50% {
            opacity: 0;
        }
    }

    #trainingAlert {
        animation: pulse 5s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            background-color: #fff3cd;
        }

        50% {
            background-color: #ffecb5;
        }
    }
</style>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    const texts = {
        swahili: {
            heading: "Mafunzo haya yanahitaji elimu ya ngazi ya chuo kikuu.",
            message: "Je, una diploma au shahada ya chuo cha ufundi inayohusiana na mafunzo haya?"
        },
        english: {
            heading: "This training requires you to have a college level education.",
            message: "Do you have a college diploma or degree?"
        }
    };

    let currentLanguage = "swahili";

    function toggleLanguage() {
        currentLanguage = currentLanguage === "swahili" ? "english" : "swahili";

        $("#alertHeading, #alertMessage").fadeOut(500, function() {
            $("#alertHeading").text(texts[currentLanguage].heading);
            $("#alertMessage").text(texts[currentLanguage].message);
            $("#alertHeading, #alertMessage").fadeIn(500);
        });
    }

    setInterval(toggleLanguage, 5000);
</script>

<script>
    $(function() {
        var professions = @json($selectTraining->allowed_professions);

        $("#college").autocomplete({
            source: professions
        });
    });
</script>

<script>
    $('input[name="option"]').change(function() {

        if ($(this).val() === 'company') {
            $('#companyDiv').show();
            $('#trainees').attr('required', 'required'); // Make #trainees required
            $('#company').attr('required', 'required'); // Make #trainees required
        } else {
            $('#companyDiv').hide();
            $('#trainees').removeAttr('required').val(''); // Remove required attribute from #trainees
            $('#company').removeAttr('required').val(''); // Remove required attribute from #trainees
        }
    });
</script>
<script>
    $('input[name="collegeOpt"]').change(function() {
        console.log($(this).val());
        if ($(this).val() === 'yes') {
            $('#collegeDiv').show();
            $('#college').attr('required', 'required');
        } else {
            $('#collegeDiv').hide();
            $('#college').removeAttr('required').val('');
        }
    });
</script>
{{-- <script>
        $(document).ready(function() {
            $("form").submit(function(event) {
                $(this).find("button[type=submit]").html(
                    '<span class="spinner-border me-1" role="status" aria-hidden="true"></span> Loading...'
                ).prop("disabled", true);
            });
        });
    </script> --}}
<script>
    $(document).ready(function() {
        $("form").submit(function(event) {
            event.preventDefault(); // Prevent form from submitting immediately

            // Check which radio option is selected
            const selectedOption = $("input[name='collegeOpt']:checked").val();

            // If "Yes" is selected, submit the form normally
            if (selectedOption === "yes") {
                $(this).find("button[type=submit]").html(
                    '<span class="spinner-border me-1" role="status" aria-hidden="true"></span> Loading...'
                ).prop("disabled", true);

                this.submit(); // Submit form
            } else if (selectedOption === "no") {
                // If "No" is selected, show SweetAlert confirmation
                Swal.fire({
                    title: "Are you sure?",
                    text: "Are you sure you don't have college diploma or degree?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, I'm sure",
                    cancelButtonText: "No, go back"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "https://www.google.com";
                    } else {
                        // If not confirmed, do nothing (stay on form)
                    }
                });
            }
        });
    });
</script>
@endsection
