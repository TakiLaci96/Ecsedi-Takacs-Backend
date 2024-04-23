# Hibabejelentő alkalmazás backend-je

Frontend: https://github.com/ecsitomi/Ecsedi-Takacs-Vizsgaremek-Frontend

Mobil app: https://github.com/TakiLaci96/2024-takacs-ecsedi-vizsgaremek-mobil

## Követelmények

- PHP 8.2

## Telepítés lépései

- Csomagok telepítése
  
  ```sh
  composer install
  ```

  - .env állomány létrehozása
  
  ```sh
  cp .env.example .env
  ```
- Ami szükséges a .env fájlba:
  ```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=vizsga_adatbazis
  DB_USERNAME=root
  DB_PASSWORD=
  ```
- Futtatás (local)
  ```sh
  php artisan serve
  ```

## Adatbázis

<p align="left">
 Ajánlott a repoban megtalálható <a href="https://github.com/TakiLaci96/Ecsedi-Takacs-Backend/blob/main/vizsga_adatbazis.sql" target="blank">vizsga_adatbazis.sql</a>-t használni
</p>

### Az adatbázisban megtalálható felhaszálókhoz az adatok
```bash
Admin a weboldalhoz:
- Email : admin@admin.hu
- Pw : 123123123
User a mobilhoz:
- Email : teszt@example.com
- Pw : asdf1234
- Email : tbéla@example.com
- Pw : asdf12345
```

### Az adatbázis diagram
<p align="center">
  <img src="https://github.com/TakiLaci96/Ecsedi-Takacs-Backend/blob/main/Adatbazis.png"  alt="adatazis" />
</p>

## Készítette

Ecsedi Tamás, Takács László

Leadva: 2024. április 23.
