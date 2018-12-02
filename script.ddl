#@(#) script.ddl

CREATE TABLE Padalinys
(
	pavadinimas varchar (255),
	miestas varchar (255),
	adresas varchar (255),
	vadovas varchar (255),
	mob_numeris varchar (255),
	el_pastas varchar (255),
	id_Padalinys integer AUTO_INCREMENT,
	PRIMARY KEY(id_Padalinys)
);

CREATE TABLE Saskaita
(
	saskaitos_nr int,
	suma double precision,
	data date,
	id_Saskaita integer AUTO_INCREMENT,
	PRIMARY KEY(id_Saskaita)
);

CREATE TABLE Knygos_Busena
(
	id_Knygos_Busena integer,
	name char (6) NOT NULL,
	PRIMARY KEY(id_Knygos_Busena)
);
INSERT INTO Knygos_Busena(id_Knygos_Busena, name) VALUES(1, 'paimta');
INSERT INTO Knygos_Busena(id_Knygos_Busena, name) VALUES(2, 'laisva');

CREATE TABLE Lytis
(
	id_Lytis integer,
	name char (10) NOT NULL,
	PRIMARY KEY(id_Lytis)
);
INSERT INTO Lytis(id_Lytis, name) VALUES(1, 'vyras');
INSERT INTO Lytis(id_Lytis, name) VALUES(2, 'moteris');
INSERT INTO Lytis(id_Lytis, name) VALUES(3, 'nenurodyta');

CREATE TABLE Pareigos
(
	id_Pareigos integer,
	name char (16) NOT NULL,
	PRIMARY KEY(id_Pareigos)
);
INSERT INTO Pareigos(id_Pareigos, name) VALUES(1, 'administratorius');
INSERT INTO Pareigos(id_Pareigos, name) VALUES(2, 'bibliotekininkas');

CREATE TABLE Uzsakymo_busena
(
	id_Uzsakymo_busena integer,
	name char (9) NOT NULL,
	PRIMARY KEY(id_Uzsakymo_busena)
);
INSERT INTO Uzsakymo_busena(id_Uzsakymo_busena, name) VALUES(1, 'vykdoma');
INSERT INTO Uzsakymo_busena(id_Uzsakymo_busena, name) VALUES(2, 'pabaigtas');

CREATE TABLE vertinimas
(
	id_vertinimas integer,
	name char (1) NOT NULL,
	PRIMARY KEY(id_vertinimas)
);
INSERT INTO vertinimas(id_vertinimas, name) VALUES(1, '1');
INSERT INTO vertinimas(id_vertinimas, name) VALUES(2, '2');
INSERT INTO vertinimas(id_vertinimas, name) VALUES(3, '3');
INSERT INTO vertinimas(id_vertinimas, name) VALUES(4, '4');
INSERT INTO vertinimas(id_vertinimas, name) VALUES(5, '5');

CREATE TABLE Zanras
(
	id_Zanras integer,
	name char (13) NOT NULL,
	PRIMARY KEY(id_Zanras)
);
INSERT INTO Zanras(id_Zanras, name) VALUES(1, 'fantastika');
INSERT INTO Zanras(id_Zanras, name) VALUES(2, 'romanas');
INSERT INTO Zanras(id_Zanras, name) VALUES(3, 'novele');
INSERT INTO Zanras(id_Zanras, name) VALUES(4, 'moksline');
INSERT INTO Zanras(id_Zanras, name) VALUES(5, 'biografija');
INSERT INTO Zanras(id_Zanras, name) VALUES(6, 'drama');
INSERT INTO Zanras(id_Zanras, name) VALUES(7, 'enciklopedija');
INSERT INTO Zanras(id_Zanras, name) VALUES(8, 'detektyvas');

CREATE TABLE Darbuotojas
(
	vardas varchar (255),
	pavarde varchar (255),
	prisijungimo_vardas varchar (255),
	slaptazodis varchar (255),
	mob_numeris varchar (255),
	el_pastas varchar (255),
	gimimo_data date,
	Isidarbinimo_data date,
	pareigos integer,
	id_Darbuotojas integer AUTO_INCREMENT,
	fk_Padalinysid_Padalinys integer NOT NULL,
	PRIMARY KEY(id_Darbuotojas),
	FOREIGN KEY(pareigos) REFERENCES Pareigos (id_Pareigos),
	CONSTRAINT turi FOREIGN KEY(fk_Padalinysid_Padalinys) REFERENCES Padalinys (id_Padalinys)
);

CREATE TABLE Straipsnis
(
	pavadinimas varchar (255),
	turinys varchar (255),
	data date,
	id_Straipsnis integer AUTO_INCREMENT,
	fk_Padalinysid_Padalinys integer NOT NULL,
	PRIMARY KEY(id_Straipsnis),
	CONSTRAINT kuria FOREIGN KEY(fk_Padalinysid_Padalinys) REFERENCES Padalinys (id_Padalinys)
);

CREATE TABLE Vartotojas
(
	vardas varchar (255),
	pavarde varchar (255),
	gimimo_data date,
	prisijungimo_vardas varchar (255),
	slaptazodis varchar (255),
	mob_numeris varchar (255),
	el_pastas varchar (255),
	miestas varchar (255),
	lytis integer,
	id_Vartotojas integer AUTO_INCREMENT,
	PRIMARY KEY(id_Vartotojas),
	FOREIGN KEY(lytis) REFERENCES Lytis (id_Lytis)
);

CREATE TABLE Uzsakymas
(
	numeris int,
	uzsakymo_data date,
	planuojama_grazinimo_data date,
	tikroji_grazinimo_data date,
	uzsakymo_busena integer,
	id_Uzsakymas integer AUTO_INCREMENT,
	fk_Saskaitaid_Saskaita integer,
	fk_Vartotojasid_Vartotojas integer NOT NULL,
	fk_Padalinysid_Padalinys integer NOT NULL,
	PRIMARY KEY(id_Uzsakymas),
	FOREIGN KEY(uzsakymo_busena) REFERENCES Uzsakymo_busena (id_Uzsakymo_busena),
	CONSTRAINT sudaroma_is FOREIGN KEY(fk_Saskaitaid_Saskaita) REFERENCES Saskaita (id_Saskaita),
	CONSTRAINT sukuria FOREIGN KEY(fk_Vartotojasid_Vartotojas) REFERENCES Vartotojas (id_Vartotojas),
	CONSTRAINT priklauso FOREIGN KEY(fk_Padalinysid_Padalinys) REFERENCES Padalinys (id_Padalinys)
);

CREATE TABLE Knyga
(
	pavadinimas varchar (255),
	autorius varchar (255),
	isleidimo_data date,
	leidykla varchar (255),
	puslapiu_kiekis int,
	ISBN varchar (255),
	kiekis int,
	busena integer,
	zanras integer,
	id_Knyga integer AUTO_INCREMENT,
	fk_Uzsakymasid_Uzsakymas integer NOT NULL,
	PRIMARY KEY(id_Knyga),
	FOREIGN KEY(busena) REFERENCES Knygos_Busena (id_Knygos_Busena),
	FOREIGN KEY(zanras) REFERENCES Zanras (id_Zanras),
	CONSTRAINT sudarytas_is FOREIGN KEY(fk_Uzsakymasid_Uzsakymas) REFERENCES Uzsakymas (id_Uzsakymas)
);

CREATE TABLE Rekomendacija
(
	aprasymas varchar (255),
	vertinimas integer,
	id_Rekomendacija integer AUTO_INCREMENT,
	fk_Knygaid_Knyga integer NOT NULL,
	PRIMARY KEY(id_Rekomendacija),
	FOREIGN KEY(vertinimas) REFERENCES vertinimas (id_vertinimas),
	CONSTRAINT turi2 FOREIGN KEY(fk_Knygaid_Knyga) REFERENCES Knyga (id_Knyga)
);

CREATE TABLE Zyma
(
	data date,
	id_Zyma integer AUTO_INCREMENT,
	fk_Vartotojasid_Vartotojas integer NOT NULL,
	fk_Knygaid_Knyga integer NOT NULL,
	PRIMARY KEY(id_Zyma),
	CONSTRAINT itraukia FOREIGN KEY(fk_Vartotojasid_Vartotojas) REFERENCES Vartotojas (id_Vartotojas),
	CONSTRAINT turi3 FOREIGN KEY(fk_Knygaid_Knyga) REFERENCES Knyga (id_Knyga)
);
