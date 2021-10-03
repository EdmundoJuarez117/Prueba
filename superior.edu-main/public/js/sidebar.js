
let Sidebar = {
	sidebarAction: () => {
		if(document.getElementById("mySidebar").style.display == 'none'){
			Sidebar.open();
		}else{
			Sidebar.close();
		}
	},

	open: () => {

		if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))
		{// true for mobile device
			document.getElementById("main").style.marginLeft = "30%";
			document.getElementById("mySidebar").style.width = "70%";
			document.getElementById("overlay").style.display = "block";

		}else{ // false for not mobile device
			document.getElementById("main").style.marginLeft = "15%";
			document.getElementById("mySidebar").style.width = "15%";
		}

		document.getElementById("mySidebar").style.display = "block";
	},

	close: () => {
		document.getElementById("main").style.marginLeft = "0%";
		document.getElementById("mySidebar").style.display = "none";
		document.getElementById("overlay").style.display = "none";
	}
};

// (function() {
// })();
window.addEventListener("DOMContentLoaded", () => {

	Sidebar.open();

	let el = document.getElementById('overlay');
	let btn = document.getElementById('btnSidebar');

	el.addEventListener('click', () => {
		if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))
		{// true for mobile device
			Sidebar.close();
		}
	});

	btn.addEventListener('click', () => {
		Sidebar.sidebarAction();
	});

});
