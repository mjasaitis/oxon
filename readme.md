##Instaliacija
####Parsisiųskite projektą 
```
git clone https://github.com/mjasaitis/oxon.git .
```
####Parsisiųskite reikiamas bibliotekas
```
composer install
```
####Pervadinkite nustatymų failą ir jame pakeiskite applikacijos url, duomenų bazių ir kitas reikšmes
```
.env.example -> .env
```
####Sugeneruokite aplikacijos raktą
```
php artisan key:generate
```
####Sukurkite duomenų bazės lenteles
```
php artisan migrate
```
####Sukurkite kelis testinius įrašus
```
php artisan db:seed
```
####Paleiskite vietinį serverį http://localhost:8000/
```
php artisan serve
```

##Aprašymas
#### Automatiškai sukurtos vartotojų rolės
```
agent - gali peržiūrėti sąrašą
teamleader - gali peržiūrėti sąrašą, bei talpinti video
```
#### Automatiškai sukurti vartotojai
```
login: agent@example.com
 pass: 111111

login: admin@example.com
 pass: 111111
```
#### Panaudotos bibliotekos
Vartotojų registracijos validavimui panaudota jQuery biblioteka https://jqueryvalidation.org/

Pridedant naują video naudojamas Youtube API video informacijai gauti. Administavimo formoje įvedus Youtube ID, Ajax metodu kreipiamasi į aplikacijos url, kuris CURL'u gauna video klipo duomenis.

Duomenys atvaizduojami užkraunant juos Ajax. Duomenų atvaizdavimui naudojama jQuery biblioteka https://github.com/yajra/laravel-datatables. Duomenys išrenkami panaudojant https://github.com/yajra/laravel-datatables biblioteką.
