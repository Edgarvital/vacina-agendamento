<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputNome" class="style_titulo_input">NOME COMPLETO<span
                class="style_titulo_campo">*</span><span class="style_subtitulo_input"> (obrigatório)</span>
        </label>
        <input type="text"
               class="form-control style_input apenasLetras @error('nome_completo') is-invalid @enderror"
               id="inputNome" placeholder="Digite seu nome completo"
               name="nome_completo" value="{{old('nome_completo')}}" maxlength="65">

        @error('nome_completo')
        <div id="validationServer05Feedback" class="invalid-feedback">
            <strong>{{$message}}</strong>
        </div>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputData" class="style_titulo_input">DATA DE NASCIMENTO<span
                class="style_titulo_campo">*</span><span class="style_subtitulo_input"> (obrigatório)</span>
        </label>
        <input type="date"
               class="form-control style_input @error('data_de_nascimento') is-invalid @enderror"
               id="inputData" placeholder="dd/mm/aaaa"
               pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" name="data_de_nascimento"
               value="{{old('data_de_nascimento')}}">

        @error('data_de_nascimento')
        <div id="validationServer05Feedback" class="invalid-feedback">
            <strong>{{$message}}</strong>
        </div>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="inputCPF" class="style_titulo_input">CPF<span
                class="style_titulo_campo">*</span><span class="style_subtitulo_input"> (obrigatório)</span>
        </label>
        <input type="text"
               class="form-control style_input cpf @error('cpf') is-invalid @enderror"
               id="inputCPF" placeholder="Ex.: 000.000.000-00" name="cpf"
               value="{{old('cpf')}}">

        @error('cpf')
        <div id="validationServer05Feedback" class="invalid-feedback">
            <strong>{{$message}}</strong>
        </div>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputCartaoSUS" class="style_titulo_input">NÚMERO DO CARTÃO SUS<span
                class="style_titulo_campo">*</span><span class="style_subtitulo_input"> (obrigatório)</span>
        </label>
        <input type="text"
               class="form-control style_input sus @error('número_cartão_sus') is-invalid @enderror"
               id="inputCartaoSUS" placeholder="000 0000 0000 0000"
               name="número_cartão_sus" value="{{old('número_cartão_sus')}}">

        @error('número_cartão_sus')
        <div id="validationServer05Feedback" class="invalid-feedback">
            <strong>{{$message}}</strong>
        </div>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="inputSexo" class="style_titulo_input">SEXO<span
                class="style_titulo_campo">*</span><span class="style_subtitulo_input"> (obrigatório)</span>
        </label>
        <select id="inputSexo"
                class="form-control style_input @error('sexo') is-invalid @enderror"
                name="sexo">
            <option selected disabled>-- Selecione o sexo --</option>
            @foreach($sexos as $sexo)
                <option value="{{$sexo}}"
                        @if (old('sexo') == $sexo) selected @endif>{{$sexo}}</option>
            @endforeach
        </select>

        @error('sexo')
        <div id="validationServer05Feedback" class="invalid-feedback">
            <strong>{{$message}}</strong>
        </div>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputNomeMae" class="style_titulo_input">NOME COMPLETO DA MÃE<span
                class="style_titulo_campo">*</span><span class="style_subtitulo_input"> (obrigatório)</span>
        </label>
        <input type="text"
               class="form-control style_input apenasLetras @error('nome_da_mãe') is-invalid @enderror"
               id="inputNomeMae" placeholder="Digite o nome completo da mãe"
               name="nome_da_mãe" value="{{old('nome_da_mãe')}}" maxlength="65">

        @error('nome_da_mãe')
        <div id="validationServer05Feedback" class="invalid-feedback">
            <strong>{{$message}}</strong>
        </div>
        @enderror
    </div>
</div>
