

	<div id="login">
	<form class="form-signin" method="post" action="<?php echo base_url(); ?>login/validate_credentials">
		<div class="widget widget-4">
			<div class="widget-head">
				<h4 class="heading">SMS System</h4>
			</div>
		</div>
		<h2 class="glyphicons unlock form-signin-heading"><i></i> Please sign in</h2>
		<div class="uniformjs">
			<input type="text" class="input-block-level" name="username" placeholder="User Name"> 
			<input type="password" class="input-block-level" name="password" placeholder="Password"> 
			
		</div>
		<button class="btn btn-large btn-primary" type="submit">Sign in</button>
	</form>
</div>	