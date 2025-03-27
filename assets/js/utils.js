function redirectMenu(nomeArquivo) {
	window.location.href = `../index.php?page=${nomeArquivo}`;
}

function ativarMenu(idMenu){
	document.querySelectorAll("#sidebar-menu ul li").forEach(li => li.classList.remove("active"));
	document.getElementById(idMenu).classList.add("active");
}