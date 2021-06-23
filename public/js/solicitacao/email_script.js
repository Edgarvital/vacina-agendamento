const buttonSend = document.getElementById('buttonSend');
const formSolicitar = document.getElementById('formSolicitar');
if(buttonSend){
    buttonSend.addEventListener('click', (e)=>{
        e.target.innerText = "Aguarde...";
        e.target.setAttribute("disabled", "disabled");
        formSolicitar.submit()
    })
}
var inputEmail = document.getElementById('inputEmail');
var inputMessage = document.getElementById('inputMessage');
inputEmail.addEventListener('change', (e)=>{
    console.log(e.target.value);
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    console.log(pattern.test(e.target.value));
    var bool = pattern.test(e.target.value);
    if(bool){
        inputMessage.setAttribute('class', 'valid-feedback')
        inputMessage.innerText = 'E-mail válido!';
        inputEmail.classList.add( 'is-valid')
        inputEmail.classList.remove( 'is-invalid')
        inputMessage.style.display = 'block';
    }else{
        inputMessage.setAttribute('class', 'invalid-feedback')
        inputMessage.innerText = 'E-mail inválido!';
        inputEmail.classList.remove( 'is-valid')
        inputEmail.classList.add( 'is-invalid')
        inputMessage.style.display = 'block';
    }
});
