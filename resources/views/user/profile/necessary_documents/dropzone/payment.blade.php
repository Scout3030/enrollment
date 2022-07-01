<div class="col-sm-12 col-xl-4">
    <div class="card @error('payment_document') border-danger @enderror">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="card-title">{{ __('Proof of payment of school insurance') }}</h4>
                    <p>{{ __('mandatory') }}</p>
                    <div>
                        <form action="#" class="dropzone dropzone-area" id="paymentDocument">
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
        const paymentInput = $('input[name=payment_document]');
        const paymentDropzone = new Dropzone("#paymentDocument", {
            url: "{{ route('upload.files', 'documents') }}",
            addRemoveLinks: true,
            maxFilesize: 20,
            acceptedFiles: ".jpeg,.jpg,.png,.pdf",
            init: function() {
                this.on("success", function (file, response) {
                    paymentInput.val(response)
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

                @if(old('payment_document'))
                let mockFile = {name: "Filename", size: 12345};
                let callback = null; // Optional callback when it's done
                let crossOrigin = null; // Added to the `img` tag for crossOrigin handling
                let resizeThumbnail = true; // Tells Dropzone whether it should resize the image first
                this.displayExistingFile(mockFile, "{{asset('storage/documents/'.old('payment_document'))}}", callback, crossOrigin, resizeThumbnail);
                @endif
            }
        });
        paymentDropzone.on("removedfile", function(file) {
            paymentInput.val('')
        });
    </script>
@endpush
