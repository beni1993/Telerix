#!/bin/bash
echo " <table class=\"w3-table w3-striped w3-light-blue\" style=\"border-radius:5px\">"
echo "   <thead>"
echo "      <tr class=\"w3-dark-gray\">"
echo "        <th>Name</th>"
echo "        <th>Nummer</th>"
echo "      </tr>"
echo "    </thead>"

while read line 
do 
   name=$(echo "$line" | grep '[^0-9]*' -o )
   number=$(echo "$line" | grep '[0-9]*' -o)
   echo "<tr>"
   echo "  <td>$name</td>"
   echo "  <td>$number</td>"
   echo "</tr>"
done < ./uploads/nummernsammlung.ns
echo "</table>"
