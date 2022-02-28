<!-- Modal -->
<div
    class="modal fade"
    id="enrollmentModal"
    tabindex="-1"
    aria-labelledby="enrollmentModal"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enrollmentModal">{{ __('Important!') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                    {{ __('enrollment_message') }}
                </p>
            </div>
            <div class="modal-footer">
                <div class="d-grid col-lg-12 col-md-12 mb-1 mb-lg-0">
                    <button id="confirmEnrollmentButton" type="button" class="btn btn-primary">{{ __('OK') }}, {{ __('Confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vertical modal end-->
