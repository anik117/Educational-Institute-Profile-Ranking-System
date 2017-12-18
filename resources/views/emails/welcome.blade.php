
<p style="font-size: 24px">Welcome <b>{{ $user->name }}</b> to School Ranking System BD</p>
<p>Change your default password by going this link</p>
<a class="btn btn-primary" href="{{ url('password/reset/{token}') }}">Reset Password</a>