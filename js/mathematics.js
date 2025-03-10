const sqr=(num)=>{
	return num*num;
}
const fact=(num)=>{
	let f=1;
	for (var i = 2; i <= num; i++) {
		f*=i;
	}
	return f;
}

export {sqr, fact};