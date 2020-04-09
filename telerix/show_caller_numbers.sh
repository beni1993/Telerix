#!/bin/bash
list=$(sudo asterisk -rx 'sip show channels')
list=$(echo "$list" | awk -e ' {print $2}')
list=$(echo "$list" | grep -v "User\/ANR" | grep -v "active")
list=$(echo "$list" | sed 's/anonymous/Unterdr\&uuml;ckte Rufnummer/g')
# Im folgenden die Rufnummerzuordnung
numlst=$(cat ./uploads/nummernsammlung.ns)
while read line
do
   number=$(echo "$line" | egrep '[0-9]+' -o)
   name=$(echo "$line" | egrep '[^0-9]+')
   list=$(echo "${list/$number/$name}")

   #   list=$(echo "$list" | sed "s/$number/$not/g")
done < ./uploads/nummernsammlung.ns
caller=$(echo $list | sed 's/ //g' | grep -v "^$" |  wc -l)
if [ "$caller" == "0" ]
then
   echo "<li>Aktuell kein Anrufer</li>"
else
   list=$(echo "$list" | awk -e '{print "<li>"$0"</li>"}')
fi

echo "$list"
