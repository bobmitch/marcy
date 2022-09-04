<?php
defined('CMSPATH') or die; // prevent unauthorized access



class Widget_contactform extends Widget {
	public function render() {

		echo "<div class='container readable customform'>";
		
		/* echo "<p>" . $smtp_name . "</p>";
		echo "<p>" . $smtp_password . "</p>";
		echo "<p>" . $smtp_username . "</p>";
		echo "<p>" . $smtp_from . "</p>";
		echo "<p>" . $smtp_replyto . "</p>";
		echo "<p>" . $smtp_server . "</p>";
		echo "<p>" . $encryption . "</p>";
		echo "<p>" . $authenticate . "</p>"; */
		/* CMS::pprint_r ($this);
		exit(0); */
		//echo $this->options[0]->value;
		$myform = new Form(CMSPATH . "/widgets/contactform/" . $this->options[0]->value);
		if ($myform->is_submitted()):?>
			<?php 


			$myform->set_from_submit();
			$name = $myform->get_field_by_name('name')->default;
			$message = $myform->get_field_by_name('message')->default;
			$email = $myform->get_field_by_name('email')->default;
			
			if (!$myform->validate()) {
				CMS::Instance()->queue_message('Invalid form','danger', $_SERVER['HTTP_REFERER']);
			}
			// check for ruski email
			if (strpos($email,"mail.ru")!==false) {
				CMS::Instance()->queue_message('Spam detected','danger', $_SERVER['HTTP_REFERER']);
				exit(0);
			}
			// check we have at least one single space in message
			if (!strpos($message, ' ') !== false) {
				CMS::Instance()->queue_message('Invalid form','danger', $_SERVER['HTTP_REFERER']);	
				exit(0);			
			}
			$mail = new Mail();
			$mail->addAddress("marcymitchellart@gmail.com","Marcy Mitchell");
			$mail->subject = "Contact From Marcy Mitchell Art Website";
			$mail->html = "<h1>From {$name}</h1>";
			$mail->html .= "<h2>Email: {$email}</h2>";
			$mail->html .= "<p>{$message}</p>";
			$mail->send();

			$file = "form_entries.txt";
			$log_txt = "\r\n" . date('Y-m-d H:i:s') . "\r\n" ;
			$form_contents = print_r ($myform,true);
			$log_txt .= $form_contents;
			file_put_contents($file, $log_txt, FILE_APPEND | LOCK_EX);

			// set redirect page from options
			$page = new Page();
			if ($page->load_from_id($this->options[1]->value[0])) {
				$url = $page->get_url();
				CMS::Instance()->queue_message('Form submitted','success',$url);
			}
			else {
				CMS::show_error('Failed to load redirect page in form widget');
			}
			?>
		<?php else: ?>
			<style>
				.forbears {
					display:none;
				}
			</style>
			<form method="POST" id="<?php echo Input::make_alias($this->title);?>_form_widget">

				<input class='forbears' name='myrealbearname' type='text' value=''/>

				
				<?php
				$myform->display_front_end();
				?>
				
			</form>

		<?php endif; 
		echo "</div>";
	}
}