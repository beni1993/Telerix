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
echo "   Dieses Skript wird Telerix aktualisieren."
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

function install_webinterface()
{
echo "Lösche alle Dateien aus dem Webverzeichnis"
sudo rm /var/www/html/*

echo "Kopiere Webinterface"
sudo cp -r ./telerix/* /var/www/html/

echo "Erstelle Uploads Ordner"
sudo mkdir /var/www/html/uploads
}

function change_rights()
{
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

### Update routinen ###

function update_webinterface()
{
   echo ""
   echo "Automatische Installation und Einrichtung"
   echo ""
   safetyquestion
   install_webinterface
   change_rights
}

### Anwendungsstart ###

echo "###############################################################"
echo "#                ___  ___       ___  __                       #"
echo "#                 |  |__  |    |__  |__) | \_/                #"
echo "#                 |  |___ |___ |___ |  \ | / \  -- UPDATE --  #"
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
echo "   1 - Update Webinterface"
echo "   2 - Weitere Informationen zu Telerix lesen"
echo "   3 - Beenden"
echo " "
echo -n ">> "

read auswahl

case "$auswahl" in
   1) update_webinterface ;;
   2) more_info ;;
   3) ;;
esac

### ENDE 
