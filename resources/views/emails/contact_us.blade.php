@component('mail::message')
# Contact Us Message

You have received a new message from the contact us form.

**Name:** {{ $name }}

**Email:** {{ $email }}

**Message:**

{{ $message }}

Thanks,<br>
Taka Safi E-waste Management  Team
@endcomponent
