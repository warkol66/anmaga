|-if $value eq 0-|
	{ "name": "|-$name-|", "value": "|-$value-|", "message": "El nombre de usuario esta disponible" }
|-else-|
	{ "name": "|-$name-|", "value": "|-$value-|", "message": "El nombre de usuario no esta disponible" }
|-/if-|