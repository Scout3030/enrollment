@extends('layouts.app')

@section('content')
@role('student')
<section id="basic-horizontal-layouts">
    <form class="form form-horizontal" method="POST" action="{{ route('user.profile.update', Auth::id()) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Edit profile') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="name">{{ __('Name') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" class="form-control" name="name"
                                            value="{{ Auth::user()->name }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="middle_name">{{ __('Middle Name') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="middle_name" class="form-control" name="middle_name"
                                            value="{{ Auth::user()->student->middle_name }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="paternal_surname">{{ __('Paternal Surname') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="paternal_surname" class="form-control" name="paternal_surname"
                                            value="{{ Auth::user()->student->paternal_surname }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="maternal_surname">{{ __('Maternal Surname') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="maternal_surname" class="form-control" name="maternal_surname"
                                            value="{{ Auth::user()->student->maternal_surname }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="email">{{ __('Email') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="email" class="form-control"
                                            value="{{ Auth::user()->email }}" readonly />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="dni">{{ __('Dni') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="dni" class="form-control" name="dni"
                                            value="{{ Auth::user()->student->dni }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="birth">{{ __('Birth') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="date" id="birth" class="form-control" name="birth"
                                            value="{{ \Auth::user()->student->birth->format('Y-m-d') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="address">{{ __('Address') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="address" class="form-control" name="address"
                                            value="{{ Auth::user()->student->address }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="address_number">{{ __('Address Number') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="address_number" class="form-control" name="address_number"
                                            value="{{ Auth::user()->student->address_number }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="door">{{ __('Door') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="door" class="form-control" name="door"
                                            value="{{ Auth::user()->student->door }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="stair">{{ __('Stair') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="stair" class="form-control" name="stair"
                                            value="{{ Auth::user()->student->stair }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="floor">{{ __('Floor') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="floor" class="form-control" name="floor"
                                            value="{{ Auth::user()->student->floor }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="letter">{{ __('Letter') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="letter" class="form-control" name="letter"
                                            value="{{ Auth::user()->student->letter }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="postal_code">{{ __('Postal Code') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="postal_code" class="form-control" name="postal_code"
                                            value="{{ Auth::user()->student->postal_code }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="country_id">{{ __('Country') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select id="country_id" class="form-control" name="country_id">
                                            @foreach ( App\Models\Country::all() as $country )
                                                <option value="{{ $country->id }}" @if( Auth::user()->student->country_id == $country->id) selected @endif>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-10 offset-sm-2 mt-4">
                                <button type="submit" class="btn btn-primary me-1">{{ __('Save') }}</button>
                                <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">{{ __('Return') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Tutor 01 details') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="first_tutor_full_name">{{ __('Full name') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="first_tutor_full_name" class="form-control" name="first_tutor_full_name"
                                                value="{{ Auth::user()->student->first_tutor_full_name }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="first_tutor_dni">{{ __('DNI') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="first_tutor_dni" class="form-control" name="first_tutor_dni"
                                                value="{{ Auth::user()->student->first_tutor_dni }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="first_tutor_phone_number">{{ __('Phone Number') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="first_tutor_phone_number" class="form-control" name="first_tutor_phone_number"
                                                value="{{ Auth::user()->student->first_tutor_phone_number }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="first_tutor_email">{{ __('Email') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="first_tutor_email" class="form-control" name="first_tutor_email"
                                                value="{{ Auth::user()->student->first_tutor_email }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="first_tutor_address">{{ __('Address') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="first_tutor_address" class="form-control" name="first_tutor_address"
                                                value="{{ Auth::user()->student->first_tutor_address }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Tutor 02 details') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="second_tutor_full_name">{{ __('Full name') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="second_tutor_full_name" class="form-control" name="second_tutor_full_name"
                                                value="{{ Auth::user()->student->second_tutor_full_name }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="second_tutor_dni">{{ __('DNI') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="second_tutor_dni" class="form-control" name="second_tutor_dni"
                                                value="{{ Auth::user()->student->second_tutor_dni }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="second_tutor_phone_number">{{ __('Phone Number') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="second_tutor_phone_number" class="form-control" name="second_tutor_phone_number"
                                                value="{{ Auth::user()->student->second_tutor_phone_number }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="second_tutor_email">{{ __('Email') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="second_tutor_email" class="form-control" name="second_tutor_email"
                                                value="{{ Auth::user()->student->second_tutor_email }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="second_tutor_address">{{ __('Address') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="second_tutor_address" class="form-control" name="second_tutor_address"
                                                value="{{ Auth::user()->student->second_tutor_address }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</section>
@endrole
@endsection
