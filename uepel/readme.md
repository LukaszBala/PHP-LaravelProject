# Witryna do zajeć Proj Proj

Do ogarniecia:

    TO DO:
    
    IN PROGRESS-cofanie do strony poprzedniej

    -zabezpieczenie wyswietlania przedmiotow danego naucyzciela

    //DONE-resetowanie hasel przez admina, losowo przydzielane haslo

    IN PROGRESS-testy

    //DONE-edycja uzytkownikow -> zmiana hasla
    
    IN PROGRESS-panel szczegolow przedmiotow w studencie
    
    //Tak w sumie to Done-Wyswietlanie zapisanych studentow na kurs u ticzera
    
    //DONE-Ogarniecie bazy z ocenkami, obecnosciami w sensie podpiecia pod sucject->zapisani->uczen->ocena i presence
    
    IN PROGRESS - FRONTEND
    
    
    SZIET ZACZYNAM BYC PRZYTLOCZONY ILOSCIA RZECZY DO ZROBIENIA
    
    

To configure this application execute:

```bash
# Install prject dependencies
composer install

# Uses example credentials for DB and other services
cp .env.example .env

# Generates key for encryption
php artisan key:generate

# Create DB schema
php artisan migrate:fresh

# Add some example data
php artisan db:seed

# IDE helpers
php artisan ide-helper:generate
php artisan ide-helper:meta
php artisan ide-helper:models --write

mysqldump -u test test -p > tests_codeception/_data/dump.sql
```

To start local server:

```bash
php artisan serve
```
Regenerate datbase dump:

```bash
php artisan migrate:fresh
php artisan db:seed
mysqldump -u test test -p > tests_codeception/_data/dump.sql
```
