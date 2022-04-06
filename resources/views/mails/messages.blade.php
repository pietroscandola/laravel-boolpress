@component('mail::message')
    <h1>Nuovo Messaggio</h1>

    Email: {{ $contact['email'] }}

    Messaggio: {{ $contact['message'] }}

    Thanks,
    {{ config('app.name') }}
@endcomponent
