window.onload = tiraLink;

function tiraLink() {
	document.getElementById('minhaAncora').removeAttribute('href');
}
function menuOpcaoLogin() {
	document.getElementById('option-login').className = 'opition-login-active';
	document.getElementById('option-cadastro').className = '';

	document.getElementById('form-login').className = 'form-login-active';
	document.getElementById('form-cadastro').className = 'form-login-not-active';
}
function menuOpcaoCadastro() {
	document.getElementById('option-cadastro').className = 'opition-login-active';
	document.getElementById('option-login').className = '';

	document.getElementById('form-cadastro').className = 'form-login-active';
	document.getElementById('form-login').className = 'form-login-not-active';
}

function showLogin(){
	var situacao = document.getElementById('login-cadastro').className;
	if(situacao=="login-off"){
		document.getElementById('login-cadastro').className = 'login-on';
	}
	if(situacao=="login-on"){
		document.getElementById('login-cadastro').className = 'login-off';
	}
}
function showMenu(){
	var situacao = document.getElementById('menu').className;
	if(situacao=='mobileViewOff'){
		document.getElementById('menu').className = 'mobileViewOn';
	}
	if(situacao=='mobileViewOn'){
		document.getElementById('menu').className = 'mobileViewOff';
	}
}


function fNome(){
	var nome = document.getElementById('fnome').value;
	if (nome != "") { 
		document.getElementById('fnome').className = 'fView'; 
	}else{
		document.getElementById('fnome').className = '';
	}

}
function fEmail(){
	var email = document.getElementById('femail').value;
	if (email != "") { 
		document.getElementById('femail').className = 'fView'; 
	}else{
		document.getElementById('femail').className = '';
	}

}
function fTell(){
	var tell = document.getElementById('ftell').value;
	if (tell != "") { 
		document.getElementById('ftell').className = 'fView'; 
	}else{
		document.getElementById('ftell').className = '';
	}

}
function fMensagem(){
	var mensagem = document.getElementById('fmensagem').value;
	if (mensagem != "") { 
		document.getElementById('fmensagem').className = 'fViewMensagem'; 
	}else{
		document.getElementById('fmensagem').className = '';
	}

}
function seila(){
	document.getElementById('logado').className = 'closesl';
	document.getElementById('fechar').className = 'closesl';
}

