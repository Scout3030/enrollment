<!-- Modal to add new user starts-->
<div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
    <div class="modal-dialog">
        <form class="add-new-user modal-content pt-0" method="POST" action="{{ route('users.store') }}">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Add user') }}</h5>
            </div>
            @csrf
            <div class="modal-body flex-grow-1">
                <div class="mb-1">
                    <label class="form-label" for="name">{{ __('Name')}}</label>
                    <input
                        type="text"
                        class="form-control dt-full-name"
                        id="name"
                        placeholder="John Doe"
                        name="name"
                    />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="email">{{ __('Email') }}</label>
                    <input
                        type="email"
                        id="email"
                        class="form-control dt-email"
                        placeholder="john.doe@example.com"
                        name="email"
                    />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="password">{{ __('Password') }}</label>
                    <input
                        type="password"
                        id="password"
                        class="form-control dt-email"
                        placeholder="***********"
                        name="password"
                    />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <input
                        type="password"
                        id="password_confirmation"
                        class="form-control dt-email"
                        placeholder="***********"
                        name="password_confirmation"
                    />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="role">{{ __('Role') }}</label>
                    <select id="role" class="select2 form-select" name="role">
                        @foreach(App\Models\Role::get() as $role)
                        <option value="{{ $role->name }}">{{ __($role->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary me-1 data-submit">{{ __('Save') }}</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
            </div>
        </form>
    </div>
</div>
<!-- Modal to add new user Ends-->
