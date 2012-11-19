function getContent( timestamp )
{
	var queryString = { 'timestamp' : timestamp };
	
	$.get ( 'server.php' , queryString , function ( data )
	{
		var obj = jQuery.parseJSON( data );
		$( '#response' ).html( obj.content );
		
		// reconecta ao receber uma resposta do servidor
		getContent( obj.timestamp );
	});
}

$( document ).ready ( function ()
{
	getContent();
});

