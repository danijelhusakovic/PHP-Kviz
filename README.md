# PHP Login Sistem sa Session i Cookie

Jednostavan PHP sistem za registraciju i prijavu učenika sa automatskim ostankom ulogiranim pomoću cookija.

## 📋 Preduvjeti

- XAMPP (ili WAMP/MAMP)
- Web preglednik (Chrome, Firefox, Edge...)

## 🚀 Instalacija - Korak po korak

### 1. Preuzmi kod

- Klikni na zeleni gumb **Code** → **Download ZIP**
- Raspakiraj ZIP datoteku

### 2. Kopiraj datoteke u XAMPP

- Otvori mapu `C:\xampp\htdocs\`
- Napravi novu mapu `skola` (ili bilo koje ime)
- Kopiraj sve PHP datoteke u tu mapu

Trebao bi imati:
```
C:\xampp\htdocs\skola\
├── config.php
├── registracija.php
├── login.php
├── dashboard.php
└── logout.php
```

### 3. Pokreni XAMPP

- Otvori **XAMPP Control Panel**
- Klikni **Start** pored **Apache**
- Klikni **Start** pored **MySQL**

Oboje trebaju biti zelena!

### 4. Napravi bazu podataka

1. Otvori web preglednik
2. Idi na: `http://localhost/phpmyadmin`
3. Klikni na **SQL** tab (gore)
4. Kopiraj i zalijepi ovaj kod:
```sql
CREATE DATABASE IF NOT EXISTS kviz;
USE kviz;

CREATE TABLE ucenici (
    id INT PRIMARY KEY AUTO_INCREMENT,
    ime VARCHAR(100),
    prezime VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    lozinka VARCHAR(255),
    token VARCHAR(64)
);
```

5. Klikni **Izvrši** (ili **Go**)

✅ Baza i tablica su stvoreni!

### 5. Pokreni aplikaciju

Otvori web preglednik i idi na:
```
http://localhost/skola/registracija.php
```

## 📖 Kako koristiti

### Registracija
1. Otvori `http://localhost/skola/registracija.php`
2. Unesi svoje podatke (ime, prezime, email, lozinka)
3. Klikni **Registriraj se**
4. Bit ćeš preusmjeren na stranicu za prijavu

### Prijava
1. Unesi email i lozinku koje si koristio pri registraciji
2. Klikni **Prijavi se**
3. Dolazis na Dashboard stranicu

### Testiranje cookija
1. Prijavi se
2. **Zatvori cijeli preglednik** (ne samo tab!)
3. Otvori ponovo `http://localhost/skola/login.php`
4. **Automatski si ulogiran!** ✨

### Odjava
- Klikni na **Odjava** na Dashboard stranici
- Cookie će biti obrisan i morat ćeš se ponovo prijaviti

## 🔧 Struktura datoteka

- **config.php** - Konekcija na bazu i pokretanje sesije
- **registracija.php** - Forma za stvaranje novog korisnika
- **login.php** - Forma za prijavu + provjera cookija
- **dashboard.php** - Zaštićena stranica (samo za prijavljene)
- **logout.php** - Odjava i brisanje cookija

## 🛡️ Kako radi automatska prijava?

1. Pri prvoj prijavi stvara se **token** (slučajni niz znakova)
2. Token se sprema u:
   - **Bazu podataka** (tablica ucenici, kolona token)
   - **Cookie** na tvom računalu (traje 30 dana)
3. Kada ponovno otvoriš stranicu:
   - PHP čita cookie s tvojeg računala
   - Traži taj token u bazi
   - Ako ga nađe → automatski te prijavi!

## ❓ Česta pitanja

**P: Zašto ne radi?**
O: Provjeri jesu li Apache i MySQL pokrenuti u XAMPP-u (moraju biti zeleni).

**P: Greška "Access denied for user 'root'"?**
O: U `config.php` provjeri jesu li podaci za bazu točni (obično je lozinka prazna za XAMPP).

**P: Ne mogu se registrirati?**
O: Provjeri jesi li izvršio SQL kod za stvaranje tablice u phpMyAdmin.

**P: Koliko dugo traje cookie?**
O: 30 dana. Nakon toga moraš se ponovo prijaviti.

**P: Gdje mogu promijeniti ime baze?**
O: U `config.php` promijeni `'kviz'` u željeno ime baze.

## 📝 Napomena o sigurnosti

⚠️ **Ovo je edukacijski projekt!** 

Za produkciju (pravi web) trebalo bi dodati:
- Prepared statements (zaštita od SQL injection)
- HTTPS (šifrirano povezivanje)
- CSRF tokene (zaštita od lažnih zahtjeva)
- Rate limiting (ograničenje pokušaja prijave)

## 📧 Podrška

Ako imaš problema, provjeri:
1. Jesu li Apache i MySQL pokrenuti
2. Je li baza `kviz` stvorena
3. Je li tablica `ucenici` u bazi
4. Jesu li svi PHP fajlovi u istoj mapi

---

**Sretno učenje! 🎓**
