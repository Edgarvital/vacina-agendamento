@auth
    @if ($publico->tipo == $tipos[0] || $publico->tipo == $tipos[1])
        <div class="form-check">
            <input class="form-check-input" type="radio" id="publico_{{$publico->id}}" name="público"
                   value="{{$publico->id}}" @if(old('público') == $publico->id) checked @endif required>
            <label class="form-check-label style_titulo_input"
                   for="publico_{{$publico->id}}">{{mb_strtoupper($publico->texto)}}</label>
        </div>
    @elseif ($publico->tipo == $tipos[2])
        <div class="form-check">
            <input class="form-check-input" type="radio" id="publico_{{$publico->id}}" name="público"
                   value="{{$publico->id}}" @if(old('público') == $publico->id) checked @endif required>
            <label class="form-check-label style_titulo_input"
                   for="publico_{{$publico->id}}">{{mb_strtoupper($publico->texto)}}</label>

            <div id="divPublico_{{$publico->id}}" @if (old('público') == $publico->id) style="display: block;"
                 @else style="display: none;" @endif>
                <div class="row">
                    <div class="col-md-12">
                        <label for="inputProfissao" class="style_titulo_input" style="font-weight: normal;">Qual tipo
                            de {{mb_strtolower($publico->texto)}}</label>
                        <select class="form-control @error('publico_opcao_'.$publico->id) is-invalid @enderror"
                                id="publico_opcao_{{$publico->id}}" name="publico_opcao_{{$publico->id}}">
                            <option value="" seleceted disabled>-- Selecione o tipo --</option>
                            @foreach ($publico->opcoes()->orderBy('opcao')->get() as $opcao)
                                <option value="{{$opcao->id}}"
                                        @if(old('publico_opcao_'.$publico->id) == $opcao->id) selected @endif>{{$opcao->opcao}}</option>
                            @endforeach
                        </select>
                        @error('publico_opcao_'.$publico->id)
                        <div id="validationServer05Feedback" class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </div>
                        @enderror
                        {{-- <small>Obs.: Lista conforme OFÍCIO CIRCULAR Nº 57/2021/SVS/MS do Ministério da Saúde, de 12 de março de 2021.</small> --}}
                    </div>
                </div>
            </div>
        </div>
    @endif
@else
    @if ($publico->exibir_no_form)
        @if ($publico->tipo == $tipos[0] || $publico->tipo == $tipos[1])
            <div class="form-check">
                <input class="form-check-input" type="radio"
                       id="publico_{{$publico->id}}" name="público"
                       value="{{$publico->id}}"
                       @if(old('público') == $publico->id) checked @endif required>
                <label class="form-check-label style_titulo_input"
                       for="publico_{{$publico->id}}">{{mb_strtoupper($publico->texto)}}</label>
            </div>
        @elseif ($publico->tipo == $tipos[2])
            <div class="form-check">
                <input class="form-check-input" type="radio"
                       id="publico_{{$publico->id}}" name="público"
                       value="{{$publico->id}}"
                       @if(old('público') == $publico->id) checked @endif required>
                <label class="form-check-label style_titulo_input"
                       for="publico_{{$publico->id}}">{{mb_strtoupper($publico->texto)}}</label>

                <div id="divPublico_{{$publico->id}}" @if (old('público') == $publico->id) style="display: block;"
                     @else style="display: none;" @endif>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="inputProfissao"
                                   class="style_titulo_input"
                                   style="font-weight: normal;">Qual tipo
                                de {{mb_strtolower($publico->texto)}}</label>
                            <select class="form-control"
                                    id="publico_opcao_{{$publico->id}}"
                                    name="publico_opcao_{{$publico->id}}">
                                <option value="" seleceted disabled>-- Selecione
                                    o tipo --
                                </option>
                                @foreach ($publico->opcoes()->orderBy('opcao')->get() as $opcao)
                                    @if($publico->inicio_intervalo == 18)
                                        @if ($opcao->opcao != "Gestantes e puérperas" )
                                            <option
                                                value="{{$opcao->id}}"
                                                @if(old('publico_opcao_'.$publico->id) == $opcao->id) selected @endif>{{$opcao->opcao}}</option>
                                        @endif
                                    @else
                                        <option
                                            value="{{$opcao->id}}"
                                            @if(old('publico_opcao_'.$publico->id) == $opcao->id) selected @endif>{{$opcao->opcao}}</option>
                                    @endif
                                @endforeach
                            </select>
                            {{-- <small>Obs.: Lista conforme OFÍCIO CIRCULAR Nº 57/2021/SVS/MS do Ministério da Saúde, de 12 de março de 2021.</small> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
@endauth
