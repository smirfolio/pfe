<div class="btn btn-<?php echo isset($type)?$type:'success';  ?>" style="width: 500px ; height: 30px"> 
	<a id="aToolTipCloseBtnc" class="close"  onclick="$(this).parent().slideUp()">x</a>
	<p ><?php echo $message; ?></p> 
	
	</div>