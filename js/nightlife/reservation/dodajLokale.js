$(document).ready(function()
    {
        var lng = $("#lng option:selected").text();
        if(lng == "SRB")
        {
            var sedenjeKafic = ['Šank', 'Barski sto', 'Nisko sedenje'];
            var sedenjeKlub = ['Šank', 'Barski sto', 'Separe', 'Pult', 'Visoko sedenje'];
            var sedenjeKafana = ['Kafanski sto'];
            var sedenjePivnica = ['Nisko sedenje', 'Šank', 'Barski sto'];
            var klubovi = ["Scena", "Sunset", "Simphony", "Process", "Loco", "Diamond", "Vavilon", "Cubo", "Ypsilon", "Clinica"];
            var kafane = ['Stara Srbija', 'Galija', 'Skadarlija', 'Mrak', 'Čitaonica', 'Nišlijska mehana'];
            var kafici = ['Pleasure', 'Bla Bla', 'Vespa', 'Liv', 'Lagano', 'Konstantin', 'Flo', 'Na Ćošku','Truba'];
            var pivnice = ['Berta', 'Beer Book', 'Ministarstvo', 'Irish Pub', 'Nemir', 'Beer Garden', 'Labeerint'];
        }
        else
        {
            var sedenjeKafic = ['Bar', 'Pub table', 'Short bar stools'];
            var sedenjeKlub = ['Bar', 'Pub table', 'VIP', 'Desk', 'Long bar stools'];  
            var sedenjeKafana = ['Tavern table'];
            var sedenjePivnica = ['Short bar stools', 'Bar', 'Pub table'];
            var klubovi = ["Scena", "Sunset", "Simphony", "Process", "Loco", "Diamond", "Vavilon", "Cubo", "Ypsilon", "Clinica"];
            var kafane = ['Stara Srbija', 'Galija', 'Skadarlija', 'Mrak', 'Čitaonica', 'Nišlijska mehana'];
            var kafici = ['Pleasure', 'Bla Bla', 'Vespa', 'Liv', 'Lagano', 'Konstantin', 'Flo', 'Na Ćošku','Truba'];
            var pivnice = ['Berta', 'Beer Book', 'Ministarstvo', 'Irish Pub', 'Nemir', 'Beer Garden', 'Labeerint'];
        }
        
        
        
        $('#tiplokalaf').change(function () 
        {


            var tiplokala = $("#tiplokalaf option:selected").text();
            if(tiplokala == "Klubovi"||tiplokala == "Clubs")
            {
                var lokal = document.getElementById("lokal");
                $("#lokal").empty();
                
                
                for(i = 0; i<klubovi.length;i++)
                {
                    var noviLokal = document.createElement("OPTION");
                    noviLokal.innerHTML = klubovi[i];
                    lokal.appendChild(noviLokal);
                }
                var mesto = document.getElementById("tipsedenja");
                $("#tipsedenja").empty();
                for(var j = 0; j<sedenjeKlub.length;j++)
                {
                    var noviSto = document.createElement("OPTION");
                    noviSto.innerHTML = sedenjeKlub[j];
                    mesto.appendChild(noviSto);
                }
                
            }
            else if(tiplokala == "Kafane" || tiplokala == "Taverns")
            {
                var lokal = document.getElementById("lokal");
                $("#lokal").empty();
                
                for(var i = 0; i<kafane.length;i++)
                {
                    var noviLokal = document.createElement("OPTION");
                    noviLokal.innerHTML = kafane[i];
                    lokal.appendChild(noviLokal);
                    var mesto = document.getElementById("tipsedenja");
                }
                $("#tipsedenja").empty();
                for(var j = 0; j<sedenjeKafana.length;j++)
                {
                    var noviSto = document.createElement("OPTION");
                    noviSto.innerHTML = sedenjeKafana[j];
                    mesto.appendChild(noviSto);
                }
                
            }
            else if(tiplokala == "Kafići"||tiplokala == "Cafe")
            {
                var lokal = document.getElementById("lokal");
                $("#lokal").empty();
                
                for(var i = 0; i<kafici.length;i++)
                {
                    var noviLokal = document.createElement("OPTION");
                    noviLokal.innerHTML = kafici[i];
                    lokal.appendChild(noviLokal);
                }
                var mesto = document.getElementById("tipsedenja");
                $("#tipsedenja").empty();
                for(var j = 0; j<sedenjeKafic.length;j++)
                {
                    var noviSto = document.createElement("OPTION");
                    noviSto.innerHTML = sedenjeKafic[j];
                    mesto.appendChild(noviSto);
                }
            }
            else if(tiplokala == "Pivnice" ||tiplokala == "Pubs")
            {
                var lokal = document.getElementById("lokal");
                $("#lokal").empty();
                
                for(var i = 0; i<pivnice.length;i++)
                {
                    var noviLokal = document.createElement("OPTION");
                    noviLokal.innerHTML = pivnice[i];
                    lokal.appendChild(noviLokal);
                }
                var mesto = document.getElementById("tipsedenja");
                $("#tipsedenja").empty();
                for(var j = 0; j<sedenjePivnica.length;j++)
                {
                    var noviSto = document.createElement("OPTION");
                    noviSto.innerHTML = sedenjePivnica[j];
                    mesto.appendChild(noviSto);
                }
            }
            else
            {
                $("#lokal").empty();
                $("#tipsedenja").empty();
            }
        });

});