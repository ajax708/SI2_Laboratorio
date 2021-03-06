@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    
@endsection

@section('content')
    <body>      
    <div class="mytop-content" >
        <div class="container" > 
          
                <div class="col-sm-12 " style="background-color:rgba(0, 0, 0, 0.35); height: 60px; " >
                   <a class="mybtn-social pull-right" href="{{url('/register')}}">
                       Register
                  </a>

                  <a class="mybtn-social pull-right" href="{{url('/login')}}">
                       Login
                  </a>
               
                </div>
                
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
            
            
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                    <div class="myform-top">
                        <div class="myform-top-left">
                         <img class="img-responsive logo" src="{{url('img/logo_plusis.png ')}}" />
                          <h3>Ingresa a nuestro sitio.</h3>
                            <p>Digita tu email y contraseña:</p>
                        </div>
                        <div class="myform-top-right">
                          <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="myform-bottom">
                      <form role="form" action="{{url('/login')}}" method="post" class="">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <input type="text" name="email" value="{{old('email')}}" placeholder="Usuario..." class="form-control" id="form-username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Contraseña..." class="form-control" id="form-password">
                        </div>
                        <button type="submit" class="mybtn">Entrar</button>
                      </form>
                    </div>
              </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mysocial-login">
                    <h3>...Visitanos en nuestro blog...</h3>
                    <h1><strong>SI2</strong>.net</h1>
                    
                </div>
            </div>
        </div>
      </div>

    <!-- Enlazamos el js de Bootstrap, y otros plugins que usemos siempre al final antes de cerrar el body -->
    <script src="{{url('/js/jquery.min.js')}}"></script>
    <script src="{{url('/js/bootstrap.min.js')}}"></script>
  </body>
@endsection
{{-- 
@section('content')
<body class="hold-transition login-page">
    
    <div id="app" v-cloak>
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/home') }}"><b>Admin</b>LTE</a>
            </div><!-- /.login-logo -->

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login-box-body">
        <p class="login-box-msg"> {{ trans('adminlte_lang::message.siginsession') }} </p>

        <login-form name="{{ config('auth.providers.users.field','email') }}"
                    domain="{{ config('auth.defaults.domain','') }}"></login-form>

        @include('adminlte::auth.partials.social_login')

        <a href="{{ url('/password/reset') }}">{{ trans('adminlte_lang::message.forgotpassword') }}</a><br>
        <a href="{{ url('/register') }}" class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a>

    </div>

    </div>
    </div>
    @include('adminlte::layouts.partials.scripts_auth')
</body>

@endsection --}}