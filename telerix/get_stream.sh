#!/bin/bash
sed -n '3p' /etc/asterisk/stream.sh | sed 's/streamurl=//g' | sed 's/"//g'
