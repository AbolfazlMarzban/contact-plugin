<?php if( get_plugin_options('contact_plugin_active')): ?>

<div id="form_success" style="background: green; color: white;"></div>
<div id="form_errorr" style="background: red; color: white;"></div>
<form id="contact-form" style="display: flex; flex-direction: column; padding: 30px">



<?php wp_nonce_field('wp_rest'); ?>
<label for="name">name</label>
<input type="text" name="name">


<label for="email">email</label>
<input type="email" name="email">


<label for="address">address</label>
<input type="text" name="address">

<label for="phone">phone</label>
<input type="tel" name="phone">

<label for="message">message</label>
<textarea name="message" id="" cols="30" rows="10"></textarea>


<button type="submit">Submit</button>
</form>

<?php endif; ?>