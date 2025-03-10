class Quad{
	constructor(a, b, c){
		this.a=a;
		this.b=b;
		this.c=c;
	}
	dist(){
		return (this.b**2)-4*this.a*this.c;
	}
}
export default Quad;