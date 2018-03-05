var menu = document.getElementById("menu-bar");
btnMenu = document.getElementsByClassName("navbar-toggler");


btnMenu[0].addEventListener("click", function(){
	if(menu.style.display === "block"){
		menu.style.display = 'none';
	} else{
		menu.style.display = "block";
	}
});
