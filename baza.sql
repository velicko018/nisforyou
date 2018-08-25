create schema nisforyou
	DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

use nisforyou;

CREATE TABLE User (
username varchar(30)  PRIMARY KEY,
password varchar(30) NOT NULL,
name VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
address varchar(50) NOT NULL,
telephone varchar(50) NOT NULL,
birthyear int,
reg_date date,
admin bool
);

CREATE TABLE DOGADJAJ	
(
	id int not null auto_increment primary key,
	ime varchar (100),
    datum Date,
    vreme time,
    mesto varchar(50),
    tip varchar (30),
    podtip varchar (30)
);
alter table dogadjaj
add opis_eng varchar(5000);

create table pozicija
(
	idd int not null auto_increment primary key,
	id varchar(64),
    cena varchar(64),
    valuta varchar (3),
    mesto varchar (30)
);
ALTER TABLE DOGADJAJ
ADD slika varchar(1000);
ALTER TABLE DOGADJAJ
ADD opis varchar(3000);
ALTER TABLE DOGADJAJ
ADD end_date Date;
ALTER TABLE DOGADJAJ
ADD tag varchar(50);
ALTER TABLE DOGADJAJ
ADD videourl varchar(500);

create table rateing
(
	idd int auto_increment  primary key,
    id int,
    username varchar(50),
    ocena int
);
create table komentariEvents
(
	idd int auto_increment primary key,
    id int,
    username varchar(50),
    komentar varchar(500)
);



create table Lokal
(
    idres int not null auto_increment primary key,
    ime varchar(50),
    adresa varchar(100),
    ocena int,
    opis varchar(1000),
    mail varchar(70),
    slika varchar(1000)
);
create table Hrana
(
    idhrana int not null auto_increment primary key,
    idres int,
    ime varchar(150),
    opis varchar(500),
    cena int,
    slika varchar(1000)
);
alter table Hrana add constraint idres_FK foreign key(idres) references Lokal(idres);
create table tipLokala
(
idlokala int,
tip varchar(20)
);
alter table tipLokala add primary key(idlokala, tip);


INSERT INTO `lokal` (`idres`, `ime`, `adresa`, `ocena`, `opis`, `mail`, `slika`) VALUES
(1, 'Night & Day', 'Pobedina 31', 4.3, 'Restoran picerija Night & Day', 'nigthandday@hotmail.com', 'images/food/nightnday.png'),
(2, 'Cluzzo', 'Obrenoviceva 31', 4.5, 'Jedite kod nas!', 'cluzzonis@hotmail.com', 'images/food/kluzzo.jpg'),
(4, 'La Strega', 'Nikole Pašica 1', 0, 'Veliki izbor italijanskih specijaliteta, pica, pasti, sendvica.', 'lastrega@gmail.com', 'images/food/la strega.jpg'),
(5, 'Venis', 'Nikole Pašica 34', 0, 'Srpska hrana, sendvici palacinke', 'venisnis@gmail.com', 'images/food/venis.jpg'),
(7, 'Geppetto', 'Trg Svetog Save 5', 0, 'Geppetto vam nudi veliki izbor pica, sendvica, pasti, palacinki.', 'geppeto-pizza-nis@hotmail.com', 'images/food/geppetto.jpg'),
(8, 'Galija', 'Nikole Pašica 35', 0, 'Kafana Galija', 'galijakafanani@gmail.com', 'images/food/galija.jpg');
INSERT INTO `nisforyou`.`tiplokala` (`idlokala`, `tip`) VALUES ('4', 'brza hrana');
INSERT INTO `nisforyou`.`tiplokala` (`idlokala`, `tip`) VALUES ('5', 'brza hrana');
INSERT INTO `nisforyou`.`tiplokala` (`idlokala`, `tip`) VALUES ('7', 'brza hrana');
INSERT INTO `nisforyou`.`tiplokala` (`idlokala`, `tip`) VALUES ('8', 'kafana');

INSERT INTO `dogadjaj` VALUES (2,'Radnički - Crvena Zvezda','2016-06-13','19:00:00','Stadion Čair','sport','Fudbal','images/events/sport/radnicki-zvezda.jpg','Niški Radnički jedan je od samo dva tima koji su ove sezone \"otkinuli\" Crvenoj zvezdi bodove. Novu šansu za to imaće u nedelju, na svom Čairu. Domaćin je spreman za dolazak velikog rivala i dočekuje ga visokom četvrtom mestu tabele, sa dva boda manje od drugoplasiranog Borca i jednim manje od Čukaričkog, koji je treći. Prvi pratilac Radničkog je Partizan, branilac titule, sa dva poena manje. \"Očekuje nas lepa i značajna utakmica. S jedne strane teška, jer dolazi protivnik koji je prvi na tabeli, a sa druge strane laka, jer Radnički na ovoj utakmici može puno toga da dobije. Okrenuti smo pre svega sebi i tome šta ćemo ponuditi, šta ćemo prikazati i na koji način ćemo to proizvesti\", rekao je mladi trener Radničkog u najavi utakmice.','2016-06-13','radnicki crvena zvezda','http://www.mozzartsport.com/uzivo-prenosi'),(3,'S.A.R.S','2016-06-05','21:00:00','Tvrđava','muzika','Koncert','images/events/muzika/sars.jpg','Beogradski bend S.A.R.S. slavi deset godina rada, a u okviru obeležavanja ovog velikog jubileja održaće koncert 4. juna u rovu niške Tvrđave. Bend S.A.R.S. je do danas uz 6 albuma izdao i 19 spotova, od kojih većina ima po nekoliko miliona pregleda, a među najpopularnijima su \"Lutka\", \"Perspektiva\", \"To rade\", \"Ratujemo ti i ja\". Pretprodaja karata za koncert u Nišu počinje 25. aprila na svim gigstix i eventim prodajnim mestima, kao i u lokalnim šopovima u Nišu. Kao predgupa S.A.R.S-u u rovu niške Tvrđave nastupiće sastav Proces iz Niša. Ovaj ska/rege/pank bend iza sebe ima dva studijska albuma, i od 1995. svira na svim značajnijim festivalima u Srbiji i regionu.','2016-06-05','sars tvrdjava koncert','https://www.youtube.com/v/fOg7mj1_-sk'),(4,'Nišville','2016-08-11','00:00:00','Tvrđava','muzika','Festival','images/events/muzika/nisville.jpg','Internacionalni Nišvil džez festival - najposećeniji džez festival jugoistočne Evrope, od samog osnivanja 1995.godine dosledno brani evropske vrednosti multikulturalnosti i strpljivo neguje muzički ukus pojedinaca. Potvrda toga je i veliki tekst o festivalu \"Nišvil - evropsko lice Srbije\" (\"Nišville - European face of Serbia\") objavljen u glasilu Evropske unije, magazinu \"New Europe\" koji izlazi u Briselu. Glavni program festivala održava se na otvorenom prostoru Platoa niške Tvrđave, na dve bine Earth i Sky, a mnogi kvalitetni domaći i strani izvođači nastupaju na stejdževima koji su besplatni za publiku: River, Open, Movie, Matine, Welcome, Youth i Jam Session stejdž. Možete se prijaviti za volontiranje na Nišville-u.','2016-08-14','nisvil nisville tvrdjava','https://www.youtube.com/v/7aOH39IZe0s'),(5,'Dubioza kolektiv','2016-08-30','22:00:00','tvrdjava','muzika','koncert','images/events/muzika/dubioza.jpg','Popularni sastav iz Bosne i Hercegovine, Dubioza Kolektiv, održaće koncert u Nišu u subotu 30. avgusta. U niškoj Tvrđavi će, kao domaća podrška, nastupiti bend Stereo Banana, a publici će se predstaviti i Mad Red iz Novog Sada, S.K.A. iz Leskovca, kao i Cooby Selecta, takođe iz Leskovca.  Prodajna mesta:      Niš – Tradicionalni niški prodavac karata kod bioskopa Vilin Grad, Happy House , Oskar Kafeterija, Gnezdo, Every Day Caffe, Flo Cafe, Clock Travel, Hedonist Cafe, Koloss Caffe.','2016-08-30','dubioza kolektiv ','https://www.youtube.com/v/FZZJeMKJV3M'),(33,'Hladno pivo','2016-08-27','21:00:00','rovovi niške tvrđave','muzika','Koncert','images/events/muzika/hladnopivo.jpg','Najbolji hrvatski bend konačno dolazi u Niš. Interesovanje je veliko zato požurite da što pre obezbedite sebi karte.','2016-08-27','hladno pivo rov niske tvrdjava rock muzika koncert','https://www.youtube.com/v/KXwBhrMnsic'),(34,'Radnički - Partizan','2016-07-15','19:00:00','Stadion Čair','sport','Fudbal','images/events/sport/partizan-radnicki.jpg','Fudbaleri Partizana i Radničkog iz Niša u nedelju od 19 časova igraće drugu utakmicu u samo nekoliko dana. Trener Partizana Ivan Tomić ocenio je da će predstojeća utakmica biti težak ispit za njegove fudbalere, ali nada se da će plasman na tabeli biti bolji nakon gostovanja u Nišu. \"Pred nama je težak ispit, ali cilj je da pokušamo da repriziramo nivo igre i rezultat iz prethodne utakmice i na pravi način se vratimo za Beograd. Očekuje nas izuzetno teška i zahtevna utakmica, motivisan protivnik koji beleži dobre rezultate. Pokušaćemo da budemo na visini zadatka\", rekao je Tomić na konferenciji za novinare. ','2016-07-15','partizan radnicki stadion cair fudbal','http://www.mozzartsport.com/uzivo-prenosi');

INSERT INTO `pozicija` VALUES (1,'1','200','RSD','jug'),(2,'1','200','RSD','sever'),(3,'1','400','RSD','istok'),(4,'1','400','RSD','zapad'),(5,'3','500','RSD','parter'),(6,'3','1000','RSD','fanpit'),(7,'2','200','RSD','jug'),(8,'2','200','RSD','sever'),(9,'2','400','RSD','istok'),(10,'2','400','RSD','zapad'),(11,'4','1200','RSD','parter'),(12,'4','1800','RSD','VIP Tribina'),(13,'4','2500','RSD','komplet'),(16,'33','800','RSD','fanpit'),(17,'33','500','RSD','parter'),(18,'34','300','RSD','sever'),(19,'34','300','RSD','jug'),(20,'34','600','RSD','istok'),(21,'34','600','RSD','zapad');

CREATE TABLE korisnikUsliga
(
	id int not null primary key,
    tip bool,
    username varchar(30),
    password varchar(50)
);
create table naruceneKarte
(
	id_narudzbine int primary key not null auto_increment,
	username_narucioca varchar(100),
    id_dogadjaja int,
    pozicija varchar(50),
    cena int
);
alter table naruceneKarte
add kolicina int;
INSERT INTO `nllokali` (`idres`, `ime`, `adresa`, `ocena`, `opis`, `gmaps`, `slika`, `tip`, `telefon`, `tag`, `info`, `slajd`) VALUES
(1, 'Scena', 'Sinđelićev trg', 4, '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2440.9063080955075!2d21.897417751517192!3d43.31963600914087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b728c937f1%3A0xa5847df81f609354!2z0KHRhtC10L3QsCDQmtC70YPQsQ!5e0!3m2!1ssr!2srs!4v1464127686511', 'images/nightlife/scena.jpg', 'Club', '064 1218121', 'scena klub club provod nocni zivot nocnizivot', NULL, NULL),
(2, 'Stara Srbija', 'Trg Republike 12', NULL, 'Kafana Stara Srbija je retka kafana i građevina za koju se može reći da je simbol grada,\r\n                                    sa svojom dugom tradicijom preko od preko 120. godina. Preko svojih kariranih stoljnjaka\r\n                                    „preturila“ je štošta i ispisala istoriju kako grada Niša tako i Srbije. Stara Srbija se nalazi u starom trgovačkom delu grada na mestu gde je nekada bio\r\n                                    “karavan saraj”. Mesto u kome su se okupljali zanatlije ali i državnici\r\n                                    mirno je i danas idealno za porodične i poslovne ručkove.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2902.851199589852!2d21.89439971490875!3d43.31737428210022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b1a99f0ab5%3A0x2dd55ad3f9c49924!2z0KHRgtCw0YDQsCDQodGA0LHQuNGY0LA!5e0!3m2!1ssr!2srs!4v1464132703037', 'images/nightlife/starasrbija.jpg', 'tavern', '018 521902', NULL, NULL, NULL),
(3, 'Sunset', 'Cara Dušana 47a', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d513.153247384481!2d21.89893020323521!3d43.31775256172781!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x3b04705bdc3280d2!2sSunset+Club!5e0!3m2!1ssr!2srs!4v1464133213228', 'images/nightlife/sunset.jpg', 'club', '061 2979299', NULL, NULL, NULL),
(4, 'Galija', 'Nikole Pašića 35', NULL, 'Kafana Galija jedna je od starih kafana u gradu s veoma dugom tradicijom. „Galija“ ne menja ni vreme ni mesto. Živi.\r\n                                    U njoj su mnogi imali svoje mesto. Dolazili su glumci, pisci, novinari, ugledni majstori i ostala elita prošlih vremena.\r\n                                    „Galija“ se i danas trudi da bude mesto u kome se okuplja elita, sklapaju  poslovna prijateljstva i saradnje i u tome uspeva.\r\n                                    O kvalitetu hrane i usluge nećemo ni da govorimo, najbolje je da dođete i uverite se sami.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d684.9742982692302!2d21.89568880596442!3d43.31802907046845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xe89499d1088e33d1!2z0JPQsNC70LjRmNCw!5e0!3m2!1ssr!2srs!4v1464133622140', 'images/nightlife/galija.jpg', 'tavern', '018 515626', NULL, NULL, NULL),
(5, 'Symphony', 'Generala Milojka Lešjanina 16', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d484.3291550259812!2d21.89334021425992!3d43.32064043559212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x6a258f5d55001d53!2z0KHQuNC80YTQvtC90LjRmNGB0LrQuCDQvtGA0LrQtdGB0YLQsNGA!5e0!3m2!1ssr!2srs!4v1464133442787', 'images/nightlife/symphony.jpg', 'club', '060 4924292', NULL, NULL, NULL),
(6, 'Process', 'Sedmog Jula 6', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1451.3026854861637!2d21.89698378440136!3d43.322519839874104!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x050fcc444d1b77fb!2sProcess+-+VIP+Bar!5e0!3m2!1sen!2sus!4v1464134737024', 'images/nightlife/process.jpg', 'club', '064 8899778', NULL, NULL, NULL),
(7, 'Lo-Co', 'Kej Kolo Srpskih Sestara BB', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1451.2967499323997!2d21.895609281089772!3d43.32276830736893!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xa52c729e8917cc56!2sLo+Co+Tropic+Open+Bar!5e0!3m2!1sen!2sus!4v1464134402402', 'images/nightlife/loco.jpg', 'club', '063 461506', NULL, NULL, NULL),
(8, 'Berta', 'Cara Dušana 73', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d513.150487371535!2d21.902106013283547!3d43.318079377083905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x7cbe482a291dd31b!2sPivnica+Berta!5e0!3m2!1sen!2sus!4v1464144489040', 'images/nightlife/berta.jpg', 'pub', NULL, NULL, NULL, NULL),
(9, 'Beer Book', 'Cara Dušana 98', NULL, 'Beer Book je najnovija pivnica u gradu, otvorena avgusta 2015. godine. U moderno dizajniranom ambijentu ove\r\n                                    pivnice možete probati preko 30 vrsta piva. Nažalost, hrana (još uvek) nije u ponudi tako da ćete svoju glad\r\n                                    morati da utolite na nekom drugom mestu. Vikendom se u pivnici organizuju svirke niških bendova tako da posetioci mogu uživati u domaćoj i stranoj rok muzici.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d725.706960950969!2d21.90323802920252!3d43.317863174428695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0ba31afc8d5%3A0x94e151b2805df22c!2zRHXFoWFub3ZhIDEwMiwgTmnFoSwgU2VyYmlh!5e0!3m2!1sen!2sus!4v1464144293907', 'images/nightlife/beerbook.jpg', 'pub', '063 7735018 ', NULL, NULL, NULL),
(10, 'Skadarlija', 'Dušanova 46', NULL, 'Jedna od starih kafana u gradu, otvorena još 1977. godine i od tada uspeva da sačuva svoju dušu i boemsku notu.\r\n                                    Ovde su se rađale i gasile mnoge ljubavi, tugovalo se i veselilo. Specijaliteti su jela sa roštilja.\r\n                                    Najpoznatija je po ćevapima i bećarcu (albanskoj salati), koji spadaju možda i u najbolje u gradu.I prizemlje i sprat odišu nekim kafanskim šmekom,\r\n                                    sve je u punom drvetu i kovanom gvožđu, pa iako ste u centru grada možete da se na trenutak opustite i uživate u pravoj seoskoj atmosferi.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d431.4959006415402!2d21.89781411397132!3d43.319558567864085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xff87004dddd135a0!2sTruba+Cafe!5e0!3m2!1sen!2sus!4v1464138282991', 'images/nightlife/skadarlija.jpg', 'tavern', '018 241986', NULL, NULL, NULL),
(11, 'Ministarstvo Beer Bar', 'Vojvode Vuka 12', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m17!1m8!1m3!1d2902.7285299957584!2d21.901651!3d43.319942!3m2!1i1024!2i768!4f13.1!4m6!3e2!4m0!4m3!3m2!1d43.3201208!2d21.9017037!5e0!3m2!1sen!2sus!4v1464142605213', 'images/nightlife/ministarstvo.jpg', 'pub', ' 063 460350 ', NULL, NULL, NULL),
(12, 'Pleasure', 'Kopitareva 7', NULL, 'PLEASURE je mesto stvoreno za one koji vole da uživaju, ljude od stila i ukusa. Nalazimo se na sjajnoj lokaciji u\r\n                                    Kazandžijskom sokačetu u samom srcu Niša. "Pleasure" je osnovan marta 2007. godine.\r\n                                    Ugostiteljski objekat je sastavljen iz tri odvojene sale za usluživanje, ukupne površine 280m2 sa\r\n                                    ukupnim kapacitetom 210 sedećih mesta i kuhinjskim delom sa magacinima na površini od 140m2.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d431.50773012584284!2d21.895175030909325!3d43.31789282432396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x515570fc7de23461!2sPleasure+Club!5e0!3m2!1sen!2sus!4v1464137940579', 'images/nightlife/pleasure.jpg', 'caffe', '018 517551', NULL, NULL, NULL),
(13, 'Diamond', 'Prijezdina 4', NULL, 'Diskoteka Diamond (nekadašnji Studio) najveća je diskoteka u Nišu sa\r\n                                    kapacitetom od 1200 do 1500 ljudi. Prostor je organizovan na dva nivoa\r\n                                    i sadrži devet separea i mnoštvo stolova uz dodatnu VIP galeriju za stalne goste.\r\n                                    Ova diskoteka poznata je po stalnim i ekskluzivnim gostovanjima domaćih pop i folk zvezda.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1451.4401783910957!2d21.894501658056!3d43.31676394628509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x9641c0220a2d3ea6!2sDiskoteka+Diamond!5e0!3m2!1ssr!2srs!4v1464125798509', 'images/nightlife/diamond.jpg', 'club', '064 4277765', NULL, NULL, NULL),
(14, 'Vavilon', 'Nikole Pašića 36 ', NULL, 'Klub Vavilon nalazi se preko puta Kalče, u podrumu zgrade u kojoj su smešteni Sky Caffe i\r\n                                    Bilijar klub Atlantis. Zbog redovnih house žurki koje se prave u toku radne nedelje postao j\r\n                                    e veoma popularan među studentskom populacijom. Vikendi su uglavnom rezervisani za nastupe\r\n                                    niških bendova ili gostovanja regionalnih muzičkih zvezdi.\r\n', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4105.211901144726!2d21.894795680901662!3d43.31796093435183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b3da0c80fb%3A0xf8898be5021da7bf!2z0JrQu9GD0LEgIlZhdmlsb24i!5e0!3m2!1ssr!2srs!4v1464129155299', 'images/nightlife/vavilon.jpg', 'club', '069 4054233', NULL, NULL, NULL),
(15, 'Mrak', 'Bulevar 12. februar BB', NULL, 'Ne tako stara kafana, ušuškana na periferiji grada, koja svoj renome gradi već 15-ak godina. Iako nije u centru, i ne postoji dugo da bi\r\n                                    stari boemi pričali o njoj, i slabiji poznavaoci kafane su čuli za kafanu „Mrak“,\r\n                                    mesto gde je hrana ponajbolja u gradu.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1775.8746852585793!2d21.87021386386713!3d43.34294957017313!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x0e42417ab748eb89!2sKafana+MRAK!5e0!3m2!1sen!2sus!4v1464135089589', 'images/nightlife/mrak.jpg', 'tavern', '018 581234', NULL, NULL, NULL),
(16, 'Cubo', 'Balkanska 2', NULL, 'Cubo klub je jedan od omiljenih klubova niških studenata.\r\n                                    Na repertoaru je uglavnom miks haus muzike i domaćih narodnjaka\r\n                                    sa popularnim folk hitovima nakon ponoći.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d431.48101270296956!2d21.894463130392566!3d43.32165365308235!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xc5652b54e976e6b5!2sCubo+Club!5e0!3m2!1sen!2sus!4v1464135234699', 'images/nightlife/cubo.jpg', 'club', '063 461506', NULL, NULL, NULL),
(17, 'Bla Bla', 'Kopitareva BB', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d725.707531966696!2d21.895650723526767!3d43.31781536373731!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x8129b7f98d5f6adb!2sBla+Bla!5e0!3m2!1sen!2sus!4v1464135431965', 'images/nightlife/blabla.jpg', 'caffe', '018 242111', NULL, NULL, NULL),
(18, 'Vespa', 'Trg Republike 1', NULL, 'Baš tu, u epicentru trusnog kulturnog područja vraća se Nišu gradski šmek ogrnut mods kaputom. Na ovom mestu smešten je\r\n                                    VESPA BAR, vremeplov koji seže u 1946. godinu,\r\n                                    iz koje na put ka večnosti kreće urbani stil života, čiji neuhvatljivi talas nalazi predah upravo u Nišu.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d746.9731145010601!2d21.896517391407876!3d43.31775441363968!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x57a6eee11f23d3ef!2sVespa+Bar!5e0!3m2!1sen!2sus!4v1464135644067', 'images/nightlife/vespa.jpg', 'caffe', '018 305067', NULL, NULL, NULL),
(19, 'Ypsilon', '9. Brigade 6', NULL, 'Club Ypsilon odiše vrlo prijatim okruženjem uvek punim prijatnih i razdraganih gostiju,\r\n                                    kao i ljubaznim i izuzetno uslužnim osobljem. Jedinstveni ambijent i prijatna atmosfera\r\n                                    cine "Club Ypsilon" pravim mestom za opusteni izlazak i prijatan razgovor sa porodicom i prijateljima.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2902.866978988395!2d21.90188831548686!3d43.31704397913415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b14f921bab%3A0x345632c96aa0bedd!2sKLUB+YPSILON!5e0!3m2!1ssr!2srs!4v1464129077673', 'images/nightlife/y.jpg', 'club', '069 4849500', NULL, NULL, NULL),
(20, 'Čitaonica', 'Milentija Popovića BB', NULL, 'Kafana je „mlada“ kao i njen gazda, ali što je za svaku pohvalu uvek je prisutan u kafani i redovno pušta „ture“, pogotovo ako je ekipa opuštena.\r\n                                    Ogromna bašta je definitivno jedan od najjačih aduta ove kafane, jer sam veliki deo leta proveo tamo. Odvojena od grada, saobraćaja,\r\n                                    uz zvuke tambiraša i violine, bila mi je oaza mira ovog leta.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4608.38798159567!2d21.873874003205845!3d43.312114269736654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b7564f9232a1%3A0xd94928bc69ced4!2z0KfQuNGC0LDQvtC90LjRhtCw!5e0!3m2!1sen!2sus!4v1464135925563', 'images/nightlife/citaonica.jpg', 'tavern', '018 264006', NULL, NULL, NULL),
(21, 'Liv', 'Trg Republike 1', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d863.016148809755!2d21.89620811341903!3d43.317844344638694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b105875663%3A0xdb2e57290146ea5e!2sTrg+republike!5e0!3m2!1sen!2sus!4v1464136397315', 'images/nightlife/liv.jpg', 'caffe', '064 6687090', NULL, NULL, NULL),
(22, 'Lagano', 'Trg Republike 3 - 7', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1451.420959237479!2d21.895948900539732!3d43.317568558509834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b1086c9211%3A0x823eddb33262418e!2sCaffe+Lagano!5e0!3m2!1sen!2sus!4v1464136683388', 'images/nightlife/lagano.jpg', 'caffe', '064 8058890', NULL, NULL, NULL),
(23, 'Irish Pub Crazy Horse', 'Davidova 8', NULL, 'Pub je mesto u kome se zadovoljava potreba za zabavom, pićem i razgovorom. Mesto,\r\n                                    koje ne uživa samo kod pivopija kultni status, središte je i društvenog života, kako mladih, tako\r\n                                    i ljudi svih generacija, koji Pab doživljavaju svojom drugom kućom.\r\n                                    Sa jakom željom, da i u Nišu postoji jedno takvo mesto, u centralnom gradskom tkivu novembra 2011.\r\n                                    je počeo sa radom Irish pub Crazy Horse.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2902.635989320035!2d21.891912315487012!3d43.32187897913408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b4594f0a59%3A0x9ed360b31b057600!2sIrish+Pub+Crazy+Horse!5e0!3m2!1ssr!2srs!4v1464142882610', 'images/nightlife/irish.jpg', 'pub', '062 780574', NULL, NULL, NULL),
(24, 'Nislijska Mehana', 'Prvomajska 49', NULL, 'Kafana "Nišlijska Mehana" nalazi se u užem centru Niša i zvanično je počela sa radom 08.03.1996 god.\r\n                                    Već u leto iste godine ,bila je jedan od omiljenih lokala Nišlijama. Vremenom je dostigla status najposećenije\r\n                                    kafane u Nišu. U pravom,domaćinskom ambijentu,kafana raspolaže kapacitetom od 90 mesta i letnjom baštom,čiji je kapacitet  30 mesta.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1776.4737365970534!2d21.9035824298003!3d43.322467941512514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x0b42414feddf5c50!2sNislijska+Mehana!5e0!3m2!1sen!2sus!4v1464143380222', 'images/nightlife/nislijskamehana.jpg', 'tavern', '018 513968', NULL, NULL, NULL),
(25, 'Konstantin', 'Kopitareva 3', NULL, 'Klub sa velikim izborom kafa, čajeva, koktela, alkoholnih i bezalkoholnih pića, slanih i slatkih palčinki, sendviča,\r\n                                    a uvek imamo neka iznenađenja za sve goste. Sami ili u društvu,\r\n                                    uvek ćete se osećati ugodno u prijatnom ambijentu i atmosferi kluba.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d419.2241442983991!2d21.89582489404204!3d43.31780604217818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xa767787fb961d183!2sCaffe+Konstantin!5e0!3m2!1sen!2sus!4v1464137226531', 'images/nightlife/konstantin.jpg', 'caffe', '061 3026744', NULL, NULL, NULL),
(26, 'Flo', 'Kopitareva 11', NULL, '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d431.50773012584284!2d21.895175030909325!3d43.31789282432396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xd09f086bb5a77a5d!2sKaldrma+Caffe!5e0!3m2!1sen!2sus!4v1464137535848', 'images/nightlife/flo.jpg', 'caffe', '065 3980110', NULL, NULL, NULL),
(27, 'Nemir', 'Obilićev Venac 35', NULL, 'Ovo mesto nastavlja tradiciju niških kafea i okupljališta na kojima se sluša dobra muzika,\r\n                                    ispija hladno pivo i prate aktuelni sportski događaji. Pored širokog izbora pića, postoji i kuhinja iz koje možete naručiti pomfrit, ćevape, kobasice i slične stvari sa roštilja koje, pored toga što su ukusne, fenomenalno idu uz pivo.\r\n                                    Veoma pohvalna je i činjenica to što se hrana naplaćuje po gramaži tako da, zavisno od apetita, sami možete odrediti svoju porciju.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1451.4583303809075!2d21.891047!3d43.31600400000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x438fa6f2d26075c1!2z0J3QtdC80LjRgA!5e0!3m2!1sen!2sus!4v1464143091849', 'images/nightlife/nemir.jpg', 'pub', NULL, NULL, NULL, NULL),
(28, 'Na Ćosku', 'Kopitareva 1', NULL, 'Cafe Na Ćošku nalazi se u centru grada, preko puta Gradske opštine, u etno ulici "Kazandžijsko sokače".\r\n                                    Počeo je sa radom 01. juna 2003. godine. Kafić poseduje raznovrsnu ponudu pića, koktela, kolača, i sladoleda. Takodje sadrži i poseban kutak za najmladje.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d498.5448565080338!2d21.895933981025994!3d43.31774250235806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x06cc282037884628!2zTmEgxIZvxaFrdQ!5e0!3m2!1sen!2sus!4v1464136873478', 'images/nightlife/nacosku.jpg', 'caffe', '063 296715', NULL, NULL, NULL),
(29, 'Beer Garden', 'Cara Dušana 41', NULL, 'Beer Garden je pivnica nastala na mestu nekadašnjeg legendarnog Beer House-a. Uz veoma prijatnu baštu i veliki broj drvenih stolova i klupa u lokalu predstavlja najveću pivnicu u Nišu. Nažalost, s obzirom da ima potpisan ekskluzivni ugovor sa Apatinskom pivarom, ne može se pohvaliti velikim izborom piva - na raspolaganju vam je svega pet - šest brendova. Od hrane možete naručiti pomfrit, girice, pileća krilca ili „dasku” - miks narezanih suhomesnatih proizvoda.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d362.8547136234369!2d21.89869260476974!3d43.31765667313643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b0f24deaf1%3A0xecb41591b1696e62!2zRHXFoWFub3ZhIDQxLCBOacWhLCBTZXJiaWE!5e0!3m2!1sen!2sus!4v1464143916859', 'images/nightlife/beergarden.jpg', 'pub', '065 4780857', NULL, NULL, NULL),
(30, 'Clinica', 'Niška tvrdjava 7 - 12', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1451.276490481706!2d21.894812551902124!3d43.32361637716763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ssr!2srs!4v1464134208404', 'images/nightlife/clinica.jpg', 'club', '064 2609277', NULL, NULL, NULL),
(31, 'Truba', 'Svetozara Markovića 8', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d431.4959006415402!2d21.89781411397132!3d43.319558567864085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xff87004dddd135a0!2sTruba+Cafe!5e0!3m2!1sen!2sus!4v1464138282991', 'images/nightlife/truba.jpg', 'caffe', NULL, NULL, NULL, NULL),
(32, 'Labeerint', 'Balkanska 2a', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2902.642095037804!2d21.892387115031127!3d43.32175118181866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b45caa1279%3A0xbb5284d12c8f2fb1!2sBalkanska+2%2C+Ni%C5%A1%2C+Serbia!5e0!3m2!1sen!2sus!4v1464143596263', 'images/nightlife/labeerint.jpg', 'pub', '066 8528004', NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

CREATE TABLE IF NOT EXISTS `nllokali` (
  `idres` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) DEFAULT NULL,
  `adresa` varchar(100) DEFAULT NULL,
  `ocena` double DEFAULT NULL,
  `opis` varchar(1000) DEFAULT NULL,
  `gmaps` varchar(2000) DEFAULT NULL,
  `slika` varchar(1000) DEFAULT NULL,
  `tip` varchar(20) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `tag` varchar(1000) DEFAULT NULL,
  `info` varchar(3000) DEFAULT NULL,
  `slajd` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idres`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

CREATE TABLE IF NOT EXISTS `cenahrana` (
  `idcene` int(11) NOT NULL AUTO_INCREMENT,
  `idhrane` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  PRIMARY KEY (`idcene`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

INSERT INTO `cenahrana` (`idcene`, `idhrane`, `cena`) VALUES
(1, 1, 370),
(2, 2, 400);

CREATE TABLE IF NOT EXISTS `hrana` (
  `idhrana` int(11) NOT NULL AUTO_INCREMENT,
  `idres` int(11) DEFAULT NULL,
  `ime` varchar(150) DEFAULT NULL,
  `opis` varchar(500) DEFAULT NULL,
  `slika` varchar(1000) DEFAULT NULL,
  `tip` varchar(20) NOT NULL,
  PRIMARY KEY (`idhrana`),
  KEY `idres_FK` (`idres`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

ALTER TABLE `hrana`
  ADD CONSTRAINT `idres_FK` FOREIGN KEY (`idres`) REFERENCES `lokal` (`idres`);
  alter table hrana
  add tag varchar(500);
  
  INSERT INTO `hrana` (`idhrana`, `idres`, `ime`, `opis`, `slika`, `tip`) VALUES
(1, 1, 'Pica Frutti di mare', 'Pelat, svež paradajz, plodovi mora, kačkavalj', 'images/food/frutidimare.jpg', 'pica'),
(2, 1, 'Pica Capirccoza', 'Pelat, šunka, pečurke, kačkavalj', 'images/food/kapricoza.jpg', 'pica'),
(3, 1, 'Pica Quattro stagioni', 'Pelat, šunka, pečurke, kulen, slanina, kačkavalj, jaje, svež paradajz', 'images/food/kvatrostadjone.jpg', 'pica'),
(4, 1, 'Pica Margarita', 'Pelat, svež paradajz, kačkavalj', 'images/food/margarita.jpg', 'pica'),
(5, 1, 'Pica Mexicana', 'Pelat, svež paradajz, kulen, kobasica, ljuta paprika, kačkavalj', 'images/food/mexikana.jpg', 'pica'),
(6, 1, 'Pica Quattro formaggi', 'Pelat, gauda, gorgonzola, kačkavalj', 'images/food/quatrofomadji.jpg', 'pica'),
(7, 1, 'Pica Vegetariana', 'Pelat, svež paradajz, paprika, šećerac, masline, kačkavalj', 'images/food/vegetariana.jpg', 'pica'),
(8, 1, 'Pasta Bolonjeze', 'Testenina, parmezan, pelat, goveđe meso, šargarepa, luk, bosiljak', 'images/food/bolonjeze.jpg', 'pasta'),
(9, 1, 'Pasta Fungi', 'Testenina, neutralna pavlaka, začin, parmezan, pečurke', 'images/food/pastafungi.jpg', 'pasta'),
(10, 1, 'Pasta Napolitana', 'Pelat, svež paradajz, paprika, šećerac, masline, kačkavalj', 'images/food/pastatreca.jpg', 'pasta'),
(11, 2, 'Pica Capriccoza', 'Pelat, šunka, pečurke, kačkavalj', 'images/food/kapricoza.jpg', 'pica'),
(12, 2, 'Pica Margarita', 'Pelat, svež paradajz, kačkavalj', 'images/food/margarita.jpg', 'pica'),
(13, 2, 'Pasta Bologneze', 'Testenina, parmezan, pelat, goveđe meso, šargarepa, luk, bosiljak', 'images/food/bolonjeze.jpg', 'pasta'),
(14, 2, 'Tost Krem', 'Lepinja, krem', 'images/food/tost.jpg', 'tost'),
(15, 2, 'Tost Šunka, kačkavalj', 'Lepinja, šunka, kačkavalj', 'images/food/tost2.jpg', 'tost'),
(16, 2, 'Tost Pečenica, kačkavalj', 'Lepinja, pečenica, kačkavalj', 'images/food/tost3.jpg', 'tost'),
(17, 4, 'Pica Domaća', 'Pelat, kačkavalj, kulen, dimljena slanina, pečurke, dimljeno meso, jaje', 'images/food/domaca.jpg', 'pica'),
(18, 4, 'Pica Frutti di mare', 'Pelat, svež paradajz, plodovi mora, kačkavalj', 'images/food/frutidimare.jpg', 'pica'),
(19, 4, 'Pica Capirccoza', 'Pelat, šunka, pečurke, kačkavalj', 'images/food/kapricoza.jpg', 'pica'),
(20, 4, 'Pica Quattro stagioni', 'Pelat, šunka, pečurke, kulen, slanina, kačkavalj, jaje, svež paradajz', 'images/food/kvatrostadjone.jpg', 'pica'),
(21, 4, 'Pica Margarita', 'Pelat, svež paradajz, kačkavalj', 'images/food/margarita.jpg', 'pica'),
(22, 4, 'Pica Mexicana', 'Pelat, svež paradajz, kulen, kobasica, ljuta paprika, kačkavalj', 'images/food/mexikana.jpg', 'pica'),
(23, 4, 'Pica Vegetariana', 'Pelat, svež paradajz, paprika, šećerac, masline, kačkavalj', 'images/food/vegetariana.jpg', 'pica'),
(24, 4, 'Pasta Bolonjeze', 'Testenina, parmezan, pelat, goveđe meso, šargarepa, luk, bosiljak', 'images/food/bolonjeze.jpg', 'pica'),
(25, 4, 'Tost Krem', 'Lepinja, krem', 'images/food/tost.jpg', 'tost'),
(26, 4, 'Tost Šunka', 'Lepinja, šunka', 'images/food/tost2.jpg', 'tost'),
(27, 4, 'Tost Pečenica, kačkavalj', 'Lepinja, pečenica, kačkavalj', 'images/food/tost3.jpg', 'tost');

/* a=====================================ovo je dodatno==============================================*/
alter table dogadjaj
add organizator varchar(50);

alter table dogadjaj
add url_eventa varchar(500);

UPDATE `nisforyou`.`dogadjaj` SET `organizator`='cair' WHERE `id`='2';
UPDATE `nisforyou`.`dogadjaj` SET `organizator`='eventim' WHERE `id`='3';
UPDATE `nisforyou`.`dogadjaj` SET `organizator`='nisvil' WHERE `id`='4';
UPDATE `nisforyou`.`dogadjaj` SET `organizator`='eventim' WHERE `id`='5';
UPDATE `nisforyou`.`dogadjaj` SET `organizator`='eventim' WHERE `id`='33';
UPDATE `nisforyou`.`dogadjaj` SET `organizator`='cair' WHERE `id`='34';
INSERT INTO `nisforyou`.`dogadjaj` (`ime`, `datum`, `vreme`, `mesto`, `tip`, `podtip`, `slika`, `opis`, `end_date`, `tag`, `videourl`, `organizator`) VALUES ('Bazen Čair', '2016-07-15', '09:00:00', 'Bazen Čair', 'drugo', 'Ulaznice za bazen', 'images/events/drugo/bazenOtvoreni.jpg', 'U sredu 15. juna u 12 sati zvanično počinje rad otvorenih bazena Sportskog centra Čair. Posetiocima će od ovog leta biti na raspologanju NOVI rekreacioni bazen sa 4 tobogana. Ulaz će u sredu biti BESPLATAN, a cena karte ovog leta iznosiće 300 dinara. Novi bazen ima: dva tobogana dužine 70 metara i dva brza od 16 metara; vodeni snopovi; “spora reka” sa gumama; vrela; masažeri i par lepih pečurki sa vizuelnim efektima. Radno vreme bazena radnim danima biće od 11 do 19 sati, dok će se vikendom raditi sat vremena ranije.', '2016-10-01', 'bazen cair čair kupanje brčkanje tobogan sunčanje suncanje', 'https://www.youtube.com/v/6mkyWL4Z7OA', 'cair');

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `narucenahrana` (
  `idnarudzbine` int(11) NOT NULL AUTO_INCREMENT,
  `restoran` varchar(50) NOT NULL,
  `idhrana` int(11) NOT NULL,
  `imehrane` varchar(50) NOT NULL,
  `dostava` varchar(10) NOT NULL,
  `cena` int(11) NOT NULL,
  `dodaci` varchar(150) NOT NULL,
  PRIMARY KEY (`idnarudzbine`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `narucenahrana` (`idnarudzbine`, `restoran`, `idhrana`, `imehrane`, `dostava`, `cena`, `dodaci`) VALUES
(1, 'Night & Day', 1, 'Pica Quattro stagioni', 'narudzbina', 320, 'Jaje');


CREATE TABLE IF NOT EXISTS `dodatak` (
  `iddod` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(40) DEFAULT NULL,
  `cena` int(11) DEFAULT NULL,
  `tiphrane` varchar(100) NOT NULL,
  PRIMARY KEY (`iddod`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `dodatak` (`iddod`, `ime`, `cena`, `tiphrane`) VALUES
(1, 'Kečap', 0, 'pica tost pasta'),
(2, 'Majonez', 0, 'pica tost pasta'),
(3, 'Senf', 10, 'pica tost pasta'),
(4, 'Masline', 40, 'pica'),
(5, 'Jaje', 20, 'pica tost'),
(6, 'Origano', 5, 'pica tost pasta');

CREATE TABLE IF NOT EXISTS `cenahrana` (
  `idcene` int(11) NOT NULL AUTO_INCREMENT,
  `idhrane` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  PRIMARY KEY (`idcene`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

INSERT INTO `cenahrana` (`idcene`, `idhrane`, `cena`) VALUES
(1, 1, 370),
(2, 2, 480),
(3, 2, 320),
(4, 2, 440),
(5, 3, 350),
(6, 3, 460),
(7, 4, 350),
(8, 4, 470),
(9, 5, 360),
(10, 5, 500),
(11, 6, 340),
(12, 6, 480),
(13, 7, 360),
(14, 7, 460),
(15, 8, 300),
(16, 9, 280),
(17, 10, 260),
(18, 11, 270),
(19, 11, 350),
(20, 12, 250),
(21, 12, 320),
(22, 13, 180),
(23, 14, 80),
(24, 15, 120),
(25, 16, 150),
(26, 17, 370),
(27, 17, 460),
(28, 18, 420),
(29, 18, 500),
(30, 19, 360),
(31, 19, 480),
(32, 20, 420),
(33, 20, 490),
(34, 21, 350),
(35, 21, 420),
(36, 22, 450),
(37, 22, 520),
(38, 23, 340),
(39, 23, 420),
(40, 24, 210),
(41, 25, 90);

DROP TABLE IF EXISTS `lokal_user`;

CREATE TABLE `lokal_user` (
  `id` int(11) NOT NULL,
  `tip` tinyint(1) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `lokal_user` VALUES (1,1,'S.A.R.S','123',NULL),(2,1,'VANGOGH','321',NULL),(3,1,'Nišville','fanta',NULL),(4,1,'Dubioza kolektiv','muzika',NULL);

CREATE TABLE `dogadjaj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(100) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `vreme` time DEFAULT NULL,
  `mesto` varchar(50) DEFAULT NULL,
  `tip` varchar(30) DEFAULT NULL,
  `podtip` varchar(30) DEFAULT NULL,
  `slika` varchar(1000) DEFAULT NULL,
  `opis` varchar(3000) DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `videourl` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

INSERT INTO `dogadjaj` VALUES (2,'Radnički - Crvena Zvezda','2016-06-13','19:00:00','Stadion Čair','sport','Fudbal','images/events/sport/radnicki-zvezda.jpg','Niški Radnički jedan je od samo dva tima koji su ove sezone \"otkinuli\" Crvenoj zvezdi bodove. Novu šansu za to imaće u nedelju, na svom Čairu. Domaćin je spreman za dolazak velikog rivala i dočekuje ga visokom četvrtom mestu tabele, sa dva boda manje od drugoplasiranog Borca i jednim manje od Čukaričkog, koji je treći. Prvi pratilac Radničkog je Partizan, branilac titule, sa dva poena manje. \"Očekuje nas lepa i značajna utakmica. S jedne strane teška, jer dolazi protivnik koji je prvi na tabeli, a sa druge strane laka, jer Radnički na ovoj utakmici može puno toga da dobije. Okrenuti smo pre svega sebi i tome šta ćemo ponuditi, šta ćemo prikazati i na koji način ćemo to proizvesti\", rekao je mladi trener Radničkog u najavi utakmice.','2016-06-13','radnicki crvena zvezda','http://www.mozzartsport.com/uzivo-prenosi'),(3,'S.A.R.S','2016-06-05','21:00:00','Tvrđava','muzika','Koncert','images/events/muzika/sars.jpg','Beogradski bend S.A.R.S. slavi deset godina rada, a u okviru obeležavanja ovog velikog jubileja održaće koncert 4. juna u rovu niške Tvrđave. Bend S.A.R.S. je do danas uz 6 albuma izdao i 19 spotova, od kojih većina ima po nekoliko miliona pregleda, a među najpopularnijima su \"Lutka\", \"Perspektiva\", \"To rade\", \"Ratujemo ti i ja\". Pretprodaja karata za koncert u Nišu počinje 25. aprila na svim gigstix i eventim prodajnim mestima, kao i u lokalnim šopovima u Nišu. Kao predgupa S.A.R.S-u u rovu niške Tvrđave nastupiće sastav Proces iz Niša. Ovaj ska/rege/pank bend iza sebe ima dva studijska albuma, i od 1995. svira na svim značajnijim festivalima u Srbiji i regionu.','2016-06-05','sars tvrdjava koncert','https://www.youtube.com/v/fOg7mj1_-sk'),(4,'Nišville','2016-08-11','00:00:00','Tvrđava','muzika','Festival','images/events/muzika/nisville.jpg','Internacionalni Nišvil džez festival - najposećeniji džez festival jugoistočne Evrope, od samog osnivanja 1995.godine dosledno brani evropske vrednosti multikulturalnosti i strpljivo neguje muzički ukus pojedinaca. Potvrda toga je i veliki tekst o festivalu \"Nišvil - evropsko lice Srbije\" (\"Nišville - European face of Serbia\") objavljen u glasilu Evropske unije, magazinu \"New Europe\" koji izlazi u Briselu. Glavni program festivala održava se na otvorenom prostoru Platoa niške Tvrđave, na dve bine Earth i Sky, a mnogi kvalitetni domaći i strani izvođači nastupaju na stejdževima koji su besplatni za publiku: River, Open, Movie, Matine, Welcome, Youth i Jam Session stejdž. Možete se prijaviti za volontiranje na Nišville-u.','2016-08-14','nisvil nisville tvrdjava','https://www.youtube.com/v/7aOH39IZe0s'),(5,'Dubioza kolektiv','2016-08-30','22:00:00','tvrdjava','muzika','koncert','images/events/muzika/dubioza.jpg','Popularni sastav iz Bosne i Hercegovine, Dubioza Kolektiv, održaće koncert u Nišu u subotu 30. avgusta. U niškoj Tvrđavi će, kao domaća podrška, nastupiti bend Stereo Banana, a publici će se predstaviti i Mad Red iz Novog Sada, S.K.A. iz Leskovca, kao i Cooby Selecta, takođe iz Leskovca.  Prodajna mesta:      Niš – Tradicionalni niški prodavac karata kod bioskopa Vilin Grad, Happy House , Oskar Kafeterija, Gnezdo, Every Day Caffe, Flo Cafe, Clock Travel, Hedonist Cafe, Koloss Caffe.','2016-08-30','dubioza kolektiv ','https://www.youtube.com/v/FZZJeMKJV3M'),(33,'Hladno pivo','2016-08-27','21:00:00','rovovi niške tvrđave','muzika','Koncert','images/events/muzika/hladnopivo.jpg','Najbolji hrvatski bend konačno dolazi u Niš. Interesovanje je veliko zato požurite da što pre obezbedite sebi karte.','2016-08-27','hladno pivo rov niske tvrdjava rock muzika koncert','https://www.youtube.com/v/KXwBhrMnsic'),(34,'Radnički - Partizan','2016-07-15','19:00:00','Stadion Čair','sport','Fudbal','images/events/sport/partizan-radnicki.jpg','Fudbaleri Partizana i Radničkog iz Niša u nedelju od 19 časova igraće drugu utakmicu u samo nekoliko dana. Trener Partizana Ivan Tomić ocenio je da će predstojeća utakmica biti težak ispit za njegove fudbalere, ali nada se da će plasman na tabeli biti bolji nakon gostovanja u Nišu. \"Pred nama je težak ispit, ali cilj je da pokušamo da repriziramo nivo igre i rezultat iz prethodne utakmice i na pravi način se vratimo za Beograd. Očekuje nas izuzetno teška i zahtevna utakmica, motivisan protivnik koji beleži dobre rezultate. Pokušaćemo da budemo na visini zadatka\", rekao je Tomić na konferenciji za novinare. ','2016-07-15','partizan radnicki stadion cair fudbal','http://www.mozzartsport.com/uzivo-prenosi');


CREATE TABLE IF NOT EXISTS `narucenahrana` (
  `idnarudzbine` int(11) NOT NULL AUTO_INCREMENT,
  `restoran` int(11) NOT NULL,
  `idhrana` int(11) NOT NULL,
  `dostava` varchar(10) NOT NULL,
  `cena` int(11) NOT NULL,
  `dodaci` varchar(150) NOT NULL,
  `username_narucioca` varchar(30) NOT NULL,
  PRIMARY KEY (`idnarudzbine`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO `narucenahrana` (`idnarudzbine`, `restoran`, `idhrana`, `dostava`, `cena`, `dodaci`, `username_narucioca`) VALUES
(1, 1, 1, 'narudzbina', 320, 'Jaje', 'jovic'),
(2, 1, 2, 'dostava', 250, ' ', 'jovic'),
(3, 1, 2, 'dostava', 250, ' Ke?ap Masline', 'jovic');

CREATE TABLE IF NOT EXISTS `dodatak` (
  `iddod` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(40) DEFAULT NULL,
  `cena` int(11) DEFAULT NULL,
  `tiphrane` varchar(100) NOT NULL,
  PRIMARY KEY (`iddod`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `dodatak` (`iddod`, `ime`, `cena`, `tiphrane`) VALUES
(1, 'Kečap', 0, 'pica tost pasta'),
(2, 'Majonez', 0, 'pica tost pasta'),
(3, 'Senf', 10, 'pica tost pasta'),
(4, 'Masline', 40, 'pica'),
(5, 'Jaje', 20, 'pica tost'),
(6, 'Origano', 5, 'pica tost pasta');

CREATE TABLE IF NOT EXISTS `komentarinl` (
  `idd` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `komentar` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idd`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

INSERT INTO `komentarinl` (`idd`, `id`, `username`, `komentar`) VALUES
(8, 32, 'Nenad Kragovic', 'jhjfkfl'),
(9, 32, 'Nenad Kragovic', 'jhjfkfl');

CREATE TABLE IF NOT EXISTS `ratingnl` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `rating` int(1) NOT NULL,
  `idd` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idd`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

CREATE TABLE IF NOT EXISTS `ratingfd` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `rating` int(1) NOT NULL,
  `idd` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idd`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

CREATE TABLE `narucenekarte` (
  `id_narudzbine` int(11) NOT NULL AUTO_INCREMENT,
  `username_narucioca` varchar(100) NOT NULL,
  `id_dogadjaja` int(11) NOT NULL,
  `pozicija` varchar(50) NOT NULL,
  `cena` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL,
  `vreme` date NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id_narudzbine`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `narucenekarte` VALUES (1,'shone',3,'parter',500,2,'0000-00-00','sars@gmail.com'),(2,'shone',5,'parter',350,2,'0000-00-00','dubioza@gmail.com'),(3,'pera',3,'vIP',200,4,'2002-04-20','sars@gmail.com');

DROP TABLE IF EXISTS `narucenahrana`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `narucenahrana` (
  `idnarudzbine` int(11) NOT NULL AUTO_INCREMENT,
  `restoran` int(11) NOT NULL,
  `idhrana` int(11) NOT NULL,
  `dostava` varchar(10) NOT NULL,
  `cena` int(11) NOT NULL,
  `dodaci` varchar(150) NOT NULL,
  `username_narucioca` varchar(30) NOT NULL,
  `vreme` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `kolicina` int(11) DEFAULT NULL,
  PRIMARY KEY (`idnarudzbine`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `narucenahrana` VALUES (1,1,1,'narudzbina',320,'Jaje','jovic','0000-00-00','nightnday@gmail.com',1),(2,1,2,'dostava',250,' ','jovic','0000-00-00','nightnday@gmail.com',2),(3,1,2,'dostava',250,' Ke?ap Masline','jovic','0000-00-00','nightnday@gmail.com',3),(5,4,17,'dostava',370,' Majonez Senf Masline','shone','0000-00-00','lastrega@gmail.com',4),(7,4,19,'dostava',480,' Majonez Senf','shone','0000-00-00','lastrega@gmail.com',5),(8,4,17,'dostava',370,' KeÄap Majonez','shone','0000-00-00','lastrega@gmail.com',6);

DROP TABLE IF EXISTS `rezervacijanl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rezervacijanl` (
  `ime` varchar(100) NOT NULL,
  `telefon` varchar(100) NOT NULL,
  `brojMesta` varchar(10) NOT NULL,
  `tipLokala` varchar(10) NOT NULL,
  `datum` varchar(10) NOT NULL,
  `lokal` varchar(20) NOT NULL,
  `tipMesta` varchar(10) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) NOT NULL,
  `vreme` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `rezervacijanl` VALUES ('Pera','214565','4','Kafana','21.12.2014','Cubo','VIP',1,'cubo@gmail.com','2021-12-20'),('Zile','1234123','2','Klub','22.1.2014','Cubo','Cesual',2,'cubo@gmail.com','2022-02-20'),('Mile','56477845634','1','Kafic','14.2.2013','Ministarstvo','VIP',3,'ministar@gmail.com','2003-02-20');

alter table nllokali
add mail varchar(100);

CREATE TABLE `cenahrana` (
  `idcene` int(11) NOT NULL AUTO_INCREMENT,
  `idhrane` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  PRIMARY KEY (`idcene`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

INSERT INTO `cenahrana` (`idcene`, `idhrane`, `cena`) VALUES
(1, 1, 370),
(2, 2, 480),
(3, 2, 320),
(4, 2, 440),
(5, 3, 350),
(6, 3, 460),
(7, 4, 350),
(8, 4, 470),
(9, 5, 360),
(10, 5, 500),
(11, 6, 340),
(12, 6, 480),
(13, 7, 360),
(14, 7, 460),
(15, 8, 300),
(16, 9, 280),
(17, 10, 260),
(18, 11, 270),
(19, 11, 350),
(20, 12, 250),
(21, 12, 320),
(22, 13, 180),
(23, 14, 80),
(24, 15, 120),
(25, 16, 150),
(26, 17, 370),
(27, 17, 460),
(28, 18, 420),
(29, 18, 500),
(30, 19, 360),
(31, 19, 480),
(32, 20, 420),
(33, 20, 490),
(34, 21, 350),
(35, 21, 420),
(36, 22, 450),
(37, 22, 520),
(38, 23, 340),
(39, 23, 420),
(40, 24, 210),
(41, 25, 90),
(42, 26, 130),
(43, 27, 150),
(44, 28, 450),
(45, 29, 100),
(46, 30, 370),
(47, 31, 400),
(48, 32, 430),
(49, 33, 420),
(50, 34, 220),
(51, 35, 150),
(52, 36, 250),
(53, 37, 230),
(54, 38, 100),
(55, 39, 130),
(56, 40, 150),
(57, 41, 120),
(58, 42, 90),
(59, 43, 220),
(60, 44, 100),
(61, 45, 340),
(62, 45, 450),
(63, 46, 400),
(64, 46, 500),
(65, 47, 380),
(66, 47, 460),
(67, 48, 430),
(68, 48, 510),
(69, 49, 370),
(70, 49, 490),
(71, 50, 320),
(72, 50, 400),
(73, 51, 450),
(74, 51, 520),
(75, 52, 310),
(76, 52, 400),
(77, 53, 120),
(78, 54, 200);

CREATE TABLE `dodatak` (
  `iddod` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(40) DEFAULT NULL,
  `cena` int(11) DEFAULT NULL,
  `tiphrane` varchar(100) NOT NULL,
  PRIMARY KEY (`iddod`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `dodatak` (`iddod`, `ime`, `cena`, `tiphrane`) VALUES
(1, 'Kečap', 0, 'pica tost pasta'),
(2, 'Majonez', 0, 'pica tost pasta'),
(3, 'Senf', 10, 'pica tost pasta'),
(4, 'Masline', 40, 'pica'),
(5, 'Jaje', 20, 'pica tost'),
(6, 'Origano', 5, 'pica tost pasta'),
(7, 'Keks', 0, 'palacinka'),
(8, 'Lešnik', 0, 'palacinka'),
(9, 'Orah', 0, 'palacinka'),
(10, 'Kupus', 0, 'rostilj'),
(11, 'Paradajz', 0, 'rostilj'),
(12, 'Urnebes', 0, 'rostilj'),
(13, 'Ljuto', 0, 'rostilj');

CREATE TABLE `hrana` (
  `idhrana` int(11) NOT NULL AUTO_INCREMENT,
  `idres` int(11) DEFAULT NULL,
  `ime` varchar(150) DEFAULT NULL,
  `opis` varchar(500) DEFAULT NULL,
  `slika` varchar(1000) DEFAULT NULL,
  `tip` varchar(20) NOT NULL,
  `tag` varchar(500) DEFAULT NULL,
  `type` varchar(15) NOT NULL,
  `opiseng` varchar(200) NOT NULL,
  PRIMARY KEY (`idhrana`),
  KEY `idres_FK` (`idres`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


INSERT INTO `hrana` (`idhrana`, `idres`, `ime`, `opis`, `slika`, `tip`, `tag`, `type`, `opiseng`) VALUES
(1, 1, 'Pica Frutti di mare', 'Pelat, svež paradajz, plodovi mora, kačkavalj', 'images/food/frutidimare.jpg', 'pica', 'pica fruti de mare pizza', 'pizza', 'dough, tomato, sea fruits, cheese'),
(2, 1, 'Pica Capirccoza', 'Pelat, šunka, pečurke, kačkavalj', 'images/food/kapricoza.jpg', 'pica', 'pica pizza capriccoza capicoza kapricoza', 'pizza', 'dough, ham, mushrooms, cheese'),
(3, 1, 'Pica Quattro stagioni', 'Pelat, šunka, pečurke, kulen, slanina, kačkavalj, jaje, svež paradajz', 'images/food/kvatrostadjone.jpg', 'pica', 'pica pizza quattro stagioni quatro stagoni kvatro stadjoni', 'pizza', 'dough, ham, mushroom, sausage, bacon, cheese, egg, tomato'),
(4, 1, 'Pica Margarita', 'Pelat, svež paradajz, kačkavalj', 'images/food/margarita.jpg', 'pica', 'pica pizza margarita', 'pizza', 'dough, tomato, cheese'),
(5, 1, 'Pica Mexicana', 'Pelat, svež paradajz, kulen, kobasica, ljuta paprika, kačkavalj', 'images/food/mexikana.jpg', 'pica', 'pica pizza mexicana meksikana mexicana', 'pizza', 'dough, tomato, sausage, hot pepper, cheese'),
(6, 1, 'Pica Quattro formaggi', 'Pelat, gauda, gorgonzola, kačkavalj', 'images/food/quatrofomadji.jpg', 'pica', 'pica pizza quattro formaggi quatro formagi kvatro formadji', 'pizza', 'dough, 4 types of cheese'),
(7, 1, 'Pica Vegetariana', 'Pelat, svež paradajz, paprika, šećerac, masline, kačkavalj', 'images/food/vegetariana.jpg', 'pica', 'pica pizza vegerteriana', 'pizza', 'dough, tomato, pepper, corn, olives, cheese'),
(8, 1, 'Pasta Bolonjeze', 'Testenina, parmezan, pelat, goveđe meso, šargarepa, luk, bosiljak', 'images/food/bolonjeze.jpg', 'pasta', 'pasta bolonjeze bolgneze', 'pasta', 'pasta, parmesan, cow meat, carrot, onion, basil'),
(9, 1, 'Pasta Fungi', 'Testenina, neutralna pavlaka, začin, parmezan, pečurke', 'images/food/pastafungi.jpg', 'pasta', 'pasta fungi', 'pasta', 'pasta, parmesan, neutral cream, spice, tomato, mushrooms'),
(10, 1, 'Pasta Napolitana', 'Pelat, svež paradajz, paprika, šećerac, masline, kačkavalj', 'images/food/pastatreca.jpg', 'pasta', 'pasta napolitana', 'pasta', 'pasta, parmesan, tomato, corn, olives, cheese'),
(11, 2, 'Pica Capriccoza', 'Pelat, šunka, pečurke, kačkavalj', 'images/food/kapricoza.jpg', 'pica', 'pica pizza capriccoza capicoza kapricoza', 'pizza', 'dough, ham, mushrooms, cheese'),
(12, 2, 'Pica Margarita', 'Pelat, svež paradajz, kačkavalj', 'images/food/margarita.jpg', 'pica', 'pica pizza margarita', 'pizza', 'dough, tomato, cheese'),
(13, 2, 'Pasta Bologneze', 'Testenina, parmezan, pelat, goveđe meso, šargarepa, luk, bosiljak', 'images/food/bolonjeze.jpg', 'pasta', 'pasta bolonjeze bolgneze', 'pasta', 'pasta, parmesan, cow meat, carrot, onion, basil'),
(14, 2, 'Tost Krem', 'Lepinja, krem', 'images/food/tost.jpg', 'tost', 'tost krem', 'tost', 'bread, hazelnut cream'),
(15, 2, 'Tost Šunka, kačkavalj', 'Lepinja, šunka, kačkavalj', 'images/food/tost2.jpg', 'tost', 'tost sunka salama', 'tost', 'bread, ham, cheese'),
(16, 2, 'Tost Pečenica, kačkavalj', 'Lepinja, pečenica, kačkavalj', 'images/food/tost3.jpg', 'tost', 'tost pecenica', 'tost', 'bread, ham, cheese'),
(17, 4, 'Pica Domaća', 'Pelat, kačkavalj, kulen, dimljena slanina, pečurke, dimljeno meso, jaje', 'images/food/domaca.jpg', 'pica', 'pica pizza domaca srpska', 'pizza', 'dough, cheese, sausage, smoked bacon, mushroom, smoked meat, egg'),
(18, 4, 'Pica Frutti di mare', 'Pelat, svež paradajz, plodovi mora, kačkavalj', 'images/food/frutidimare.jpg', 'pica', 'pica fruti de mare pizza', 'pizza', 'dough, tomato, sea fruits, cheese'),
(19, 4, 'Pica Capirccoza', 'Pelat, šunka, pečurke, kačkavalj', 'images/food/kapricoza.jpg', 'pica', 'pica pizza capriccoza capicoza kapricoza', 'pizza', 'dough, ham, mushrooms, cheese'),
(20, 4, 'Pica Quattro stagioni', 'Pelat, šunka, pečurke, kulen, slanina, kačkavalj, jaje, svež paradajz', 'images/food/kvatrostadjone.jpg', 'pica', 'pica pizza quattro stagioni quatro stagoni kvatro stadjoni', 'pizza', 'dough, ham, mushroom, sausage, bacon, cheese, egg, tomato'),
(21, 4, 'Pica Margarita', 'Pelat, svež paradajz, kačkavalj', 'images/food/margarita.jpg', 'pica', 'pica pizza margarita', 'pizza', 'dough, tomato, cheese'),
(22, 4, 'Pica Mexicana', 'Pelat, svež paradajz, kulen, kobasica, ljuta paprika, kačkavalj', 'images/food/mexikana.jpg', 'pica', 'pica pizza mexicana meksikana mexicana', 'pizza', 'dough, tomato, sausage, hot pepper, cheese'),
(23, 4, 'Pica Vegetariana', 'Pelat, svež paradajz, paprika, šećerac, masline, kačkavalj', 'images/food/vegetariana.jpg', 'pica', 'pica pizza vegerteriana', 'pizza', 'dough, tomato, pepper, corn, olives, cheese'),
(24, 4, 'Pasta Bolonjeze', 'Testenina, parmezan, pelat, goveđe meso, šargarepa, luk, bosiljak', 'images/food/bolonjeze.jpg', 'pica', 'pasta bolonjeze bolgneze', 'pizza', 'pasta, parmesan, cow meat, carrot, onion, basil'),
(25, 4, 'Tost Krem', 'Lepinja, krem', 'images/food/tost.jpg', 'tost', 'tost krem', 'tost', 'bread, hazelnut cream'),
(26, 4, 'Tost Šunka', 'Lepinja, šunka', 'images/food/tost2.jpg', 'tost', 'tost sunka', 'tost', 'bread, ham, cheese'),
(27, 4, 'Tost Pečenica, kačkavalj', 'Lepinja, pečenica, kačkavalj', 'images/food/tost3.jpg', 'tost', 'tost pecenica', 'tost', 'bread, ham, cheese'),
(28, 8, 'Musaka', 'Krompir, meso, jaje', 'images/food/musaka.jpg', 'specijalitet', 'galija specijalitet hrana domace', 'specialty', 'Potato, meat, egg'),
(29, 8, 'Srpska salata', 'Pradajz, krastavac, sir, ulje, sirce', 'images/food/srpskasalata.jpg', 'salata', 'galija salta domace srpska srbska', 'salad', 'Tomato, kucumber, cheese, oil, vinegar'),
(30, 8, 'Sarma', 'Mleveno meso, pirinac, luk, zacin, list kupusa', 'images/food/sarma.jpg', 'specijalitet', 'sarma galija domace srpska srbska', 'speciality', 'Minced meat, rice, onion, spice, cabbage leaf'),
(31, 8, 'Przene tikvice', 'tikvice, pavlaka', 'images/food/tikvice.jpg', 'specijalitet', 'galija specijalitet tikvice', 'speciality', 'Fried Zucchini, cream'),
(32, 8, 'Punjenji plavi patlidzan', 'Plavi patlidzan, pavlaka, kackavalj', 'images/food/plavi.jpg', 'specijalitet', 'galija specijalitet plavi patlidzan srpska spbska domaca', 'speciality', 'Stuffed eggplant, cream, cheese, eggplant'),
(33, 8, 'Gulas', 'Zaprska, govedje meso, svinjsko meso, povrce', 'images/food/gulas.jpg', 'specijalitet', 'galija corba srbska srpska gulas', 'speciality', 'Stew, vegetables, cow meat, pork '),
(34, 8, 'Pljeskavica', 'Rostilj meso', 'images/food/pljeskavica.jpg', 'rostilj', 'galija niski rostilj pleskoavica', 'grill', 'Grilled meat'),
(35, 8, '5 Cevapa', 'Rostilj meso', 'images/food/cevapi.jpg', 'rostilj', 'galija rostilj cevapi', 'grill', 'Griled meat'),
(36, 8, 'Pileće belo', 'Pileće belo meso 200g', 'images/food/pilecebelo.jpg', 'rostilj', 'galija rostilj meso pilece belo', 'grill', 'Roasted chicken meat'),
(37, 8, 'Kobasica', '200g', 'images/food/kobasice.jpg', 'rostilj', 'galija rostilj kobasica meso', 'grill', 'Grilled sausage 200g'),
(38, 5, 'Tost krem', 'Lepinja, krem', 'images/food/tost.jpg', 'tost', 'tost krem', 'tost', 'bread, hazelnut cream'),
(39, 5, 'Tost sunka', 'Lepinja, šunka', 'images/food/tost2.jpg', 'tost', 'tost sunka', 'tost', 'bread, ham, cheese'),
(40, 5, 'Tost pecenica', 'Lepinja, pečenica, kačkavalj', 'images/food/tost3.jpg', 'tost', 'tost pecenica', 'tost', 'bread, ham, cheese'),
(41, 5, 'Hot dog', 'Vekna, visrsla', 'images/food/hotdog.jpg', 'tost', 'venis brza hrana tost visrla', 'tost', ''),
(42, 5, 'Slatka palacinka krem', 'testo, krem', 'images/food/slatka.jpg', 'palacinka', 'venis palacinka slatka krem', 'pancake', 'Dough, hazelnut cream'),
(43, 5, 'Slana palacinka', 'testo, sunka, kačkavalj, pečurke, palvaka', 'images/food/slana.jpg', 'palacinka', 'venis pakacinka slana', 'pancake', 'Dough, ham, cheese, mushroom, cream'),
(44, 5, 'Grčka salta', 'sir, maslinovo ulje,krastavac, paradjaz, masline, luk', 'images/food/grcka.jpg', 'salata', 'venis salta gracka', 'salad', 'cheese, olive oil, olives, cucumber, tomato, onion'),
(45, 7, 'Pica Domaća', 'Pelat, kačkavalj, kulen, dimljena slanina, pečurke, dimljeno meso, jaje', 'images/food/domaca.jpg', 'pica', 'pica pizza domaca srpska', 'pizza', 'dough, cheese, sausage, smoked bacon, mushroom, smoked meat, egg'),
(46, 7, 'Pica Frutti di mare', 'Pelat, svež paradajz, plodovi mora, kačkavalj', 'images/food/frutidimare.jpg', 'pica', 'pica fruti de mare pizza', 'pizza', 'dough, tomato, sea fruits, cheese'),
(47, 7, 'Pica Capirccoza', 'Pelat, šunka, pečurke, kačkavalj', 'images/food/kapricoza.jpg', 'pica', 'pica pizza capriccoza capicoza kapricoza', 'pizza', 'dough, ham, mushrooms, cheese'),
(48, 7, 'Pica Quattro stagioni', 'Pelat, šunka, pečurke, kulen, slanina, kačkavalj, jaje, svež paradajz', 'images/food/kvatrostadjone.jpg', 'pica', 'pica pizza quattro stagioni quatro stagoni kvatro stadjoni', 'pizza', 'dough, ham, mushroom, sausage, bacon, cheese, egg, tomato'),
(49, 7, 'Pica Quattro formaggi', 'Pelat, gauda, gorgonzola, kačkavalj', 'images/food/quatrofomadji.jpg', 'pica', 'pica pizza quattro formaggi quatro formagi kvatro formadji', 'pizza', 'dough, 4 types of cheese'),
(50, 7, 'Pica Margarita', 'Pelat, svež paradajz, kačkavalj', 'images/food/margarita.jpg', 'pica', 'pica pizza margarita', 'pizza', 'dough, tomato, cheese'),
(51, 7, 'Pica Mexicana', 'Pelat, svež paradajz, kulen, kobasica, ljuta paprika, kačkavalj', 'images/food/mexikana.jpg', 'pica', 'pica pizza mexicana meksikana mexicana', 'pizza', 'dough, tomato, sausage, hot pepper, cheese'),
(52, 7, 'Pica Vegetariana', 'Pelat, svež paradajz, paprika, šećerac, masline, kačkavalj', 'images/food/vegetariana.jpg', 'pica', 'pica pizza vegerteriana', 'pizza', 'dough, tomato, pepper, corn, olives, cheese'),
(53, 7, 'Slatka palacinka krem', 'testo, krem', 'images/food/slatka.jpg', 'palacinka', 'palacinka slatka krem', 'pancake', 'Dough, hazelnut cream'),
(54, 7, 'Slana palacinka', 'testo, sunka, kačkavalj, pečurke, palvaka', 'images/food/slana.jpg', 'palacinka', 'pakacinka slana', 'pancake', 'Dough, ham, cheese, mushroom, cream');

CREATE TABLE IF NOT EXISTS `nllokali` (
  `idres` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) DEFAULT NULL,
  `adresa` varchar(100) DEFAULT NULL,
  `ocena` double DEFAULT NULL,
  `opis` varchar(1000) DEFAULT NULL,
  `gmaps` varchar(2000) DEFAULT NULL,
  `slika` varchar(1000) DEFAULT NULL,
  `tip` varchar(20) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `tag` varchar(1000) DEFAULT NULL,
  `info` varchar(3000) DEFAULT NULL,
  `slajd` varchar(500) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idres`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;



INSERT INTlokallokal `nllokali` (`idres`, `ime`, `adresa`, `ocena`, `opis`, `gmaps`, `slika`, `tip`, `telefon`, `tag`, `info`, `slajd`, `mail`) VALUES
(1, 'Scena', 'Sinđelićev trg', 4, '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2440.9063080955075!2d21.897417751517192!3d43.31963600914087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b728c937f1%3A0xa5847df81f609354!2z0KHRhtC10L3QsCDQmtC70YPQsQ!5e0!3m2!1ssr!2srs!4v1464127686511', 'images/nightlife/scena.jpg', 'Club', '064 1218121', 'scena klub club provod nocni zivot nocnizivot', NULL, NULL, 'scena@gmail.com'),
(2, 'Stara Srbija', 'Trg Republike 12', NULL, 'Kafana Stara Srbija je retka kafana i građevina za koju se može reći da je simbol grada,\n                                    sa svojom dugom tradicijom preko od preko 120. godina. Preko svojih kariranih stoljnjaka\n                                    „preturila“ je štošta i ispisala istoriju kako grada Niša tako i Srbije. Stara Srbija se nalazi u starom trgovačkom delu grada na mestu gde je nekada bio\n                                    “karavan saraj”. Mesto u kome su se okupljali zanatlije ali i državnici\n                                    mirno je i danas idealno za porodične i poslovne ručkove.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2902.851199589852!2d21.89439971490875!3d43.31737428210022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b1a99f0ab5%3A0x2dd55ad3f9c49924!2z0KHRgtCw0YDQsCDQodGA0LHQuNGY0LA!5e0!3m2!1ssr!2srs!4v1464132703037', 'images/nightlife/starasrbija.jpg', 'tavern', '018 521902', 'kafana stara srbija tavern serbia old', NULL, NULL, 'starasrbija@gmail.com'),
(3, 'Sunset', 'Cara Dušana 47a', 3, NULL, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d513.153247384481!2d21.89893020323521!3d43.31775256172781!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x3b04705bdc3280d2!2sSunset+Club!5e0!3m2!1ssr!2srs!4v1464133213228', 'images/nightlife/sunset.jpg', 'club', '061 2979299', 'sunset club klub svirka   ', NULL, NULL, 'sunset@gmail.com'),
(4, 'Galija', 'Nikole Pašića 35', NULL, 'Kafana Galija jedna je od starih kafana u gradu s veoma dugom tradicijom. „Galija“ ne menja ni vreme ni mesto. Živi.\r\n                                    U njoj su mnogi imali svoje mesto. Dolazili su glumci, pisci, novinari, ugledni majstori i ostala elita prošlih vremena.\r\n                                    „Galija“ se i danas trudi da bude mesto u kome se okuplja elita, sklapaju  poslovna prijateljstva i saradnje i u tome uspeva.\r\n                                    O kvalitetu hrane i usluge nećemo ni da govorimo, najbolje je da dođete i uverite se sami.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d684.9742982692302!2d21.89568880596442!3d43.31802907046845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xe89499d1088e33d1!2z0JPQsNC70LjRmNCw!5e0!3m2!1ssr!2srs!4v1464133622140', 'images/nightlife/galija.jpg', 'tavern', '018 515626', 'galija kafana tavern nis nocni zivot nightlife ', NULL, NULL, 'galija@gmail.com'),
(5, 'Symphony', 'Generala Milojka Lešjanina 16', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d484.3291550259812!2d21.89334021425992!3d43.32064043559212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x6a258f5d55001d53!2z0KHQuNC80YTQvtC90LjRmNGB0LrQuCDQvtGA0LrQtdGB0YLQsNGA!5e0!3m2!1ssr!2srs!4v1464133442787', 'images/nightlife/symphony.jpg', 'club', '060 4924292', 'club klub simfonijski symphony nightlife nocni zivot', NULL, NULL, 'symphony@gmail.com'),
(6, 'Process', 'Sedmog Jula 6', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1451.3026854861637!2d21.89698378440136!3d43.322519839874104!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x050fcc444d1b77fb!2sProcess+-+VIP+Bar!5e0!3m2!1sen!2sus!4v1464134737024', 'images/nightlife/process.jpg', 'club', '064 8899778', 'proces process nocni zivot nightlife proces club klub', NULL, NULL, 'process@gmail.com'),
(7, 'Lo-Co', 'Kej Kolo Srpskih Sestara BB', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1451.2967499323997!2d21.895609281089772!3d43.32276830736893!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xa52c729e8917cc56!2sLo+Co+Tropic+Open+Bar!5e0!3m2!1sen!2sus!4v1464134402402', 'images/nightlife/loco.jpg', 'club', '063 461506', 'loco loko nightlife nocni zivot  klub club', NULL, NULL, 'loco@gmail.com'),
(8, 'Berta', 'Cara Dušana 73', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d513.150487371535!2d21.902106013283547!3d43.318079377083905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x7cbe482a291dd31b!2sPivnica+Berta!5e0!3m2!1sen!2sus!4v1464144489040', 'images/nightlife/berta.jpg', 'pub', NULL, 'berta pivnica pub pivo nightlife nocni zivot', NULL, NULL, 'berta@gmail.com'),
(9, 'Beer Book', 'Cara Dušana 98', NULL, 'Beer Book je najnovija pivnica u gradu, otvorena avgusta 2015. godine. U moderno dizajniranom ambijentu ove\r\n                                    pivnice možete probati preko 30 vrsta piva. Nažalost, hrana (još uvek) nije u ponudi tako da ćete svoju glad\r\n                                    morati da utolite na nekom drugom mestu. Vikendom se u pivnici organizuju svirke niških bendova tako da posetioci mogu uživati u domaćoj i stranoj rok muzici.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d725.706960950969!2d21.90323802920252!3d43.317863174428695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0ba31afc8d5%3A0x94e151b2805df22c!2zRHXFoWFub3ZhIDEwMiwgTmnFoSwgU2VyYmlh!5e0!3m2!1sen!2sus!4v1464144293907', 'images/nightlife/beerbook.jpg', 'pub', '063 7735018 ', 'beerbook pivo nocni zivot nightlife pivnica pub', NULL, NULL, 'beerbook@gmail.com'),
(10, 'Skadarlija', 'Dušanova 46', NULL, 'Jedna od starih kafana u gradu, otvorena još 1977. godine i od tada uspeva da sačuva svoju dušu i boemsku notu.\r\n                                    Ovde su se rađale i gasile mnoge ljubavi, tugovalo se i veselilo. Specijaliteti su jela sa roštilja.\r\n                                    Najpoznatija je po ćevapima i bećarcu (albanskoj salati), koji spadaju možda i u najbolje u gradu.I prizemlje i sprat odišu nekim kafanskim šmekom,\r\n                                    sve je u punom drvetu i kovanom gvožđu, pa iako ste u centru grada možete da se na trenutak opustite i uživate u pravoj seoskoj atmosferi.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d431.4959006415402!2d21.89781411397132!3d43.319558567864085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xff87004dddd135a0!2sTruba+Cafe!5e0!3m2!1sen!2sus!4v1464138282991', 'images/nightlife/skadarlija.jpg', 'tavern', '018 241986', ' nocni zivot nightlife skadarlija tavern kafana', NULL, NULL, 'skadarlija@gmail.com'),
(11, 'Ministarstvo Beer Bar', 'Vojvode Vuka 12', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m17!1m8!1m3!1d2902.7285299957584!2d21.901651!3d43.319942!3m2!1i1024!2i768!4f13.1!4m6!3e2!4m0!4m3!3m2!1d43.3201208!2d21.9017037!5e0!3m2!1sen!2sus!4v1464142605213', 'images/nightlife/ministarstvo.jpg', 'pub', ' 063 460350 ', ' nocni zivot nightlife ministarstvo ministry pivnica pub', NULL, NULL, 'ministarstvo@gmail.com'),
(12, 'Pleasure', 'Kopitareva 7', NULL, 'PLEASURE je mesto stvoreno za one koji vole da uživaju, ljude od stila i ukusa. Nalazimo se na sjajnoj lokaciji u\r\n                                    Kazandžijskom sokačetu u samom srcu Niša. "Pleasure" je osnovan marta 2007. godine.\r\n                                    Ugostiteljski objekat je sastavljen iz tri odvojene sale za usluživanje, ukupne površine 280m2 sa\r\n                                    ukupnim kapacitetom 210 sedećih mesta i kuhinjskim delom sa magacinima na površini od 140m2.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d431.50773012584284!2d21.895175030909325!3d43.31789282432396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x515570fc7de23461!2sPleasure+Club!5e0!3m2!1sen!2sus!4v1464137940579', 'images/nightlife/pleasure.jpg', 'caffe', '018 517551', 'pleasure cafe caffe kafic  nocni zivot nightlife ', NULL, NULL, 'pleasure@gmail.com'),
(13, 'Diamond', 'Prijezdina 4', NULL, 'Diskoteka Diamond (nekadašnji Studio) najveća je diskoteka u Nišu sa\r\n                                    kapacitetom od 1200 do 1500 ljudi. Prostor je organizovan na dva nivoa\r\n                                    i sadrži devet separea i mnoštvo stolova uz dodatnu VIP galeriju za stalne goste.\r\n                                    Ova diskoteka poznata je po stalnim i ekskluzivnim gostovanjima domaćih pop i folk zvezda.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1451.4401783910957!2d21.894501658056!3d43.31676394628509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x9641c0220a2d3ea6!2sDiskoteka+Diamond!5e0!3m2!1ssr!2srs!4v1464125798509', 'images/nightlife/diamond.jpg', 'club', '064 4277765', 'club klub diamond nis  nocni zivot nightlife', NULL, NULL, 'diamond@gmail.com'),
(14, 'Vavilon', 'Nikole Pašića 36 ', NULL, 'Klub Vavilon nalazi se preko puta Kalče, u podrumu zgrade u kojoj su smešteni Sky Caffe i\r\n                                    Bilijar klub Atlantis. Zbog redovnih house žurki koje se prave u toku radne nedelje postao j\r\n                                    e veoma popularan među studentskom populacijom. Vikendi su uglavnom rezervisani za nastupe\r\n                                    niških bendova ili gostovanja regionalnih muzičkih zvezdi.\r\n', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4105.211901144726!2d21.894795680901662!3d43.31796093435183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b3da0c80fb%3A0xf8898be5021da7bf!2z0JrQu9GD0LEgIlZhdmlsb24i!5e0!3m2!1ssr!2srs!4v1464129155299', 'images/nightlife/vavilon.jpg', 'club', '069 4054233', 'club klub vavilon  nocni zivot nightlife', NULL, NULL, 'vavilon@gmail.com'),
(15, 'Mrak', 'Bulevar 12. februar BB', NULL, 'Ne tako stara kafana, ušuškana na periferiji grada, koja svoj renome gradi već 15-ak godina. Iako nije u centru, i ne postoji dugo da bi\r\n                                    stari boemi pričali o njoj, i slabiji poznavaoci kafane su čuli za kafanu „Mrak“,\r\n                                    mesto gde je hrana ponajbolja u gradu.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1775.8746852585793!2d21.87021386386713!3d43.34294957017313!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x0e42417ab748eb89!2sKafana+MRAK!5e0!3m2!1sen!2sus!4v1464135089589', 'images/nightlife/mrak.jpg', 'tavern', '018 581234', 'mrak kafana tavern  nocni zivot nightlife', NULL, NULL, 'mark@gmail.com'),
(16, 'Cubo', 'Balkanska 2', NULL, 'Cubo klub je jedan od omiljenih klubova niških studenata.\r\n                                    Na repertoaru je uglavnom miks haus muzike i domaćih narodnjaka\r\n                                    sa popularnim folk hitovima nakon ponoći.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d431.48101270296956!2d21.894463130392566!3d43.32165365308235!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xc5652b54e976e6b5!2sCubo+Club!5e0!3m2!1sen!2sus!4v1464135234699', 'images/nightlife/cubo.jpg', 'club', '063 461506', 'cubo kubo  nocni zivot nightlife klub club', NULL, NULL, 'cubo@gmail.com'),
(17, 'Bla Bla', 'Kopitareva BB', 4, NULL, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d725.707531966696!2d21.895650723526767!3d43.31781536373731!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x8129b7f98d5f6adb!2sBla+Bla!5e0!3m2!1sen!2sus!4v1464135431965', 'images/nightlife/blabla.jpg', 'caffe', '018 242111', 'blabla kafic caffe cafe  nocni zivot nightlife', NULL, NULL, 'blabla@gmail.com'),
(18, 'Vespa', 'Trg Republike 1', NULL, 'Baš tu, u epicentru trusnog kulturnog područja vraća se Nišu gradski šmek ogrnut mods kaputom. Na ovom mestu smešten je\r\n                                    VESPA BAR, vremeplov koji seže u 1946. godinu,\r\n                                    iz koje na put ka večnosti kreće urbani stil života, čiji neuhvatljivi talas nalazi predah upravo u Nišu.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d746.9731145010601!2d21.896517391407876!3d43.31775441363968!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x57a6eee11f23d3ef!2sVespa+Bar!5e0!3m2!1sen!2sus!4v1464135644067', 'images/nightlife/vespa.jpg', 'caffe', '018 305067', 'vespa caffe kafic  nocni zivot nightlife', NULL, NULL, 'vespa@gmail.com'),
(19, 'Ypsilon', '9. Brigade 6', NULL, 'Club Ypsilon odiše vrlo prijatim okruženjem uvek punim prijatnih i razdraganih gostiju,\r\n                                    kao i ljubaznim i izuzetno uslužnim osobljem. Jedinstveni ambijent i prijatna atmosfera\r\n                                    cine "Club Ypsilon" pravim mestom za opusteni izlazak i prijatan razgovor sa porodicom i prijateljima.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2902.866978988395!2d21.90188831548686!3d43.31704397913415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b14f921bab%3A0x345632c96aa0bedd!2sKLUB+YPSILON!5e0!3m2!1ssr!2srs!4v1464129077673', 'images/nightlife/y.jpg', 'club', '069 4849500', 'y ypsilon kafic caffe  nocni zivot nightlife', NULL, NULL, 'y@gmail.com'),
(20, 'Čitaonica', 'Milentija Popovića BB', NULL, 'Kafana je „mlada“ kao i njen gazda, ali što je za svaku pohvalu uvek je prisutan u kafani i redovno pušta „ture“, pogotovo ako je ekipa opuštena.\r\n                                    Ogromna bašta je definitivno jedan od najjačih aduta ove kafane, jer sam veliki deo leta proveo tamo. Odvojena od grada, saobraćaja,\r\n                                    uz zvuke tambiraša i violine, bila mi je oaza mira ovog leta.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4608.38798159567!2d21.873874003205845!3d43.312114269736654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b7564f9232a1%3A0xd94928bc69ced4!2z0KfQuNGC0LDQvtC90LjRhtCw!5e0!3m2!1sen!2sus!4v1464135925563', 'images/nightlife/citaonica.jpg', 'tavern', '018 264006', 'kafana tavern citaonica readingroom  nocni zivot nightlife', NULL, NULL, 'citaonica@gmail.com'),
(21, 'Liv', 'Trg Republike 1', 3, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d863.016148809755!2d21.89620811341903!3d43.317844344638694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b105875663%3A0xdb2e57290146ea5e!2sTrg+republike!5e0!3m2!1sen!2sus!4v1464136397315', 'images/nightlife/liv.jpg', 'caffe', '064 6687090', 'liv club klub  nocni zivot nightlife', NULL, NULL, 'liv@gmail.com'),
(22, 'Lagano', 'Trg Republike 3 - 7', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1451.420959237479!2d21.895948900539732!3d43.317568558509834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b1086c9211%3A0x823eddb33262418e!2sCaffe+Lagano!5e0!3m2!1sen!2sus!4v1464136683388', 'images/nightlife/lagano.jpg', 'caffe', '064 8058890', 'lagano kafic caffe cafe  nocni zivot nightlife', NULL, NULL, 'lagano@gmail.com'),
(23, 'Irish Pub Crazy Horse', 'Davidova 8', NULL, 'Pub je mesto u kome se zadovoljava potreba za zabavom, pićem i razgovorom. Mesto,\r\n                                    koje ne uživa samo kod pivopija kultni status, središte je i društvenog života, kako mladih, tako\r\n                                    i ljudi svih generacija, koji Pab doživljavaju svojom drugom kućom.\r\n                                    Sa jakom željom, da i u Nišu postoji jedno takvo mesto, u centralnom gradskom tkivu novembra 2011.\r\n                                    je počeo sa radom Irish pub Crazy Horse.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2902.635989320035!2d21.891912315487012!3d43.32187897913408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b4594f0a59%3A0x9ed360b31b057600!2sIrish+Pub+Crazy+Horse!5e0!3m2!1ssr!2srs!4v1464142882610', 'images/nightlife/irish.jpg', 'pub', '062 780574', 'pub pivnica pivo irish irski  nocni zivot nightlife', NULL, NULL, 'irish@gmail.com'),
(24, 'Nislijska Mehana', 'Prvomajska 49', NULL, 'Kafana "Nišlijska Mehana" nalazi se u užem centru Niša i zvanično je počela sa radom 08.03.1996 god.\r\n                                    Već u leto iste godine ,bila je jedan od omiljenih lokala Nišlijama. Vremenom je dostigla status najposećenije\r\n                                    kafane u Nišu. U pravom,domaćinskom ambijentu,kafana raspolaže kapacitetom od 90 mesta i letnjom baštom,čiji je kapacitet  30 mesta.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1776.4737365970534!2d21.9035824298003!3d43.322467941512514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x0b42414feddf5c50!2sNislijska+Mehana!5e0!3m2!1sen!2sus!4v1464143380222', 'images/nightlife/nislijskamehana.jpg', 'tavern', '018 513968', 'tavern kafana mehana nislijskamehana  nocni zivot nightlife', NULL, NULL, 'mehana@gmail.com'),
(25, 'Konstantin', 'Kopitareva 3', NULL, 'Klub sa velikim izborom kafa, čajeva, koktela, alkoholnih i bezalkoholnih pića, slanih i slatkih palčinki, sendviča,\r\n                                    a uvek imamo neka iznenađenja za sve goste. Sami ili u društvu,\r\n                                    uvek ćete se osećati ugodno u prijatnom ambijentu i atmosferi kluba.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d419.2241442983991!2d21.89582489404204!3d43.31780604217818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xa767787fb961d183!2sCaffe+Konstantin!5e0!3m2!1sen!2sus!4v1464137226531', 'images/nightlife/konstantin.jpg', 'caffe', '061 3026744', 'konstantin constantine caffe cafe kafic  nocni zivot nightlife', NULL, NULL, 'konstantin@gmail.com'),
(26, 'Flo', 'Kopitareva 11', NULL, '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d431.50773012584284!2d21.895175030909325!3d43.31789282432396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xd09f086bb5a77a5d!2sKaldrma+Caffe!5e0!3m2!1sen!2sus!4v1464137535848', 'images/nightlife/flo.jpg', 'caffe', '065 3980110', NULL, NULL, NULL, NULL),
(27, 'Nemir', 'Obilićev Venac 35', NULL, 'Ovo mesto nastavlja tradiciju niških kafea i okupljališta na kojima se sluša dobra muzika,\r\n                                    ispija hladno pivo i prate aktuelni sportski događaji. Pored širokog izbora pića, postoji i kuhinja iz koje možete naručiti pomfrit, ćevape, kobasice i slične stvari sa roštilja koje, pored toga što su ukusne, fenomenalno idu uz pivo.\r\n                                    Veoma pohvalna je i činjenica to što se hrana naplaćuje po gramaži tako da, zavisno od apetita, sami možete odrediti svoju porciju.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1451.4583303809075!2d21.891047!3d43.31600400000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x438fa6f2d26075c1!2z0J3QtdC80LjRgA!5e0!3m2!1sen!2sus!4v1464143091849', 'images/nightlife/nemir.jpg', 'pub', NULL, NULL, NULL, NULL, NULL),
(28, 'Na Ćosku', 'Kopitareva 1', NULL, 'Cafe Na Ćošku nalazi se u centru grada, preko puta Gradske opštine, u etno ulici "Kazandžijsko sokače".\r\n                                    Počeo je sa radom 01. juna 2003. godine. Kafić poseduje raznovrsnu ponudu pića, koktela, kolača, i sladoleda. Takodje sadrži i poseban kutak za najmladje.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d498.5448565080338!2d21.895933981025994!3d43.31774250235806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x06cc282037884628!2zTmEgxIZvxaFrdQ!5e0!3m2!1sen!2sus!4v1464136873478', 'images/nightlife/nacosku.jpg', 'caffe', '063 296715', NULL, NULL, NULL, NULL),
(29, 'Beer Garden', 'Cara Dušana 41', NULL, 'Beer Garden je pivnica nastala na mestu nekadašnjeg legendarnog Beer House-a. Uz veoma prijatnu baštu i veliki broj drvenih stolova i klupa u lokalu predstavlja najveću pivnicu u Nišu. Nažalost, s obzirom da ima potpisan ekskluzivni ugovor sa Apatinskom pivarom, ne može se pohvaliti velikim izborom piva - na raspolaganju vam je svega pet - šest brendova. Od hrane možete naručiti pomfrit, girice, pileća krilca ili „dasku” - miks narezanih suhomesnatih proizvoda.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d362.8547136234369!2d21.89869260476974!3d43.31765667313643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b0f24deaf1%3A0xecb41591b1696e62!2zRHXFoWFub3ZhIDQxLCBOacWhLCBTZXJiaWE!5e0!3m2!1sen!2sus!4v1464143916859', 'images/nightlife/beergarden.jpg', 'pub', '065 4780857', NULL, NULL, NULL, NULL),
(30, 'Clinica', 'Niška tvrdjava 7 - 12', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1451.276490481706!2d21.894812551902124!3d43.32361637716763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ssr!2srs!4v1464134208404', 'images/nightlife/clinica.jpg', 'club', '064 2609277', NULL, NULL, NULL, NULL),
(31, 'Truba', 'Svetozara Markovića 8', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d431.4959006415402!2d21.89781411397132!3d43.319558567864085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xff87004dddd135a0!2sTruba+Cafe!5e0!3m2!1sen!2sus!4v1464138282991', 'images/nightlife/truba.jpg', 'caffe', NULL, NULL, NULL, NULL, NULL),
(32, 'Labeerint', 'Balkanska 2a', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2902.642095037804!2d21.892387115031127!3d43.32175118181866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b45caa1279%3A0xbb5284d12c8f2fb1!2sBalkanska+2%2C+Ni%C5%A1%2C+Serbia!5e0!3m2!1sen!2sus!4v1464143596263', 'images/nightlife/labeerint.jpg', 'pub', '066 8528004', NULL, NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

CREATE TABLE `hrana` (
  `idhrana` int(11) NOT NULL AUTO_INCREMENT,
  `idres` int(11) DEFAULT NULL,
  `ime` varchar(150) DEFAULT NULL,
  `opis` varchar(500) DEFAULT NULL,
  `slika` varchar(1000) DEFAULT NULL,
  `tip` varchar(20) NOT NULL,
  `tag` varchar(500) DEFAULT NULL,
  `type` varchar(15) NOT NULL,
  `opiseng` varchar(200) NOT NULL,
  PRIMARY KEY (`idhrana`),
  KEY `idres_FK` (`idres`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `hrana` (`idhrana`, `idres`, `ime`, `opis`, `slika`, `tip`, `tag`, `type`, `opiseng`) VALUES
(1, 1, 'Pica Frutti di mare', 'Pelat, svež paradajz, plodovi mora, kačkavalj', 'images/food/frutidimare.jpg', 'pica', 'pica fruti de mare pizza', 'pizza', 'dough, tomato, sea fruits, cheese'),
(2, 1, 'Pica Capirccoza', 'Pelat, šunka, pečurke, kačkavalj', 'images/food/kapricoza.jpg', 'pica', 'pica pizza capriccoza capicoza kapricoza', 'pizza', 'dough, ham, mushrooms, cheese'),
(3, 1, 'Pica Quattro stagioni', 'Pelat, šunka, pečurke, kulen, slanina, kačkavalj, jaje, svež paradajz', 'images/food/kvatrostadjone.jpg', 'pica', 'pica pizza quattro stagioni quatro stagoni kvatro stadjoni', 'pizza', 'dough, ham, mushroom, sausage, bacon, cheese, egg, tomato'),
(4, 1, 'Pica Margarita', 'Pelat, svež paradajz, kačkavalj', 'images/food/margarita.jpg', 'pica', 'pica pizza margarita', 'pizza', 'dough, tomato, cheese'),
(5, 1, 'Pica Mexicana', 'Pelat, svež paradajz, kulen, kobasica, ljuta paprika, kačkavalj', 'images/food/mexikana.jpg', 'pica', 'pica pizza mexicana meksikana mexicana', 'pizza', 'dough, tomato, sausage, hot pepper, cheese'),
(6, 1, 'Pica Quattro formaggi', 'Pelat, gauda, gorgonzola, kačkavalj', 'images/food/quatrofomadji.jpg', 'pica', 'pica pizza quattro formaggi quatro formagi kvatro formadji', 'pizza', 'dough, 4 types of cheese'),
(7, 1, 'Pica Vegetariana', 'Pelat, svež paradajz, paprika, šećerac, masline, kačkavalj', 'images/food/vegetariana.jpg', 'pica', 'pica pizza vegerteriana', 'pizza', 'dough, tomato, pepper, corn, olives, cheese'),
(8, 1, 'Pasta Bolonjeze', 'Testenina, parmezan, pelat, goveđe meso, šargarepa, luk, bosiljak', 'images/food/bolonjeze.jpg', 'pasta', 'pasta bolonjeze bolgneze', 'pasta', 'pasta, parmesan, cow meat, carrot, onion, basil'),
(9, 1, 'Pasta Fungi', 'Testenina, neutralna pavlaka, začin, parmezan, pečurke', 'images/food/pastafungi.jpg', 'pasta', 'pasta fungi', 'pasta', 'pasta, parmesan, neutral cream, spice, tomato, mushrooms'),
(10, 1, 'Pasta Napolitana', 'Pelat, svež paradajz, paprika, šećerac, masline, kačkavalj', 'images/food/pastatreca.jpg', 'pasta', 'pasta napolitana', 'pasta', 'pasta, parmesan, tomato, corn, olives, cheese'),
(11, 2, 'Pica Capriccoza', 'Pelat, šunka, pečurke, kačkavalj', 'images/food/kapricoza.jpg', 'pica', 'pica pizza capriccoza capicoza kapricoza', 'pizza', 'dough, ham, mushrooms, cheese'),
(12, 2, 'Pica Margarita', 'Pelat, svež paradajz, kačkavalj', 'images/food/margarita.jpg', 'pica', 'pica pizza margarita', 'pizza', 'dough, tomato, cheese'),
(13, 2, 'Pasta Bologneze', 'Testenina, parmezan, pelat, goveđe meso, šargarepa, luk, bosiljak', 'images/food/bolonjeze.jpg', 'pasta', 'pasta bolonjeze bolgneze', 'pasta', 'pasta, parmesan, cow meat, carrot, onion, basil'),
(14, 2, 'Tost Krem', 'Lepinja, krem', 'images/food/tost.jpg', 'tost', 'tost krem', 'tost', 'bread, hazelnut cream'),
(15, 2, 'Tost Šunka, kačkavalj', 'Lepinja, šunka, kačkavalj', 'images/food/tost2.jpg', 'tost', 'tost sunka salama', 'tost', 'bread, ham, cheese'),
(16, 2, 'Tost Pečenica, kačkavalj', 'Lepinja, pečenica, kačkavalj', 'images/food/tost3.jpg', 'tost', 'tost pecenica', 'tost', 'bread, ham, cheese'),
(17, 4, 'Pica Domaća', 'Pelat, kačkavalj, kulen, dimljena slanina, pečurke, dimljeno meso, jaje', 'images/food/domaca.jpg', 'pica', 'pica pizza domaca srpska', 'pizza', 'dough, cheese, sausage, smoked bacon, mushroom, smoked meat, egg'),
(18, 4, 'Pica Frutti di mare', 'Pelat, svež paradajz, plodovi mora, kačkavalj', 'images/food/frutidimare.jpg', 'pica', 'pica fruti de mare pizza', 'pizza', 'dough, tomato, sea fruits, cheese'),
(19, 4, 'Pica Capirccoza', 'Pelat, šunka, pečurke, kačkavalj', 'images/food/kapricoza.jpg', 'pica', 'pica pizza capriccoza capicoza kapricoza', 'pizza', 'dough, ham, mushrooms, cheese'),
(20, 4, 'Pica Quattro stagioni', 'Pelat, šunka, pečurke, kulen, slanina, kačkavalj, jaje, svež paradajz', 'images/food/kvatrostadjone.jpg', 'pica', 'pica pizza quattro stagioni quatro stagoni kvatro stadjoni', 'pizza', 'dough, ham, mushroom, sausage, bacon, cheese, egg, tomato'),
(21, 4, 'Pica Margarita', 'Pelat, svež paradajz, kačkavalj', 'images/food/margarita.jpg', 'pica', 'pica pizza margarita', 'pizza', 'dough, tomato, cheese'),
(22, 4, 'Pica Mexicana', 'Pelat, svež paradajz, kulen, kobasica, ljuta paprika, kačkavalj', 'images/food/mexikana.jpg', 'pica', 'pica pizza mexicana meksikana mexicana', 'pizza', 'dough, tomato, sausage, hot pepper, cheese'),
(23, 4, 'Pica Vegetariana', 'Pelat, svež paradajz, paprika, šećerac, masline, kačkavalj', 'images/food/vegetariana.jpg', 'pica', 'pica pizza vegerteriana', 'pizza', 'dough, tomato, pepper, corn, olives, cheese'),
(24, 4, 'Pasta Bolonjeze', 'Testenina, parmezan, pelat, goveđe meso, šargarepa, luk, bosiljak', 'images/food/bolonjeze.jpg', 'pica', 'pasta bolonjeze bolgneze', 'pizza', 'pasta, parmesan, cow meat, carrot, onion, basil'),
(25, 4, 'Tost Krem', 'Lepinja, krem', 'images/food/tost.jpg', 'tost', 'tost krem', 'tost', 'bread, hazelnut cream'),
(26, 4, 'Tost Šunka', 'Lepinja, šunka', 'images/food/tost2.jpg', 'tost', 'tost sunka', 'tost', 'bread, ham, cheese'),
(27, 4, 'Tost Pečenica, kačkavalj', 'Lepinja, pečenica, kačkavalj', 'images/food/tost3.jpg', 'tost', 'tost pecenica', 'tost', 'bread, ham, cheese'),
(28, 8, 'Musaka', 'Krompir, meso, jaje', 'images/food/musaka.jpg', 'specijalitet', 'galija specijalitet hrana domace', 'specialty', 'Potato, meat, egg'),
(29, 8, 'Srpska salata', 'Pradajz, krastavac, sir, ulje, sirce', 'images/food/srpskasalata.jpg', 'salata', 'galija salta domace srpska srbska', 'salad', 'Tomato, kucumber, cheese, oil, vinegar'),
(30, 8, 'Sarma', 'Mleveno meso, pirinac, luk, zacin, list kupusa', 'images/food/sarma.jpg', 'specijalitet', 'sarma galija domace srpska srbska', 'speciality', 'Minced meat, rice, onion, spice, cabbage leaf'),
(31, 8, 'Przene tikvice', 'tikvice, pavlaka', 'images/food/tikvice.jpg', 'specijalitet', 'galija specijalitet tikvice', 'speciality', 'Fried Zucchini, cream'),
(32, 8, 'Punjenji plavi patlidzan', 'Plavi patlidzan, pavlaka, kackavalj', 'images/food/plavi.jpg', 'specijalitet', 'galija specijalitet plavi patlidzan srpska spbska domaca', 'speciality', 'Stuffed eggplant, cream, cheese, eggplant'),
(33, 8, 'Gulas', 'Zaprska, govedje meso, svinjsko meso, povrce', 'images/food/gulas.jpg', 'specijalitet', 'galija corba srbska srpska gulas', 'speciality', 'Stew, vegetables, cow meat, pork '),
(34, 8, 'Pljeskavica', 'Rostilj meso', 'images/food/pljeskavica.jpg', 'rostilj', 'galija niski rostilj pleskoavica', 'grill', 'Grilled meat'),
(35, 8, '5 Cevapa', 'Rostilj meso', 'images/food/cevapi.jpg', 'rostilj', 'galija rostilj cevapi', 'grill', 'Griled meat'),
(36, 8, 'Pileće belo', 'Pileće belo meso 200g', 'images/food/pilecebelo.jpg', 'rostilj', 'galija rostilj meso pilece belo', 'grill', 'Roasted chicken meat'),
(37, 8, 'Kobasica', '200g', 'images/food/kobasice.jpg', 'rostilj', 'galija rostilj kobasica meso', 'grill', 'Grilled sausage 200g'),
(38, 5, 'Tost krem', 'Lepinja, krem', 'images/food/tost.jpg', 'tost', 'tost krem', 'tost', 'bread, hazelnut cream'),
(39, 5, 'Tost sunka', 'Lepinja, šunka', 'images/food/tost2.jpg', 'tost', 'tost sunka', 'tost', 'bread, ham, cheese'),
(40, 5, 'Tost pecenica', 'Lepinja, pečenica, kačkavalj', 'images/food/tost3.jpg', 'tost', 'tost pecenica', 'tost', 'bread, ham, cheese'),
(41, 5, 'Hot dog', 'Vekna, visrsla', 'images/food/hotdog.jpg', 'tost', 'venis brza hrana tost visrla', 'tost', ''),
(42, 5, 'Slatka palacinka krem', 'testo, krem', 'images/food/slatka.jpg', 'palacinka', 'venis palacinka slatka krem', 'pancake', 'Dough, hazelnut cream'),
(43, 5, 'Slana palacinka', 'testo, sunka, kačkavalj, pečurke, palvaka', 'images/food/slana.jpg', 'palacinka', 'venis pakacinka slana', 'pancake', 'Dough, ham, cheese, mushroom, cream'),
(44, 5, 'Grčka salta', 'sir, maslinovo ulje,krastavac, paradjaz, masline, luk', 'images/food/grcka.jpg', 'salata', 'venis salata grcka', 'salad', 'cheese, olive oil, olives, cucumber, tomato, onion'),
(45, 7, 'Pica Domaća', 'Pelat, kačkavalj, kulen, dimljena slanina, pečurke, dimljeno meso, jaje', 'images/food/domaca.jpg', 'pica', 'pica pizza domaca srpska', 'pizza', 'dough, cheese, sausage, smoked bacon, mushroom, smoked meat, egg'),
(46, 7, 'Pica Frutti di mare', 'Pelat, svež paradajz, plodovi mora, kačkavalj', 'images/food/frutidimare.jpg', 'pica', 'pica fruti de mare pizza', 'pizza', 'dough, tomato, sea fruits, cheese'),
(47, 7, 'Pica Capirccoza', 'Pelat, šunka, pečurke, kačkavalj', 'images/food/kapricoza.jpg', 'pica', 'pica pizza capriccoza capicoza kapricoza', 'pizza', 'dough, ham, mushrooms, cheese'),
(48, 7, 'Pica Quattro stagioni', 'Pelat, šunka, pečurke, kulen, slanina, kačkavalj, jaje, svež paradajz', 'images/food/kvatrostadjone.jpg', 'pica', 'pica pizza quattro stagioni quatro stagoni kvatro stadjoni', 'pizza', 'dough, ham, mushroom, sausage, bacon, cheese, egg, tomato'),
(49, 7, 'Pica Quattro formaggi', 'Pelat, gauda, gorgonzola, kačkavalj', 'images/food/quatrofomadji.jpg', 'pica', 'pica pizza quattro formaggi quatro formagi kvatro formadji', 'pizza', 'dough, 4 types of cheese'),
(50, 7, 'Pica Margarita', 'Pelat, svež paradajz, kačkavalj', 'images/food/margarita.jpg', 'pica', 'pica pizza margarita', 'pizza', 'dough, tomato, cheese'),
(51, 7, 'Pica Mexicana', 'Pelat, svež paradajz, kulen, kobasica, ljuta paprika, kačkavalj', 'images/food/mexikana.jpg', 'pica', 'pica pizza mexicana meksikana mexicana', 'pizza', 'dough, tomato, sausage, hot pepper, cheese'),
(52, 7, 'Pica Vegetariana', 'Pelat, svež paradajz, paprika, šećerac, masline, kačkavalj', 'images/food/vegetariana.jpg', 'pica', 'pica pizza vegerteriana', 'pizza', 'dough, tomato, pepper, corn, olives, cheese'),
(53, 7, 'Slatka palacinka krem', 'testo, krem', 'images/food/slatka.jpg', 'palacinka', 'palacinka slatka krem', 'pancake', 'Dough, hazelnut cream'),
(54, 7, 'Slana palacinka', 'testo, sunka, kačkavalj, pečurke, palvaka', 'images/food/slana.jpg', 'palacinka', 'pakacinka slana', 'pancake', 'Dough, ham, cheese, mushroom, cream'),
(55, 9, 'Dimljeni kotlet', 'Svinjsko meso, luk, ljuta paprika, krompir', 'images/food/kotlet.jpg', 'specijalitet', 'mesto specijalitet kotlet', 'specialty', 'Smoked kotlet: pork, onion, hot pepper, potato'),
(56, 9, 'Pasulj', 'Pasulj, sviljsko meso', 'images/food/pasulj.jpg', 'specijalitet', 'specijalitet pasulj varivo', 'speciality', 'Cooked beans, pork'),
(57, 9, 'Pljeskavica', 'Roštilj meso, 200g', 'images/food/pljeskavica.jpg', 'rostilj', 'pljeskavica rostilj meso', 'grill', 'Grilled meat 200g'),
(58, 9, '5 ćevapa', 'Roštilj meso, 200g', 'images/food/cevapi.jpg', 'rostilj', 'rostilj cevapi meso', 'grill', 'Griled meat 200g'),
(59, 9, 'Srpska salata', 'Pradajz, krastavac, sir, ulje, sirce', 'images/food/srpskasalata.jpg', 'salata', 'salta domace srpska srbska', 'salad', 'Tomato, kucumber, cheese, oil, vinegar'),
(60, 9, 'Grčka salata', 'sir, maslinovo ulje,krastavac, paradjaz, masline, luk', 'images/food/grcka.jpg', 'salata', 'salata grcka', 'salad', 'cheese, olive oil, olives, cucumber, tomato, onion'),
(61, 9, 'Bela vešalica', 'Svinjsko meso 200g, krompir, luk', 'images/food/vesalica.jpg', 'rostilj', 'rostilj bela vesalica meso', 'grill', 'White pork meat 200g, potato, onion'),
(62, 9, 'Ražnjići', 'Pileće meso, slanina, 200g', 'images/food/raznici.jpg', 'rostilj', 'rostilj raznjici', 'grill', 'Skewers: chicken meat, bacon, 200g'),
(63, 9, 'Gulaš', 'Zaprska, govedje meso, svinjsko meso, povrce', 'images/food/gulas.jpg', 'specijalitet', 'corba srbska srpska gulas', 'speciality', 'Stew, vegetables, cow meat, pork ');





CREATE TABLE IF NOT EXISTS `nllokali` (
  `idres` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) DEFAULT NULL,
  `adresa` varchar(100) DEFAULT NULL,
  `ocena` double DEFAULT NULL,
  `opis` varchar(1000) DEFAULT NULL,
  `gmaps` varchar(2000) DEFAULT NULL,
  `slika` varchar(1000) DEFAULT NULL,
  `tip` varchar(20) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `tag` varchar(1000) DEFAULT NULL,
  `info` varchar(3000) DEFAULT NULL,
  `slajd` varchar(500) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idres`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;


INSERT INTO `nllokali` (`idres`, `ime`, `adresa`, `ocena`, `opis`, `gmaps`, `slika`, `tip`, `telefon`, `tag`, `info`, `slajd`, `mail`) VALUES
(1, 'Scena', 'Sinđelićev trg', 4, '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2440.9063080955075!2d21.897417751517192!3d43.31963600914087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b728c937f1%3A0xa5847df81f609354!2z0KHRhtC10L3QsCDQmtC70YPQsQ!5e0!3m2!1ssr!2srs!4v1464127686511', 'images/nightlife/scena.jpg', 'Club', '064 1218121', 'scena klub club provod nocni zivot nocnizivot', '', NULL, 'scena@gmail.com'),
(2, 'Stara Srbija', 'Trg Republike 12', NULL, 'Kafana Stara Srbija je retka kafana i građevina za koju se može reći da je simbol grada,\n                                    sa svojom dugom tradicijom preko od preko 120. godina. Preko svojih kariranih stoljnjaka\n                                    „preturila“ je štošta i ispisala istoriju kako grada Niša tako i Srbije. Stara Srbija se nalazi u starom trgovačkom delu grada na mestu gde je nekada bio\n                                    “karavan saraj”. Mesto u kome su se okupljali zanatlije ali i državnici\n                                    mirno je i danas idealno za porodične i poslovne ručkove.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2902.851199589852!2d21.89439971490875!3d43.31737428210022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b1a99f0ab5%3A0x2dd55ad3f9c49924!2z0KHRgtCw0YDQsCDQodGA0LHQuNGY0LA!5e0!3m2!1ssr!2srs!4v1464132703037', 'images/nightlife/starasrbija.jpg', 'tavern', '018 521902', 'kafana stara srbija tavern serbia old', 'Old Tavern Serbia is a rare cafes and buildings that can be said that the symbol of the city, with its long tradition over more than 120 years. Through its checkered tablecloths\n"Ransacked" is many things and has written the history of the city of Nis and Serbia. Old Serbia is located in the old commercial part of the city on the site where once stood "Caravanserai". The place where they gathered craftsmen but also statesm calm is still ideal for family and business lunches.', NULL, 'starasrbija@gmail.com'),
(3, 'Sunset', 'Cara Dušana 47a', 3, NULL, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d513.153247384481!2d21.89893020323521!3d43.31775256172781!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x3b04705bdc3280d2!2sSunset+Club!5e0!3m2!1ssr!2srs!4v1464133213228', 'images/nightlife/sunset.jpg', 'club', '061 2979299', 'sunset club klub svirka   ', NULL, NULL, 'sunset@gmail.com'),
(4, 'Galija', 'Nikole Pašića 35', NULL, 'Kafana Galija jedna je od starih kafana u gradu s veoma dugom tradicijom. „Galija“ ne menja ni vreme ni mesto. Živi.\n                                    U njoj su mnogi imali svoje mesto. Dolazili su glumci, pisci, novinari, ugledni majstori i ostala elita prošlih vremena.\n                                    „Galija“ se i danas trudi da bude mesto u kome se okuplja elita, sklapaju  poslovna prijateljstva i saradnje i u tome uspeva.\n                                    O kvalitetu hrane i usluge nećemo ni da govorimo, najbolje je da dođete i uverite se sami.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d684.9742982692302!2d21.89568880596442!3d43.31802907046845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xe89499d1088e33d1!2z0JPQsNC70LjRmNCw!5e0!3m2!1ssr!2srs!4v1464133622140', 'images/nightlife/galija.jpg', 'tavern', '018 515626', 'galija kafana tavern nis nocni zivot nightlife ', 'Tavern Galija is one of the oldest restaurant in the city with a very long tradition. "Galija" does not change the time or place. Living.\nThere are many people had their place. They were coming actors, writers, journalists, artists and other prominent elite of ancient times."Gaul" is still trying to be the place where the elite gather, assemble business friendships and cooperation, and that works. The quality of food and service that we will not talk, it is best to come and see for yourself.', NULL, 'galija@gmail.com'),
(5, 'Symphony', 'Generala Milojka Lešjanina 16', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d484.3291550259812!2d21.89334021425992!3d43.32064043559212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x6a258f5d55001d53!2z0KHQuNC80YTQvtC90LjRmNGB0LrQuCDQvtGA0LrQtdGB0YLQsNGA!5e0!3m2!1ssr!2srs!4v1464133442787', 'images/nightlife/symphony.jpg', 'club', '060 4924292', 'club klub simfonijski symphony nightlife nocni zivot', NULL, NULL, 'symphony@gmail.com'),
(6, 'Process', 'Sedmog Jula 6', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1451.3026854861637!2d21.89698378440136!3d43.322519839874104!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x050fcc444d1b77fb!2sProcess+-+VIP+Bar!5e0!3m2!1sen!2sus!4v1464134737024', 'images/nightlife/process.jpg', 'club', '064 8899778', 'proces process nocni zivot nightlife proces club klub', NULL, NULL, 'process@gmail.com'),
(7, 'Lo-Co', 'Kej Kolo Srpskih Sestara BB', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1451.2967499323997!2d21.895609281089772!3d43.32276830736893!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xa52c729e8917cc56!2sLo+Co+Tropic+Open+Bar!5e0!3m2!1sen!2sus!4v1464134402402', 'images/nightlife/loco.jpg', 'club', '063 461506', 'loco loko nightlife nocni zivot  klub club', NULL, NULL, 'loco@gmail.com'),
(8, 'Berta', 'Cara Dušana 73', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d513.150487371535!2d21.902106013283547!3d43.318079377083905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x7cbe482a291dd31b!2sPivnica+Berta!5e0!3m2!1sen!2sus!4v1464144489040', 'images/nightlife/berta.jpg', 'pub', NULL, 'berta pivnica pub pivo nightlife nocni zivot', NULL, NULL, 'berta@gmail.com'),
(9, 'Beer Book', 'Cara Dušana 98', NULL, 'Beer Book je najnovija pivnica u gradu, otvorena avgusta 2015. godine. U moderno dizajniranom ambijentu ove\n                                    pivnice možete probati preko 30 vrsta piva. Nažalost, hrana (još uvek) nije u ponudi tako da ćete svoju glad\n                                    morati da utolite na nekom drugom mestu. Vikendom se u pivnici organizuju svirke niških bendova tako da posetioci mogu uživati u domaćoj i stranoj rok muzici.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d725.706960950969!2d21.90323802920252!3d43.317863174428695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0ba31afc8d5%3A0x94e151b2805df22c!2zRHXFoWFub3ZhIDEwMiwgTmnFoSwgU2VyYmlh!5e0!3m2!1sen!2sus!4v1464144293907', 'images/nightlife/beerbook.jpg', 'pub', '063 7735018 ', 'beerbook pivo nocni zivot nightlife pivnica pub', 'Beer Book is the newest pub in the city, opened in August 2015. The modern designed ambience of the pubs you can try more than 30 kinds of beer. Unfortunately, the food is (still) does not offer so that you your hunger need to quench elsewhere. Weekends are organized in the pub gigs Nis bands so that visitors can enjoy in domestic and foreign rock music.', NULL, 'beerbook@gmail.com'),
(10, 'Skadarlija', 'Dušanova 46', NULL, 'Jedna od starih kafana u gradu, otvorena još 1977. godine i od tada uspeva da sačuva svoju dušu i boemsku notu.\n                                    Ovde su se rađale i gasile mnoge ljubavi, tugovalo se i veselilo. Specijaliteti su jela sa roštilja.\n                                    Najpoznatija je po ćevapima i bećarcu (albanskoj salati), koji spadaju možda i u najbolje u gradu.I prizemlje i sprat odišu nekim kafanskim šmekom,\n                                    sve je u punom drvetu i kovanom gvožđu, pa iako ste u centru grada možete da se na trenutak opustite i uživate u pravoj seoskoj atmosferi.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d431.4959006415402!2d21.89781411397132!3d43.319558567864085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xff87004dddd135a0!2sTruba+Cafe!5e0!3m2!1sen!2sus!4v1464138282991', 'images/nightlife/skadarlija.jpg', 'tavern', '018 241986', ' nocni zivot nightlife skadarlija tavern kafana', 'One of the old taverns in the city, opened in 1977 and since then has managed to preserve its soul and bohemian touch. Here were born and extinguished many love, grieve and rejoice. Specialties include grilled dishes. Best known for kebabs and bećarci (Albania salad) who are perhaps the best in gradu.I ground floor and exude some charm tavern, all in solid wood and wrought iron, and though you are in the city center you can relax for a moment and enjoy the real village atmosphere.', NULL, 'skadarlija@gmail.com'),
(11, 'Ministarstvo Beer Bar', 'Vojvode Vuka 12', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m17!1m8!1m3!1d2902.7285299957584!2d21.901651!3d43.319942!3m2!1i1024!2i768!4f13.1!4m6!3e2!4m0!4m3!3m2!1d43.3201208!2d21.9017037!5e0!3m2!1sen!2sus!4v1464142605213', 'images/nightlife/ministarstvo.jpg', 'pub', ' 063 460350 ', ' nocni zivot nightlife ministarstvo ministry pivnica pub', NULL, NULL, 'ministarstvo@gmail.com'),
(12, 'Pleasure', 'Kopitareva 7', NULL, 'PLEASURE je mesto stvoreno za one koji vole da uživaju, ljude od stila i ukusa. Nalazimo se na sjajnoj lokaciji u\n                                    Kazandžijskom sokačetu u samom srcu Niša. "Pleasure" je osnovan marta 2007. godine.\n                                    Ugostiteljski objekat je sastavljen iz tri odvojene sale za usluživanje, ukupne površine 280m2 sa\n                                    ukupnim kapacitetom 210 sedećih mesta i kuhinjskim delom sa magacinima na površini od 140m2.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d431.50773012584284!2d21.895175030909325!3d43.31789282432396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x515570fc7de23461!2sPleasure+Club!5e0!3m2!1sen!2sus!4v1464137940579', 'images/nightlife/pleasure.jpg', 'caffe', '018 517551', 'pleasure cafe caffe kafic  nocni zivot nightlife ', 'PLEASURE is a place created for those who like to enjoy, the people of style and taste. We are at a great location Kazandzijsko alley in the heart of Nis. "Pleasure" was established in March 2007. Catering facility is composed of three separate halls for serving, with a total area of 280m2 a total capacity of 210 seats and a kitchen area with warehouses in an area of 140m2.', NULL, 'pleasure@gmail.com'),
(13, 'Diamond', 'Prijezdina 4', 4, 'Diskoteka Diamond (nekadašnji Studio) najveća je diskoteka u Nišu sa\r\n                                    kapacitetom od 1200 do 1500 ljudi. Prostor je organizovan na dva nivoa\r\n                                    i sadrži devet separea i mnoštvo stolova uz dodatnu VIP galeriju za stalne goste.\r\n                                    Ova diskoteka poznata je po stalnim i ekskluzivnim gostovanjima domaćih pop i folk zvezda.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1451.4401783910957!2d21.894501658056!3d43.31676394628509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x9641c0220a2d3ea6!2sDiskoteka+Diamond!5e0!3m2!1ssr!2srs!4v1464125798509', 'images/nightlife/diamond.jpg', 'club', '064 4277765', 'club klub diamond nis  nocni zivot nightlife', 'Diamond Disco (formerly Studio) is the largest discotheque in Nis with a capacity of 1200 to 1500 people. The space is organized on two levels and includes nine booths and plenty of tables with additional VIP gallery for regular guests. This disco is known for its constant and exclusive performances of local folk and pop star.', NULL, 'diamond@gmail.com'),
(14, 'Vavilon', 'Nikole Pašića 36 ', NULL, 'Klub Vavilon nalazi se preko puta Kalče, u podrumu zgrade u kojoj su smešteni Sky Caffe i\n                                    Bilijar klub Atlantis. Zbog redovnih house žurki koje se prave u toku radne nedelje postao j\n                                    e veoma popularan među studentskom populacijom. Vikendi su uglavnom rezervisani za nastupe\n                                    niških bendova ili gostovanja regionalnih muzičkih zvezdi.\n', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4105.211901144726!2d21.894795680901662!3d43.31796093435183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b3da0c80fb%3A0xf8898be5021da7bf!2z0JrQu9GD0LEgIlZhdmlsb24i!5e0!3m2!1ssr!2srs!4v1464129155299', 'images/nightlife/vavilon.jpg', 'club', '069 4054233', 'club klub vavilon  nocni zivot nightlife', 'Club Vavilon is located across Kalca, in the basement of the building where they are located and the Sky Cafe Billiard Club Atlantis. Due to regular house parties that are made during the working week has become very popular among the student population. Weekends are generally reserved for Nis bands or hosting regional music stars.', NULL, 'vavilon@gmail.com'),
(15, 'Mrak', 'Bulevar 12. februar BB', NULL, 'Ne tako stara kafana, ušuškana na periferiji grada, koja svoj renome gradi već 15-ak godina. Iako nije u centru, i ne postoji dugo da bi\r\n                                    stari boemi pričali o njoj, i slabiji poznavaoci kafane su čuli za kafanu „Mrak“,\r\n                                    mesto gde je hrana ponajbolja u gradu.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1775.8746852585793!2d21.87021386386713!3d43.34294957017313!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x0e42417ab748eb89!2sKafana+MRAK!5e0!3m2!1sen!2sus!4v1464135089589', 'images/nightlife/mrak.jpg', 'tavern', '018 581234', 'mrak kafana tavern  nocni zivot nightlife', NULL, NULL, 'mark@gmail.com'),
(16, 'Cubo', 'Balkanska 2', NULL, 'Cubo klub je jedan od omiljenih klubova niških studenata.\r\n                                    Na repertoaru je uglavnom miks haus muzike i domaćih narodnjaka\r\n                                    sa popularnim folk hitovima nakon ponoći.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d431.48101270296956!2d21.894463130392566!3d43.32165365308235!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xc5652b54e976e6b5!2sCubo+Club!5e0!3m2!1sen!2sus!4v1464135234699', 'images/nightlife/cubo.jpg', 'club', '063 461506', 'cubo kubo  nocni zivot nightlife klub club', NULL, NULL, 'cubo@gmail.com'),
(17, 'Bla Bla', 'Kopitareva BB', 4, NULL, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d725.707531966696!2d21.895650723526767!3d43.31781536373731!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x8129b7f98d5f6adb!2sBla+Bla!5e0!3m2!1sen!2sus!4v1464135431965', 'images/nightlife/blabla.jpg', 'caffe', '018 242111', 'blabla kafic caffe cafe  nocni zivot nightlife', NULL, NULL, 'blabla@gmail.com'),
(18, 'Vespa', 'Trg Republike 1', NULL, 'Baš tu, u epicentru trusnog kulturnog područja vraća se Nišu gradski šmek ogrnut mods kaputom. Na ovom mestu smešten je\r\n                                    VESPA BAR, vremeplov koji seže u 1946. godinu,\r\n                                    iz koje na put ka večnosti kreće urbani stil života, čiji neuhvatljivi talas nalazi predah upravo u Nišu.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d746.9731145010601!2d21.896517391407876!3d43.31775441363968!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x57a6eee11f23d3ef!2sVespa+Bar!5e0!3m2!1sen!2sus!4v1464135644067', 'images/nightlife/vespa.jpg', 'caffe', '018 305067', 'vespa caffe kafic  nocni zivot nightlife', NULL, NULL, 'vespa@gmail.com'),
(19, 'Ypsilon', '9. Brigade 6', NULL, 'Club Ypsilon odiše vrlo prijatim okruženjem uvek punim prijatnih i razdraganih gostiju,\r\n                                    kao i ljubaznim i izuzetno uslužnim osobljem. Jedinstveni ambijent i prijatna atmosfera\r\n                                    cine "Club Ypsilon" pravim mestom za opusteni izlazak i prijatan razgovor sa porodicom i prijateljima.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2902.866978988395!2d21.90188831548686!3d43.31704397913415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b14f921bab%3A0x345632c96aa0bedd!2sKLUB+YPSILON!5e0!3m2!1ssr!2srs!4v1464129077673', 'images/nightlife/y.jpg', 'club', '069 4849500', 'y ypsilon kafic caffe  nocni zivot nightlife', NULL, NULL, 'y@gmail.com'),
(20, 'Čitaonica', 'Milentija Popovića BB', NULL, 'Kafana je „mlada“ kao i njen gazda, ali što je za svaku pohvalu uvek je prisutan u kafani i redovno pušta „ture“, pogotovo ako je ekipa opuštena.\n                                    Ogromna bašta je definitivno jedan od najjačih aduta ove kafane, jer sam veliki deo leta proveo tamo. Odvojena od grada, saobraćaja,\n                                    uz zvuke tambiraša i violine, bila mi je oaza mira ovog leta.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4608.38798159567!2d21.873874003205845!3d43.312114269736654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b7564f9232a1%3A0xd94928bc69ced4!2z0KfQuNGC0LDQvtC90LjRhtCw!5e0!3m2!1sen!2sus!4v1464135925563', 'images/nightlife/citaonica.jpg', 'tavern', '018 264006', 'kafana tavern citaonica readingroom  nocni zivot nightlife', 'Tavern is a "young" as well as her boss, but what is laudable is always present in the bar and regularly released "tours", especially if the team relaxed. Huge garden is definitely one of the strongest points of this tavern, because I spent a large part of the year there. Separated from the city, traffic, with the sounds of the violin, it was an oasis of peace this year.', NULL, 'citaonica@gmail.com'),
(21, 'Liv', 'Trg Republike 1', 3, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d863.016148809755!2d21.89620811341903!3d43.317844344638694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b105875663%3A0xdb2e57290146ea5e!2sTrg+republike!5e0!3m2!1sen!2sus!4v1464136397315', 'images/nightlife/liv.jpg', 'caffe', '064 6687090', 'liv club klub  nocni zivot nightlife', NULL, NULL, 'liv@gmail.com'),
(22, 'Lagano', 'Trg Republike 3 - 7', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1451.420959237479!2d21.895948900539732!3d43.317568558509834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b1086c9211%3A0x823eddb33262418e!2sCaffe+Lagano!5e0!3m2!1sen!2sus!4v1464136683388', 'images/nightlife/lagano.jpg', 'caffe', '064 8058890', 'lagano kafic caffe cafe  nocni zivot nightlife', NULL, NULL, 'lagano@gmail.com'),
(23, 'Irish Pub Crazy Horse', 'Davidova 8', NULL, 'Pub je mesto u kome se zadovoljava potreba za zabavom, pićem i razgovorom. Mesto,\r\n                                    koje ne uživa samo kod pivopija kultni status, središte je i društvenog života, kako mladih, tako\r\n                                    i ljudi svih generacija, koji Pab doživljavaju svojom drugom kućom.\r\n                                    Sa jakom željom, da i u Nišu postoji jedno takvo mesto, u centralnom gradskom tkivu novembra 2011.\r\n                                    je počeo sa radom Irish pub Crazy Horse.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2902.635989320035!2d21.891912315487012!3d43.32187897913408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b4594f0a59%3A0x9ed360b31b057600!2sIrish+Pub+Crazy+Horse!5e0!3m2!1ssr!2srs!4v1464142882610', 'images/nightlife/irish.jpg', 'pub', '062 780574', 'pub pivnica pivo irish irski  nocni zivot nightlife', NULL, NULL, 'irish@gmail.com'),
(24, 'Nislijska Mehana', 'Prvomajska 49', NULL, 'Kafana "Nišlijska Mehana" nalazi se u užem centru Niša i zvanično je počela sa radom 08.03.1996 god.\r\n                                    Već u leto iste godine ,bila je jedan od omiljenih lokala Nišlijama. Vremenom je dostigla status najposećenije\r\n                                    kafane u Nišu. U pravom,domaćinskom ambijentu,kafana raspolaže kapacitetom od 90 mesta i letnjom baštom,čiji je kapacitet  30 mesta.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1776.4737365970534!2d21.9035824298003!3d43.322467941512514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x0b42414feddf5c50!2sNislijska+Mehana!5e0!3m2!1sen!2sus!4v1464143380222', 'images/nightlife/nislijskamehana.jpg', 'tavern', '018 513968', 'tavern kafana mehana nislijskamehana  nocni zivot nightlife', NULL, NULL, 'mehana@gmail.com'),
(25, 'Konstantin', 'Kopitareva 3', NULL, 'Klub sa velikim izborom kafa, čajeva, koktela, alkoholnih i bezalkoholnih pića, slanih i slatkih palčinki, sendviča,\r\n                                    a uvek imamo neka iznenađenja za sve goste. Sami ili u društvu,\r\n                                    uvek ćete se osećati ugodno u prijatnom ambijentu i atmosferi kluba.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d419.2241442983991!2d21.89582489404204!3d43.31780604217818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xa767787fb961d183!2sCaffe+Konstantin!5e0!3m2!1sen!2sus!4v1464137226531', 'images/nightlife/konstantin.jpg', 'caffe', '061 3026744', 'konstantin constantine caffe cafe kafic  nocni zivot nightlife', NULL, NULL, 'konstantin@gmail.com'),
(26, 'Flo', 'Kopitareva 11', NULL, '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d431.50773012584284!2d21.895175030909325!3d43.31789282432396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xd09f086bb5a77a5d!2sKaldrma+Caffe!5e0!3m2!1sen!2sus!4v1464137535848', 'images/nightlife/flo.jpg', 'caffe', '065 3980110', NULL, NULL, NULL, NULL),
(27, 'Nemir', 'Obilićev Venac 35', NULL, 'Ovo mesto nastavlja tradiciju niških kafea i okupljališta na kojima se sluša dobra muzika,\r\n                                    ispija hladno pivo i prate aktuelni sportski događaji. Pored širokog izbora pića, postoji i kuhinja iz koje možete naručiti pomfrit, ćevape, kobasice i slične stvari sa roštilja koje, pored toga što su ukusne, fenomenalno idu uz pivo.\r\n                                    Veoma pohvalna je i činjenica to što se hrana naplaćuje po gramaži tako da, zavisno od apetita, sami možete odrediti svoju porciju.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1451.4583303809075!2d21.891047!3d43.31600400000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x438fa6f2d26075c1!2z0J3QtdC80LjRgA!5e0!3m2!1sen!2sus!4v1464143091849', 'images/nightlife/nemir.jpg', 'pub', NULL, NULL, NULL, NULL, NULL),
(28, 'Na Ćosku', 'Kopitareva 1', NULL, 'Cafe Na Ćošku nalazi se u centru grada, preko puta Gradske opštine, u etno ulici "Kazandžijsko sokače".\r\n                                    Počeo je sa radom 01. juna 2003. godine. Kafić poseduje raznovrsnu ponudu pića, koktela, kolača, i sladoleda. Takodje sadrži i poseban kutak za najmladje.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d498.5448565080338!2d21.895933981025994!3d43.31774250235806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x06cc282037884628!2zTmEgxIZvxaFrdQ!5e0!3m2!1sen!2sus!4v1464136873478', 'images/nightlife/nacosku.jpg', 'caffe', '063 296715', NULL, NULL, NULL, NULL),
(29, 'Beer Garden', 'Cara Dušana 41', NULL, 'Beer Garden je pivnica nastala na mestu nekadašnjeg legendarnog Beer House-a. Uz veoma prijatnu baštu i veliki broj drvenih stolova i klupa u lokalu predstavlja najveću pivnicu u Nišu. Nažalost, s obzirom da ima potpisan ekskluzivni ugovor sa Apatinskom pivarom, ne može se pohvaliti velikim izborom piva - na raspolaganju vam je svega pet - šest brendova. Od hrane možete naručiti pomfrit, girice, pileća krilca ili „dasku” - miks narezanih suhomesnatih proizvoda.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d362.8547136234369!2d21.89869260476974!3d43.31765667313643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b0f24deaf1%3A0xecb41591b1696e62!2zRHXFoWFub3ZhIDQxLCBOacWhLCBTZXJiaWE!5e0!3m2!1sen!2sus!4v1464143916859', 'images/nightlife/beergarden.jpg', 'pub', '065 4780857', NULL, NULL, NULL, NULL),
(30, 'Clinica', 'Niška tvrdjava 7 - 12', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1451.276490481706!2d21.894812551902124!3d43.32361637716763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ssr!2srs!4v1464134208404', 'images/nightlife/clinica.jpg', 'club', '064 2609277', NULL, NULL, NULL, NULL),
(31, 'Truba', 'Svetozara Markovića 8', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d431.4959006415402!2d21.89781411397132!3d43.319558567864085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xff87004dddd135a0!2sTruba+Cafe!5e0!3m2!1sen!2sus!4v1464138282991', 'images/nightlife/truba.jpg', 'caffe', NULL, NULL, NULL, NULL, NULL),
(32, 'Labeerint', 'Balkanska 2a', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2902.642095037804!2d21.892387115031127!3d43.32175118181866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b45caa1279%3A0xbb5284d12c8f2fb1!2sBalkanska+2%2C+Ni%C5%A1%2C+Serbia!5e0!3m2!1sen!2sus!4v1464143596263', 'images/nightlife/labeerint.jpg', 'pub', '066 8528004', NULL, NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);