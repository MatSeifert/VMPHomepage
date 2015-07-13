VMP Clan - Homepage
===================
Entwicklerhinweise
------------------
### Mapcrafter
#### Einbindung
Es wird [Mapcrafter](http://mapcrafter.org/index) verwendet, um die Multiplayer-Map unseres Minecraft Servers als interaktive Karte bereitzustellen. Installiert wird Mapcrafter wie in der [Anleitung](http://docs.mapcrafter.org/builds/stable/installation.html) erklärt.
Damit in regelmäßigen Abständen die Karte aktualisiert werden kann, sollte das Kommando `mapcrafter -c <my_render_conf>.conf` (mit entsprechenden [Optionen](http://docs.mapcrafter.org/builds/stable/using_mapcrafter.html#command-line-options)) als Cronjob eingerichtet werden.

#### Konfiguration
Zum Konfigurieren von Mapcrafter kann die Datei **content/mapcrafter/conf/render.conf** nach [diesem Format](http://docs.mapcrafter.org/builds/stable/configuration.html) bearbeitet werden.
Bei einer Neukonfiguration sollten die bisherigen Map-Daten gelöscht werden, da sonst unerwünschte Fragmente auftreten können!
