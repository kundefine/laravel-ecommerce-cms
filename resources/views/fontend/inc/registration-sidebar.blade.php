<div class="registration-sidebar position-fixed @if(count($errors)) show-registration-sidebar @endif">
    <div class="registration-sidebar-wrapper position-relative">
        <span class="fa fa-times" id="close-registration-sidebar"></span>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="regitration-login-form">
                <div class="form-group">
                    <p class="text-center text-info block">Please Login if you already have an account</p>
                </div>
                <div class="form-group">
                    <label for="">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary btn-block">{{ __('Login') }}</button>
                </div>
            </div>
        </form>
        <hr class="seperator">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="regitration-form">
                <div class="form-group">
                    <p class="text-center text-info block">Please Register if you don't have an account</p>
                </div>
                <div class="form-group">
                    <label for="">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password" class="">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>

                            </span>

                        @endif
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-block btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>

    </div>



</div>