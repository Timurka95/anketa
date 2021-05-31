<?php 
	echo $this->Form->create('Profile', array(
		'class' => 'myform',
		'inputDefaults' => array(
			'div' => false)
		)); 
	echo $this->Form->hidden('user_id', array('value' => CakeSession::read('user_id')));
?>
<ul>
	
	<li>
		<h2>Создание профиля</h2>
		<span class="required_notification"><b>*</b> отмечены обязательные для заполнения поля</span>
	</li>
	<li>
	<?php echo $this->Form->input('fullname', array('label' => 'ФИО')); ?>
	</li>
	<li>
		<?php echo $this->Form->input('age', array('label' => 'Возраст', 'min' => 3, 'max' => 100));?>
	</li>
	<li>
		<?php echo $this->Form->input('email', array('label' => 'Email (если указан, на него будет выслан результат)', 'placeholder' => 'ivanov@mail.ru'));?>
	</li>
	<li>
		<?php echo $this->Form->input('sex', array('label' => 'Пол: ', 'options' => array('m' => 'М', 'w' => 'Ж')));?>
	</li>
	<li>
		<?php echo $this->Form->input('group', array('label' => 'Группа физической активности: ', 'options' => array(
																							'1' => '1 - Очень низкая',
																							'2' => '2 - Низкая',
																							'3' => '3 - Средняя',
																							'4' => '4 - Высокая',
																							'5' => '5 - Очень высокая (тяжелый физический труд)')));?>
		<span class="form_hint_label">?</span>
		<span class="form_hint">
			<b>I группа (очень низкая физическая активность)</b> - работники преимущественно умственного труда, сидячая работа (государственные служащие административных органов и учреждений, научные работники, преподаватели вузов, колледжей, учителя средних школ, студенты, специалисты-медики, психологи, диспетчеры, операторы в т.ч. техники по обслуживанию ЭВМ и компьютерного обеспечения, программисты, работники финансово-экономической, юридической и административно-хозяйственной служб, работники конструкторских бюро и отделов, рекламно-информационных служб, архитекторы и инженеры по промышленному и гражданскому строительству, налоговые служащие, работники музеев, архивов, библиотекари, специалисты службы страхования, дилеры, брокеры, агенты по продаже и закупкам, служащие по социальному и пенсионному обеспечению, патентоведы, дизайнеры, работники бюро путешествий, справочных служб и других родственных видов деятельности);<br>
			<b>II группа (низкая физическая активность)</b> - работники занятые легким трудом  (водители городского транспорта, рабочие пищевой, текстильной, швейной, радиоэлектронной промышленности, операторы конвейеров, весовщицы, упаковщицы, машинисты железнодорожного транспорта, участковые врачи, хирурги, медсестры, продавцы, работники предприятий общественного питания, парикмахеры, работники жилищно-эксплуатационной службы, реставраторы художественных изделий, гиды, фотографы, техники и операторы радио и телевещания, таможенные инспектора, работники милиции и патрульной службы и других родственных видов деятельности);<br>
			<b>III группа (средняя физическая активность)</b> - работники средней тяжести труда (слесари, наладчики, станочники, буровики, водители электрокаров, экскаваторов, бульдозеров и другой тяжелой техники, работники тепличных хозяйств, растениеводы, садовники, работники рыбного хозяйства и других родственных видов деятельности);<br>
			<b>IV группа (высокая физическая активность)</b> - работники тяжелого физического труда (строительные рабочие, грузчики, рабочие по обслуживанию железнодорожных путей и ремонту автомобильных дорог, работники лесного, охотничьего и сельского хозяйства, деревообработчики, физкультурники, металлурги доменщики-литейщики и другие родственные виды деятельности);<br>
			<b>V группа (очень высокая физическая активность; только мужчины)</b> - работники особо тяжелого физического труда (спортсмены высокой квалификации в тренировочный период, механизаторы и работники сельского хозяйства в посевной и уборочный период, шахтеры и проходчики, горнорабочие, вальщики леса, бетонщики, каменщики, грузчики немеханизированного труда, оленеводы и другие родственные виды деятельности).
		</span>
	</li>
	<li>
		<?php echo $this->Form->input('loc', array('label' => 'Проживание: ', 'options' => array(
																	'1' => 'Общежитие',
																	'2' => 'С родителями или собственной семьёй',
																	'3' => 'Съёмная квартира',
																	'4' => 'Другое'))); ?>
	</li>
	<li>
		<?php echo $this->Form->input('region', array('label' => 'Регион основного места жительства', 'placeholder' => 'Омская область'));?>
	</li>
	<li>
		<?php echo $this->Form->input('ration', array('label' => 'Оценка собственного питания (по 5-бальной шкале, где 5 - отлично, 1 - очень плохо)', 'options' => array(1,2,3,4,5)));?>
	</li>
	<li>
		<?php echo $this->Form->input('growth', array('label' => 'Рост (м)', 'step' => '0.01',  'min' => '0.9', 'max' => '2.3'));?>
	</li>
	<li>
		<?php echo $this->Form->input('weight', array('label' => 'Вес (кг)', 'min' => 20, 'max' => 200));?>
	</li>
	<li>
		<?php echo $this->Form->input('complaints', array('label' => 'Жалобы (здоровье)'));?>
	</li>
	<li>
		<?php echo $this->Form->input('waist', array('label' => 'Объём талии (см)', 'min' => 20, 'max' => 200));?>
		<span class="form_hint_label">?</span>
		<span class="form_hint">Измерение производят без одежды или в тонком нижнем белье на уровне обхвата лентой; —  испытуемый стоит прямо; —  живот должен быть расслаблен;—  пятки должны быть вместе; ленту держат в горизонтальном положении; —  измерение производят на уровне естественной талии, т. е. самого узкого места живота; —  измерение производят в конце выдоха; — необходимо держать ленту прижатой к телу без вдавливания в кожу</span>
	</li>
	<li>
		<?php echo $this->Form->input('hips', array('label' => 'Объём бедёр (см)', 'min' => 40, 'max' => 200));?>
		<span class="form_hint_label">?</span>
		<span class="form_hint">Измеряют на уровне ягодиц</span>
	</li>
	<li>
		<?php echo $this->Form->input('shoulder', array('label' => 'Окружность плеча (см)', 'min' => 10, 'max' => 60));?>
		<span class="form_hint_label">?</span>
		<span class="form_hint">Определяется сантиметровой лентой на уровне средней трети плеча нерабочей согнутой руки человека</span>
	</li>

</ul>
<?php echo $this->Form->end(__('Сохранить')); ?>