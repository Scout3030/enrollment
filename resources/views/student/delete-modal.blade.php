<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ __('Delete student') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ __('Click confirm to delete this student. You\'ll have to contact support to restore.') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button
                    type="button"
                    class="btn btn-primary"
                    onclick="event.preventDefault(); document.getElementById('deleteStudentForm').submit();"
                >{{ __('Confirm') }}</button>
            </div>
            <form method="POST" id="deleteStudentForm" action="#">
                @method('delete')
                @csrf
            </form>
        </div>
    </div>
</div>
