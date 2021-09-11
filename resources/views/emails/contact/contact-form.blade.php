@component('mail::message')
# Merci pour votre message !

<strong>Nom</strong>{{ $data['name'] }}
<strong>Email</strong>{{ $data['email'] }}

<strong>Message</strong>

{{ $data['message'] }}

@endcomponent