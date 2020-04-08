#!/bin/bash
echo " <table class=\"w3-table w3-striped w3-light-blue\" style=\"border-radius:5px\">"
echo "   <thead>"
echo "      <tr class=\"w3-dark-gray\">"
echo "        <th>Stream</th>"
echo "        <th>Zuh&oumlrer</th>"
echo "        <th>max. Zuh&oumlrer</th>"
echo "      </tr>"
echo "    </thead>"
icecastserver=$(./get_stream.sh | egrep '^[^8]+8000' -o)
content=$(wget $icecastserver/status-json.xsl -q -O - | egrep 'listener_peak":\w+|listeners":\w+|url":"[^"]+' -o)
content=$(echo "$content" | sed 'N;N;N;s/\n/;/g');
content=$(echo "$content" | sed 's/listener_peak"://g' | sed 's/listeners"://g' | sed 's/url":"//g')
content=$(echo "$content" | tr ';' ' ')
content=$(echo "$content" | sed 's/\(^[0-9]\+ [0-9]\+ [^8]\+8000\/\)\+\([^ ]\+\)\( .*\)/\1\2 \2 \3/g')
content=$(echo "$content" | awk '{print "<tr><td><a href=\""$3"\" target=\"_blank\">"$4"</a></td><td>"$2"</td><td>"$1"</td></tr>"}')

#Check ob es aktive Streams gibt
avaliable=$(echo "$content" | sed 's/ //g' | grep -v "^$" | wc -l)

if [ "$avaliable" == "0" ]
then
   echo "<tr><td>Kein Stream aktiv</td><td></td><td></td></tr>"
else
   echo "$content"
fi

echo "</table>"
