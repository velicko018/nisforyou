function ClearAll() {
	
	var element = document.getElementById("sadrzaj");
	if(!element) throw "Host does not exist.";
	
	var list= element.children;
	var i = 0;
	while (i<list.length)
	{
		element.removeChild(element.childNodes[i]);
		i++;
	}
}
function Reg()
{
	var x = document.getElementById('regform');
	x.style.display="block";
	var y =document.getElementById('regbtn');
	y.style.display="none";
}
var loged=0;
function Login(uname,lng)
{
        if(loged==0)
        {
            var acc = document.getElementById('login1');
            acc.innerHTML=uname;
            var lbtn = document.getElementById('lbtn');
            lbtn.innerHTML = "Log out";
            loged=1;
        }
        else
        {
            loged=0;
            var acc = document.getElementById('login1');
            if(lng=="eng")
            acc.innerHTML="Account";
            if(lng=="srb")
            acc.innerHTML="Nalog";
            var lbtn = document.getElementById('lbtn');
            lbtn.innerHTML = "Log in";
        }
        
        
        

}
function clearEvent()
{
	var cont=document.getElementById("sadrzaj");
	cont.removeChild(cont.firstChild);
}
function sports()
{
	
	var sport = new SportScript(document.getElementById("sadrzaj"));
}

function Background()
{
    document.body.style.backgroundImage = url('https://images.unsplash.com/photo-1458400411386-5ae465c4e57e?crop=entropy&fit=crop&fm=jpg&h=625&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=1375');
}
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

$(window).on('beforeunload', function() {
    $(window).scrollTop(0);
});