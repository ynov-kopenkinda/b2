#!/bin/bash

FILES_TO_DOWNLOAD=("cro_magnon.png" "etudiant.png" "mage.png" "pilote.png" "vador.png" "texte.txt");
folder=`date +%Y-%m-%d`;
i=1;




rm -rf "$folder"
rm -rf "$folder.tar.gz"
mkdir -p $folder

for FILE in "${FILES_TO_DOWNLOAD[@]}"; do
  curl -O -s "https://hollow313.ovh/tux/$FILE";
  mv "./$FILE" "./$folder/$FILE";
  [[ $FILE = *.png ]] &&  {
    mv "./$folder/$FILE" "./$folder/0$i.png";
    i=$((i+1))
  }
done;

sed -i "4895d" "./$folder/$FILE";

tar -czf "$folder.tar.gz" "$folder"