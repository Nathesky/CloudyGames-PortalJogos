let palavra = ["Peixe", "Sapo", "Viúva", "Saguão", "Egito", "Brasil", "Caminhão", "Elefante", "Malvado","Super-dotado","Azul", "Verde", "Amarelo", "Celular", "Mesa", "Documento", "Papel", "Chinês", "Japonês", "Suave", "Macaco", "Cachoeira"];


//função do jogo
window.onload = function () {
    let game = document.getElementById('forca') //div das palvras do jogo
    game.innerHTML = null

    let num = Math.floor(Math.random() * 30); 
    let forca = palavra[num].toLowerCase(); 
    let letras = forca.split("");
    let msg = document.getElementById('msg');
    let chances = document.getElementById('chances');
    let restart = document.getElementById('restart');

    document.getElementById('ghostword').value = forca;
    
    //laço que gera linhas que as letras serão escritas
    for (i = 0; i <= (letras.length) - 1; i++) {
        game.innerHTML += "<div class='blank'><h1 id='" + i + "'></h1></div>";
    }
    
    let erro = 0
    let filled = 0
    let usadas = [];
    
    document.getElementById('bota').onclick = function () {
        let acerto = 0;
        let falta = letras.length;
        let input = document.getElementById('entry').value.toLowerCase();
        
        let check = null;
        
        function usada() {
            for (i = 0; i <= usadas.length; i++) {
                if (input == usadas[i]) { i = usadas.length; check = true; return; }
            }
            if (input != usadas[i]) { check = false }
        }
        usada() //confere se a letra inserida já foi usada
        
        if (check == true) {
            alert('Letra já foi usada');
        }
        if (input == "" || input >= 0 || input <= 9) { alert('Caractere inválida') }
        if (check == false && input != "") {
            usadas.unshift(input);
            
            for (i = 0; i <= letras.length; i++) {
                if (input == letras[i]) {
                    document.getElementById(i).innerHTML = input;
                    acerto += 1;
                }
            }
            if (acerto == 0) {
                falta = (falta - acerto);
                erro += 1
            }
            
            filled += acerto;
        }
        if (erro == 5) 
        { 
            msg.innerHTML += "Você perdeu. A palavra era " + forca; 
            document.getElementById('entry').disabled = "true";
            document.getElementById('ghost').value = 'erro';
            document.getElementById('form').submit();
            restart.style.visibility = "visible"} 
            
            if (filled == letras.length) {
                msg.innerHTML += "Parabéns! Você venceu"; 
                document.getElementById('entry').disabled = "true"; 
                document.getElementById('ghost').value = 'acerto';
                document.getElementById('form').submit();
                restart.style.visibility = "visible"} 
                
                
                document.getElementById('entry').value = "";
                chances.innerHTML = "Erros: " + erro;
            }
            
            
}

function recarrega(){location.reload()}