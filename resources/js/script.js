let header = document.querySelector('#header')


setTimeout(function(){ header.classList.add("header_2"); }, 3000);

$('#blogCarousel').carousel({
    interval: 5000
});


let semaforo = document.querySelectorAll('.semaforo')

semaforo.forEach(e =>{
	console.log(e.innerHTML); 
	if(e.innerHTML == "VERY_UNLIKELY" || e.innerHTML == "UNLIKELY"){
		e.innerHTML="<i class='fas fa-thumbs-up' style='color:green'></i>"
	}
	else if	(e.innerHTML == "POSSIBLE"){
		e.innerHTML="<i class='fas fa-circle' style='color:yellow'></i>"
	}

	else if(e.innerHTML == "VERY_LIKELY" || e.innerHTML == "LIKELY"){
		e.innerHTML="<i class='fas fa-thumb-down' style='color:red'></i>"
	}
})