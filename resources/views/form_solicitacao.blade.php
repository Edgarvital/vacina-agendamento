<x-guest-layout>

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}


    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div style="padding-bottom: 0rem;padding-top: 1rem; margin-top: -15%; background-color: #fff;">
        <img src="{{asset('img/cabecalho_1.png')}}" alt="Orientação" width="100%">
        <div class="container">
            <img src="{{asset('img/cabecalho_2.png')}}" alt="Orientação" width="100%">
        </div>
    </div>
    <div class="container" style="margin-bottom: 1rem;background-color: #fff;">
        <div class="row justify-content-center">
            <!-- cadastro -->
            <div class="col-md-9 style_card_apresentacao">
                <div class="container" style="padding-top: 10px;;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row" style="text-align: center;">
                                <div class="col-md-12" style="margin-top: 20px;margin-bottom: 10px;">
                                    <img src="{{asset('img/logo_vem_vacina.png')}}" alt="Orientação" width="300px">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 style_titulo_campo">Solicitar vacinação</div>
                        <div class="col-md-12">
                            <hr class="style_linha_campo">
                        </div>
                        <div class="col-md-12 style_titulo_campo" data-toggle="tooltip" data-placement="top"
                             title="A comprovação das comorbidades deve ser feita no ato da vacinação. Para isso, a Secretaria Estadual de Saúde produziu um modelo de atestado aonde um profissional de saúde poderá indicar a doença preexistente do paciente. É obrigatório o carimbo, matrícula e/ou registro do conselho de classe do profissional."
                             style="margin-bottom: 10px;">
                            Pessoas com comorbidades precisam baixar o anexo.
                            <br>
                            <a href="{{route('baixar.anexo', ['name'=> 'anexo1.pdf'])}}" class="btn btn-success "
                               target="_blank" style="color:white;">Baixar anexo </a>
                        </div>
                        <div class="col-md-12">
                            <hr class="style_linha_campo">
                        </div>
                        <div class="col-md-12 style_titulo_campo" style="margin-bottom: 10px;">Informações pessoais
                        </div>
                        <div class="col-md-12">
                            <form method="POST" id="formSolicitar" class="needs-validation"
                                  action="{{ route('solicitacao.candidato.enviar') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="voltou" value="1">

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (env('ATIVAR_FILA', false) == true)
                                    <div class="alert alert-warning" id="alerta_vacinas">
                                        Sua solicitação será processada. Aguarde a confirmação da Secretaria de Saúde,
                                        indicando agendamento com data, local e horário para vacinação
                                    </div>
                                @else
                                    <div class="alert alert-warning" style="display: none" id="alerta_vacinas">
                                        Não há mais doses disponíveis para esta faixa etária ou público, ao finalizar o
                                        cadastro você será encaminhado para a fila de espera e deve aguardar a
                                        confirmação de agendamento para vacinação.
                                    </div>

                                @endif

                            <!-- Exibe os Publicos no Formulario -->
                                @foreach ($publicos as $publico)
                                    @include('includes.form_solicitacao.exibirPublico')
                                @endforeach
                                @if (old('público') != null)
                                    @error('público')
                                    <div id="validationServer05Feedback" class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </div>
                                    @enderror
                                @endif

                                <br>
                                <!-- Exibe as informações pesssoais no Formulario -->
                                @include('includes.form_solicitacao.exibirInformacoes')

                                <div class="form-group">
                                    <div class="style_titulo_campo" style="margin-top: 8px; margin-bottom: -2px;">
                                        Contato
                                    </div>
                                    <div style="font-size: 15px; margin-bottom: 15px;">(Informe o telefone, whatsapp ou
                                        e-mail para contato que confirmaremos o agendamento da data e horário de
                                        aplicação da vacina)
                                    </div>
                                </div>

                                <!-- Exibe as informações de contato no Formulario -->
                                @include('includes.form_solicitacao.exibirContato')

                                <div class="form-group">
                                    <div class="style_titulo_campo" style="margin-top: 8px; margin-bottom: -2px;">
                                        Endereço
                                    </div>
                                    <div style="font-size: 15px; margin-bottom: 15px;">(Informe seu endereço, rua,
                                        número, se casa ou apartamento, CEP e bairro)
                                    </div>
                                </div>

                                <!-- Exibe as informações de endereço no Formulario -->
                                @include('includes.form_solicitacao.exibirEndereco')
                                @if (env('ATIVAR_FILA', false) == true)

                                @else
                                    <div id="div_local">
                                        <div class="form-group">
                                            <div class="style_titulo_campo" style="margin-top: 8px; margin-bottom: -2px;">Local da vacinação</div>
                                            <div style="font-size: 15px; margin-bottom: 15px;">(Escolha o local, dia e horário que você quer ser vacinado)</div>
                                        </div>

                                        <!-- informações do atendimento -->
                                        <!-- um select que vai ser selecionado a posto de atendimento -->
                                        <!-- depois que for selecionado, vai ser baixado o html com a lista dos dias e horarios de possiveis atendimentos -->
                                        <!-- quando o usuario escolher, e enviar, a vaga da lista já pode ter sido tomada -->
                                        <!-- então o controller deve avisar isso ao usuario e pedir pra escolher outro horario dos novos disposiveis -->

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="posto_vacinacao" class="style_titulo_input">ESCOLHA O PONTO DE VACINAÇÃO MAIS PRÓXIMO DE SUA CASA<span class="style_titulo_campo">*</span><span class="style_subtitulo_input"> (obrigatório)</span></label>
                                                <select id="posto_vacinacao" class="form-control style_input @error('posto_vacinacao') is-invalid @enderror" name="posto_vacinacao" required onchange="selecionar_posto(this)">
                                                    @foreach($postos as $posto)
                                                        <option value="{{$posto->id}}">{{$posto->nome}}</option>
                                                    @endforeach
                                                </select>

                                                @error('posto_vacinacao')
                                                <div id="validationServer05Feedback" class="invalid-feedback">
                                                    <strong>{{$message}}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6" id="seletor_horario" style="padding-top: 24px;"></div>
                                        </div>
                                    </div>
                                @endif

                                <div id="loading" class="spinner-border" role="status" style="display: none;">
                                    <span class="sr-only">Loading...</span>
                                </div>

                                <div><hr></div>

                                <div class="col-md-12" style="margin-bottom: 30px;">
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <!--<div class="col-md-6" style="padding:3px">
                                                     <button class="btn btn-light" style="width: 100%;margin: 0px;">Cancelar</button>
                                                     </div>-->
                                                @if (env('ATIVAR_FILA', false) == true)
                                                    <div class="col-md-12" style="padding:3px">
                                                        <button class="btn btn-success"  style="width: 100%;">Enviar</button>
                                                    </div>
                                                @else
                                                    <div class="col-md-12" style="padding:3px">
                                                        <button class="btn btn-success" id="buttonSend" style="width: 100%;">Enviar</button>
                                                    </div>

                                                @endif
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

    </div>


    <!-- rodapé -->
    @include('includes.form_solicitacao.exibirRodape')

    @if ( old('público') != null)
        <script>
            $(document).ready(function() {
                var radio = document.getElementById('publico_{{old('público')}}');
                postoPara(radio, radio.value);
            });
        </script>
    @endif
    @if (env('ATIVAR_FILA', false) == true)
        <script type="text/javascript" src="{{asset('js/solicitacao/publicoAtivarFila.js')}}"></script>
    @else
        <script type="text/javascript" src="{{asset('js/solicitacao/publicoDesativarFila.js')}}"></script>
    @endif


    <script type="text/javascript" src="{{asset('js/solicitacao/email_script.js')}}"></script>

    <script type="text/javascript">
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    <script type="text/javascript">
        function checkbox_visibilidade(div_alvo, checkbox) {
            if(checkbox.checked) {
                div_alvo.style.display = "block";
            } else {
                div_alvo.style.display = "none";
            }
        }
        function buscar_CEP(input, evt) {
            let theEvent = evt || window.event;
            if(evt.keyCode == 8) {
                theEvent.returnValue = true;
                return;
            }
            let key = "";
            if (theEvent.type === 'paste') {
            } else {
                /* Handle key press */
                key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
                return;
            }
            /* enquanto não tiver suficiente, deixa preencher */
            if(input.value.length < 7) {
                theEvent.returnValue = true;
                return;
            }
            /* caso já esteja preenchido, não adiciona mais numeros */
            if(input.value.length === 8) {
                theEvent.returnValue = false;
                return;
            }
            /* colocou o ultimo valor do cep */
            theEvent.returnValue = true;
            /* pega o valor do cep */
            let cep = input.value + key;
            requisitar_preenchimento_cep(cep);
        }
        function requisitar_preenchimento_cep(cep) {
            if(!cep) {return;}
            cep = cep.match(/\d+/g, '').join("");
            if(cep.length != 8) {return;}
            let url = window.location.toString().replace("solicitar", "cep/" + cep);
            /* console.log(url); */
            fetch(url).then((resposta) => {
                return resposta.json();
            }).then((json) => {
                if(json.resultado != 1) {
                    /* todo: erro */
                    return;
                }
                /*  document.getElementById("inputCidade").value = json.cidade; */
                /* document.getElementById("inputBairro").value = json.bairro; */
                document.getElementById("inputrua").value = json.tipo_logradouro + " " + json.logradouro;
            });
        }
        function funcaoVinculoComAEquipeDeSaudade(input){
            if(document.getElementById("id_div_nomeDaUnidade").style.display == "none"){
                document.getElementById("id_div_nomeDaUnidade").style.display = "block";
                document.getElementById("inputNomeUnidade").value = "";
            }else{
                document.getElementById("id_div_nomeDaUnidade").style.display = "none";
                document.getElementById("inputNomeUnidade").value = "";
                document.getElementById("inputNomeUnidade").placeholder = "Digite o nome da sua unidade (caso tenha vínculo)";
            }
            postoPara(input);
        }
        /* function funcaoMostrarOpcoes(input, id) {
            var div = document.getElementById("divPublico_"+id);
            var select = document.getElementById("publico_opcao_"+id);
            alert(div);
            if(div.style.display == "none" && div != null){
                div.style.display = "block";
                select.value = "";
            }else{
                div.style.display = "none";
                select.value = "";
            }
            postoPara(input, id);
         } */
        function selecionar_posto(posto_selecionado) {
            let id_posto = posto_selecionado.value;
            let div_seletor_horararios = document.getElementById("seletor_horario");
            div_seletor_horararios.innerHTML = "Buscando horários disponíveis...";
            let url = window.location.toString().replace("solicitar", "horarios/" + id_posto);
            //  console.log(url);
            /* Mágia de programação funcional */
            fetch(url).then((dados) => {
                if(dados.status != 200) {
                    div_seletor_horararios.innerHTML = "Ocorreu um erro, tente novamente mais tarde";
                } else {
                    return dados.body;
                }
            }).then(rb => {
                const reader = rb.getReader();
                return new ReadableStream({
                    start(controller) {
                        function push() {
                            reader.read().then( ({done, value}) => {
                                if (done) {
                                    controller.close();
                                    return;
                                }
                                controller.enqueue(value);
                                push();
                            })
                        }
                        push();
                    }
                });
            }).then(stream => {
                return new Response(stream, { headers: { "Content-Type": "text/html" } }).text();
            }).then(result => {
                div_seletor_horararios.innerHTML = result;
            });
        }
        function selecionar_dia_vacinacao(select_dia) {
            Array.from(document.getElementsByClassName("seletor_horario_dia_div")).forEach((div) => {
                div.style.display = "none";
                let select_horarios = div.children[0].children[0].children[1];
                select_horarios.name = "";
                select_horarios.required = false;
            });
            if(!select_dia.value) {return;}
            let div = document.getElementById("seletor_horario_dia_" + select_dia.value);
            let select_horarios = div.children[0].children[0].children[1];
            div.style.display = "block";
            select_horarios.name = "horario_vacinacao";
            select_horarios.id = "horario_vacinacao";
            select_horarios.required = true;
        }
        function postoPara(input, id) {
            valor = input.checked;
            var btnForm = document.getElementById('buttonSend');
            var divLocal = document.getElementById("div_local");
            var loading = document.getElementById("loading");
            divLocal.style.display = "none";
            loading.style.display = "block";
            btnForm.disabled = true;
            $.ajax({
                url: "{{route('postos')}}",
                method: 'get',
                type: 'get',
                data: {
                    publico_id: function () {
                        if (valor) {
                            return id;
                        } else {
                            return 0;
                        }
                    }
                },
                statusCode: {
                    404: function() {
                        alert("Nenhum posto encontrado");
                        btnForm.disabled = false;
                    },
                    500: function() {
                        btnForm.disabled = false;
                    }
                },
                success: function(data){
                    //  console.log( data)
                    if(data.length <= 0 && data != null){
                        console.log('posto');
                        const buttonSend = document.getElementById('buttonSend');
                        buttonSend.innerText = "Enviar para fila de Espera";
                        divLocal.style.display = "none";
                        const input = '<input id="input_fila" type="hidden" name="fila" value="true">';
                        $("#formSolicitar").append(input);
                        document.getElementById("alerta_vacinas").style.display = "block";
                        loading.style.display = "none";
                        /* alert('Não existe vacinas para esse público, se continuar o preenchimento você irá para a fila de espera') */
                    }else{
                        document.getElementById("alerta_vacinas").style.display = "none";
                        if(document.getElementById("input_fila") != null){
                            document.getElementById("input_fila").remove();
                        }
                        buttonSend.innerText = "Enviar";
                        document.getElementById("div_local").style.display = "block";
                        loading.style.display = "none";
                    }
                    if (data != null && typeof data != 'string') {
                        var option = '<option selected disabled>-- Selecione o posto --</option>';
                        if (data.length > 0) {
                            $.each(data, function(i, obj) {
                                option += '<option value="' + obj.id + '">' + obj.nome + '</option>';
                            })
                        }
                        document.getElementById("posto_vacinacao").innerHTML = option;
                    }
                    btnForm.disabled = false;
                }
            })
        }
    </script>

</x-guest-layout>
