<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alterar Senha') }}

        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>{{ Session::get('message', '') }}
                    </div>
                @elseif(Session::has('fail'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button> {{ Session::get('message', '') }}
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-8 ">
                        <form method="post" action="{{ route('user.update_senha') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                            <div class="form-group justify-content-center row">
                                <div class="form-row col-md-12 justify-content-center">
                                    <div class="form-group col-md-8">
                                        <label for="password" style="float: left;">Senha atual</label>
                                        <input type="password" id="password" name="old_password"
                                               placeholder="Digite a sua senha atual" class="form-control"
                                               value="{{ old('old_password') }}" required autofocus><br>

                                        <label for="password" style="float: left;">Nova senha</label>
                                        <input type="password" id="password" name="password"
                                               placeholder="Digite a nova senha"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               value="{{ old('password') }}" required autofocus>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
												{{$errors->first('password')}}
											</span>
                                        @endif
                                        <br>

                                        <label for="password_confirmation" style="float: left;">Confirme a nova
                                            senha</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                               placeholder="Confirme sua nova senha"
                                               class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                               value="{{ old('password_confirmation') }}" required autofocus>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="invalid-feedback" role="alert">
												{{$errors->first('password_confirmation')}}
											</span>
                                        @endif<br>
                                        <div class="row">
                                            <div class="col-9">
                                                <button type="submit" class="btn btn-info">
                                                    Alterar Senha
                                                </button>
                                            </div>
                                            <div class="col-3">
                                                <a class="btn btn-danger" href="{{ route('dashboard') }}">
                                                    Cancelar
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>


