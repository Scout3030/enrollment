<div class="toast-container">
    <div class="toast basic-toast position-fixed top-0 end-0 m-2" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #FFF">
        <div class="toast-header">
            <img src="{{asset('favicon.jpg')}}" class="me-1" alt="Toast image" height="18" width="25" />
            <strong class="me-auto">{{ $message }}</strong>
            <button type="button" class="ms-1 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">{{ $description }}</div>
    </div>
</div>
