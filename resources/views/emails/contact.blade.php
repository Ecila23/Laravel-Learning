@component('mail::message')
# Introduction

So you want to know more about {{ $topic }}?
@component('mail::button', ['url' => 'https://laracasts.com'])
Visit Laracasts
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
