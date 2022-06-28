<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="row">
                <div class="col-sm-5">
                    <div class="d-flex align-items-end justify-content-center h-100">
                        <img src="{{ asset('images/illustration/faq-illustrations.svg')}} " class="img-fluid mt-2" alt="Image" width="85">
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="card-body text-sm-end text-center ps-sm-0">
                        <a href="javascript:void(0)" data-bs-target="#addRoleModal" data-bs-toggle="modal" class="stretched-link text-nowrap add-new-role">
                            <span class="btn btn-primary mb-1 waves-effect waves-float waves-light">{{ __('Period') }}: {{ \App\Models\AcademicPeriod::latest()->first()->name }}</span>
                        </a>
                        <p class="mb-0">{{ now()->format('Y-m-d H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card mb-4">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ __('Once you send the data, you can\'t edit anymore')}}.</li>
                <li class="list-group-item">{{ __('Students younger than 18 year old, first tutor signatures is required') }}</li>
                <li class="list-group-item">{{ __('You can draw or upload the signatures') }}</li>
            </ul>
        </div>
    </div>
</div>
