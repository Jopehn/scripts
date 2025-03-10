function promedio(list) {
	let n=list.length;
	let suma=0;
	for (var i = 0; i < list.length; i++) {
		suma+=list[i];
	}
	return suma/n;
}
function desv_est(list) {
	let n=list.length;
	let prom=promedio(list);
	let suma=0;
	for (var i = 0; i < list.length; i++) {
		suma+=(list[i]-prom)**2;
	}
	return Math.sqrt(suma/n);
}
function varianza(list) {
	let n=list.length;
	let prom=promedio(list);
	let suma=0;
	for (var i = 0; i < list.length; i++) {
		suma+=(list[i]-prom)**2;
	}
	return Math.sqrt(suma/(n-1));
}

export {promedio, desv_est, varianza};