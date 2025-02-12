function Entrar(){
    const email = document.getElementById("email").value;
    const senha = document.getElementById("password").value;
    
    if (email === '' || senha === ''){
        alert("Por favor, preencha os campos corretamente!")
        return false;
    }
}