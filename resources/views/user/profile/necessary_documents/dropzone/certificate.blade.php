<div class="col-sm-12 col-xl-4">
    <div class="card @error('certificate_document') border-danger @enderror">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="card-title">{{ __('Official Academic Certificate of Studies') }} {{ __('Only if it is a new addition') }}</h4>
                    <p>{{ __('Boletin de notas is not allowed') }}</p>
                    <div>
                        <form action="#" class="dropzone dropzone-area" id="certificateDocument">
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
        const certificateInput = $('input[name=certificate_document]');
        const certificateDropzone = new Dropzone("#certificateDocument", {
            url: "{{ route('upload.files', 'documents') }}",
            addRemoveLinks: true,
            maxFilesize: 20,
            acceptedFiles: ".jpeg,.jpg,.png,.pdf,.JPEG,.PNG,.JPG",
            init: function() {
                this.on("success", function (file, response) {
                    certificateInput.val(response)
                    file.serverId = response.id;
                    $(file.previewTemplate).find('.dz-custom-download').attr("href", window.appBaseUrl + "file/download/" + file.serverId);
                    $(file.previewTemplate).find('.dz-custom-delete').off().on("click", function (e) {
                        e.preventDefault();
                        certificateDropzone.emit("removedfile", file);
                    });
                });
                this.on("addedfile", function() {
                    if (this.files[1]!=null){
                        this.removeFile(this.files[0]);
                    }
                });

                @if(old('certificate_document'))
                let mockFile = {name: "Filename", size: 12345};
                let callback = null; // Optional callback when it's done
                let crossOrigin = null; // Added to the `img` tag for crossOrigin handling
                let resizeThumbnail = true; // Tells Dropzone whether it should resize the image first
                this.displayExistingFile(mockFile, "{{asset('storage/documents/'.old('certificate_document'))}}", callback, crossOrigin, resizeThumbnail);
                @endif
            }
        });
        certificateDropzone.on("removedfile", function(file) {
            certificateInput.val('')
        });
    </script>
@endpush
