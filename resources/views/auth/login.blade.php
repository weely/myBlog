@extends('admin.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">

                    @include('admin.partials.errors')

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <lable class="col-md-4 control-label">E-mail Address</lable>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <lable>
                                        <input type="checkbox" name="remember">Remember Me
                                    </lable>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <lable class="col-md-4 control-label">验证码</lable>
                            <div class="col-md-6">
                                <img id="captcha_img" border='1' width="100" height="40" src="{{ url('captcha/1') }}" />
                                    <a href="javascript:void(0)" onclick="javascript:re_captcha();">换一个?</a>

                                <script>
                                    function re_captcha() {
                                        $url = "{{ URL('/captcha') }}";
                                        $url = $url + "/" + Math.random();
                                        document.getElementById('captcha_img').src = $url;
                                    }
                                </script>
                            </div>
                        </div>

                        <div class="form-group">
                            <lable class="col-md-4 control-label">请输入验证码</lable>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="captcha" value="" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection