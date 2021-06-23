<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputCEP" class="style_titulo_input">CEP</label>
        <input type="text"
               class="form-control style_input cep @error('cep') is-invalid @enderror"
               id="inputCEP" placeholder="Digite o CEP" name="cep"
               value="{{old('cep')}}">
        {{-- onchange="requisitar_preenchimento_cep(this.value)" --}}
        @error('cep')
        <div id="validationServer05Feedback" class="invalid-feedback">
            <strong>{{$message}}</strong>
        </div>
        @enderror
    </div>
</div>


<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputCidade" class="style_titulo_input">CIDADE<span
                class="style_titulo_campo">*</span><span class="style_subtitulo_input"> (obrigatório)</span>
        </label>
        <input id="inputCidade"
               class="form-control style_input @error('cidade') is-invalid @enderror"
               name="cidade"
               value="@if(old('cidade') != null){{old('cidade')}}@else{{"Garanhuns"}}@endif"
               disabled>

        @error('cidade')
        <div id="validationServer05Feedback" class="invalid-feedback">
            <strong>{{$message}}</strong>
        </div>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="inputBairro" class="style_titulo_input">BAIRRO<span
                class="style_titulo_campo">*</span><span class="style_subtitulo_input"> (obrigatório)</span>
        </label>

        <select id="inputBairro"
                class="form-control style_input @error('bairro') is-invalid @enderror"
                name="bairro">
            <option selected disabled>-- Selecione o bairro --</option>
            @foreach($bairros as $bairro)
                <option value="{{$bairro}}"
                        @if (old('bairro') == $bairro) selected @endif>{{$bairro}}</option>
            @endforeach
        </select>

        @error('bairro')
        <div id="validationServer05Feedback" class="invalid-feedback">
            <strong>{{$message}}</strong>
        </div>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputrua" class="style_titulo_input">RUA<span
                class="style_titulo_campo">*</span><span class="style_subtitulo_input"> (obrigatório)</span></label>
        <input type="text"
               class="form-control style_input @error('rua') is-invalid @enderror"
               id="inputrua" placeholder="Digite o nome da rua, avenida, travessa..."
               name="rua" value="{{old('rua')}}">

        @error('rua')
        <div id="validationServer05Feedback" class="invalid-feedback">
            <strong>{{$message}}</strong>
        </div>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="inputNumeroResidencia" class="style_titulo_input">NÚMERO DA
            RESIDÊNCIA<span class="style_titulo_campo">*</span><span
                class="style_subtitulo_input"> (obrigatório)</span></label>
        <input type="text"
               class="form-control style_input @error('número_residencial') is-invalid @enderror"
               id="inputNumeroResidencia" placeholder="Digite o número da residência"
               name="número_residencial" value="{{old('número_residencial')}}">

        @error('número_residencial')
        <div id="validationServer05Feedback" class="invalid-feedback">
            <strong>{{$message}}</strong>
        </div>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputComplemento" class="style_titulo_input">COMPLEMENTO </label>
        <textarea type="text"
                  class="form-control style_input @error('complemento_endereco') is-invalid @enderror"
                  id="inputComplemento" placeholder="" rows="3"
                  name="complemento_endereco">{{old('complemento_endereco')}}</textarea>

        @error('complemento_endereco')
        <div id="validationServer05Feedback" class="invalid-feedback">
            <strong>{{$message}}</strong>
        </div>
        @enderror
    </div>
</div>
