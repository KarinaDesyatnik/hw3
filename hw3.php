<?php
session_start();
echo 'Homework 3</br>';

$form = $_SESSION;

if(!empty($form['auth'])){ ?>

<?php if(!empty($form['valid_login'])){  ?>
		<p style="">
			Ваше имя: <?php echo $form['valid_login'];  ?>

		</p>
	<?php } ?>
	<?php if(!empty($form['valid_email'])){  ?>
		<p style="">
			Ваш email: <?php echo $form['valid_email'];  ?>

		</p>
	<?php } ?>
	<?php
$dateYear = $form['valid_year'];
$dateMonth = $form['valid_month'];
$dateDay = $form['valid_day'];
$birthDate = $dateMonth.'/'.$dateDay.'/'. $dateYear;


$birthDate = explode("/", $birthDate);
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));
  echo 'Вам:' . $age . 'лет';
?>
<?php if(!empty($form['valid_pol'])){  ?>
		<p style="">
			Ваш пол: <?php echo $form['valid_pol'];  ?>

		</p>
	<?php } ?>
<?php if(!empty($form['valid_msg'])){  ?>
<?php
$text = $form['valid_msg'];
$mat = array("#мат1#ius", "#мат2#ius", "#мат3#ius");
$text = preg_replace($mat, '******', $text);  

	$rus=array('А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я','а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',' ');
$lat=array('A','B','V','G','D','E','E','GH','Z','I','Y','K','L','M','N','O','P','R','S','T','U','F','H','C','CH','SH','SCH','Y','Y','Y','E','YU','YA','a','b','v','g','d','e','e','gh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya',' ');

$text = str_replace($rus, $lat, $text);

?>
		<p style="">
			Ваше сообщение: <?php echo $text ;  ?>

		</p>
	<?php } ?>

	<div><a href="form-hw3.php?exit=1">Вернуться к заполнению формы</a></div>
<?php } else{

	function month($num){
	if ($num == 1) {
		return 'Январь';
	} elseif ($num == 2) {
		return 'Февраль';
	} elseif ($num == 3) {
		return 'Март';
	} elseif ($num == 4) {
		return 'Апрель';
	} elseif ($num == 5) {
		return 'Май';
	} elseif ($num == 6) {
		return 'Июнь';
	} elseif ($num == 7) {
		return 'Июль';
	} elseif ($num == 8) {
		return 'Август';
	} elseif ($num == 9) {
		return 'Сентябрь';
	} elseif ($num == 10) {
		return 'Октябрь';
	} elseif ($num == 11) {
		return 'Ноябрь';
	} elseif ($num == 12) {
		return 'Декабрь';
	}

	}
 ?>


<form action="form-hw3.php" method="post">
	<input type="text" name="login" placeholder="Имя" value="<?php echo !empty ($form['valid_login']) ? $form['valid_login'] : ''; ?>" />
	<?php if(!empty($form['error_login'])){  ?>
		<span style="color: red;">
			<?php echo $form['error_login'];  ?>

		</span>
	<?php } ?>
</br>
	
	<input type="text" name="email" placeholder="e-mail" value="<?php echo !empty ($form['valid_email']) ? $form['valid_email'] : ''; ?>">
<?php if(!empty($form['error_email'])){  ?>
		<span style="color: red;">
			<?php echo $form['error_email'];  ?>

		</span>
	<?php } ?>

	 </br>


	<select name="day" id="">
		<option value="0"> - day -</option>
		<?php for($i = 1; $i <= 31; $i++) { ?>
		<option value="<?php echo $i ?>" <?php echo !empty($form['valid_day']) && $form['valid_day'] == $i ? 'selected' : ''; ?>><?php echo $i ?></option>
		<?php } ?>
		

	</select>
<?php echo !empty($form['error_day']) ? '<span style="color: red;">'.$form['error_day'].'</span>' : ''?>
	<select name="month" id="">
		<option value="0"> - month -</option>
		<?php for($i = 1; $i <= 12; $i++) { ?>
		<option value="<?php echo $i ?>" <?php echo !empty($form['valid_month']) && $form['valid_month'] == $i ? 'selected' : ''; ?>><?php echo month($i) ?></option>
		<?php } ?>
		
	</select> 
<?php echo !empty($form['error_month']) ? '<span style="color: red;">'.$form['error_month'].'</span>' : ''?>

<?php if($form['valid_month'] % 2 == 0 && $form['valid_month'] != 2 && $form['valid_day'] > 30){  ?>
		<span style="color: red;">
			В этом месяце 30 дней. Выберите правильную дату
		</span>
	<?php } ?>
<?php if($form['valid_month'] == 2 && $form['valid_day'] > 28){  ?>
		<span style="color: red;">
			В этом месяце 28 дней. Выберите правильную дату
		</span>
	<?php } ?>
	<select name="year" id="">
		<option value="0"> - year -</option>
		<?php for($i = 1950; $i <= 2019; $i++) { ?>
		<option value="<?php echo $i ?>" <?php echo !empty($form['valid_year']) && $form['valid_year'] == $i ? 'selected' : ''; ?>><?php echo $i ?></option>
		<?php } ?>
		
	</select>
<?php echo !empty($form['error_year']) ? '<span style="color: red;">'.$form['error_year'].'</span>' : ''?>
	</br>

	<input type="radio" name="pol" value="Mужской" <?php echo !empty($form['valid_pol']) && $form['valid_pol'] == "Mужской" ? 'checked' : ''; ?> /> М
	<input type="radio" name="pol" value="Женский" <?php echo !empty($form['valid_pol']) && $form['valid_pol'] == "Женский" ? 'checked' : ''; ?> /> W
	<?php echo !empty($form['error_pol']) ? '<span style="color: red;">'.$form['error_pol'].'</span>' : ''?>
	<br/>
	<textarea name="msg"><?php echo !empty ($form['valid_msg']) ? $form['valid_msg'] : ''; ?></textarea>
	<?php if(!empty($form['error_msg'])){  ?>
		<span style="color: red;">
			<?php echo $form['error_msg'];  ?>

		</span>
	<?php } ?>
</br>
	<button type="submit">Send</button>

</form>
<?php } ?>
