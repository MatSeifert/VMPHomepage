function iFrameHeight(n,id) 
{
	var h = 0;
	if ( !document.all ) 
	{
		h = document.getElementById(id).contentDocument.body.offsetHeight;
		document.getElementById(id).style.height = h + 0 + 'px';
	} 
	else if( document.all ) 
	{
		// Extrawurst für den Internet Explorer
		h = document.frames(n).document.body.scrollHeight;
		document.getElementById(id).style.height = h + 0 + 'px';
	}
}