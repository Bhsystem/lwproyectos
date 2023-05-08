<style type="text/css">
     body {
        background-image: url("{{asset('storage/login.jpg')}}")!important;
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-position: center; 
    }
    .personal-logo{
       display: flex;
       justify-content: center;
       align-items: center;

    } 

    .personal-logo .child{
        width: 150px;
        position: absolute;
        top: 50%;
        text-align: center;
        color: white;
    }

    .child{
        background-color: #fff;
        border-radius: 25px;
    }
    .child p{
        color:black;
    }
</style>

    <div>
{{--             <div class="personal-logo">

                <div class="child bg-gray-100" onclick="alert('puede servir')">
                    <img src="{{asset("storage/logoBH.png")}}" width=150>
                    <p>Ingresar</p>
                </div>
            </div> --}}
            
            
          <form method="POST" action="{{ route('login') }}">
                @csrf
    {{--   
                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-jet-button class="ml-4">
                        {{ __('Log in') }}
                    </x-jet-button>
                </div>
                --}}
            </form> 
        </div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){
        send();
    });
    function send(){
            $.ajax({
                url:'{{route('login')}}',
                method:'POST',
                data:{
                        email:'a@a',
                        password:'123',
                        _token:$('input[name="_token"]').val(),
                    }
            }).done(function(res){
               //window.location.replace("{{route('dashboard')}}");
            }).fail( function(res){
                //window.location.replace("{{env('LOGIN_URL')}}");   
            });
        }
</script>