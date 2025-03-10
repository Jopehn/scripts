class Punto{
	constructor(x, y){
		this.x=x;
		this.y=y;
	}
	dist(p){
		var dist1=this.x-p.x;
		var dist2=this.y-p.y;
		return Math.sqrt(dist1**2+dist2**2);
	}
}
export default Punto;