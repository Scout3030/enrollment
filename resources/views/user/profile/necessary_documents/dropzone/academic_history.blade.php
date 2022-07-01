<div class="col-sm-12 col-xl-4">
    <div class="card @error('academic_history') border-danger @enderror">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="card-title">{{ __('Academic history') }} ({{ __('Original') }})</h4>
                    <div>
                        <form action="#" class="dropzone dropzone-area" id="academicHistory">
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

@push('script')
    <script>
        // 1 hidden input
        const academicHistoryInput = $('input[name=academic_history]');
        const academicHistoryDropzone = new Dropzone("#academicHistory", {
            url: "{{ route('upload.files', 'documents') }}",
            addRemoveLinks: true,
            maxFilesize: 20,
            acceptedFiles: ".jpeg,.jpg,.png,.pdf,.JPEG,.PNG,.JPG",
            init: function() {
                this.on("success", function (file, response) {
                    academicHistoryInput.val(response)
                    file.serverId = response.id;
                    $(file.previewTemplate).find('.dz-custom-download').attr("href", window.appBaseUrl + "file/download/" + file.serverId);
                    $(file.previewTemplate).find('.dz-custom-delete').off().on("click", function (e) {
                        e.preventDefault();
                        paymentDropzone.emit("removedfile", file);
                    });
                });
                this.on("addedfile", function() {
                    if (this.files[1]!=null){
                        this.removeFile(this.files[0]);
                    }
                });

                @if(old('academic_history'))
                let mockFile = {name: "Filename", size: 12345};
                let callback = null; // Optional callback when it's done
                let crossOrigin = null; // Added to the `img` tag for crossOrigin handling
                let resizeThumbnail = true; // Tells Dropzone whether it should resize the image first
                this.displayExistingFile(mockFile, "{{asset('storage/documents/'.old('academic_history'))}}", callback, crossOrigin, resizeThumbnail);
                @endif
            }
        });
        paymentDropzone.on("removedfile", function(file) {
            academicHistoryInput.val('')
        });
    </script>

@endpush
