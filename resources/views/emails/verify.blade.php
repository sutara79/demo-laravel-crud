{{-- ユーザー登録確認用のメール --}}
<h3>
    <a href="{{ config('app.url') }}">{{ config('app.name') }}</a>
</h3>
<p>
    {{ __('Please click the link below to verify your email address.') }}<br>
    {{ __('If you did not create an account, no further action is required.') }}
</p>
<p>
    <a href="{{ $actionUrl }}">{{ $actionText }}</a>
</p>