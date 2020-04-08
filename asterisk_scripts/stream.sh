#!/bin/bash
# --> ACHTUNG: Die Zeile 3 wird mit der streamurl überschrieben!
streamurl=""

# Holen und dekodieren des Internetstreams, und versenden durch stdout.
wget -q -O - $streamurl | madplay -Q -z -o raw:- --mono -R 8000 -a -8 -
