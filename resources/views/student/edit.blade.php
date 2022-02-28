@extends('layouts.app')

@push('vendor-styles')
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
@endpush

@section('content')
    <section id="basic-horizontal-layouts">
        <form class="form form-horizontal" method="POST" action="{{ route('students.update', $student) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Edit student') }}</h4>
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
                                                   value="{{ old('name', auth()->user()->name) }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="middle_name">{{ __('Middle name') }}</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" id="middle_name" class="form-control" name="middle_name"
                                                   value="{{ old('middle_name', $student->middle_name) }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="paternal_surname">{{ __('Paternal surname') }}</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" id="paternal_surname" class="form-control" name="paternal_surname"
                                                   value="{{ old('paternal_surname', $student->paternal_surname) }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="maternal_surname">{{ __('Maternal surname') }}</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" id="maternal_surname" class="form-control" name="maternal_surname"
                                                   value="{{ old('maternal_surname', $student->maternal_surname) }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="email">{{ __('Email') }}</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" id="email" name="email" class="form-control"
                                                   value="{{ auth()->user()->email }}" />
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
                                                   value="{{ old('dni', $student->dni) }}" />
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
                                                   value="{{ old('birth', $student->birth->format('Y-m-d')) }}" />
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
                                                   value="{{ old('address', $student->address) }}" />
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
                                                   value="{{ old('address_number', $student->address_number) }}" />
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
                                                   value="{{ old('door', $student->door) }}" />
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
                                                   value="{{ old('stair', $student->stair) }}" />
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
                                                   value="{{ old('floor', $student->floor) }}" />
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
                                                   value="{{ old('letter', $student->letter) }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="postal_code">{{ __('Postal code') }}</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" id="postal_code" class="form-control" name="postal_code"
                                                   value="{{ old('postal_code', $student->postal_code) }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="country_id">{{ __('Country') }}</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <select id="country_id" class="form-control select2" name="country_id">
                                                @foreach ( App\Models\Country::all() as $country )
                                                    <option value="{{ $country->id }}" @if( old('country_id', $student->country_id) == $country->id) selected @endif>{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10 offset-sm-2 mt-4">
                                    <button type="submit" class="btn btn-primary me-1">{{ __('Save') }}</button>
                                    <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">{{ __('Return') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
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
                                                       value="{{ old('first_tutor_full_name', $student->first_tutor_full_name) }}" />
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
                                                       value="{{ old('first_tutor_dni', $student->first_tutor_dni) }}" />
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
                                                       value="{{ old('first_tutor_phone_number', $student->first_tutor_phone_number) }}" />
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
                                                       value="{{ old('first_tutor_email', $student->first_tutor_email) }}" />
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
                                                       value="{{ old('first_tutor_address', $student->first_tutor_address) }}" />
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
                                                       value="{{ old('second_tutor_full_name', $student->second_tutor_full_name) }}" />
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
                                                       value="{{ old('second_tutor_dni', $student->second_tutor_dni) }}" />
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
                                                       value="{{ old('second_tutor_phone_number', $student->second_tutor_phone_number) }}" />
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
                                                       value="{{ old('second_tutor_email', $student->second_tutor_email) }}" />
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
                                                       value="{{ old('second_tutor_address', $student->second_tutor_address) }}" />
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
@endsection

@push('vendor-scripts')
    <script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
