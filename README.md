# Telerix
Ein Telefonstreaming-System auf Basis von Asterisk

## Warum Telerix?
Eine zusammensetzung aus den Worten Telefon und Asterisk, das durch die Wortähnlichkeit versehentlich bereits öfters Asterix genannt wurde und die Basis dieses Systems bildet.

## Wozu Telerix?
Telerix soll eine einfache Lösung bieten, IceCast-Streams z.B von einem Gottesdienst, für viele Telefonhörer zugänglich zu machen.
## Installation

* Ubuntu Sever 18.04 LTS 


Software zum herunterladen und entpacken mit folgendem Befehl im Terminal installieren:

```sh
sudo apt install unzip wget
```


Das Repository mit folgendem Befehl herunterladen:

```sh
sudo wget https://github.com/beni1993/Telerix/archive/master.zip
```

Die heruntergeladene Zip-Datei entpacken:
```sh
sudo unzip master.zip
```

Die Ausführung der Skripts in dem entpackten Ordner erlauben:
```sh
sudo chmod 777 -R ./Telerix-master
```
Den entpackten Ordner öffnen:
```sh
cd Telerix-master
```

Installation starten:
```sh
sudo ./Install.sh
```

Alle weitere Schritte zur Konfiguration beschreibt die Installation.

