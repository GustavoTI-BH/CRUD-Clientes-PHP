//função ao clicar no botão cancelar do Cadastro e altrar
function clickCancelar() {
  var resp = confirm("Deseja realmente cancelar o cadastro?");
  if (resp == true) {
      alert("Ok, você cancelou o cadastro...");
      window.open('../Gustavo_Alves/index.php', 'janela');
  }
};

var tabela = document.getElementById("tabelaClientes");
var linhas = tabela.getElementsByTagName("tr");

for(var i = 0; i < linhas.length; i++){
	var linha = linhas[i];
  linha.addEventListener("click", function(){
  	//Adicionar ao atual
		selLinha(this, false); //Selecione apenas um
    //selLinha(this, true); //Selecione quantos quiser
	});
}

/**
Caso passe true, você pode selecionar multiplas linhas.
Caso passe false, você só pode selecionar uma linha por vez.
**/
function selLinha(linha, multiplos){
	if(!multiplos){
  	var linhas = linha.parentElement.getElementsByTagName("tr");
    for(var i = 0; i < linhas.length; i++){
      var linha_ = linhas[i];
      linha_.classList.remove("selecionado");    
    }
  }
  linha.classList.toggle("selecionado");
}

/**
Exemplo de como capturar os dados
**/

//função para capturar os dados do cliente selecionado ao clicar no botão altrar na pagina principal
function clickAlterar() {
  var selecionados = tabela.getElementsByClassName("selecionado");
  //Verificar se eestá selecionado
  if(selecionados.length < 1){
  	alert("Para alterar um cliente, selecione pelo menos uma linha.");
    return false;
  }
  
  var id_cliente = "";

  for(var i = 0; i < selecionados.length; i++){
  	var selecionado = selecionados[i];
    selecionado = selecionado.getElementsByTagName("td");
    id_cliente = selecionado[0].innerHTML; //Pegando a primaray key do cliente selecionado
  }

  window.location.href='../Gustavo_Alves/alterarCliente.php?id_cliente=' + id_cliente; //enviando o ID do cliente solicitado pra a pagina de altrar os dados do cliente
};


//função para capturar os dados do cliente selecionado ao clicar no botão deletar na pagina principal
function clickDeletar() {
  var selecionados = tabela.getElementsByClassName("selecionado");
  //Verificar se eestá selecionado
  if(selecionados.length < 1){
  	alert("Para deletar um cliente, selecione pelo menos uma linha.");
    return false;
  }
  
  var id_cliente = "";
  var nome_cliente = "";

  for(var i = 0; i < selecionados.length; i++){
  	var selecionado = selecionados[i];
    selecionado = selecionado.getElementsByTagName("td");
    id_cliente = selecionado[0].innerHTML;  //Pegando a primaray key do cliente selecionado
    nome_cliente = selecionado[1].innerHTML; //Pegando o nome do cinete selecionado
  }
  
  var resp = confirm("Deseja realmente deletar o cliente " + nome_cliente + "?");
  if (resp == true) {
      alert("o cliente " + nome_cliente + ", foi excluido com sucesso!");
      window.open('../Gustavo_Alves/index.php', 'janela');
  }
  alert(id_cliente);
};