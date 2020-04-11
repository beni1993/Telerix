# Telerix
Ein Telefonstreaming-System auf Basis von Asterisk

**Hinweis: Auf keinen Fall die aktuelle Version auf einem öffentlich erreichbaren Server installieren! Diese Version ist nur zum Betrieb in einer virtuellen Maschine oder im privaten lokalen Netzwerk gedacht!**

## Warum Telerix?
Telerix ist eine Zusammensetzung aus dem Wort Telefon und dem Wort Asterisk, wobei letztgenanntes durch die ähnlichkeit versehentlich bereits öfters Asterix genannt wurde. Asterisk bildet die Basis dieses Systems und wird deshalb auch im Namen angedeutet.

## Wozu Telerix?
Telerix soll eine einfache Lösung bieten, IceCast-Streams z.B von einem Gottesdienst für viele Telefonzuhörer zugänglich zu machen.

## Installation

* Ubuntu Sever 18.04 LTS 

1. Software zum herunterladen und entpacken mit folgendem Befehl im Terminal installieren:
   ```sh
   sudo apt install unzip wget
   ```

2. Das Repository mit folgendem Befehl herunterladen:

   ```sh
   sudo wget https://github.com/beni1993/Telerix/archive/master.zip
   ```

3. Die heruntergeladene Zip-Datei entpacken:
   ```sh
   sudo unzip master.zip
   ```

4. Die Ausführung der Skripts in dem entpackten Ordner erlauben:
   ```sh
   sudo chmod 777 -R ./Telerix-master
   ```
5. Den entpackten Ordner öffnen:
   ```sh
   cd Telerix-master
   ```
6. Installation starten: 
   ```sh
   sudo ./Install.sh
   ```
7. Alle weitere Schritte zur Konfiguration beschreibt die Installation.

# Alternative Installationsvariante (setzt git vorraus):

1. Repository clonen
   ```sh
   git clone https://github.com/beni1993/Telerix.git
   ```

2. Repository Ordner öffnen
   ```sh
   cd Telerix
   ```

3. Installation ausführen
   ```sh
   sudo ./Install.sh
   ```

4. Alle weiteren Schritte zur Konfiguration beschreibt die Installation.

