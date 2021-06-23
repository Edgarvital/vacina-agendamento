$(document).ready(function() {
    $('input:radio[name=público]').change(
        function() {
            var inputs = document.getElementsByName('público');
            for (var i = 0; i < inputs.length; i++) {
                //  console.log(this);
                // console.log(this.value);
                if (document.getElementById("divPublico_"+inputs[i].value)) {
                    var div = document.getElementById("divPublico_"+inputs[i].value);
                    var select = document.getElementById("publico_opcao_"+inputs[i].value);
                    if(div.style.display == "none" && inputs[i].value == this.value){
                        div.style.display = "block";
                        select.value = "";
                    }else{
                        div.style.display = "none";
                        select.value = "";
                    }
                }
                if (document.getElementById("divOutrasInformacoes_"+inputs[i].value)) {
                    var div = document.getElementById("divOutrasInformacoes_"+inputs[i].value);
                    if (div.style.display == "none" && inputs[i].value == this.value) {
                        div.style.display = "block";
                    } else {
                        div.style.display = "none";
                    }
                }
            }
            //descomentar quando desativar a fila
            postoPara(this, this.value);
        }
    )
});
