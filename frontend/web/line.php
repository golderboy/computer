<?php

define("LINE_API","https://notify-api.line.me/api/notify");

//define("LINE_TOKEN","jTvFR9vPhdtzVXN4AxGHTKQWJ9qqFK8AVKn9Vg1CIVY");

function notify_message($message,$token){

$queryData=array('message'=>$message);

$queryData=http_build_query($queryData,'','&');

$headerOptions=array(

'http'=>array(

'method'=>'POST',

'header'=>"Content-Type: application/x-www-form-urlencoded\r\n"

		."Authorization: Bearer ".$token."\r\n"

."Content-Length: ".strlen($queryData)."\r\n",

'content'=>$queryData

        )

    );

$context=stream_context_create($headerOptions);

$result=file_get_contents(LINE_API,FALSE,$context);

$res=json_decode($result);

	return$res;

}

$res=notify_message($_GET['message'],$_GET['token']);

header("location: index.php" );

exit(0);

//var_dump($res);
?>
