<?php
if($this->MyCookie->checkCookie('name'))
{
?>
<script type="text/javascript">
fix_header={
  'fixed_el': null,
  'new_table': null,
 
  bind : function(el, eventName, callback) {
    if (el) {
      if (el.addEventListener) {
        el.addEventListener(eventName, callback, false);
      }
      else if (el.attachEvent) {
        el.attachEvent("on" + eventName, callback);
      }
    }
  },
 
  get_position: function(el) {
    var offsetLeft = 0, offsetTop = 0;
    do {
      offsetLeft += el.offsetLeft;
      offsetTop  += el.offsetTop;
    }
    while (el = el.offsetParent);
    return {x:offsetLeft, y:offsetTop};
  },
 
  chk_position: function() {
    var doc = document.documentElement;
    var body = document.body;
 
    if (typeof(window.innerWidth) == 'number') {
      my_width = window.innerWidth;
      my_height = window.innerHeight;
    }
    else if (doc && (doc.clientWidth || doc.clientHeight)) {
      my_width = doc.clientWidth;
      my_height = doc.clientHeight;
    }
    else if (body && (body.clientWidth || body.clientHeight)) {
      my_width = body.clientWidth;
      my_height = body.clientHeight;
    }
 
    if (doc.scrollTop) { dy=doc.scrollTop; } else { dy=body.scrollTop; }
 
    var coord=fix_header.get_position(fix_header.fixed_el);
 
    // Заголовок таблицы еще на экране или таблица уже не на экране
    if (coord.y>dy || (coord.y+fix_header.fixed_el.clientHeight)<dy) {
      fix_header.new_table.style.left='-9999px';
    }
    // Заголовок уже прокручен вверх
    else {
      fix_header.new_table.style.left=
        fix_header.fixed_el.getBoundingClientRect().left+'px';
    }
  },
 
  fix: function (id) {
    var tmp,st;
    var ftable=document.getElementById(id);
    if (ftable) {
      if (this.new_table!=null) {
        if (this.new_table.parentNode!=undefined) {
          this.new_table.parentNode.removeChild(this.new_table);
        }
        this.new_table=null;
      }
      else {
        this.bind(window,'scroll',this.chk_position);
        this.bind(window,'resize',this.chk_position);
      }
 
      this.fixed_el=ftable;
 
      tmp=ftable.getElementsByTagName('thead');
      if (tmp) {
        var fthead=tmp[0];
 
        new_table=document.createElement('table');
 
        for(var i in this.fixed_el.style) {
          if (this.fixed_el.style[i]!='') {
            try {
              new_table.style[i]=this.fixed_el.style[i];
            }
            catch (e) {};
          }
        }
 
        new_table.id='fixed_'+id;
        new_table.rules='all';
        new_table.border='1';
        new_table.style.position='fixed';
        new_table.style.left='-9999px';
        new_table.style.top='0px';
 
        var cln = fthead.cloneNode(true);
        var cth=cln.getElementsByTagName('th');
        var fth=fthead.getElementsByTagName('th');
 
        for(var i=0; i<fth.length; i++) {
          cth[i].style.width=(fth[i].clientWidth+(window.opera?1:0))+'px';
          cth[i].style.paddingLeft='0';
          cth[i].style.paddingRight='0';
        }
        new_table.appendChild(cln);
 
        this.fixed_el.parentNode.appendChild(new_table);
        this.new_table=new_table;
        this.chk_position();
      }
    }
  }
};
</script>
<div>
<table class="table-bordered" id="my_table" style="width:980px; margin:auto; border-color:#d3d3d3; " rules="all">
<thead>
	<tr>
		<td rowspan="2" colspan="2" style="background-color: #ffffff; width:550px;text-align: center; vertical-align: middle">Список продуктов</td>
		<td colspan="2" style="background-color: #ffffff;text-align: center; vertical-align: middle">Обычно употребляемые порции</td>
		<td colspan="8" style="background-color: #ffffff;text-align: center; vertical-align: middle">Частота потребления продуктов и блюд</td>
	</tr>
	<tr>
		<td style="width:100px;text-align: center; vertical-align: middle">Размер порции</td>
		<td style="width:100px;text-align: center; vertical-align: middle">Число порций</td>
		<td style="text-align: center; vertical-align: middle">Не употребляется</td>
		<td style="text-align: center; vertical-align: middle">1-2 р. в мес.</td>
		<td style="text-align: center; vertical-align: middle">1 раз в неделю</td>
		<td style="text-align: center; vertical-align: middle">2-3 р. в неделю</td>
		<td style="text-align: center; vertical-align: middle">4-6 р. в неделю</td>
		<td style="text-align: center; vertical-align: middle">1-2 р. в день</td>
		<td style="text-align: center; vertical-align: middle">3-4 р. в день</td>
		<td style="text-align: center; vertical-align: middle">5 и более р. в день</td>
	</tr>

	<tr >
		<td colspan="12" class="blank_name" style="border-bottom-color:#000000">
			<?= $points[0]['Blank']['name']?>
		</td>
	</tr>
</thead>
	<?php echo $this->Form->create('Point', array('action' => 'saveset'))?>

	<?php 
		$cnt = 0;
		foreach($points as $point): 
	?>
	<input type="hidden" name="data[Point][point_id<?=$cnt?>]" value="<?=$point['Point']['id']?>"/>
	<tr>
		<td style="text-align: center; vertical-align: middle"><?= $point['Point']['number'] ?></td>
		<td><?= $point['Point']['title'] ?></td>
		<td style="text-align: center; vertical-align: middle"><?= $point['Point']['portion'] ?></td>
		<td><input type="number" name="data[Point][portnumb<?= $cnt?>]" min="0" step="0.01" value="0" required></td>
		<td><input type="radio" name="data[Point][freq<?= $cnt?>]" value="1" checked="checked"></td>
		<td><input type="radio" name="data[Point][freq<?= $cnt?>]" value="2"></td>
		<td><input type="radio" name="data[Point][freq<?= $cnt?>]" value="3"></td>
		<td><input type="radio" name="data[Point][freq<?= $cnt?>]" value="4"></td>
		<td><input type="radio" name="data[Point][freq<?= $cnt?>]" value="5"></td>
		<td><input type="radio" name="data[Point][freq<?= $cnt?>]" value="6"></td>
		<td><input type="radio" name="data[Point][freq<?= $cnt?>]" value="7"></td>
		<td><input type="radio" name="data[Point][freq<?= $cnt?>]" value="8" align="middle"></td>
	</tr>
	<?php $cnt++?>
	<?php endforeach; ?>
	<tr>
		<td colspan="1">
			<?php echo $this->Form->hidden('user_id', array('value' => CakeSession::read('user_id'))); ?>
			<?php echo $this->Form->hidden('blank_id', array('value' => $points[0]['Point']['blank_id'])); ?>
		</td>
	</tr>
</table>
<script type="text/javascript">
fix_header.fix('my_table');
</script>
<table class="table-bordered" id="fixed_my_table" style="width:980px; border-color:#d3d3d3; position:fixed; margin:auto; left: -9999px; top: 0px;" rules="all">
<thead>
	<tr>
		<td rowspan="2" colspan="2" style="width: 1px; padding-left: 0px; padding-right: 0px;">Список продуктов</td>
		<td colspan="2">Обычно употребляемые порции</td>
		<td colspan="8">Частота потребления продуктов и блюд</td>
	</tr>
	<tr>
		<td>Размер порции</td>
		<td>Число порций</td>
		<td>Не употребляется</td>
		<td>1-2 р. в мес.</td>
		<td>1 раз в неделю</td>
		<td>2-3 р. в неделю</td>
		<td>4-6 р. в неделю</td>
		<td>1-2 р. в день</td>
		<td>3-4 р. в день</td>
		<td>5 и более р. в день</td>
	</tr>

	<tr >
		<td colspan="12" class="blank_name" style="border-bottom-color:#000000">
			<?= $points[0]['Blank']['name']?>
		</td>
	</tr>
</thead>
</table>
</div>
<div align="right">
<?= $this->Form->end('Сохранить') ?>
</div>

<?php 

    //echo $this->Form->create('User', array('action' => 'logout'));
	//echo $this->Form->end('logout');
}
	
else
{
	echo "<p>На этой странице у Вас есть возможность заполнить анкету по изучению Вашего питания и бесплатно, на электронную почту получить результат - характеристику Вашего ежедневного питания.<br>Достаточно ли Вы употребляете белков, витаминов, минералов, других незаменимых веществ?<br>Вы будете знать ответ на этот вопрос и сможете скорректировать Ваше питание на основе научных данных.<br>Заполнение анкеты потребует 15-20 минут Вашего времени. У Вас будет возможность продолжить заполнение анкеты, если есть необходимость прерваться, для этого достаточно ввести те же Логин и Пароль, что Вы введете первоначально.<br>Благодарим Вас за участие в опросе!<br>
		Вопросы по заполнению анкеты Вы сможете задать по e-mail <b>anketa-pitania@yandex.ru</b></p>";
	//echo "<p>Вы сможете перейти к заполнению анкеты после того, как введёте свои фамилию, имя и отчество</p>";
	echo $this->Form->create('User', array('action' => 'userVerification'));
	echo $this->Form->input('name', array('label' => 'Логин'));
	echo $this->Form->input('pass', array('label' => 'Пароль', 'type' => 'password'));
	echo $this->Form->end('OK');
}
?>