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
                                        <input
                                            type="text"
                                            id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            name="name"
                                            value="{{ old('name', auth()->user()->name) }}"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="paternal_surname">{{ __('First surname') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input
                                            type="text"
                                            id="paternal_surname"
                                            class="form-control @error('paternal_surname') is-invalid @enderror"
                                            name="paternal_surname"
                                            value="{{ old('paternal_surname', auth()->user()->student->paternal_surname) }}"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="maternal_surname">{{ __('Second surname') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input
                                            type="text"
                                            id="maternal_surname"
                                            class="form-control @error('maternal_surname') is-invalid @enderror"
                                            name="maternal_surname"
                                            value="{{ old('maternal_surname', auth()->user()->student->maternal_surname) }}"
                                        />
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
                                        <label class="col-form-label" for="dni">{{ __('DNI') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="dni" class="form-control" name="dni"
                                               value="{{ old('dni', auth()->user()->student->dni) }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="birth">{{ __('Birth') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input
                                            type="date"
                                            id="birth"
                                            class="form-control @error('birth') is-invalid @enderror"
                                            name="birth"
                                            value="{{ old('birth', auth()->user()->student->birth ?  auth()->user()->student->birth->format('Y-m-d') : null )  }}"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="address">{{ __('Address') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input
                                            type="text"
                                            id="address"
                                            class="form-control @error('address') is-invalid @enderror"
                                            name="address"
                                            value="{{ old('address', auth()->user()->student->address) }}"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="address_number">{{ __('Number') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input
                                            type="text"
                                            id="address_number"
                                            class="form-control @error('address_number') is-invalid @enderror"
                                            name="address_number"
                                            value="{{ old('address_number', auth()->user()->student->address_number) }}"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="door">{{ __('Door') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input
                                            type="text"
                                            id="door"
                                            class="form-control @error('door') is-invalid @enderror"
                                            name="door"
                                            value="{{ old('door', auth()->user()->student->door) }}"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="stair">{{ __('Stair') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input
                                            type="text"
                                            id="stair"
                                            class="form-control @error('stair') is-invalid @enderror"
                                            name="stair"
                                            value="{{ old('stair', auth()->user()->student->stair) }}"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="floor">{{ __('Floor') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input
                                            type="text"
                                            id="floor"
                                            class="form-control @error('floor') is-invalid @enderror"
                                            name="floor"
                                            value="{{ old('floor', auth()->user()->student->floor) }}"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="letter">{{ __('Letter') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input
                                            type="text"
                                            id="letter"
                                            class="form-control @error('letter') is-invalid @enderror"
                                            name="letter"
                                            value="{{ old('letter', auth()->user()->student->letter) }}"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="postal_code">{{ __('Postal code') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input
                                            type="text"
                                            id="postal_code"
                                            class="form-control @error('postal_code') is-invalid @enderror"
                                            name="postal_code"
                                            value="{{ old('postal_code', auth()->user()->student->postal_code) }}"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="country_id">{{ __('Country of birth') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select
                                            id="country_id"
                                            class="form-control select2 @error('postal_code') is-invalid @enderror"
                                            name="country_id"
                                        >
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
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="grade">{{ __('Grade') }}</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input
                                                type="text"
                                                id="grade"
                                                class="form-control"
                                                value="{{ auth()->user()->student->grade->name }} {{ __(auth()->user()->student->grade->level->custom_name) }}"
                                                readonly
                                            />
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
                                        <input
                                            type="text"
                                            class="form-control @error('previous_school') is-invalid @enderror"
                                            id="previous_school"
                                            value="{{  old('previous_school',auth()->user()->student->previous_school) }}"
                                            name="previous_school"
                                            placeholder="{{ __('Type...') }}"
                                        />
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
                                                        value="{{ \App\Models\Student::SEPARATED }}"
                                                        {{ old('parents_condition') == \App\Models\Student::SEPARATED ? 'checked' : '' }}
                                                    />
                                                    <label class="form-check-label" for="parents_condition_separated">{{ __('Separated') }}</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input
                                                        class="form-check-input"
                                                        type="radio"
                                                        name="parents_condition"
                                                        id="parents_condition_married"
                                                        value="{{ \App\Models\Student::MARRIED }}"
                                                        {{ old('parents_condition') == \App\Models\Student::MARRIED ? 'checked' : '' }}
                                                    />
                                                    <label class="form-check-label" for="parents_condition_married">{{ __('Married') }}</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input
                                                        class="form-check-input"
                                                        type="radio"
                                                        name="parents_condition"
                                                        id="parents_condition_cohabitants"
                                                        value="{{ \App\Models\Student::COHABITANTS }}"
                                                        {{ old('parents_condition') == \App\Models\Student::COHABITANTS ? 'checked' : '' }}
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
                                            <input
                                                type="text"
                                                id="first_tutor_full_name"
                                                class="form-control @error('first_tutor_full_name') is-invalid @enderror"
                                                name="first_tutor_full_name"
                                                value="{{ old('first_tutor_full_name', auth()->user()->student->first_tutor_full_name) }}"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="first_tutor_dni">{{ __('DNI') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input
                                                type="text"
                                                id="first_tutor_dni"
                                                class="form-control @error('first_tutor_dni') is-invalid @enderror"
                                                name="first_tutor_dni"
                                                value="{{ old('first_tutor_dni', auth()->user()->student->first_tutor_dni) }}"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="first_tutor_phone_number">{{ __('Phone number') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input
                                                type="text"
                                                id="first_tutor_phone_number"
                                                class="form-control @error('first_tutor_phone_number') is-invalid @enderror"
                                                name="first_tutor_phone_number"
                                                value="{{ old('first_tutor_phone_number', auth()->user()->student->first_tutor_phone_number) }}"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="first_tutor_email">{{ __('Email') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input
                                                type="text"
                                                id="first_tutor_email"
                                                class="form-control @error('first_tutor_email') is-invalid @enderror"
                                                name="first_tutor_email"
                                                value="{{ old('first_tutor_email', auth()->user()->student->first_tutor_email) }}"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="first_tutor_address">{{ __('Address') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input
                                                type="text"
                                                id="first_tutor_address"
                                                class="form-control @error('first_tutor_address') is-invalid @enderror"
                                                name="first_tutor_address"
                                                value="{{ old('first_tutor_address', auth()->user()->student->first_tutor_address) }}"
                                            />
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
                                            <input
                                                type="text"
                                                id="second_tutor_full_name"
                                                class="form-control @error('second_tutor_full_name') is-invalid @enderror"
                                                name="second_tutor_full_name"
                                                value="{{ old('second_tutor_full_name', auth()->user()->student->second_tutor_full_name) }}"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="second_tutor_dni">{{ __('DNI') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input
                                                type="text"
                                                id="second_tutor_dni"
                                                class="form-control @error('second_tutor_dni') is-invalid @enderror"
                                                name="second_tutor_dni"
                                                value="{{ old('second_tutor_dni', auth()->user()->student->second_tutor_dni) }}"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="second_tutor_phone_number">{{ __('Phone number') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input
                                                type="text"
                                                id="second_tutor_phone_number"
                                                class="form-control @error('second_tutor_phone_number') is-invalid @enderror"
                                                name="second_tutor_phone_number"
                                                value="{{ old('second_tutor_phone_number', auth()->user()->student->second_tutor_phone_number) }}"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="second_tutor_email">{{ __('Email') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input
                                                type="text"
                                                id="second_tutor_email"
                                                class="form-control @error('second_tutor_email') is-invalid @enderror"
                                                name="second_tutor_email"
                                                value="{{ old('second_tutor_email', auth()->user()->student->second_tutor_email) }}"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="second_tutor_address">{{ __('Address') }}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input
                                                type="text"
                                                id="second_tutor_address"
                                                class="form-control @error('second_tutor_address') is-invalid @enderror"
                                                name="second_tutor_address"
                                                value="{{ old('second_tutor_address', auth()->user()->student->second_tutor_address) }}"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('MECHANISM OF COMMUNICATION AND USE OF IMAGES FOR EDUCATIONAL PURPOSES') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-12 col-md-7">
                                    <p>{{ __('I authorize the sending of notifications to the parents/mothers/guardians through the TOKAPP APPLICATION') }}</p>
                                    <div class="demo-inline-spacing">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="authorization_tokapp"
                                                id="authorization_tokapp_yes"
                                                value="1"
                                                @if(old('authorization_tokapp') == '1') checked="checked" @endif
                                            />
                                            <label class="form-check-label" for="authorization_tokapp_yes">{{ __('Yes') }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="authorization_tokapp"
                                                id="authorization_tokapp_no"
                                                value="0"
                                                @if(old('authorization_tokapp') == '0') checked="checked" @endif
                                                @if(!old('authorization_tokapp')) checked="checked" @endif
                                            />
                                            <label class="form-check-label" for="authorization_tokapp_no">{{ __('No') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5 ">
                                    <label class="col-form-label" for="authorization_phone">{{ __('Phone number') }} ({{ __('Mandatory if accept to receive mobile notifications') }}).</label>
                                    <input
                                        type="text"
                                        class="form-control @error('authorization_phone') is-invalid @enderror"
                                        id="authorization_phone"
                                        value="{{ old('authorization_phone') }}"
                                        name="authorization_phone"
                                        placeholder="{{ __('Type...') }}"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <p>{{ __('I authorize the sending to parents/mothers/guardians of notification by SMS/EMAIL') }}</p>
                                <div class="demo-inline-spacing">
                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="authorization_electronics"
                                            id="authorization_electronics_yes"
                                            @if(old('authorization_electronics') == '1') checked="checked" @endif
                                            value="1"
                                        />
                                        <label class="form-check-label" for="authorization_electronics_yes">{{ __('Yes') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="authorization_electronics"
                                            id="authorization_electronics_no"
                                            value="0"
                                            @if(old('authorization_electronics') == '0') checked="checked" @endif
                                            @if(!old('authorization_electronics')) checked="checked" @endif
                                        />
                                        <label class="form-check-label" for="authorization_electronics_no">{{ __('No') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <p>{{ __('I authorize the use of data and images on the WEB PAGE or other educational publications of the center') }}</p>
                                <div class="demo-inline-spacing">
                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="authorization_data"
                                            id="authorization_data_yes"
                                            value="1"
                                            @if(old('authorization_data') == '1') checked="checked" @endif
                                        />
                                        <label class="form-check-label" for="authorization_data_yes">{{ __('Yes') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="authorization_data"
                                            id="authorization_data_no"
                                            value="0"
                                            @if(old('authorization_data') == '0') checked="checked" @endif
                                            @if(!old('authorization_data')) checked="checked" @endif
                                        />
                                        <label class="form-check-label" for="authorization_data_no">{{ __('No') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('AUTHORIZATION FOR EXTRACURRICULAR AND COMPLEMENTARY ACTIVITIES') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <p>{{ __('I authorize my child to participate in extracurricular and complementary activities outside the center, during school hours, scheduled by the IES Leopoldo Alas Clarin, without economic cost (the center will inform about it through the means mentioned in the previous section)') }}</p>
                                <div class="demo-inline-spacing">
                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="authorization_extracurricular"
                                            id="authorization_extracurricular_yes"
                                            value="1"
                                            @if(old('authorization_extracurricular') == '1') checked="checked" @endif
                                        />
                                        <label class="form-check-label" for="authorization_extracurricular_yes">{{ __('Yes') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="authorization_extracurricular"
                                            id="authorization_extracurricular_no"
                                            value="0"
                                            @if(old('authorization_extracurricular') == '0') checked="checked" @endif
                                            @if(!old('authorization_extracurricular')) checked="checked" @endif
                                        />
                                        <label class="form-check-label" for="authorization_extracurricular_no">{{ __('No') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="dni_document" name="dni_document" value="{{ old('dni_document') }}">
        <input type="hidden" id="agreement_document" name="agreement_document" value="{{ old('agreement_document') }}">
        <input type="hidden" id="payment_document" name="payment_document" value="{{ old('payment_document') }}">
        <input type="hidden" id="certificate_document" name="certificate_document" value="{{ old('certificate_document') }}">
        <input type="hidden" id="academic_history" name="academic_history" value="{{ old('academic_history') }}">
    </form>

    {{--ESO--}}
    @if (auth()->user()->student->grade->id == App\Models\Grade::FIRST_MIDDLE_SCHOOL)
        @include('user.profile.necessary_documents.first-middle')
    @endif

    @if (auth()->user()->student->grade->id == App\Models\Grade::SECOND_MIDDLE_SCHOOL)
        @include('user.profile.necessary_documents.second-middle')
    @endif

    @if (auth()->user()->student->grade->id == App\Models\Grade::THIRD_MIDDLE_SCHOOL || auth()->user()->student->grade->id == App\Models\Grade::FOURTH_MIDDLE_SCHOOL)
        @include('user.profile.necessary_documents.third-fourth-middle')
    @endif
    {{--PMAR--}}
    @if (auth()->user()->student->grade->id == App\Models\Grade::FIRST_HIGH_SCHOOL)
        @include('user.profile.necessary_documents.third-fourth-middle')
    @endif

    @if (auth()->user()->student->grade->id == App\Models\Grade::SECOND_HIGH_SCHOOL)
        @include('user.profile.necessary_documents.high-school')
    @endif

    @if (auth()->user()->student->grade->id == App\Models\Grade::THIRD_HIGH_SCHOOL)
        @include('user.profile.necessary_documents.high-school')
    @endif

    {{--BACHELOR--}}
    @if (auth()->user()->student->grade->level->id == App\Models\Level::BACHELOR)
        @include('user.profile.necessary_documents.bachelor')
    @endif
    {{--EDUCATIONAL CYCLE--}}
    @if (auth()->user()->student->grade->level->id == App\Models\Level::EDUCATIONAL_CYCLE)
        @include('user.profile.necessary_documents.educational-cycle')
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-grid col-lg-12 col-md-12 mb-1 mb-lg-0">
                        <button type="submit"
                                class="btn btn-outline-primary" onclick="formProfile.submit()"
                        >{{ __('Save and continue enrollment') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
