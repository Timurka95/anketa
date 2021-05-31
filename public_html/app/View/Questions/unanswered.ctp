<div class="container">
<h2>Ответьте, пожалуйста, на следующие вопросы:</h2>

<?php 
	echo "name: " . $this->MyCookie->readCookie('name'); 
	echo "<br>user_id: " . $this->MyCookie->readCookie('user_id'); 
?>

<?php foreach ($questions as $question): ?>
<p>
	<h3><?php echo h($question['Question']['number']); ?>: <?php echo h($question['Question']['question']); ?></h3>
	<div>
	<?php 
		echo $this->Form->create('Answer', array('action' => 'save')); 
		echo $this->Form->input('answer');
		echo $this->Form->hidden('question_id', array('value' => $question['Question']['id']));
		echo $this->Form->hidden('user_id', array('value' => CakeSession::read('user_id')));
		echo $this->Form->end('ок');
	?>
	</div>

</p>
<?php endforeach; ?>

</div>