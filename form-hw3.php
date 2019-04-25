<?php
session_start();
if (!empty($_GET['exit'])) {
	unset($_SESSION['auth']);
	unset($_SESSION['valid_login']);
	unset($_SESSION['valid_email']);
	unset($_SESSION['valid_day']);
	unset($_SESSION['valid_month']);
	unset($_SESSION['valid_year']);
	unset($_SESSION['valid_pol']);
	unset($_SESSION['valid_msg']);
	
	header('Location: hw3.php', true, 301);
exit;	
}

$login = $_POST['login'];
$array = explode(' ', $login);
$msg = $_POST['msg'];
$email = $_POST['email'];
$email_check = explode('@', $email);

if(!empty($_POST['login']) && count($array) < 2 && mb_strlen($login) >= 4 && mb_strlen($login) <= 15  )  {
	$_SESSION['valid_login'] = $login;
	unset($_SESSION['error_login']);

} else{
	$_SESSION['error_login'] = 'Поле имя введено неверно';
	unset($_SESSION['valid_login']);
}

if(!empty($_POST['email']) && count($email_check) == 2 )  {
	$_SESSION['valid_email'] = $email;
	unset($_SESSION['error_email']);

} else{
	$_SESSION['error_email'] = 'Поле e-mail введено неверно';
	unset($_SESSION['valid_email']);
}

if(!empty($_POST['day']) && $_POST['day'] <= 31 && is_numeric($_POST['day']) && $_POST['day'] >= 1) {
	$_SESSION['valid_day'] = $_POST['day'];
	unset($_SESSION['error_day']);
} else{
	$_SESSION['error_day'] = 'Укажите дату';
	unset($_SESSION['valid_day']);
}

if(!empty($_POST['month']) ) {
	$_SESSION['valid_month'] = $_POST['month'];
	unset($_SESSION['error_month']);
} else{
	$_SESSION['error_month'] = 'Укажите месяц';
	unset($_SESSION['valid_month']);
}

if(!empty($_POST['year']) ) {
	$_SESSION['valid_year'] = $_POST['year'];
	unset($_SESSION['error_year']);
} else{
	$_SESSION['error_year'] = 'Укажите год';
	unset($_SESSION['valid_year']);
}
if(!empty($_POST['pol']) && ($_POST['pol'] == "Mужской" || $_POST['pol'] == "Женский")){
	$_SESSION['valid_pol'] = $_POST['pol'];
unset($_SESSION['error_pol']);
} else {
	$_SESSION['error_pol'] = 'Укажите свой пол';
	unset($_SESSION['valid_pol']);
}

if(!empty($_POST['msg']) && mb_strlen($msg) >= 25 )  {
	$_SESSION['valid_msg'] = $msg;
	unset($_SESSION['error_msg']);

} else{
	$_SESSION['error_msg'] = 'Поле сообщение заполнено неверно';
	unset($_SESSION['valid_msg']);
}

	
if(!empty($_SESSION['valid_login']) && $_SESSION['valid_email'] && $_SESSION['valid_day'] && $_SESSION['valid_month'] && $_SESSION['valid_year'] && $_SESSION['valid_pol'] && $_SESSION['valid_msg']){
	$_SESSION['auth'] = 1;

}

header('Location: hw3.php', true, 301);
exit;
?>

<br/>
<a href="hw3.php">Back</a>