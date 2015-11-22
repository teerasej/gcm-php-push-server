<?php

// API access key from Google API's Console
// API key ที่ได้จาก Google Developer Console ของโปรเจคเรา
define( 'API_ACCESS_KEY', '' );

// $registrationIds 
// เลข registration id ที่ได้จากการ register ของแอพ
$registrationIds = array('');


$msg = array
(
    'message'   => 'here is a message. message',
    'title'     => 'This is a title. title'
);
$fields = array
(
    'registration_ids'  => $registrationIds,
    'data'          => $msg
);
 
$headers = array
(
    'Authorization: key=' . API_ACCESS_KEY,
    'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );
echo $result;

?>