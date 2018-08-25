function Promeni(arg)
{
   Sakrij();
    
    if(arg!='')
    {
        var div = document.getElementById(arg);
        div.style.display = "block";
    }
}
function Sakrij()
{
    var sadrzaj = document.getElementById("skriveni");
    if (sadrzaj.hasChildNodes()) 
    {
        // So, first we check if the object is not empty, if the object has child nodes
        var children = sadrzaj.childNodes;

        for (var i = 0; i < children.length; i++)
        {
            if(children[i].style) 
            {
                children[i].style.display = 'none';
            }
        }
    } 
}
function dodaj_u_tabelu()
{
    var pozicija = document.getElementById('pozicija');
    var cena = document.getElementById('cena');
    var tabela = document.getElementById('tabela_pozicija');
    var red = document.createElement('tr');

    var brojac = document.getElementById('brojac_za_pozicije');
    var broj = parseInt(brojac.value);
    brojac.value = broj+2;

    var p = document.createElement('td');
    p.innerHTML = pozicija.value;
    var ip = document.createElement('input');
    ip.type = 'hidden';
    ip.name = broj;
    ip.value = pozicija.value;
    red.appendChild(ip);
    red.appendChild(p);

    var c = document.createElement('td');
    c.innerHTML = cena.value;
    var ic = document.createElement('input');
    ic.type = 'hidden';
    ic.name = broj+1;
    ic.value = cena.value;
    red.appendChild(ic);
    red.appendChild(c);

    tabela.appendChild(red);
}

