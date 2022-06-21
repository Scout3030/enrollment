@push('styles')
    <!-- Signer CSS -->
   
    <style>
   
    </style>
@endpush

<div class="row">
   
    <div class="col-sm-12 col-xl-6">
        <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="card-title">{{ __('student Dni') }}</h4>
                            <div>
                                <form action="#" class="dropzone" id="imageDropzone">
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
            <div class="card-header d-block">
                <h4 class="card-title">{{ __('Regulatory agreement on custody of minors') }}</h4>
            </div>
            
        </div>
    </div>    
</div>

@push('scripts')
  
    <script>
        // 1 hidden input
        const imageInput = $('input[name=image_file]');
        const imageDropzone = new Dropzone("#imageDropzone", {
           url: "{{ route('upload.files', 'first_middle') }}",
            addRemoveLinks: true,
            maxFilesize: 20,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
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
        function saveSignature(signature, singData){
            $.ajax({
                url: `{{ route('enrollment.signature') }}`,
                type: 'post',
                headers: {
                    'x-csrf-token': $("meta[name=csrf-token]").attr('content')
                },
                data:{sign:signature},
                error: function(data, textStatus, xhr) {
                    toastr.error(`{{ __('error, signature no register') }}`)
                },
                success: (data, textStatus, xhr) => {
                    if(xhr.status === 200) {
                        if(singData=='drawtutor1' || singData =='uploadtutor1' || singData == 'capturetutor1'){
                            $("#draw-dataUrltutor1").val(data.name).val();
                        }
                        if(singData=='drawtutor2' || singData =='uploadtutor2' || singData == 'capturetutor2'){
                            $("#draw-dataUrltutor2").val(data.name).val();
                        }
                        if(singData=='draw' || singData =='upload' || singData == 'capture'){
                            $("#draw-dataUrlstudent").val(data.name).val();
                        }
                        toastr.success(data.status)
                    }
                }
            })
        }
    </script>
@endpush
