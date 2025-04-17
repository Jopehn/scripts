Notification.requestPermission().then(function(res){
    console.log(res);
});
const celdas=document.querySelectorAll(".celda");
const mensaje=document.getElementById("mensaje");
const grilla=document.getElementById("grilla");
const botonIniciar=document.getElementById("botonIniciar");
const botonReiniciar=document.getElementById("botonReiniciar");
const inputJugador1=document.getElementById("jugador1");
const inputJugador2=document.getElementById("jugador2");
let nombresJugadores=['', ''];
let turnoJugador=1;// 1 para Jugador 1, 2 para Jugador 2
let juegoActivo=false;
let tablero=['', '', '', '', '', '', '', '', ''];
const combinacionesGanadoras=[
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6]
];

onload=()=>{
    inputJugador1.value='';
    inputJugador2.value='';
}
function manejarClickCelda(index){
    if(tablero[index]!== '' || !juegoActivo){
        return;
    }
    const simbolo=turnoJugador === 1 ? 'X' : 'O';
    const clase=turnoJugador===1? 'cruz': 'anillo';
    tablero[index]=simbolo;
    // celdas[index].classList.add(clase);
    celdas[index].innerHTML=`<div class="${clase}"></div>`;
    if (verificarGanador()) {
        mensaje.textContent=`¡${nombresJugadores[turnoJugador-1]} (${simbolo} ha ganado)!`;
        juegoActivo=false;
        return;
    }
    if (tablero.every((celda) => celda !== '')) {
        mensaje.textContent='¡Es un empate!';
        juegoActivo=false;
        return;
    }
    turnoJugador=turnoJugador === 1 ? 2 : 1;
    mensaje.textContent=`Turno de ${nombresJugadores[turnoJugador-1]} (${turnoJugador=== 1 ? 'X' : 'O'})`;
}
function verificarGanador() {
    return combinacionesGanadoras.some((combinacion) => {
        return combinacion.every((index) => {
            return tablero[index] === (turnoJugador === 1 ? 'X' : 'O');
        });
    });
}
function reiniciarJuego(){
    turnoJugador=1;
    juegoActivo=true;
    tablero=['', '', '', '', '', '', '', '', ''];
    celdas.forEach((celda) => {
        // celda.classList.remove('cruz', 'anillo');
        celda.innerHTML='';
    });
    grilla.classList.remove('grid');
    grilla.classList.add('oculto');
    botonReiniciar.classList.remove('block');
    botonReiniciar.classList.add('oculto');
    document.querySelector('.entrada-nombres').classList.remove('oculto');
    inputJugador1.value='';
    inputJugador2.value='';
    mensaje.textContent='';
    notificame('Ta te ti', 'El juego ha sido reiniciado');
}
function notificame(titulo, mensaje) {
    if (! ('Notification' in window)) {
        alert('Este navegador no soporta notificaciones.');
        console.log('Este navegador no soporta notificaciones.');
    }else if(Notification.permission === 'granted') {
        var notificacion = new Notification(titulo, {
            body: mensaje
        });
        setTimeout(notificacion.close.bind(notificacion), 5000);
    }
}
botonIniciar.addEventListener('click', () => {
    const nombre1=inputJugador1.value.trim();
    const nombre2=inputJugador2.value.trim();
    if (!nombre1 || !nombre2) {
        mensaje.textContent='Por favor, ingresa los nombres de ambos jugadores.';
        return;
    }
    nombresJugadores=[nombre1, nombre2];
    mensaje.textContent=`Turno de ${nombresJugadores[0]} (X)`;
    juegoActivo=true;
    document.querySelector('.entrada-nombres').classList.add('oculto');
    grilla.classList.remove('oculto');
    grilla.classList.add('grid');
    botonReiniciar.classList.remove('oculto');
    botonReiniciar.classList.add('block');
});
botonReiniciar.addEventListener('click', reiniciarJuego);
celdas.forEach((celda, index) => {
    celda.addEventListener('click', () => manejarClickCelda(index));
});