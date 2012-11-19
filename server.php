<?php

set_time_limit(0);

// arquivo cujo conteúdo será enviado ao cliente
$dataFileName = 'data.txt';


while ( true )
{
	$requestedTimestamp = isset ( $_GET [ 'timestamp' ] ) ? (int)$_GET [ 'timestamp' ] : null;
	
	// o PHP faz cache de operações "stat" do filesystem. Por isso, devemos limpar esse cache
	clearstatcache();
	$modifiedAt = filemtime( $dataFileName );
	
	if ( $requestedTimestamp == null || $modifiedAt > $requestedTimestamp )
	{
		$data = file_get_contents( $dataFileName );
		
		$arrData = array(
			'content' => $data,
			'timestamp' => $modifiedAt
		);		

		$json = json_encode( $arrData );

		echo $json;

		break;
	}
	else
	{
		sleep( 1 );
		continue;
	}
}
