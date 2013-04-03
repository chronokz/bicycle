<div class="header"></div>
		<div class="form">
			<div class="line"></div>

<form id="mainForm" action="" method="post">
	<div id="fieldsErrors"></div>
	<table id="info">
		<tr><td class="ltd">Регион*</td><td class="rtd">
			<select name="region">
			@foreach ($regions as $region)
				<option value="{{ $region }}">{{ $region }}</option>
			@endforeach
			</select>

		</td></tr>
		<tr><td class="ltd">Фамилия*</td><td class="rtd"><input type="text" id="lastname" name="lastname" /></td></tr>
		<tr><td class="ltd">Имя*</td><td class="rtd"><input type="text" id="name" name="name" /></td></tr>
		<tr><td class="ltd">Отчество</td><td class="rtd"><input type="text" id="middlename" name="middlename" /></td></tr>

		
		<tr>
			<td class="ltd" valign="top">Когда Вам позвонить *<br>(Рабочее время с 9 до 18)</td>
			<td class="rtd">
				<label><input class="rd" type="radio" name="cause" value="как можно быстрее" checked="checked">как можно быстрее</label>
				<label><input class="rd" type="radio" name="cause" value="до обеда">до обеда</label>
				<label><input class="rd" type="radio" name="cause" value="после обеда">после обеда</label>
				<label><input class="rd" type="radio" name="cause" value="вечером">вечером</label>
			</td>
		</tr>
		<tr><td class="ltd">Ваш телефон</td><td class="rtd"><input type="text" class="telephone" name="telephone" /></td></tr>	
		<tr>
			<td class="ltd">Код проверки*</td>
			<td class="rtd">
				<input type="text" maxlength="6" id="keystring" name="keystring" class="short" autocomplete="off" size="10" />
				<span>
					<img width="60" height="25" id="imgCaptcha" src="{{ URL::to('captcha') }}" alt="" />
				</span>			
			</td>
		</tr>
	</table>
	<div class="clear"></div>
	<div id="btnCont">
		<input type="button" class="btn btn-inverse" name="sbm" value="Вызвать"  id="next_button" />
	</div>	
</form>

<div class="footer"></div>
</div>