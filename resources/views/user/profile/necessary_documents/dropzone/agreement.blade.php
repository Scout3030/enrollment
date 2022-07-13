<div class="col-sm-12 col-xl-4">
    <div class="card @error('agreement_document') border-danger @enderror">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="card-title">{{ __('Minor Custody Regulatory Agreement') }} ({{ __('Max weight 20 Mb') }})</h4>
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
         let files4 = [];
       
        const agreementInput = $('input[name=agreement_document]');
        const agreementDropzone = new Dropzone("#agreementDocument", {
            url: "{{ route('upload.files', 'documents') }}",
            addRemoveLinks: true,
            maxFilesize: 20,
            acceptedFiles: ".jpeg,.jpg,.png,.pdf,.JPEG,.PNG,.JPG",
            init: function () {
                this.on("success", function (file, response) {
                   let uploadedFile = [file.name, response]
                     files4.push(uploadedFile)
                     agreementInput.val(JSON.stringify(files4))
                    file.serverId = response.id;
                    $(file.previewTemplate).find('.dz-custom-download').attr("href", window.appBaseUrl + "file/download/" + file.serverId);
                    $(file.previewTemplate).find('.dz-custom-delete').off().on("click", function (e) {
                        e.preventDefault();
                        agreementDropzone.emit("removedfile", file);
                    });
                });
              
                @if(old('agreement_document'))
                     @foreach(json_decode(old('agreement_document')) as $key => $document)
                    let mockFile{{$key}} = {name: "Filename", size: 123456};
                    let callback{{$key}} = null; // Optional callback when it's done
                    let crossOrigin{{$key}} = null; // Added to the `img` tag for crossOrigin handling
                    let resizeThumbnail{{$key}} = true; // Tells Dropzone whether it should resize the image first
                    this.displayExistingFile(mockFile{{$key}}, "{{ asset('storage/documents/'.$document[1]) }}", callback{{$key}}, crossOrigin{{$key}}, resizeThumbnail{{$key}});
                    @endforeach
                @endif
            }
        });

         agreementDropzone.on("addedfile", function (file) {
                var maxFiles = 3;
                for (var i = agreementDropzone.files.length - maxFiles -1; i >= 0; i--) {
                    var f = agreementDropzone.files[i];
                    if (f.upload.uuid !== file.upload.uuid)
                        agreementDropzone.removeFile(f);
                    }
                });

         agreementDropzone.on("removedfile", function(file) {
                
                let filesIndex;
                if(files4.length){
                for (i = 0; i < files4.length; i++) {
                    const index = files4.indexOf(file.serverId);
                    if (index > -1) {
                        filesIndex = i
                    }
                }
                files4.splice(filesIndex, 1);
                agreementInput.val(JSON.stringify(files4))
                }else{

                    var delfileAgreement = file.dataURL                    
                    var myarrAgreement = delfileAgreement.split('documents/');
                    let filesAgreement = $('#agreement_document').val();
                    
                    for (i = 0; i < filesAgreement.length; i++) {
                         const index = filesCertificate.indexOf( myarrAgreement[1]);
                        if (index > -1) {
                            filesIndex = i
                        }
                   }
                     filesAgreement.splice(filesIndex, 1);
                     agreementInput.val(JSON.stringify( filesAgreement))
                   
                }

            });
    </script>
@endpush
