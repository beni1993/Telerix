#!/bin/bash
sudo asterisk -rx 'sip show channels' | egrep '^[0-9]+ active SIP' -o | egrep '^[0-9]+' -o
