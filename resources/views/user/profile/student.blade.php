<section id="basic-horizontal-layouts">
    <form class="form form-horizontal" name="formProfile"  enctype="multipart/form-data" method="POST" action="{{ route('student.profile.update') }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-7">
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
                                               value="{{ old('middle_name', auth()->user()->student->middle_name) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="paternal_surname">{{ __('First surname') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="paternal_surname" class="form-control" name="paternal_surname"
                                               value="{{ old('paternal_surname', auth()->user()->student->paternal_surname) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="maternal_surname">{{ __('Second surname') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="maternal_surname" class="form-control" name="maternal_surname"
                                               value="{{ old('maternal_surname', auth()->user()->student->maternal_surname) }}" />
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
                                               value="{{ auth()->user()->email }}" readonly />
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
                                               value="{{ old('dni', auth()->user()->student->dni) }}" />
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
                                               value="{{ old('birth', auth()->user()->student->birth ?  auth()->user()->student->birth->format('Y-m-d') : null )  }}" />

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
                                               value="{{ old('address', auth()->user()->student->address) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="address_number">{{ __('Number') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="address_number" class="form-control" name="address_number"
                                               value="{{ old('address_number', auth()->user()->student->address_number) }}" />
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
                                               value="{{ old('door', auth()->user()->student->door) }}" />
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
                                               value="{{ old('stair', auth()->user()->student->stair) }}" />
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
                                               value="{{ old('floor', auth()->user()->student->floor) }}" />
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
                                               value="{{ old('letter', auth()->user()->student->letter) }}" />
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
                                               value="{{ old('postal_code', auth()->user()->student->postal_code) }}" />
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
                                                <option value="{{ $country->id }}" @if( old('country_id', auth()->user()->student->country_id) == $country->id) selected @endif>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Course in which you enroll') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="demo-inline-spacing">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="transportation_yes">
                                            <b> {{ __('Grade') }}
                                             @if (auth()->user()->student->grade->id == App\Models\Grade::FIRST_MIDDLE_SCHOOL)
                                                  1° ESO
                                            @endif
                                            @if (auth()->user()->student->grade->id == App\Models\Grade::SECOND_MIDDLE_SCHOOL)
                                                  2º ESO
                                            @endif
                                            @if (auth()->user()->student->grade->id == App\Models\Grade::THIRD_MIDDLE_SCHOOL)
                                                  3º ESO (LOMLOE)
                                            @endif
                                            @if (auth()->user()->student->grade->id == App\Models\Grade::SECOND_HIGH_SCHOOL)
                                                  2º ESO PMAR
                                            @endif
                                            @if (auth()->user()->student->grade->id == App\Models\Grade::THIRD_HIGH_SCHOOL)
                                                  3º ESO PROGRAMA DE DIVERSIFICACIÓN CURRICULAR I
                                            @endif
                                            @if (auth()->user()->student->grade->id == App\Models\Grade::FOURTH_MIDDLE_SCHOOL)
                                                  4º ESO
                                            @endif
                                            </b>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">                    
                    <div class="card">
                        <div class="card-header d-block">
                            <h4 class="card-title">{{ __('Previous school') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="previous_school">{{ __('Previous school') }}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="previous_school" name="previous_school" placeholder="{{ __('Type...') }}" />
                                </div>
                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
            </div>

            <div class="col-md-5">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Parents') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-12">
                                            <div class="demo-inline-spacing">
                                                <div class="form-check form-check-inline">
                                                    <input
                                                        class="form-check-input"
                                                        type="radio"
                                                        name="parents_condition"
                                                        id="parents_condition_separated"
                                                        value="0"
                                                        {{ auth()->user()->student->id ? (auth()->user()->student->parents_condition == \App\Models\Student::SEPARATED? 'checked' : '') : '' }}
                                                    />
                                                    <label class="form-check-label" for="parents_condition_separated">{{ __('Separated') }}</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input
                                                        class="form-check-input"
                                                        type="radio"
                                                        name="parents_condition"
                                                        id="parents_condition_married"
                                                        value="1"
                                                        {{ auth()->user()->student->id ? (auth()->user()->student->parents_condition == \App\Models\Student::MARRIED? 'checked' : '') : '' }}
                                                    />
                                                    <label class="form-check-label" for="parents_condition_married">{{ __('Married') }}</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input
                                                        class="form-check-input"
                                                        type="radio"
                                                        name="parents_condition"
                                                        id="parents_condition_cohabitants"
                                                        value="2"
                                                        {{ auth()->user()->student->id ? (auth()->user()->student->parents_condition == \App\Models\Student::COHABITANTS? 'checked' : '') : '' }}
                                                    />
                                                    <label class="form-check-label" for="parents_condition_cohabitants">{{ __('Cohabitants') }}</label>
                                                </div>
                                            </div>
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
                                                   value="{{ old('first_tutor_full_name', auth()->user()->student->first_tutor_full_name) }}" />
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
                                                   value="{{ old('first_tutor_dni', auth()->user()->student->first_tutor_dni) }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="first_tutor_phone_number">{{ __('Phone number') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="first_tutor_phone_number" class="form-control" name="first_tutor_phone_number"
                                                   value="{{ old('first_tutor_phone_number', auth()->user()->student->first_tutor_phone_number) }}" />
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
                                                   value="{{ old('first_tutor_email', auth()->user()->student->first_tutor_email) }}" />
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
                                                   value="{{ old('first_tutor_address', auth()->user()->student->first_tutor_address) }}" />
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
                                                   value="{{ old('second_tutor_full_name', auth()->user()->student->second_tutor_full_name) }}" />
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
                                                   value="{{ old('second_tutor_dni', auth()->user()->student->second_tutor_dni) }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="second_tutor_phone_number">{{ __('Phone number') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="second_tutor_phone_number" class="form-control" name="second_tutor_phone_number"
                                                   value="{{ old('second_tutor_phone_number', auth()->user()->student->second_tutor_phone_number) }}" />
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
                                                   value="{{ old('second_tutor_email', auth()->user()->student->second_tutor_email) }}" />
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
                                                   value="{{ old('second_tutor_address', auth()->user()->student->second_tutor_address) }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <input type="hidden" id="image" name="dni_document" value="">
        <input type="hidden" id="image" name="agreement_document" value="">
        <input type="hidden" id="image" name="payment_document" value="">
        <input type="hidden" id="image" name="certificate_document" value="">
    </form>

    @if (auth()->user()->student->grade->id == App\Models\Grade::FIRST_MIDDLE_SCHOOL)
        @include('user.profile.necessary_documents.first-middle')
    @endif
    @if (auth()->user()->student->grade->id == App\Models\Grade::SECOND_MIDDLE_SCHOOL)
        @include('user.profile.necessary_documents.second-middle')
    @endif  
    @if (auth()->user()->student->grade->id == App\Models\Grade::THIRD_MIDDLE_SCHOOL)
        @include('user.profile.necessary_documents.third-fourth-middle')
    @endif
    @if (auth()->user()->student->grade->id == App\Models\Grade::SECOND_HIGH_SCHOOL)
        @include('user.profile.necessary_documents.high-school')
    @endif
    @if (auth()->user()->student->grade->id == App\Models\Grade::THIRD_HIGH_SCHOOL)
        @include('user.profile.necessary_documents.high-school')
    @endif
    @if (auth()->user()->student->grade->id == App\Models\Grade::FOURTH_MIDDLE_SCHOOL)
        @include('user.profile.necessary_documents.third-fourth-middle')
    @endif
     <div class="row">
            <div class="col-12">                    
                <div class="card">                    
                    <div class="card-body">                        
                        <div class="col-sm-10 offset-sm-2 mt-0" align="right">
                            <button type="submit" onclick="formProfile.submit()" class="btn btn-primary me-1">{{ __('Save and continue enrollment') }}</button>
                        </div>
                    </div>                        
                </div>                    
            </div>
        </div>    
</section>
@push('scripts')
  <script>

  </script>
    
    
@endpush
