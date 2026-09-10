<div class="container form-km">
	<form id="quotation1" action="<?php echo Request::root();?>/submit" method="post">
		<div class="row">
			<div class="col">
				<input type="text" name="name" placeholder="name" value="" class="t-f-1" />
				<div class="invalid-feedback name">
					Please choose a username.
				</div>
				<div class="valid-feedback name">
					Looks good!
				</div>
			</div>
			<div class="col">
				<input type="text" name="email" placeholder="e-mail" class="t-f-1" />
				<div class="invalid-feedback email">
					Please choose a username.
				</div>
				<div class="valid-feedback email">
					Looks good!
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<input type="text" name="date" placeholder="wedding date" class="t-f-1 datepicker1" />
				<div class="invalid-feedback date">
					Please choose a username.
				</div>
				<div class="valid-feedback date">
					Looks good!
				</div>
			</div>
			<div class="col">
				<input type="text" name="location" placeholder="wedding location" class="t-f-1" />
				<div class="invalid-feedback location">
					Please choose a username.
				</div>
				<div class="valid-feedback location">
					Looks good!
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<input type="text" name="tell_us_more" placeholder="tell us more" class="t-f-1" />
				<div class="invalid-feedback tell_us_more">
					Please choose a username.
				</div>
				<div class="valid-feedback tell_us_more">
					Looks good!
				</div>
			</div>
			<div class="col">
				<input type="text" name="contact_no" placeholder="Contact number" class="t-f-1" />
				<div class="invalid-feedback contact_no">
					Please choose a username.
				</div>
				<div class="valid-feedback contact_no">
					Looks good!
				</div>
			</div>
		</div>
		<div class="row" style="justify-content: center!important;">
			<div class="col" style="    flex-grow: unset;">
				<div class="valid-feedback submit_done">
					Thank you!. We will get back to you soon :)
				</div>
				<input type="submit" value="send" class="submit-btn" />
			</div>
		</div>
		<input type="hidden" name="_token" value="<?php  echo csrf_token();?>">
	</form>
</div>
<style>
</style>