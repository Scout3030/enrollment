@component('mail::message')

# {{ __('Your enrollment has been register successfully') }}

## {{ __('You can check the details in the next links') }}:
<p>
    <a href="{{ url('/files/'.$enrollment->hash_id.'/student')}}">{{ __('Student file') }}</a>
</p>
<p>
    <a href="{{ url('/files/'.$enrollment->hash_id)}}">{{ __('Enrollment file') }}</a>
</p>
@endcomponent
