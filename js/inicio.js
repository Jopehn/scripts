const demo=document.getElementById('demo');

setInterval(obtenerHora, 1000);

function obtenerHora() {
	const months=['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
	const days=['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
	const d=new Date();
	demo.innerHTML=`${days[d.getDay()]} ${d.getDate()} de ${months[d.getMonth()]}, ${d.getFullYear()}: ${d.getHours()}:${d.getMinutes()}`;
}
