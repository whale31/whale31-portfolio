<?php

$to = "cainaijiubaotian610@gmail.com";



//--- POSTデータ取得 ---------------------------------------------
if($_SERVER["REQUEST_METHOD"] == "POST"){
	foreach($_POST as $k => $v){
		if(get_magic_quotes_gpc()){
			$v = stripslashes($v);
		}
		$v = htmlspecialchars($v, ENT_QUOTES);
		$$k = $v;
	}
}

//件名
$subject = "送信フォームからのメール";
//ヘッダ作成
$headers .= "Content-Type: text/plain; charset=ISO-2022-JP\n";
$headers .= "Content-Transfer-Encoding: 7bit\n";
$headers .= "From: info@daijieto.co.jp\n";
$headers .= "Cc: cc@daijieto.co.jp";


$body = "お名前：" . $nametxt . "
性別：" . $sei . "
お問い合わせ項目" . $pref . "
コメント欄：" . $comment;


// メール送信
mb_language("Japanese");
mb_internal_encoding("UTF-8") ; 
mb_send_mail ( $to, $subject, $body, $headers );

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>送信フォーム完了画面</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
echo ($nametxt);
?>
様
<br>
<br>
以下のデータを送信しました。<br>
==============================
<div class="wrapper">
<dl class="inputcont">
<dt>お名前</dt><dd><?php echo ($nametxt); ?></dd>
<dt>性別</dt><dd><?php echo ($sei); ?></dd>
<dt>お問い合わせ項目</dt>
<dd>
<?php echo ($pref); ?>
</dd>
<dt>メッセージ</dt><dd><?php echo ($comment); ?></dd>
</dl>
</div>
==============================
</body>
</html>
