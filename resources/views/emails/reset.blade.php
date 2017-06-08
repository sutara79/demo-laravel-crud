<h3>
    <a href="{{ config('app.url') }}">{{ config('app.name') }}</a>
</h3>
<p>
    {{ __('Click link below and reset password.') }}<br>
    {{ __('If you did not request a password reset, no further action is required.') }}
</p>
<p>
    {{ $actionText }}: <a href="{{ $actionUrl }}">{{ $actionUrl }}</a>
</p>