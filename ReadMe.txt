Root folder aplikacije se mora zvati "onlinetravelinsurance", ili se mora promeniti putanja u .htaccess fajlu i u folderu "core" u fajlu init.php putanja u konstanti URLROOT.
Ako je localhost bez porta u url-u, promeniti takodje.

U init.php fajlu je i podesavanje za konekciju sa bazom podataka.

Prilikom importovanja baze podataka bazu nazvati "otinsurance" sa default InnoDB enginom i utf8_general_ci collation