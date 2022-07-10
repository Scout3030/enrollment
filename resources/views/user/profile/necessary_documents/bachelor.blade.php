@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/forms/form-file-uploader.css') }}">
    <script src="{{ asset('vendors/js/file-uploaders/dropzone.min.js')}}"></script>
@endpush

<div class="row">
    @include('user.profile.necessary_documents.dropzone.dni')
    @include('user.profile.necessary_documents.dropzone.payment')
    @include('user.profile.necessary_documents.dropzone.agreement')
    @include('user.profile.necessary_documents.dropzone.certificate')
    @if(!in_array(auth()->user()->student->grade_id, [\App\Models\Grade::SECOND_HIGH_SCHOOL_SCIENCE, \App\Models\Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES]))
    @include('user.profile.necessary_documents.dropzone.academic_history')
    @endif
</div>
