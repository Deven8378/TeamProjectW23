type nul > messages.po
find app -regex ".*\.php" -exec xgettext -j {} ;
ren messages.po messages.pot
