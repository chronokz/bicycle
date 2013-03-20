<?php
	$tips = Tips::order_by('rand()')->first();
?>
<div class="tips">
	<div class="top"></div>
	<div class="middle">
		<h4>Знаете ли вы, что ...</h4>
		{{ nl2br($tips->text) }}
	</div>
	<div class="bottom"></div>
</div>