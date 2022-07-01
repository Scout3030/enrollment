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
        #draw-canvasstudent, #draw-canvastutor1, #draw-canvastutor2 {
            width: 100%;
        }
    </style>
@endpush

<div class="row">
    <div class="col-sm-12 col-xl-4">
        <div class="card">
            <div class="card-header d-block">
                <h4 class="card-title">{{ __('Student signature') }} ({{  __('mandatory') }})</h4>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <div class="mb-1 row">
                        <div class="demo-inline-spacing">
                            <div class="modal-content">
                                <ul class="head-links nav nav-tabs nav-tabs-custom nav-justified d-none">
                                     <li type="draw" class="nav-item active"><a data-toggle="tab"  class="nav-link" aria-selected="false" href="#draw"></a></li>
                                </ul>
                                <div class="modal-body">
                                    <div class="tab-content">

                                        <div id="draw" class="tab-pane active text-center">
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
                                                    <button type="button" id="draw-submitBtnstudent" class="btn btn-primary">{{ __('Save signature') }}</button>
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
                <h4 class="card-title">{{ __('Tutor 01 signature') }} ({{  __('mandatory for younger than 18 years old') }})</h4>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <div class="mb-1 row">
                        <div class="demo-inline-spacing">
                            <div class="modal-content">
                                <ul class="head-links-tutor1 nav nav-tabs nav-tabs-custom nav-justified d-none">
                                    <li type="drawtutor1" class="nav-item active"><a data-toggle="tab"  class="nav-link" aria-selected="false" href="#drawtutor1"></a></li>
                                </ul>
                                <div class="modal-body">
                                    <div class="tab-content">
                                        <div id="drawtutor1" class="tab-pane active text-center">
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
                                                    <button type="button" id="draw-submitBtntutor1" class="btn btn-primary">{{ __('Save signature') }}</button>
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
                <h4 class="card-title">{{ __('Tutor 02 signature') }} ({{  __('optional') }})</h4>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <div class="mb-1 row">
                        <div class="demo-inline-spacing">
                            <div class="modal-content">
                                <ul class="head-links-tutor2 nav nav-tabs nav-tabs-custom nav-justified d-none">
                                    <li type="drawtutor2" class="nav-item active"><a data-toggle="tab"  class="nav-link" aria-selected="false" href="#drawtutor2"></a></li>
                                </ul>
                                <div class="modal-body">
                                    <div class="tab-content">
                                        <div id="drawtutor2" class="tab-pane active text-center">
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
                                                    <button type="button" id="draw-submitBtntutor2" class="btn btn-primary">{{ __('Save signature') }}</button>
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
                        if(singData=='drawtutor1'){
                            $("#draw-dataUrltutor1").val(data.name).val();
                        }
                        if(singData=='drawtutor2'){
                            $("#draw-dataUrltutor2").val(data.name).val();
                        }
                        if(singData=='draw'){
                            $("#draw-dataUrlstudent").val(data.name).val();
                        }
                        toastr.success(data.status)
                    }
                }
            })
        }
    </script>
@endpush
