#!/bin/bash

#Listenkopf erstellen
echo " <table class=\"w3-table w3-striped w3-light-blue\" style=\"border-radius:5px\">"
echo "   <thead>"
echo "      <tr class=\"w3-dark-gray\">"
echo "       <th>Stream</th>"
echo "        <th>Zuh&oumlrer</th>"
echo "        <th>max. Zuh&oumlrer</th>"
echo "      </tr>"
echo "    </thead>"

# Icecasturl ermitteln
iurl=$(./get_stream.sh | egrep '[^:]+\:[0-9]{1,5}' -o)

# Aktuelle Hörer abfragen
listener="$(curl -s $iurl/status-json.xsl | jq '.icestats[]' | jq '.[] ? | .listeners ')"

# Maximale Hörer abfragen
maxlistener="$(curl -s $iurl/status-json.xsl | jq '.icestats[]' | jq '.[] ? | .listener_peak ')"

# Stremurl abfragen
listenurl="$(curl -s $iurl/status-json.xsl | jq '.icestats[]' | jq '.[] ? | .listenurl ')"

# Mountpoint aus Streamurl extrahieren
mountpoint=$(echo "$listenurl" | egrep '[^/]+"$' -o | sed 's/\"//g')

#Daten nebeneinander in eine List anordnen
full=$(paste <(echo "$mountpoint") <(echo "$listener") <(echo "$maxlistener") <(echo "$listenurl")) 

#Daten als Liste ausgeben
echo "$full" |awk '{print "<tr><td><a href="$4" target=\"_blank\">"$1"</a></td><td>"$2"</td><td>"$3"</td></tr>"}'

#Check ob es aktive Streams gibt
avaliable=$(echo "$full" | sed 's/ //g' | grep -v "^$" | wc -l)

# Erstelle Rückmeldung falls kein Stream aktiv ist
if [ "$avaliable" == "0" ]
then
   echo "<tr><td>Kein Stream aktiv</td><td></td><td></td></tr>"
else
   echo "$content"
fi

# Beende die Tabelle
echo " </table>"

