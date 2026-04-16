# Multimeedia iseseisev töö 3
# MYSQL andmebaasiserveri paigaldamine ja seadistamine

## Keskkond

* Virtuaalkeskkond: VIRTUALBOX
* Operatsioonisüsteem: Ubuntu Server
* Ligipääs: SSH
* Andmebaasiserver: MySQL

---

## Paigaldamine

Süsteemi uuendamine

```bash
sudo apt update
sudo apt upgrade -y
```

MYSQL serveri paigaldamine

```bash
sudo apt install mysql-server -y
```
<img width="867" height="53" alt="Screenshot 2026-04-04 at 13 01 32" src="https://github.com/user-attachments/assets/8ff19bde-d5e2-49b9-a993-c0ea790109df" />

Teenuse staatuse kontrollimine:

```bash
sudo systemctl status mysql.service
```
<img width="1280" height="370" alt="Screenshot 2026-04-04 at 12 15 56" src="https://github.com/user-attachments/assets/d5b1f475-7604-414a-a45a-4c74ec87e25a" />

Kontrollida kas teenus käivitub automaatselt:

```bash
systemctl is-enabled mysql #Peaks tulemuseks andma "enabled"
```
<img width="761" height="54" alt="Screenshot 2026-04-04 at 17 20 00" src="https://github.com/user-attachments/assets/c2ef6d80-4864-4d86-af13-ca3ae53fe09e" />


---

## MYSQL turvaseadistus

```bash
sudo mysql_secure_installation
```
Anonüümsete kasutajate eemaldamine:
<img width="840" height="224" alt="Screenshot 2026-04-04 at 15 48 43" src="https://github.com/user-attachments/assets/43066df7-9cc4-460e-bb43-f6337aea44a6" />

Testandmebaasi eemaldamine:
<img width="901" height="234" alt="Screenshot 2026-04-04 at 15 51 30" src="https://github.com/user-attachments/assets/e087bc59-74fb-466a-a269-cb0951652638" />

Root kasutaja kaugelt sisselogimise keelamine:
<img width="812" height="158" alt="Screenshot 2026-04-04 at 15 52 54" src="https://github.com/user-attachments/assets/48327065-4731-4d90-931b-669065c80139" />

## Kasutaja autentimine

MYSQL paigaldamisel ei küsitud autentimise valikut, kuna Ubuntu MYSQL paigaldus seadistab root kasutaja vaikimisi `auth_socket` peale.

MYSQL kasutajate autentimise kontrollimine:

```sql
sudo mysql
SELECT user, host, plugin FROM mysql.user;
```
<img width="686" height="316" alt="Screenshot 2026-04-04 at 15 57 01" src="https://github.com/user-attachments/assets/29654507-8f17-4622-9309-b1553e5a2d8c" />

Root kasutab `auth_socket` (unix_socket) autentimist. Parooliga sisselogmine keelatud.

## MYSQL konfiguratsioon

MYSQL konfiguratsioonifaili muutmine:

```bash
sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf
```

Kontrollida et `bind-address` oleks `127.0.0.1`:
```bash
bind-address = 127.0.0.1 #MYSQL kuulab ainult lokaalseid ühendusi
```
Lisada juurde:
```bash
local-infile = 0 - #Keelab failide importimise serverist
skip-name-resolve - #Kasutab IP-aadresse hostinimede asemel 
```
Peale konfiguratsiooni faili salvestamist teha teenusele restart:
```bash
sudo systemctl restart mysql
```

## Andmebaasi loomine

```sql
sudo mysql
CREATE DATABASE andmebaas;
```

---

## GitHubist andmebaasi importimine

Logi GitHubi sisse:

```bash
gh auth login
```

Klooni oma GitHub repository:

```bash
git clone https://github.com/Feitseit/cr.git
cd CR
```

Andmebaasi importimine:

```bash
sudo mysql andmebaas < cars.sql
```

---

## Kontroll

```sql
sudo mysql

USE andmebaas;
SHOW TABLES;
```
<img width="714" height="298" alt="Screenshot 2026-04-04 at 12 03 35" src="https://github.com/user-attachments/assets/53bacdd2-dc30-480b-9c20-aec362cdbf99" />

Port 3306 avatud:
```bash
sudo ss -tulnp | grep 3306
```
<img width="1272" height="99" alt="Screenshot 2026-04-04 at 13 18 33" src="https://github.com/user-attachments/assets/b0379501-d47a-40b0-bebc-efd09b0c9994" />

SHOW VARIABLES tulemus:
```mysql
sudo mysql -e "SHOW VARIABLES LIKE 'bind_address';"
```
<img width="906" height="145" alt="Screenshot 2026-04-04 at 16 21 02" src="https://github.com/user-attachments/assets/28ed686e-1f86-4ef3-8242-d237d3e046a1" />
