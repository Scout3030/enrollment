<div class="col-sm-12 col-xl-4">
    <div class="card @error('certificate_document') border-danger @enderror">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="card-title">{{ __('Official Academic Certificate of Studies') }} {{ __('Only if it is a new addition') }} ({{ __('Max weight 20 Mb') }})</h4>
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
          let files2 = [];
       
        const certificateInput = $('input[name=certificate_document]');
        const certificateDropzone = new Dropzone("#certificateDocument", {
            url: "{{ route('upload.files', 'documents') }}",
            addRemoveLinks: true,
            maxFilesize: 20,
            acceptedFiles: ".jpeg,.jpg,.png,.pdf,.JPEG,.PNG,.JPG",
            init: function() {
                this.on("success", function (file, response) {
                     let uploadedFile = [file.name, response]
                     files2.push(uploadedFile)
                     certificateInput.val(JSON.stringify(files2))
                    file.serverId = response.id;
                    $(file.previewTemplate).find('.dz-custom-download').attr("href", window.appBaseUrl + "file/download/" + file.serverId);
                    $(file.previewTemplate).find('.dz-custom-delete').off().on("click", function (e) {
                        e.preventDefault();
                        certificateDropzone.emit("removedfile", file);
                    });
                });
             

                 @if(old('certificate_document'))
                     @foreach(json_decode(old('certificate_document')) as $key => $document)
                    let mockFile{{$key}} = {name: "Filename", size: 123456};
                    let callback{{$key}} = null; // Optional callback when it's done
                    let crossOrigin{{$key}} = null; // Added to the `img` tag for crossOrigin handling
                    let resizeThumbnail{{$key}} = true; // Tells Dropzone whether it should resize the image first
                    this.displayExistingFile(mockFile{{$key}}, "{{ asset('storage/documents/'.$document[1]) }}", callback{{$key}}, crossOrigin{{$key}}, resizeThumbnail{{$key}});
                    @endforeach
                @endif
            }
        });

         certificateDropzone.on("addedfile", function (file) {
                var maxFiles = 3;
                for (var i = certificateDropzone.files.length - maxFiles -1; i >= 0; i--) {
                    var f = certificateDropzone.files[i];
                    if (f.upload.uuid !== file.upload.uuid)
                        certificateDropzone.removeFile(f);
                    }
                });

  certificateDropzone.on("removedfile", function(file) {
                
                let filesIndex;
                if(files2.length){
                for (i = 0; i < files2.length; i++) {
                    const index = files2.indexOf(file.serverId);
                    if (index > -1) {
                        filesIndex = i
                    }
                }
                files2.splice(filesIndex, 1);
                certificateInput.val(JSON.stringify(files2))
                }else{

                    var delfileCertificate = file.dataURL                    
                    var myarrCertificate = delfileCertificate.split('documents/');
                    let filesCertificate = $('#certificate_document').val();
                    
                    for (i = 0; i < filesCertificate.length; i++) {
                         const index = filesCertificate.indexOf( myarrCertificate[1]);
                        if (index > -1) {
                            filesIndex = i
                        }
                   }
                     filesCertificate.splice(filesIndex, 1);
                     certificateInput.val(JSON.stringify( filesCertificate))
                  
                }

            });    </script>
@endpush
