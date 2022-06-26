@push('styles')
    <!-- Signer CSS -->
    <link href="{{ asset('signature/fonts/ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('signature/css/simcify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('signature/css/style.css') }}">
    <style>
        #draw-canvas {
            border: 2px dotted #CCCCCC;
            border-radius: 5px;
            cursor: crosshair;
            cursor: pointer;
        }
        #draw-dataUrl {
            width: 100%;
        }
    </style>
@endpush

<div class="row">
    <div class="col-sm-12 col-xl-4">
        <div class="card">
            <div class="card-header d-block">
                <h4 class="card-title">{{ __('Student signature') }}</h4>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <div class="mb-1 row">
                        <div class="demo-inline-spacing">
                            <div class="modal-content">
                                <ul class="head-links nav nav-tabs nav-tabs-custom nav-justified">
                                    <li type="capture" class="active nav-item " role="tablist"><a data-toggle="tab" class="nav-link active" aria-selected="true" href="#text">{{__('Text')}}</a></li>
                                    <li type="upload" class="nav-item"><a data-toggle="tab" class="nav-link" aria-selected="false" href="#upload">{{__('Upload')}}</a></li>
                                    <li type="draw" class="nav-item"><a data-toggle="tab"  class="nav-link" aria-selected="false" href="#draw">{{__('Draw') }}</a></li>
                                </ul>
                                <div class="modal-body">
                                    <div class="tab-content">
                                        <div id="text" class="tab-pane in active">
                                            <form>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>{{__('Type your signature')}}</label>
                                                            <input type="text" class="form-control signature-input" name="" placeholder="{{__('Type your signature')}}" maxlength="18" value="{{ __('Signature student') }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>{{__('Select font')}}</label>
                                                            <select class="form-control signature-font" name="">
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
                                                            <label>Weight</label>
                                                            <select class="form-control signature-weight" name="">
                                                                <option value="normal">Regular</option>
                                                                <option value="bold">Bold</option>
                                                                <option value="lighter">Lighter</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Color</label>
                                                            <input  class="form-control signature-color jscolor { valueElement:null,borderRadius:'1px', borderColor:'#e6eaee',value:'000000',zIndex:'99999', onFineChange:'updateSignatureColor(this)'}" readonly="">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Style</label>
                                                            <select class="form-control signature-style" name="">
                                                                <option value="normal">Regular</option>
                                                                <option value="italic">Italic</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="divider"></div>
                                            <h4 class="text-center">{{__('Preview')}}</h4>
                                            <div class="text-signature-preview">
                                                <div class="text-signature" id="text-signature" style="color: #000000; font-size: 30px">{{ __('Signature student') }}</div>
                                            </div>
                                            <br>
                                            <div class="row" align="right">
                                                <div class="col-md-12">
                                                    <button type="button" id="save-signature" class="btn btn-primary save-signature">{{ __('Signature student') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="upload" class="tab-pane">
                                            <p>{{__('Upload your signature if you already have it')}}.</p>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>{{__('Upload your signature')}}</label>
                                                        <input type="file" name="signatureupload" class="croppie" crop-width="400" crop-height="150">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row" align="right">
                                                    <div class="col-md-12">
                                                        <button type="button" id="save-signature" class="btn btn-primary save-signature">{{ __('Signature student') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="draw" class="tab-pane text-center">
                                            <p>{{__('Draw your signature')}}.</p>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="draw-signature-holder"><canvas width="400" height="150" id="draw-canvasstudent"></canvas></div>
                                                    <div class="signature-tools text-center" id="controls">

                                                        <div class="signature-tool-item" id="draw-clearBtnstudent">
                                                            <i class="tool-icon tool-erase" aria-hidden="true"></i>
                                                        </div>
                                                        <input type="color" id="colorstudent">
                                                        <label>Tamaño Puntero</label>
                                                        <input type="range" id="puntero" min="1" default="1" max="5" width="10%">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row" align="right">
                                                <div class="col-md-12">
                                                    <button type="button" id="draw-submitBtnstudent" class="btn btn-primary">{{ __('Signature student') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="draw-dataUrlstudent" name="student_signature"/>
        </div>
    </div>

    <div class="col-sm-12 col-xl-4">
        <div class="card">
            <div class="card-header d-block">
                <h4 class="card-title">{{ __('Tutor 01 signature') }}</h4>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <div class="mb-1 row">
                        <div class="demo-inline-spacing">
                            <div class="modal-content">
                                <ul class="head-links-tutor1 nav nav-tabs nav-tabs-custom nav-justified">
                                    <li type="capturetutor1" class="active nav-item " role="tablist"><a data-toggle="tab" class="nav-link active" aria-selected="true" href="#texttutor1">{{__('Text')}}</a></li>
                                    <li type="uploadtutor1" class="nav-item"><a data-toggle="tab" class="nav-link" aria-selected="false" href="#uploadtutor1">{{__('Upload')}}</a></li>
                                    <li type="drawtutor1" class="nav-item"><a data-toggle="tab"  class="nav-link" aria-selected="false" href="#drawtutor1">{{__('Draw') }}</a></li>
                                </ul>
                                <div class="modal-body">
                                    <div class="tab-content">
                                        <div id="texttutor1" class="tab-pane in active">
                                            <form>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>{{__('Type your signature')}}</label>
                                                            <input type="text" class="form-control signature-inputtutor1" name="" placeholder="{{__('Type your signature')}}" maxlength="18" value="{{ __('Signature tutor 1') }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>{{__('Select font')}}</label>
                                                            <select class="form-control signature-font" name="">
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
                                                            <label>Weight</label>
                                                            <select class="form-control signature-weight" name="">
                                                                <option value="normal">Regular</option>
                                                                <option value="bold">Bold</option>
                                                                <option value="lighter">Lighter</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Color</label>
                                                            <input  class="form-control signature-colortutor1 jscolor { valueElement:null,borderRadius:'1px', borderColor:'#e6eaee',value:'000000',zIndex:'99999', onFineChange:'updateSignatureColortutor1(this)'}" readonly="">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Style</label>
                                                            <select class="form-control signature-style" name="">
                                                                <option value="normal">Regular</option>
                                                                <option value="italic">Italic</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="divider"></div>
                                            <h4 class="text-center">{{__('Preview')}}</h4>
                                            <div class="text-signature-preview">
                                                <div class="text-signaturetutor1" id="text-signaturetutor1" style="color: #000000; font-size: 30px">{{ __('Signature tutor 1') }}</div>
                                            </div>
                                            <br>
                                            <div class="row" align="right">
                                                <div class="col-md-12">
                                                    <button type="button" id="save-signaturetutor1" class="btn btn-primary save-signaturetutor1">{{ __('Signature tutor 1') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="uploadtutor1" class="tab-pane">
                                            <p>{{__('Upload your signature if you already have it')}}.</p>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>{{__('Upload your signature')}}</label>
                                                        <input type="file" name="signatureuploadtutor1" class="croppie" crop-width="400" crop-height="150">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row" align="right">
                                                <div class="col-md-12">
                                                    <button type="button" id="save-signaturetutor1" class="btn btn-primary save-signaturetutor1">{{ __('Signature tutor 1') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="drawtutor1" class="tab-pane text-center">
                                            <p>{{__('Draw your signature')}}.</p>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="draw-signature-holdertutor1"><canvas width="400" height="150" id="draw-canvastutor1"></canvas></div>
                                                    <div class="signature-tools text-center" id="controls">
                                                        <div class="signature-tool-item" id="draw-clearBtntutor1">
                                                            <i class="tool-icon tool-erase" aria-hidden="true"></i>
                                                        </div>
                                                        <input type="color" id="color">
                                                        <label>Tamaño Puntero</label>
                                                        <input type="range" id="puntero" min="1" default="1" max="5" width="10%">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row" align="right">
                                                <div class="col-md-12">
                                                    <button type="button" id="draw-submitBtntutor1" class="btn btn-primary">{{ __('Signature tutor 1') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="draw-dataUrltutor1" name="first_tutor_signature"/>
        </div>
    </div>

    <div class="col-sm-12 col-xl-4">
        <div class="card">
            <div class="card-header d-block">
                <h4 class="card-title">{{ __('Tutor 02 signature') }}</h4>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <div class="mb-1 row">
                        <div class="demo-inline-spacing">
                            <div class="modal-content">
                                <ul class="head-links-tutor2 nav nav-tabs nav-tabs-custom nav-justified">
                                    <li type="capturetutor2" class="active nav-item " role="tablist"><a data-toggle="tab" class="nav-link active" aria-selected="true" href="#texttutor2">{{__('Text')}}</a></li>
                                    <li type="uploadtutor2" class="nav-item"><a data-toggle="tab" class="nav-link" aria-selected="false" href="#uploadtutor2">{{__('Upload')}}</a></li>
                                    <li type="drawtutor2" class="nav-item"><a data-toggle="tab"  class="nav-link" aria-selected="false" href="#drawtutor2">{{__('Draw') }}</a></li>
                                </ul>
                                <div class="modal-body">
                                    <div class="tab-content">
                                        <div id="texttutor2" class="tab-pane in active">
                                            <form>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>{{__('Type your signature')}}</label>
                                                            <input type="text" class="form-control signature-inputtutor2" name="" placeholder="{__{('Type your signature')}}" maxlength="18" value="{{ __('Signature tutor 2') }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>{{__('Select font')}}</label>
                                                            <select class="form-control signature-font" name="">
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
                                                            <label>Weight</label>
                                                            <select class="form-control signature-weight" name="">
                                                                <option value="normal">Regular</option>
                                                                <option value="bold">Bold</option>
                                                                <option value="lighter">Lighter</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Color</label>
                                                            <input  class="form-control signature-colortutor2 jscolor { valueElement:null,borderRadius:'1px', borderColor:'#e6eaee',value:'000000',zIndex:'99999', onFineChange:'updateSignatureColortutor2(this)'}" readonly="">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Style</label>
                                                            <select class="form-control signature-style" name="">
                                                                <option value="normal">Regular</option>
                                                                <option value="italic">Italic</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="divider"></div>
                                            <h4 class="text-center">{{__('Preview')}}</h4>
                                            <div class="text-signature-preview">
                                                <div class="text-signaturetutor2" id="text-signaturetutor2" style="color: #000000; font-size: 30px">{{ __('Signature tutor 2') }}</div>
                                            </div>
                                            <br>
                                            <div class="row" align="right">
                                                <div class="col-md-12">
                                                    <button type="button" id="save-signaturetutor2" class="btn btn-primary save-signaturetutor2">{{ __('Signature tutor 2') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="uploadtutor2" class="tab-pane">
                                            <p>{{__('Upload your signature if you already have it')}}.</p>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>{{__('Upload your signature')}}</label>
                                                        <input type="file" name="signatureuploadtutor2" class="croppie" crop-width="400" crop-height="150">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row" align="right">
                                                <div class="col-md-12">
                                                    <button type="button" id="save-signaturetutor2" class="btn btn-primary save-signaturetutor2">{{ __('Signature tutor 2') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="drawtutor2" class="tab-pane text-center">
                                            <p>{{__('Draw your signature')}}.</p>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="draw-signature-holdertutor2"><canvas width="400" height="150" id="draw-canvastutor2"></canvas></div>
                                                    <div class="signature-tools text-center" id="controls">

                                                        <div class="signature-tool-item" id="draw-clearBtntutor2">
                                                            <i class="tool-icon tool-erase" aria-hidden="true"></i>
                                                        </div>
                                                        <input type="color" id="colortutor2">
                                                        <label>Tamaño Puntero</label>
                                                        <input type="range" id="puntero" min="1" default="1" max="5" width="10%">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row" align="right">
                                                <div class="col-md-12">
                                                    <button type="button" id="draw-submitBtntutor2" class="btn btn-primary">{{ __('Signature tutor 2') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="draw-dataUrltutor2" name="second_tutor_signature"/>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('signature/js/jscolor.js') }}"></script>
    <script src="{{ asset('signature/js/jscolortutor1.js') }}"></script>
    <script src="{{ asset('signature/js/savesignature.js') }}"></script>
    <script src="{{ asset('signature/libs/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('signature/libs/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('signature/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('signature/libs/html2canvas/html2canvas.js') }}"></script>
    <script src="{{ asset('signature/libs/jcanvas/jcanvas.min.js') }}"></script>
    <script src="{{ asset('signature/libs/jcanvas/signaturetutor1.min.js') }}"></script>
    <script src="{{ asset('signature/libs/jcanvas/signaturetutor2.min.js') }}"></script>
    <script src="{{ asset('signature/libs/jcanvas/signaturestudent.min.js') }}"></script>
    <script src="{{ asset('signature/js/simcify.min.js') }}"></script>
    <script src="{{ asset('signature/js/app.js')}}"></script>
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
