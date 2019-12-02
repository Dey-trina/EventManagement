

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <table border="1" align="center">
              <h2 align="center" style="color: green">  <div class="card-header">{{ __('Verify Your Email Address') }}</div></h2>

                <div class="card-body">
                    @if (session('resent'))
                   <h3> <td align="center">  <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div></td></h3>
                    @endif
<td><h4 align="center">
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.</h4> </td>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


