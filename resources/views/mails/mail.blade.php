@component('mail::message')
{{-- Hi : {{Auth::user()->name}} --}}

.Welcome

{{-- @component('mail::button', ['url' => ''])
Click Your Post
@endcomponent --}}

Thanks<br>
{{-- {{Auth::user()->name}} --}}
@endcomponent