@component('mail::message')

# {{ __('Your enrollment has been register successfully') }}

## {{ __('You can check the details in the next links') }}:
<p>
    <a href="{{ url('/enrollments/export-student/'.$enrollment->id)}}">{{ __('Student file') }}</a>
</p>
<p>
    <a href="{{ url('/enrollments/export-student/'.$enrollment->id)}}">{{ __('Enrollment file') }}</a>
</p>
@endcomponent
