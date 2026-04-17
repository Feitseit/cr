Multimeedia iseseisev töö 3
MySQL andmebaasiserveri paigaldus ja seadistamine
Töökeskkond
Virtuaalmasin: VirtualBox
Operatsioonisüsteem: Ubuntu Server
Ligipääs serverile: SSH
Andmebaasisüsteem: MySQL


Kõigepealt uuendasin süsteemi paketid:

sudo apt update
sudo apt upgrade -y

Seejärel paigaldasin MySQL serveri:

sudo apt install mysql-server -y

Kontrollisin, kas teenus töötab:

sudo systemctl status mysql.service

Veendusin, et MySQL käivitub automaatselt süsteemi käivitamisel:

systemctl is-enabled mysql

Tulemuseks pidi olema enabled.

Turvaseadistused

MySQL turvalisemaks muutmiseks kasutasin järgmist käsku:

sudo mysql_secure_installation

Seadistuse käigus tegin järgmised valikud:

eemaldasin anonüümsed kasutajad
kustutasin testandmebaasi
keelasin root kasutaja kaugühenduse
Autentimise kontroll

Ubuntu puhul kasutatakse vaikimisi auth_socket autentimist root kasutaja jaoks, mis tähendab, et parooliga sisselogimine ei ole lubatud.

Kontrollisin kasutajate autentimismeetodeid:

sudo mysql
SELECT user, host, plugin FROM mysql.user;

Tulemus näitas, et root kasutab auth_socket (või unix_socket) pluginit.

MySQL konfiguratsiooni muutmine

Avasin MySQL konfiguratsioonifaili:

sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf

Kontrollisin, et server kuulab ainult lokaalseid ühendusi:

bind-address = 127.0.0.1

Lisaks lisasin järgmised turvaseaded:

local-infile = 0
skip-name-resolve

Seejärel taaskäivitasin MySQL teenuse:

sudo systemctl restart mysql
Andmebaasi loomine

Logisin MySQL keskkonda ja lõin uue andmebaasi:

sudo mysql
CREATE DATABASE andmebaas;
Andmete import GitHubist

Autentisin GitHub CLI abil:

gh auth login

Kloonisin vajaliku repositooriumi:

git clone https://github.com/Feitseit/cr.git
cd CR

Importisin SQL faili loodud andmebaasi:

sudo mysql andmebaas < cars.sql
Kontroll ja verifitseerimine

Kontrollisin, kas tabelid imporditi edukalt:

sudo mysql
USE andmebaas;
SHOW TABLES;

Veendusin, et MySQL kasutab porti 3306:

sudo ss -tulnp | grep 3306

Kontrollisin ka bind-address väärtust:

sudo mysql -e "SHOW VARIABLES LIKE 'bind_address';"