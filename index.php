<?php 


ob_start(); 
//לשים תטוקן של הבוט שלכם איפה שכתוב טוקן
$API_KEY =  "774016784:AAHsSpjdiqayTPcYvmNEhxNt9L0s0m8jhYs";
define('API_KEY', $API_KEY);
function bot($method,$datas=[]){
 $url = "https://api.telegram.org/bot".API_KEY."/".$method; 
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
    var_dump(curl_error($ch));
}else{
    return json_decode($res);
   }

}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;


if($text == "/start"){
bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"ברוך הבא \n יופי הצלחת לבנות בוט api כל הכבוד",
'reply_to_message_id'=>$message->message_id
]);
}