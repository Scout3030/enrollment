<!-- Modal -->
<div
    class="modal fade"
    id="emailModal"
    tabindex="-1"
    aria-labelledby="emailModal"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emailModal">{{ __('Important!') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('users.active-user') }}">
             @csrf
                     <input type="hidden" id="email" name="email" value="{{ old('email') }}" />
            <div class="modal-body">
                <p>
                    {{ __('The student has been previously registered and deleted but we have the information stored, do you want to restore it?') }}
                </p>
            </div>
            <div class="modal-footer">
                <div class="d-grid col-lg-7 col-md-7 mb-1 mb-lg-0">
                    <button type="submit" class="btn btn-primary">{{ __('OK') }}, {{ __('Confirm') }}</button>
                </div>
                <div class="d-grid col-lg-4 col-md-4 mb-1 mb-lg-0">
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- Vertical modal end-->
