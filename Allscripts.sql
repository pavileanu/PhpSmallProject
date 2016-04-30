CREATE TABLE Persoana
(
id int NOT NULL AUTO_INCREMENT,
nume varchar(255) NOT NULL,
prenume varchar(255),
oras varchar(255),
PRIMARY KEY (ID)
);

Create Table Ocupatie(
id int NOT NULL AUTO_INCREMENT,
persoana_id int,
nume varchar(255) NOT NULL,
salariu int not null,
ore_pe_zi int not null,
data_angajarii date,
PRIMARY KEY (ID)
);


CREATE TABLE PersoanaLog
(
id int NOT NULL AUTO_INCREMENT,
persoana_id int NOT NULL,
stare varchar(255) NOT NULL,
timp date NOT NULL,
PRIMARY KEY (ID)
);

CREATE TABLE OcupatieLog
(
id int NOT NULL AUTO_INCREMENT,
ocupatie_id int NOT NULL,
stare varchar(255) NOT NULL,
timp date NOT NULL,
PRIMARY KEY (ID)
);

alter table Ocupatie
add foreign key (persoana_id)
references persoana(id);

insert into Persoana(nume, prenume, oras)
values('maria', 'ioana', 'Bucuresti'), ('george', 'andrei', 'Timisoara');

insert into Ocupatie(persoana_id, nume, salariu, ore_pe_zi, data_angajarii)
values(1, 'instalator', 500, 4, '2016-02-02'), (1, 'barman', 1000, 8, '2016-05-05');


DELIMITER //
USE copii//
DROP PROCEDURE IF EXISTS GetPersoane//
CREATE PROCEDURE GetPersoane()
BEGIN
SELECT * FROM Persoana;
END //
DELIMITER //

DELIMITER //
USE copii//
DROP PROCEDURE IF EXISTS GetPersoana//
CREATE PROCEDURE GetPersoana(in persoana_id int)
BEGIN
SELECT * FROM Persoana
where id = persoana_id;
END //
DELIMITER //

DELIMITER //
USE copii//
DROP PROCEDURE IF EXISTS InsertPersoana//
CREATE PROCEDURE InsertPersoana(in nume varchar(255), in prenume varchar(255), in oras varchar(255))
BEGIN
Insert  Persoana(nume, prenume, oras) Values(nume, prenume, oras);
END //
DELIMITER //


DELIMITER //
USE copii//
DROP PROCEDURE IF EXISTS GetFullNameForPerson//
CREATE PROCEDURE GetFullNameForPerson(in persoana_id int, out nume_complet varchar(255))
BEGIN
select concat(concat(nume, ' '),prenume) as 'nume complet' into nume_complet 
from Persoana 
WHERE id = persoana_id;
END //
DELIMITER //

DELIMITER //
USE copii//
DROP PROCEDURE IF EXISTS GetReport//
CREATE PROCEDURE GetReport()
BEGIN
Select concat(concat(p.nume, " "), p.prenume) as 'nume complet', count(o.id) as 'numar ocupatii', max(o.salariu) as 'salariu maxim'
from Persoana p
left outer join Ocupatie o on p.id = o.persoana_id
group by p.id;
END //
DELIMITER //

DELIMITER //
USE copii//
DROP PROCEDURE IF EXISTS GetPersoaneLog//
CREATE PROCEDURE GetPersoaneLog()
BEGIN
Select concat(concat(nume, " "),prenume) as 'nume complet', stare, timp
from PersoanaLog
join Persoana on PersoanaLog.persoana_id = Persoana.id;
END //
DELIMITER //

DELIMITER //
USE copii//
DROP PROCEDURE IF EXISTS GetOcupatieLog//
CREATE PROCEDURE GetOcupatieLog()
BEGIN
Select nume, stare, timp
from OcupatieLog
join Ocupatie on OcupatieLog.ocupatie_id = Ocupatie.id;
END //
DELIMITER //


DELIMITER //
USE copii //
DROP TRIGGER IF EXISTS persoana_log_trigger_on_created//
CREATE TRIGGER persoana_log_trigger_on_created
AFTER INSERT ON Persoana
FOR EACH ROW
BEGIN
INSERT INTO PersoanaLog(persoana_id, stare, timp)
VALUES(NEW.id, "Created", NOW());
END//
DELIMITER //

DELIMITER //
USE copii //
DROP TRIGGER IF EXISTS ocupatie_log_trigger_on_created//
CREATE TRIGGER ocupatie_log_trigger_on_created
AFTER INSERT ON Ocupatie
FOR EACH ROW
BEGIN
INSERT INTO OcupatieLog(ocupatie_id, stare, timp)
VALUES(NEW.id, "Created", NOW());
END//
DELIMITER //

DELIMITER //
USE copii //
DROP TRIGGER IF EXISTS persoana_log_trigger_on_updated//
CREATE TRIGGER persoana_log_trigger_on_updated
AFTER UPDATE ON Persoana
FOR EACH ROW
BEGIN
INSERT INTO PersoanaLog(persoana_id, stare, timp)
VALUES(NEW.id, "Updated", NOW());
END//
DELIMITER //

DELIMITER //
USE copii //
DROP TRIGGER IF EXISTS ocupatie_log_trigger_on_updated//
CREATE TRIGGER ocupatie_log_trigger_on_updated
AFTER UPDATE ON Ocupatie
FOR EACH ROW
BEGIN
INSERT INTO OcupatieLog(ocupatie_id, stare, timp)
VALUES(NEW.id, "Updated", NOW());
END//
DELIMITER //


DELIMITER //
USE copii //
DROP TRIGGER IF EXISTS persoana_oras_uppercase//
CREATE TRIGGER persoana_oras_uppercase
BEFORE INSERT ON PERSOANA
FOR EACH ROW
BEGIN
SET NEW.oras = UPPER(NEW.oras);
END//
DELIMITER //










