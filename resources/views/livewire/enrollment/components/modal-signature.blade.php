<!-- Modal -->
@push('styles')
    <!-- Signer CSS -->
    <link href="{{ asset('signature/fonts/ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('signature/libs/jcanvas/global.min.css') }}">
    <link rel="stylesheet" href="{{ asset('signature/css/simcify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('signature/css/style.css') }}">
@endpush

<div
    class="modal fade"
    id="updateSignature"
    tabindex="-1"
    aria-labelledby="updateSignature"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"  id="updateSignature">{{ __('Sign your document') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <ul class="head-links">
                <li type="draw" class="active"><a data-toggle="tab" href="#draw">{{ __('Draw') }}</a></li>
                <li type="capture"><a data-toggle="tab" href="#text">{{ __('Text') }}</a></li>
                <li type="upload"><a data-toggle="tab" href="#upload">{{ __('Upload') }}</a></li>
            </ul>
            <div class="modal-body">
                <div class="tab-content">
                    <div id="draw" class="tab-pane text-center active">
                        <p>{{ __('Draw your signature') }}</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="draw-signature-holder"><canvas width="400" height="150" id="draw-signature"></canvas></div>
                                <div class="signature-tools text-center" id="controls">
                                    <div class="signature-tool-item with-picker">
                                        <div><button class="jscolor { valueElement:null,borderRadius:'1px', borderColor:'#e6eaee',value:'000000',zIndex:'99999', onFineChange:'modules.color(this)'}"></button></div>
                                    </div>
                                    <div class="signature-tool-item" id="signature-stroke" stroke="5">
                                        <div class="tool-icon tool-stroke"></div>
                                    </div>
                                    <div class="signature-tool-item" id="undo">
                                        <div class="tool-icon tool-undo"></div>
                                    </div>
                                    <div class="signature-tool-item" id="clear">
                                        <i class="tool-icon tool-erase" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="text" class="tab-pane in ">
                        <form>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Type your signature</label>
                                        <input type="text" class="form-control signature-input" name="" placeholder="Type your signature" maxlength="18" value="Your Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="font">Select font</label>
                                        <select id="font" class="form-control signature-font" name="">
                                            <option value="Lato">Lato</option>
                                            <option value="Miss Fajardose">Miss Fajardose</option>
                                            <option value="Meie Script">Meie Script</option>
                                            <option value="Petit Formal Script">Petit Formal Script</option>
                                            <option value="Niconne">Niconne</option>
                                            <option value="Rochester">Rochester</option>
                                            <option value="Tangerine">Tangerine</option>
                                            <option value="Great Vibes">Great Vibes</option>
                                            <option value="Berkshire Swash">Berkshire Swash</option>
                                            <option value="Sacramento">Sacramento</option>
                                            <option value="Dr Sugiyama">Dr Sugiyama</option>
                                            <option value="League Script">League Script</option>
                                            <option value="Courgette">Courgette</option>
                                            <option value="Pacifico">Pacifico</option>
                                            <option value="Cookie">Cookie</option>
                                            <option value="Grand Hotel">Grand Hotel</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="fontWeight">Weight</label>
                                        <select id="fontWeight" class="form-control signature-weight" name="">
                                            <option value="normal">Regular</option>
                                            <option value="bold">Bold</option>
                                            <option value="lighter">Lighter</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="color">Color</label>
                                        <input id="color" class="form-control signature-color jscolor { valueElement:null,borderRadius:'1px', borderColor:'#e6eaee',value:'000000',zIndex:'99999', onFineChange:'updateSignatureColor(this)'}" readonly="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="style">Style</label>
                                        <select id="style" class="form-control signature-style" name="">
                                            <option value="normal">Regular</option>
                                            <option value="italic">Italic</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="divider"></div>
                        <h4 class="text-center">Preview</h4>
                        <div class="text-signature-preview">
                            <div class="text-signature" id="text-signature" style="color: #000000">Your Name</div>
                        </div>
                    </div>
                    <div id="upload" class="tab-pane">
                        <p>Upload your signature if you already have it.</p>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Upload your signature</label>
                                    <input type="file" name="signatureupload" class="croppie" crop-width="400" crop-height="150">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="modal-footer">
                    <button id="confirmEnrollmentButton" type="button" class="btn btn-primary">{{ __('OK') }}, {{ __('Confirm') }}</button>
                    <button type="button" class="btn btn-primary save-signature">{{ __('Sign') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vertical modal end-->
@push('scripts')
    <script src="{{ asset('signature/js/jscolor.js') }}"></script>
    <script>
        /*
         * save text signature
         */
        function saveTextSignature(){
            html2canvas([document.getElementById("text-signature")], {
                onrendered: function(canvas) {
                    var imagedata = canvas.toDataURL('image/png');
                    saveSignature(imagedata);
                }
            })
        }

        /*
         * save text signature
         */
        function saveDrawnSignature(){
            html2canvas([document.getElementById("draw-signature")], {
                onrendered: function(canvas) {
                    var imagedata = canvas.toDataURL('image/png');
                    saveSignature(imagedata);
                }
            })
        }

        /*
         * save uploaded signature
         */
        function saveUploadSignature(){
            signature = $("input[name=signatureupload]").val();
            if (signature !== '') {
                saveSignature(signature);
            }
        }
        /*
         * save signature to server
         */
    </script>
    <script src="{{ asset('signature/libs/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('signature/libs/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('signature/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('signature/libs/html2canvas/html2canvas.js') }}"></script>
    <script src="{{ asset('signature/libs/jcanvas/jcanvas.min.js') }}"></script>
    <script src="{{ asset('signature/libs/jcanvas/signature.min.js') }}"></script>
    <script src="{{ asset('signature/js/simcify.min.js') }}"></script>
    <script src="{{ asset('signature/js/app.js')}}"></script>
    <script>
        function saveSignature(signature){
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
                        $("#sign").val(data.name).val();
                        toastr.success(data.status)
                        document.getElementById('confirmEnrollmentButton').disabled = false;
                    }
                }
            })
        }
    </script>
@endpush
