<div class="col-sm-12 col-xl-4">
    <div class="card @error('payment_document') border-danger @enderror">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="card-title">{{ __('Proof of payment of school insurance') }} ({{ __('Max weight 20 Mb') }})</h4>
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
         let files3 = [];
      
        const paymentInput = $('input[name=payment_document]');
        const paymentDropzone = new Dropzone("#paymentDocument", {
            url: "{{ route('upload.files', 'documents') }}",
            addRemoveLinks: true,
            maxFilesize: 20,
            acceptedFiles: ".jpeg,.jpg,.png,.pdf,.JPEG,.PNG,.JPG",
            init: function() {
                this.on("success", function (file, response) {
                   let uploadedFile = [file.name, response]
                     files3.push(uploadedFile)
                     paymentInput.val(JSON.stringify(files3))
                    file.serverId = response.id;
                    $(file.previewTemplate).find('.dz-custom-download').attr("href", window.appBaseUrl + "file/download/" + file.serverId);
                    $(file.previewTemplate).find('.dz-custom-delete').off().on("click", function (e) {
                        e.preventDefault();
                        paymentDropzone.emit("removedfile", file);
                    });
                });
                @if(old('payment_document'))
                     @foreach(json_decode(old('payment_document')) as $key => $document)
                    let mockFile{{$key}} = {name: "Filename", size: 123456};
                    let callback{{$key}} = null; // Optional callback when it's done
                    let crossOrigin{{$key}} = null; // Added to the `img` tag for crossOrigin handling
                    let resizeThumbnail{{$key}} = true; // Tells Dropzone whether it should resize the image first
                    this.displayExistingFile(mockFile{{$key}}, "{{ asset('storage/documents/'.$document[1]) }}", callback{{$key}}, crossOrigin{{$key}}, resizeThumbnail{{$key}});
                    @endforeach
                @endif
            }
        });
                 paymentDropzone.on("addedfile", function (file) {
                var maxFiles = 3;
                for (var i = paymentDropzone.files.length - maxFiles -1; i >= 0; i--) {
                    var f = paymentDropzone.files[i];
                    if (f.upload.uuid !== file.upload.uuid)
                        paymentDropzone.removeFile(f);
                    }
                });
        paymentDropzone.on("removedfile", function(file) {
                
                let filesIndex;
                if(files3.length){
                for (i = 0; i < files3.length; i++) {
                    const index = files.indexOf(file.serverId);
                    if (index > -1) {
                        filesIndex = i
                    }
                }
                files3.splice(filesIndex, 1);
                paymentInput.val(JSON.stringify(files3))
                }else{
                    var delfile = file.dataURL 
                      let filesIndex;                   
                    var myarr = delfile.split('documents/');
                    let filesPayment = $('#payment_document').val();
                    for (i = 0; i < filesPayment.length; i++) {
                         const index = filesPayment.indexOf( myarr[1]);
                        if (index > -1) {
                            filesIndex = i
                        }
                   }
                     filesPayment.splice(filesIndex, 1);
                     paymentInput.val(JSON.stringify(filesPayment))    
                 
                }

            });
    </script>
@endpush
