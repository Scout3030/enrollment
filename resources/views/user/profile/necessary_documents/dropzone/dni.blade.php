<div class="col-sm-12 col-xl-4">
    <div class="card @error('dni_document') border-danger @enderror">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="card-title">{{ __('student DNI') }} ({{ __('Max weight 20 Mb') }})</h4>
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

@push('scripts')
    <script>
        // 1 hidden input
        let files = [];
        let deleteFiles = [];
        const imageInput = $('input[name=dni_document]');
        const imageDropzone = new Dropzone("#dniDocument", {
            url: "{{ route('upload.files', 'documents') }}",
            addRemoveLinks: true,
            maxFilesize: 20,
            acceptedFiles: ".jpeg,.jpg,.png,.pdf,.JPEG,.PNG,.JPG",
            init: function() {
                this.on("success", function (file, response) {
                    let uploadedFile = [file.name, response]
                     files.push(uploadedFile)
                     imageInput.val(JSON.stringify(files))
                    file.serverId = response;
                    $(file.previewTemplate).find('.dz-custom-download').attr("href", window.appBaseUrl + "file/download/" + file.serverId);
                    $(file.previewTemplate).find('.dz-custom-delete').off().on("click", function (e) {
                        e.preventDefault();
                        imageDropzone.emit("removedfile", file);
                    });
                });

                 @if(old('dni_document'))
                     @foreach(json_decode(old('dni_document')) as $key => $document)
                    let mockFile{{$key}} = {name: "Filename", size: 123456};
                    let callback{{$key}} = null; // Optional callback when it's done
                    let crossOrigin{{$key}} = null; // Added to the `img` tag for crossOrigin handling
                    let resizeThumbnail{{$key}} = true; // Tells Dropzone whether it should resize the image first
                    this.displayExistingFile(mockFile{{$key}}, "{{ asset('storage/documents/'.$document[1]) }}", callback{{$key}}, crossOrigin{{$key}}, resizeThumbnail{{$key}});
                    @endforeach
                @endif
            }
        });

          imageDropzone.on("removedfile", function(file) {
                
                let filesIndex;
                if(files.length){
                for (i = 0; i < files.length; i++) {
                    const index = files.indexOf(file.serverId);
                    if (index > -1) {
                        filesIndex = i
                    }
                }
                files.splice(filesIndex, 1);
                imageInput.val(JSON.stringify(files))
                }else{
                    var delfile = file.dataURL                    
                    var myarr = delfile.split('documents/');
                    let filesDni = $('#dni_document').val();
                    for (i = 0; i < filesDni.length; i++) {
                         const index = filesDni.indexOf( myarr[1]);
                        if (index > -1) {
                            filesIndex = i
                        }
                   }
                     filesDni.splice(filesIndex, 1);
                     imageInput.val(JSON.stringify(filesDni))                   
                }

            });








    </script>
@endpush
