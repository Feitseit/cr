# MySQL andmebaasiserveri paigaldus ja seadistamine

## Töökeskkond

- Virtuaalmasin: VirtualBox  
- Operatsioonisüsteem: Ubuntu Server  
- Ligipääs serverile: SSH  
- Andmebaasisüsteem: MySQL  

---

## 1. Süsteemi uuendamine

sudo apt update  
sudo apt upgrade -y  

---

## 2. MySQL serveri paigaldamine

sudo apt install mysql-server -y  

---

## 3. Teenuse kontrollimine

sudo systemctl status mysql.service  
systemctl is-enabled mysql  

Oodatud tulemus: enabled  

---

## 4. MySQL turvaseadistamine

sudo mysql_secure_installation  

Tehtud sammud:
- eemaldatud anonüümsed kasutajad  
- kustutatud testandmebaas  
- keelatud root kaugühendus  
- seadistatud autentimine  

---

## 5. Kasutajate kontroll

sudo mysql -e "SELECT user, host, plugin FROM mysql.user;"  

Tulemus: root kasutab auth_socket / unix_socket autentimist  

---

## 6. Konfiguratsioon

sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf  

Seaded:

bind-address = 127.0.0.1  
local-infile = 0  
skip-name-resolve  

Taaskäivitus:

sudo systemctl restart mysql  

---

## 7. Andmebaasi loomine

sudo mysql  

CREATE DATABASE andmebaas;  

---

## 8. GitHubist andmete import

gh auth login  

git clone https://github.com/Feitseit/cr.git  
cd CR  

sudo mysql andmebaas < cars.sql  

---

## 9. Kontroll

sudo mysql -e "USE andmebaas; SHOW TABLES;"  

sudo ss -tulnp | grep 3306  

sudo mysql -e "SHOW VARIABLES LIKE 'bind_address';"  

---

## Kokkuvõte

Paigaldati ja seadistati MySQL server Ubuntu Serveris.  
Tehti turvaseaded, imporditi andmed GitHubist ning kontrolliti süsteemi tööd. Server töötab lokaalselt ja turvaliselt.
