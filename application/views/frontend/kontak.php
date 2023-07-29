	<div class="container-contact100">
		<div class="contact100-map"></div>

		<div class="wrap-contact100">
			<form method="post" action="<?=base_url();?>Email/send" class="contact100-form validate-form">
				<span class="contact100-form-title text-white">
					<?=$this->lang->line('kontak_header');?>
				</span>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Nama</span>
					<input class="input100" type="text" name="name" placeholder="Name...">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Email</span>
					<input class="input100" type="text" name="email" placeholder="Email addess...">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100">
					<span class="label-input100">Telp</span>
					<input class="input100" type="text" name="phone" placeholder="Phone Number...">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Pesan</span>
					<textarea class="input100" name="message" placeholder="Questions/Comments..."></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button type="submit" class="btn btn-custom">
							Send
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>