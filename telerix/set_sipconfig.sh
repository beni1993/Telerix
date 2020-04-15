#!/bin/bash

#Speichern der übergebenen Parameter
sip_id="$1"
sip_password="$2"
sip_registrar="$3"

#In die 9te Zeile der Datei /etc/asterisk/sip.conf den useragent schreiben.
sed -i -e 9c"useragent=TELERIX 0.02" /etc/asterisk/sip.conf
sed -i -e 10c"register=$sip_id:$sip_password@$sip_registrar/200" /etc/asterisk/sip.conf
