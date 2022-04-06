@component('mail::message')
    <h1>Nuovo Messaggio</h1>

    <p>Email: {{ $contact['email'] }}</p>

    <p>Messaggio: {{ $contact['message'] }}</p>



    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
