<x-jet-validation-errors class="mb-4" />

@if (session('status'))
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">{{ session('status') }}</h4>
    </div>
@endif

@if (session('message'))
    <div class="alert alert-{{ session('message')['type'] }}" role="alert">
        <h4 class="alert-heading">{{ __('Well done!') }}</h4>
        <div class="alert-body">
            <ul class="mt-1 list-disc list-inside text-sm text-red-600">
                <li>{{ session('message')['description'] }}</li>
            </ul>
        </div>
    </div>
@endif

@stack('toasts')

@push('scripts')
    <script>
        const basicToast = document.querySelector('.basic-toast');
        const toast = new bootstrap.Toast(basicToast);
    </script>
@endpush
