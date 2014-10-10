// Auslesen der aktuellen Fensterhöhe, eine Veränderung in Echtzeit ist unnötig
function Fensterhoehe () {
	if (window.innerHeight) {
		return window.innerHeight;
	} 
	else if (document.body && document.body.offsetHeight) 
	{
		return document.body.offsetHeight;
	} else { return 0; }
}

// Überwachung initialisieren
if (!window.Hoehe && window.innerHeight) 
{
	Hoehe = Fensterhoehe();
}