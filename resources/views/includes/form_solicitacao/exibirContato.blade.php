<div class="row">
    <div class="form-group col-md-6">
        <label for="inputTelefone" class="style_titulo_input">TELEFONE<span
                class="style_titulo_campo">*</span><span class="style_subtitulo_input"> (obrigatório)</span></label>
        <input type="text"
               class="form-control style_input celular @error('telefone') is-invalid @enderror"
               id="inputTelefone" placeholder="Digite o número do seu telefone"
               name="telefone" value="{{old('telefone')}}">

        @error('telefone')
        <div id="validationServer05Feedback" class="invalid-feedback">
            <strong>{{$message}}</strong>
        </div>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="inputCelular" class="style_titulo_input">WHATSAPP<span
                class="style_titulo_campo"></span></label>
        <input type="text"
               class="form-control style_input celular @error('whatsapp') is-invalid @enderror"
               id="inputCelular" placeholder="Digite o número do seu whatsapp"
               name="whatsapp" value="{{old('whatsapp')}}">

        @error('whatsapp')
        <div id="validationServer05Feedback" class="invalid-feedback">
            <strong>{{$message}}</strong>
        </div>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputEmail" class="style_titulo_input">E-MAIL</label>
        <input type="email" class="form-control style_input" id="inputEmail"
               placeholder="Digite o seu e-mail" name="email" value="{{old('email')}}">
        <div id="inputMessage" class="valid-feedback">
        </div>
    </div>
</div>
@foreach ($publicos as $publico)
    @if ($publico->outrasInfo != null && count($publico->outrasInfo) > 0)
        <div id="divOutrasInformacoes_{{$publico->id}}"
             @if(old('público') == $publico->id) style="display: block;"
             @else style="display: none;" @endif>
            <div class="form-group">
                <div class="style_titulo_campo" style="margin-bottom: -2px;">Outras
                    informações
                </div>
                <div
                    style="font-size: 15px; margin-bottom: 15px;">@if($publico->texto_outras_informacoes!=null)
                        ({{$publico->texto_outras_informacoes}})@endif</div>
            </div>

            @foreach ($publico->outrasInfo()->orderBy('campo')->get() as $outra)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"
                           id="defaultCheck{{ $outra->id }}"
                           name="opcao_etapa_{{$publico->id}}[]" value="{{$outra->id}}"
                           @if(old('opcao_etapa_'.$publico->id) != null && in_array($outra->id, old('opcao_etapa_'.$publico->id))) checked @endif>
                    <label class="form-check-label style_titulo_input"
                           for="defaultCheck0">{{mb_strtoupper($outra->campo)}}</label>
                </div>
            @endforeach

            @error('outras_infor_obg_'.$publico->id)
            <div class="form-group">
                <div id="validationServer05Feedback" class="invalid-feedback"
                     style="display: block;">
                    <strong>{{$message}}</strong>
                </div>
            </div>
            @enderror
        </div>
    @endif
@endforeach
