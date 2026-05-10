Multimeedia iseseisev töö 3
MySQL andmebaasiserveri paigaldus ja seadistamine
Töökeskkond
Virtuaalmasin: VirtualBox
Operatsioonisüsteem: Ubuntu Server
Ligipääs serverile: SSH
Andmebaasisüsteem: MySQL
1. Süsteemi uuendamine

Kõigepealt uuendasin süsteemi paketid:

sudo apt update
sudo apt upgrade -y
2. MySQL serveri paigaldamine

Seejärel paigaldasin MySQL serveri:

sudo apt install mysql-server -y
3. Teenuse kontrollimine

Kontrollisin, kas MySQL teenus töötab:

sudo systemctl status mysql.service

Veendusin ka, et teenus käivitub automaatselt:

systemctl is-enabled mysql

Tulemus pidi olema: enabled

4. MySQL turvaseadistamine

Turvalisuse parandamiseks käivitasin:

sudo mysql_secure_installation

Seadistuse käigus tegin järgmised valikud:

eemaldasin anonüümsed kasutajad
kustutasin testandmebaasi
keelasin root kasutaja kaugühenduse
seadistasin autentimise kontrolli
5. Kasutajate autentimise kontroll

Kontrollisin kasutajate autentimismeetodeid:

sudo mysql -e "SELECT user, host, plugin FROM mysql.user;"

Tulemus näitas, et root kasutab auth_socket (või unix_socket) autentimist, mis tähendab, et parooliga sisselogimine ei ole vaikimisi lubatud.

6. MySQL konfiguratsiooni muutmine

Avasin konfiguratsioonifaili:

sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf

Kontrollisin, et server kuulab ainult lokaalseid ühendusi:

bind-address = 127.0.0.1

Lisasin ka turvaseaded:

local-infile = 0
skip-name-resolve

Seejärel taaskäivitasin teenuse:

sudo systemctl restart mysql
7. Andmebaasi loomine

Logisin MySQL keskkonda ja lõin andmebaasi:

sudo mysql
CREATE DATABASE andmebaas;
8. Andmete import GitHubist

Autentisin GitHub CLI abil:

gh auth login

Kloonisin repositooriumi:

git clone https://github.com/Feitseit/cr.git
cd CR

Importisin SQL faili andmebaasi:

sudo mysql andmebaas < cars.sql
9. Kontroll ja verifitseerimine

Kontrollisin, kas tabelid imporditi edukalt:

sudo mysql -e "USE andmebaas; SHOW TABLES;"

Kontrollisin MySQL porti:

sudo ss -tulnp | grep 3306

Kontrollisin bind-address väärtust:

sudo mysql -e "SHOW VARIABLES LIKE 'bind_address';"
