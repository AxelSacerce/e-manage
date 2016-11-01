@extends('front.template')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

                <div class="panel-body">

                    @if(session('message'))
                      <div class="err-message">
                        {{ session('message') }}
                      </div>
                    @endif


                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">{{ trans("front/site.$current_section.username") }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{{ trans("front/site.$current_section.userpass") }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label data-toggle="tooltip" data-placement="right" title='{{ trans("front/site.$current_section.remember_desc") }}'>
                                        <input type="checkbox" name="remember"> {{ trans("front/site.$current_section.remember") }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans("front/site.$current_section.sign_in") }}
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    {{ trans("front/site.$current_section.forgot_pass") }}
                                </a>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
