#!/bin/bash
#Regex \3 = Username
#      \5 = Passwort
#      \7 = Registrar

#Lese 10te Zeile aus /etc/asterisk/sip.conf
sed -n '10p' /etc/asterisk/sip.conf ./get_sip_id.sh | sed 's/\(register\)\(=\)\([^:]\+\)\(:\)\([^@]\+\)\(@\)\([^/]\+\)\(.*\)/\3/g'

