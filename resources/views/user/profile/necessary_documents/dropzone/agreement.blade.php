<div class="col-sm-12 col-xl-4">
    <div class="card @error('agreement_document') border-danger @enderror">
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

@push('scripts')
    <script>
        // 1 hidden input
        const agreementInput = $('input[name=agreement_document]');
        const agreementDropzone = new Dropzone("#agreementDocument", {
            url: "{{ route('upload.files', 'documents') }}",
            addRemoveLinks: true,
            maxFilesize: 20,
            acceptedFiles: ".jpeg,.jpg,.png,.pdf",
            init: function () {
                this.on("success", function (file, response) {
                    agreementInput.val(response)
                    file.serverId = response.id;
                    $(file.previewTemplate).find('.dz-custom-download').attr("href", window.appBaseUrl + "file/download/" + file.serverId);
                    $(file.previewTemplate).find('.dz-custom-delete').off().on("click", function (e) {
                        e.preventDefault();
                        imageDropzone.emit("removedfile", file);
                    });
                });
                this.on("addedfile", function () {
                    if (this.files[1] != null) {
                        this.removeFile(this.files[0]);
                    }
                });

                @if(old('agreement_document'))
                let mockFile = {name: "Filename", size: 12345};
                let callback = null; // Optional callback when it's done
                let crossOrigin = null; // Added to the `img` tag for crossOrigin handling
                let resizeThumbnail = true; // Tells Dropzone whether it should resize the image first
                this.displayExistingFile(mockFile, "{{asset('storage/documents/'.old('agreement_document'))}}", callback, crossOrigin, resizeThumbnail);
                @endif
            }
        });

        agreementDropzone.on("removedfile", function(file) {
            agreementInput.val('')
        });
    </script>
@endpush
