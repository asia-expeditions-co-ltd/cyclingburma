
<form action="{{route('unsubscribe')}}" method="post" >
	 {{csrf_field()}}  
	 <input type="text" name="id" value="{{encrypt($edit->id)}}">
	<input type="text" name="email" value="{{ $edit->subscribeEmail }}">
	<input type="submit" name="" value="ok">
	<a href="">cancel</a>
	<?php 
	$n = 1; 
	$crype = encrypt($n);
	?>
	{{$crype}}
	{{decrypt($crype) }}

</form> 