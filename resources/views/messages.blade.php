@if($contacts)
    <div class="alert alert-danger">
        <ul>
            @foreach($contacts as $contact)
                <li>{{ $contact->email }}</li>
                <li>{{ $contact->name }}</li>
                <li>{{ $contact->comment }}</li>
                <li><a href="/contacts/messages/{{ $contact->id }}">{{ $contact->name }}</a></li>
            @endforeach
        </ul>
    </div>
@endif
