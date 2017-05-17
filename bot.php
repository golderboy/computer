<?php

function DateThai($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strHour= date("H",strtotime($strDate));
$strMinute= date("i",strtotime($strDate));
$strSeconds= date("s",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
}

$channel_access_token = 'hlxJCEdaEnSCZExzcO66geds7k4FwgJdZpl+KjqNG3SFm8HYw2W2HYb0mgA6HE9KMerqRfZFkdclHAM3q4EgUnzoxAlHwXDosRhzh6Dctjbv6dbrz2fg0j1vxFC+OGVkEZELNq0B3SaJIo9R41sMKwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');

// Parse JSON
$events = json_decode($content, true);
$raw_text_income  = json_encode($events);


// Initialize
$is_type_user     = false;
$dat_displayname  = '';
$dat_userid       = '';
$dat_pictureurl   = '';
$dat_statusmsg    = '';
$dat_project      = "test";

// ผู้ส่งเป็ค บุคคล หรือ กลุ่ม ห้อง
if  ($events['events'][0]['source']['type'] == 'user')
    {
		$userid = $events['events'][0]['source']['userId'];
		$usercaption = ' userid=';
		$is_type_user = true; // for get user profile
	}
else

	if  ($events['events'][0]['source']['type'] == 'group')
	{
		$userid = $events['events'][0]['source']['groupId'];
	    $usercaption = ' groupid=';
	}
else
{
		$userid = $events['events'][0]['source']['roomId'];
	    $usercaption = ' roomid=';
}


// Validate parsed JSON data
if (!is_null($events['events'])) {

	// Loop through each event
	foreach ($events['events'] as $event) {

		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];

			// Get replyToken
			$replyToken = $event['replyToken'];


			// Get User Profile Only Message come from User
			if ($is_type_user) {
				$url = 'https://api.line.me/v2/bot/profile/'.$userid;
				$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $channel_access_token);
				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				$result = curl_exec($ch);
				curl_close($ch);

				$raw_text_income  = $result;
				$userprofile      = json_decode($raw_text_income,true);
				$dat_displayname  = $userprofile['displayName'];
				$dat_userid       = $userprofile['userId'];
				$dat_pictureurl   = $userprofile['pictureUrl'];
				$dat_statusmsg    = $userprofile['statusMessage'];

			}

			// Build message to reply back
			//---------------------------------------------------------------------------------------------------------------------
			if ($text == 'data'){
			   $messages = [
				           'type' => 'text',
							'text' => 'ข้อมูลคุณคือ >> '.' "Display" = '.$dat_displayname.
				   			"\n\r".' "UserId" = '.$dat_userid."\n\r".' "Picture URL" ='.$dat_pictureurl."\n\r".' "Status Message" = '.$dat_statusmsg
							];
				}
			elseif (substr($text,0,1) == '*') // สอบถามด้วยรหัสผ่าน
      {
       $xlenght = strpos($text,'#');
       $xpasw =  substr($text,1,$xlenght-1);
      if ( $xlenght > 0)
      {
       $url = 'http://203.157.118.72/script/getdata.php';
       $headers = 'Content-Type: text/html; charset=utf-8';
       $myvars = 'userid=' . $userid . '&password=' . $xpasw;
       $ch = curl_init( $url );
       curl_setopt( $ch, CURLOPT_POST, 1);
       curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
       curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
       curl_setopt( $ch, CURLOPT_HEADER, $headers);
       curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
       $response = curl_exec( $ch );
       curl_close($ch);

       $userdata = json_decode($response,true);
       if ($userdata['status'] == 1) {
         $reptext  = $userdata['data']['picture_url']; }
       else
        { $reptext  =$userdata['message']; }
      }
      else {
        $reptext  ='รูปแบบไม่ถูกต้อง';
      }
       $messages = [
 			           'type' => 'text',
 			   	   'text' => $reptext
 				];
      }
      elseif  (strtoupper(substr($text,0,1)) == 'R') // ลงทะเบียน 13 หลัก
      {

			  if (strpos(strtoupper($text),'*')==14) // เช็ค 13 หลัก และรหัสผ่าน
				{$reptext ='ลงทะเบียนเรียบร้อย cid='.substr($text,1,13).' password='.substr($text,15,99);

        // ลงทะเบียน 13 หลัก
        $cid = substr($text,1,13);
        $password = substr($text,15,99);
        $url = 'http://203.157.118.72/script/registuser.php';
        $headers = 'Content-Type: text/html; charset=utf-8';
        $myvars = 'userid=' . $userid . '&cid=' .$cid. '&password=' .$password ;

        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, $headers);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec( $ch );
        curl_close($ch);

			 }
        else
        {$reptext ='ข้อมูลไม่ถูกต้อง';
			  }
			  $messages = [
			           'type' => 'text',
			   	   'text' => $reptext
				];
			}
			else
			{
			// CASE AI , SEARCH , INQUERY สอบถามข้อมูลทั่วไป
			if (($text == 'สวัสดี') || ($text == 'd') || ($text == 'ไง')) { $reptext = 'สวัสดีครับ' ;}
			else
			if (($text == 'วันนี้') || ($text == 'เวลา') || ($text == 'วัน')) { $reptext = DateThai(now); }
      else {
        $reptext='ไม่มีข้อมูลที่ต้องการ';
      }

			$messages = [
			           'type' => 'text',
			   	   'text' => $reptext
				];
			}

			//---------------------------------------------------------------------------------------------------------------------
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];

			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $channel_access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
		}
	}

// บันทึกข้อมูลและอัพเดท user
$url = 'http://203.157.118.72/script/updateuser.php';
$headers = 'Content-Type: text/html; charset=utf-8';
$myvars = 'userid=' . $userid . '&display_name=' . $dat_displayname. '&status_message=' . $dat_statusmsg. '&picture_url=' . $dat_pictureurl. '&project=' . $dat_project;

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, $headers);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
curl_close($ch);

}


?>
