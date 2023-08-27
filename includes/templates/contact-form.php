<form id="contact-form" style="display: flex; flex-direction: column; padding: 30px">


<?php wp_nonce_field('wp_rest'); ?>
<label for="name">name</label>
<input type="text" name="name">
<label for="email">email</label>

<input type="email" email="email">
<label for="phone">phone</label>

<input type="tel" name="phone">
<label for="message">message</label>
<textarea name="message" id="" cols="30" rows="10"></textarea>
<button type="submit">Submit</button>
</form>