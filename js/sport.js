function SportskoMesto(naziv,slika,opis)
{
	this.naziv=naziv;
	this.slika=slika;
	this.opis=opis;	
}
function SportScript(host) 
{
	if(!host) throw "Host does not exist!";
	
	this.sports=[];
	
	var self=this;
	
	this.Add = function(naziv,slika,opis) 
	{
		self.sports.push(new SportskoMesto(naziv,slika,opis));
	}
		self.sports.push(new SportskoMesto("Hala Cair","http://s17.postimg.org/mlt1y8k2n/559241_10151150188124880_1302015671_n.jpg",""));
		self.sports.push(new SportskoMesto("Stadion Cair","http://sccair.rs/wp-content/uploads/2015/12/nasstad-1024x768.jpg",""));
	
		var cont=document.getElementById("sadrzaj");
		alert(cont.children.length);
		cont.removeChild(cont.firstChild);
	    cont=document.getElementById("sadrzaj");
		cont.removeChild(cont.firstChild);
		
		
		cont = document.createElement('div');
		cont.className="container";
		host.appendChild(cont);
		
		var row=document.createElement('div');
		row.className="row";
		cont.appendChild(row);
		
		
		var box =document.createElement('div');
		box.className="box";
		row.appendChild(box);
		
		for(var i=0;i<self.sports.length;i++)
		{
			var tmp = document.createElement('div');
			tmp.className="col-sm-4 text-center";
			box.appendChild(tmp); 
			
			var img = document.createElement('img');
			tmp.appendChild(img);
			img.src=self.sports[i].slika;
			img.className = "img-responsive";
			
			var name = document.createElement('h3');
			name.innerHTML = self.sports[i].naziv;
			tmp.appendChild(name);
		}	
}