#!/bin/bash

#Speichern des übergebenen Parameters
inetstream="$1"

#In die 3te Zeile der Datei /etc/asterisk/stream.sh die Adresse schreiben.
sed -i -e 3c"streamurl=\"$inetstream\"" /etc/asterisk/stream.sh
