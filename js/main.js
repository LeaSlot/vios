let menuactief = false;
let menuactiefafdelingen = false;

function mobielmenu() {
	var klapmenu = document.getElementById('uitklapmenu1');
	if (menuactief == false){
		klapmenu.style.display = 'block';
		menuactief = true
	}
	else{
		klapmenu.style.display = 'none';
		menuactief = false
	}
}

function afdelingenmobiel(){
	if (window.innerWidth <= 750) {
		var klapmenuafdeling = document.getElementById("afdeling2");
		if (menuactiefafdelingen == false){
			klapmenuafdeling.style.display = 'block';
			menuactiefafdelingen = true
		}
		else{
			klapmenuafdeling.style.display = 'none';
			menuactiefafdelingen = false
		}
	}
}

function naargroot () {
	var klapmenu = document.getElementById('uitklapmenu1');
	klapmenu.style.display = '';
	menuactief = false;
	var klapmenuafdeling = document.getElementById("afdeling2");
	klapmenuafdeling.style.display = '';
	menuactiefafdelingen = false
}

window.addEventListener('resize', function() {
	if (window.innerWidth >= 750) {
		naargroot()
	}
})