<!-- Edit User Modal -->
<div class="modal fade" id="editStudent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">{{ __('Edit student information') }}</h1>
                </div>
                <form id="editStudentForm" class="row gy-1 pt-75" action="#" method="POST">
                    @method('put')
                    @csrf
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="name">{{ __('Name') }}</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control"
                            placeholder="{{ __('Student') }}"
                            value=""
                            data-msg="Please enter your first name"
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="dni">{{ __('DNI') }}</label>
                        <input
                            type="text"
                            id="dni"
                            name="dni"
                            class="form-control"
                            placeholder="{{ __('DNI') }}"
                            value=""
                            data-msg="Please dni"
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="level_id_edit">{{ __('Level')}}</label>
                        <select class="select2 form-select" id="level_id_edit" name="level_id">
                            @foreach(\App\Models\Level::get() as $level)
                                <option value="{{ $level->id }}">{{ __($level->custom_name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="grade_id_edit">{{ __('Grade')}}</label>
                        <select class="select2 form-control" id="grade_id_edit" name="grade_id"></select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="email">{{ __('Email') }}</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            value=""
                            placeholder=""
                        />
                    </div>
                    <div class="col-12 col-md-6"></div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="password">{{ __('Password') }}</label>
                        <input
                            type="password"
                            id="password"
                            class="form-control dt-email"
                            placeholder="***********"
                            name="password"
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
                        <input
                            type="password"
                            id="password_confirmation"
                            class="form-control dt-email"
                            placeholder="***********"
                            name="password_confirmation"
                        />
                    </div>
                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1">{{ __('Edit') }}</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                            {{ __('Discard') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Edit User Modal -->
