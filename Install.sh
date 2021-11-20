#!/bin/bash
###########################################
# TELERIX - Installationsskript           # 
#                                         #
# Autor: Benjamin Hedert                  #
# Stand: 8 April 2020                     #
# Repository: github.com/beni1993/Telerix #
#                                         #
# Dies ist freie Software und steht unter #
# der zlib-Lizenz.                        #
###########################################

### Informationen ###

function more_info()
{
echo ""
echo "Informationen über Telerix"
echo ""
echo "Telerix wurde am 3. April 2020 begonnen mit dem Ziel ein"
echo "einfaches Webinterface für die Telefonübertragung von"
echo "Gottesdiensten zur Verfügung zu stellen."
echo " "
echo "Lizenz: zLib"
echo " "
echo "Diese Lizenz entbindet den Programmierer von jeglicher"
echo "Gewährleistung oder Garantie und räumt dem Nutzer"
echo "weitgehende Nutzungs und Verwendungsrechte ein."
echo "Die Ausführung der Software geschieht hierbei auf die"
echo "Verantwortung des Nutzers."
echo " "
echo "Weitere Informationen:"
echo "https://github.com/beni1993/Telerix"
echo " "
}

### Hilfsfunktionen ###

function safetyquestion()
{
echo "   Dieses Skript wird Telerix installieren."
echo "   Zum Fortsetzen mit der Taste 'y' bestätigen."
echo -n ">> "
read run

if [ "$run" != "y" ]
then
   echo "Abbruch durch den Benutzer!"
   exit 0
fi

echo ""
}

function show_localadress()
{
# Hole lokale IP Adresse
ipaddr=$(ifconfig)
ipaddr=$(echo "$ipaddr" | sed '/inet 127.0.0.1/d')
ipaddr=$(echo "$ipaddr" | egrep 'inet [0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}' -o)
ipaddr=$(echo "$ipaddr" | sed 's/\(inet\)\( \+\)/\2/g')
ipaddr=$(echo "$ipaddr" | sed 's/ //g')

#Versuche lokale Telerix-Seite zu laden und zu erkennen
webinterfacecon=$(curl -s "$ipaddr" | grep "TELERIX" -o | wc -l)

if [ "$webinterfacecon" != "0" ]
then
   echo "Das Telerix-Webinterface ist nun unter $ipaddr erreichbar."
fi
}

function ask_config_data()
{
   echo "=> SIP-Daten eintragen <="
   echo -n "User: "
   read sip_user
   echo -n "Passwort: "
   read sip_pass
   echo -n "Registrar: "
   read sip_reg
   echo ""
   echo "=> Internetradio Streamadresse eintragen <="
   echo -n "Stream: "
   read inetstream
   echo " "
}

function install_applications()
{
echo "Installiere Asterisk..."
sudo apt install asterisk "$1"

echo "Installiere mpg123 Player"
sudo apt install mpg123 "$1"

echo "Installiere Apache2 Webserver"
sudo apt install apache2 "$1"

echo "Installiere PHP7.2"
sudo apt install php7.2 "$1"
sudo apt install php-pear php7.2-curl php7.2-dev php7.2-gd php7.2-mbstring php7.2-zip php7.2-mysql php7.2-xml "$1"

echo "Installiere madplay"
sudo apt install madplay "$1"

echo "Installiere lame"
sudo apt install lame "$1"

echo "Installiere jq"
sudo apt install jq "$1"

echo "Installiere gawk"
sudo apt install gawk "$1"
}

function install_webinterface()
{
echo "Lösche alle Dateien aus dem Webverzeichnis"
sudo rm /var/www/html/*

echo "Kopiere Webinterface"
sudo cp -r ./telerix/* /var/www/html/

echo "Erstelle Uploads Ordner"
sudo mkdir /var/www/html/uploads
}

function install_asterisk_files()
{
echo "Lösche bereits vorhandene Standarddateien"
sudo rm /etc/asterisk/extensions.conf
sudo rm /etc/asterisk/musiconhold.conf
sudo rm /etc/asterisk/sip.conf
sudo rm /etc/asterisk/codecs.conf

echo "Füge eigene Konfiguration ein:"
sudo cp ./asterisk_scripts/* /etc/asterisk/

echo "Ansagenverzeichnis erstellen"
sudo mkdir /usr/share/asterisk/sounds/tx

echo "Ansagen kopieren"
sudo cp ./ansagen/*.gsm /usr/share/asterisk/sounds/tx/
}

function start_asterisk()
{
echo "Lade neue Asteriskkonfiguration"
sudo systemctl restart asterisk
}

function configurate_asterisk()
{
echo "SIP Zugangsdaten eintragen"
/var/www/html/set_sipconfig.sh "$sip_user" "$sip_pass" "$sip_reg"

echo "Internetstream eintragen"
/var/www/html/set_stream.sh "$inetstream"
}

function change_rights()
{
#Asterisk Rechte
echo "Ändere Rechte der Asterisk .conf files"
sudo chmod -R 777 /etc/asterisk

echo "Ändere Rechte der Asterisk Logfiles"
sudo chmod -R 777 /var/log/asterisk

echo "Ändere Ausführungsrecht der Asterisk pid"
sudo chmod -R 777 /var/run/asterisk/asterisk.pid

echo "Ändere Rechte für Asterisk Sounds"
sudo chmod -R 777 /usr/share/asterisk/sounds/tx

#Apache Rechte
echo "Ändere Ausführungsrechte Webverzeichnis"
sudo chmod -R 777 /var/www/html

#Überprüfe ob www-data shudown und restart ausführen darf
shut_rgt=$(sudo cat /etc/sudoers | grep 'www-data ALL = NOPASSWD:/sbin/shutdown' | wc -l)

#Überprüfe ob www-data asterisk ohne Passwort ausführen darf
astr_rgt=$(sudo cat /etc/sudoers | grep 'www-data ALL = NOPASSWD:/usr/sbin/asterisk' | wc -l)

#Überprüfe ob www-data systemctl ohne Passwort benutzen darf
serv_rgt=$(sudo cat /etc/sudoers | grep 'www-data ALL = NOPASSWD:/bin/systemctl' | wc -l)

if [ "$shut_rgt" == "0" ]
then
   echo "Keine Rechte für Shutdown und Restart vorhanden!"
   echo "Rechte werden eingetragen."
   sudo echo "www-data ALL = NOPASSWD:/sbin/shutdown" >> /etc/sudoers
else
   echo "Rechte für Shutdown und Restart  bereits verfügbar!"
fi

if [ "$astr_rgt" == "0" ]
then
   echo "Keine Rechte zur Asterisk-CLI-ausführung vorhanden!"
   echo "Rechte werden eingetragen."
   sudo echo "www-data ALL = NOPASSWD:/usr/sbin/asterisk" >> /etc/sudoers
else
   echo "Rechte für Asterisk-CLI-ausführung bereits verfügbar!"
fi

if [ "$serv_rgt" == "0" ]
then
   echo "Keine Rechte für service restarts vorhanden!"
   echo "Rechte werden eingetragen."
   sudo echo "www-data ALL = NOPASSWD:/bin/systemctl" >> /etc/sudoers
else
   echo "Rechte für service restarts bereits verfügbar!"
fi
}

### Installations routinen ###

function complete()
{
   echo ""
   echo "Automatische Installation und Einrichtung"
   echo ""
   safetyquestion
   ask_config_data
   install_applications -y
   install_webinterface
   install_asterisk_files
   configurate_asterisk
   change_rights
   start_asterisk
   show_localadress
}

function complete_config_later()
{
   echo ""
   echo "Automatische Installation ohne Konfiguration"
   echo ""
   echo "   Um Telerix nutzen zu können müssen Sie im Anschluss"
   echo "   die SIP und Stream Daten im Webinterface eingeben."
   echo " "
   safetyquestion
   install_applications -y
   install_webinterface
   install_asterisk_files
   change_rights
   start_asterisk
   show_localadress
}

function spezial_config_a()
{
   complete
   echo "Shutdown entfernen"
   sudo sed -i '/sudo shutdown now/d' /var/www/html/shutdown.php
   sudo echo "/* Shutdown entfernt*/" >> /var/www/html/shutdown.php
   sudo echo "/*  Folgenden Text in die zweite Zeile eintragen:  */" >> /var/www/html/shutdown.php
   sudo echo "/*  \$a = system('sudo shutdown now -f -h -P')    */;" >> /var/www/html/shutdown.php
   sudo echo "/*  Damit wird die Aktion rückgänig gemacht.      */" >> /var/www/html/shutdown.php
}

function complete_spezial()
{
   echo ""
   echo "Automatische Installation mit spezieller Konfiguration"
   echo ""
   echo "Konfigurationsauswahl:"
   echo "   1 - Konfiguration ohne Shutdownmöglichkeit"
   #  Hier können weitere Konfigurationen eingefügt werden
   #  Dazu in der Beschreibung einen Eintrag hinzufügen
   #  und in der Auswahl einen Eintrag 'spezial_config_x'
   #  mit dem nächsten Buchstaben und die Funktion dazu.
   echo ""
   echo -n ">> "

   read config_auswahl

   case "$config_auswahl" in
      1) spezial_config_a ;;
   esac
}

### Anwendungsstart ###

echo "###############################################################"
echo "#                ___  ___       ___  __                       #"
echo "#                 |  |__  |    |__  |__) | \_/                #"
echo "#                 |  |___ |___ |___ |  \ | / \                #"
echo "#                                                             #"
echo "#  Version: 0.01    Autor: Benjamin Hedert        April 2020  #"
echo "###############################################################"
echo ""
#Internetstream/SIP-Daten Variablen
inetstream=""
sip_user=""
sip_pass=""
sip_reg=""
sudo echo " "
echo "Auswahl:"
echo "   1 - Automatische Installation und Einrichtung (empfohlen)"
echo "   2 - Automatische Installation ohne Konfiguration"
echo "   3 - Automatische Installation und spezielle Konfiguration"
echo "   4 - Weitere Informationen zu Telerix lesen"
echo "   5 - Beenden"
echo " "
echo -n ">> "

read auswahl

case "$auswahl" in
   1) complete ;;
   2) complete_config_later ;;
   3) complete_spezial ;;
   4) more_info ;;
   5) ;;
esac

### ENDE 
