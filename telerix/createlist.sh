#!/bin/bash
rm  ./uploads/nummernsammlung.ns
for i in ./uploads/*.txt
do
  cat "$i" | tr '<' ' ' | tr '>' ' ' | tr '!' ' ' | tr '"' ' ' | tr '$' ' ' | tr '/' '/' | tr '{' ' ' | tr '}' ' ' | tr '=' ' ' | tr '.' ' ' | tr '-' ' ' | tr ';' ' ' | tr ':' ' ' | tr ',' ' ' | tr '&' ' ' | tr '#' ' ' | tr '?' ' ' | tr '|' ' ' | tr '[' ' ' | tr ']' ' ' | tr '%' ' ' >> ./uploads/nummernsammlung.ns
done
for ic in ./uploads/*.csv
do
  cat "$ic" | tr '<' ' ' | tr '>' ' ' | tr '!' ' ' | tr '"' ' ' | tr '$' ' ' | tr '/' '/' | tr '{' ' ' | tr '}' ' ' | tr '=' ' ' | tr '.' ' ' | tr '-' ' ' | tr ';' ' ' | tr ':' ' ' | tr ',' ' ' | tr '&' ' ' | tr '#' ' ' | tr '?' ' ' | tr '|' ' ' | tr '[' ' ' | tr ']' ' ' | tr '%' ' ' >> ./uploads/nummernsammlung.ns
done
