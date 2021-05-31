<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

		echo $this->html->css('bootstrap');
		echo $this->html->css('style');
		echo $this->html->script('bootstrap');
		echo $this->html->script('jquery');
	?>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1 style="text-align:center">АНКЕТА ПО ОЦЕНКЕ КАЧЕСТВА ПИТАНИЯ</h1>

			<div class="navbar navbar-default">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
							<span class="sr-only">Открыть навигацию</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- <a class="navbar-brand" href="#">Company</a> -->
					</div>
					<div class="collapse navbar-collapse" id="responsive-menu">
						<ul class="nav navbar-nav">
							<li class="<?php echo (!empty($this->params['action']) && ($this->params['controller']=='pages') && ($this->params['action']=='index') )?'active' :'inactive' ?>">
								<?php echo $this->Html->link('Главная', array('controller' => 'pages', 'action' => 'index')); ?>
							</li>
							<li><?php
								if(cakesession::read('user_id')){
									echo $this->Html->link('Выйти', array('controller' => 'users', 'action' => 'logout'));
								}
							?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

	<div class="row"><div class="col-lg-10 col-lg-offset-1">
		<?php echo $this->Flash->render(); ?>
		<?php echo $this->fetch('content'); ?>
	</div></div>
	<div class="row">
		<hr>
		<footer>
	        <div class="row">
	            <div class="col-lg-12">
	                <p>Copyright &copy; Anketa 2017</p>
	            </div>
	        </div>
	    </footer>

    </div>
</div>
</body>
</html>
