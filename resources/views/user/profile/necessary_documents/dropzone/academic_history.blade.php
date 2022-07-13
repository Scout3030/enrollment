<div class="col-sm-12 col-xl-4">
    <div class="card @error('academic_history') border-danger @enderror">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="card-title">{{ __('Academic history') }} ({{ __('Original') }}) ({{ __('Max weight 20 Mb') }}) </h4>
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

@push('scripts')
    <script>
        // 1 hidden input
          let files1 = [];
       
        const academicHistoryInput = $('input[name=academic_history]');
        const academicHistoryDropzone = new Dropzone("#academicHistory", {
            url: "{{ route('upload.files', 'documents') }}",
            addRemoveLinks: true,
            maxFilesize: 20,
            acceptedFiles: ".jpeg,.jpg,.png,.pdf,.JPEG,.PNG,.JPG",
            init: function() {
                this.on("success", function (file, response) {
                     let uploadedFile = [file.name, response]
                     files1.push(uploadedFile)
                     academicHistoryInput.val(JSON.stringify(files1))
                    file.serverId = response.id;
                    $(file.previewTemplate).find('.dz-custom-download').attr("href", window.appBaseUrl + "file/download/" + file.serverId);
                    $(file.previewTemplate).find('.dz-custom-delete').off().on("click", function (e) {
                        e.preventDefault();
                        academicHistoryDropzone.emit("removedfile", file);
                    });
                });
                @if(old('academic_history'))
                     @foreach(json_decode(old('academic_history')) as $key => $document)
                    let mockFile{{$key}} = {name: "Filename", size: 123456};
                    let callback{{$key}} = null; // Optional callback when it's done
                    let crossOrigin{{$key}} = null; // Added to the `img` tag for crossOrigin handling
                    let resizeThumbnail{{$key}} = true; // Tells Dropzone whether it should resize the image first
                    this.displayExistingFile(mockFile{{$key}}, "{{ asset('storage/documents/'.$document[1]) }}", callback{{$key}}, crossOrigin{{$key}}, resizeThumbnail{{$key}});
                    @endforeach
                @endif
            }
        });

         academicHistoryDropzone.on("addedfile", function (file) {
                var maxFiles = 3;
                for (var i = academicHistoryDropzone.files.length - maxFiles -1; i >= 0; i--) {
                    var f = academicHistoryDropzone.files[i];
                    if (f.upload.uuid !== file.upload.uuid)
                        academicHistoryDropzone.removeFile(f);
                    }
                });

        academicHistoryDropzone.on("removedfile", function(file) {
                
                let filesIndex;
                if(files1.length){
                for (i = 0; i < files1.length; i++) {
                    const index = files1.indexOf(file.serverId);
                    if (index > -1) {
                        filesIndex = i
                    }
                }
                files1.splice(filesIndex, 1);
                academicHistoryInput.val(JSON.stringify(files1))
                }else{
                    var delfileAcademic = file.dataURL                    
                    var myarrAcademic = delfileAcademic.split('documents/');
                    let filesAcademic = $('#academic_history').val();
                    
                    for (i = 0; i < filesAcademic.length; i++) {
                         const index = filesAcademic.indexOf( myarrAcademic[1]);
                        if (index > -1) {
                            filesIndex = i
                        }
                   }
                     filesAcademic.splice(filesIndex, 1);
                     academicHistoryInput.val(JSON.stringify(filesAcademic))    
                }

            });
    </script>

@endpush
