@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/forms/form-file-uploader.css') }}">
    <script src="{{ asset('vendors/js/file-uploaders/dropzone.min.js')}}"></script>
@endpush

<div class="row">
    @include('user.profile.necessary_documents.dropzone.dni')
    @include('user.profile.necessary_documents.dropzone.payment')
    @include('user.profile.necessary_documents.dropzone.agreement')
    <div class="col-sm-12 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="card-title">{{ __('Official Academic Certificate of Studies') }} {{ __('Only if it is a new addition') }}</h4>
                        <p>{{ __('Boletin de notas is not allowed') }}</p>
                        <div>
                            <b>
                                {{ __('This documentation has to be submitted in person. Te document has to be the original. Without this document, the enrollment is not valid.') }}
                            </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
