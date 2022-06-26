@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/forms/form-file-uploader.css') }}">
@endpush

<div class="row">
    <div class="col-sm-12 col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="card-title">{{ __('student DNI') }}</h4>
                        <p>{{ __('student DNI description') }}</p>
                        <div>
                            <form action="#" class="dropzone dropzone-area" id="dniDocument">
                                @csrf
                                <div class="fallback">
                                    <input name="file" type="file" multiple="multiple">
                                </div>
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                    </div>
                                    <h4>{{ __("Drop files here or click to upload") }}.</h4>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="card-title">{{ __('Minor Custody Regulatory Agreement') }}</h4>
                        <p>{{ __('Only if the parents are separated') }}</p>
                        <div>
                            <form action="#" class="dropzone dropzone-area" id="agreementDocument">
                                @csrf
                                <div class="fallback">
                                    <input name="file" type="file" multiple="multiple">
                                </div>
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                    </div>
                                    <h4>{{ __("Drop files here or click to upload") }}.</h4>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('vendors/js/file-uploaders/dropzone.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- Examples here-->
{{--    <script src="{{ asset('js/scripts/forms/form-file-uploader.js')}}"></script>--}}

    <script>
        // 1 hidden input
        const imageInput = $('input[name=dni_document]');
        const imageDropzone = new Dropzone("#dniDocument", {
            url: "{{ route('upload.files', 'first_middle') }}",
            addRemoveLinks: true,
            maxFilesize: 20,
            acceptedFiles: ".jpeg,.jpg,.png,.pdf",
            init: function() {
                this.on("success", function (file, response) {
                    imageInput.val(response)
                    file.serverId = response.id;
                    $(file.previewTemplate).find('.dz-custom-download').attr("href", window.appBaseUrl + "file/download/" + file.serverId);
                    $(file.previewTemplate).find('.dz-custom-delete').off().on("click", function (e) {
                        e.preventDefault();
                        imageDropzone.emit("removedfile", file);
                    });
                });
                this.on("addedfile", function() {
                    if (this.files[1]!=null){
                        this.removeFile(this.files[0]);
                    }
                });
            }
        });

        imageDropzone.on("removedfile", function(file) {
            imageInput.val('')
        });

    </script>
    <script>
        // 1 hidden input
        const agreementInput = $('input[name=agreement_document]');
        const agreementDropzone = new Dropzone("#agreementDocument", {
            url: "{{ route('upload.files', 'first_middle') }}",
            addRemoveLinks: true,
            maxFilesize: 20,
            acceptedFiles: ".jpeg,.jpg,.png,.pdf",
            init: function() {
                this.on("success", function (file, response) {
                    agreementInput.val(response)
                    file.serverId = response.id;
                    $(file.previewTemplate).find('.dz-custom-download').attr("href", window.appBaseUrl + "file/download/" + file.serverId);
                    $(file.previewTemplate).find('.dz-custom-delete').off().on("click", function (e) {
                        e.preventDefault();
                        imageDropzone.emit("removedfile", file);
                    });
                });
                this.on("addedfile", function() {
                    if (this.files[1]!=null){
                        this.removeFile(this.files[0]);
                    }
                });
            }
        });

        agreementDropzone.on("removedfile", function(file) {
            agreementInput.val('')
        });
    </script>
@endpush