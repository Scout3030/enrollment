@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">{{ __('Whoops! Something went wrong.') }}</h4>
        <div class="alert-body">
            <ul class="mt-1 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
