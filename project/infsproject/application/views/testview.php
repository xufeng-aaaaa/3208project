<html>

<button class="g-recaptcha"
		data-sitekey="reCAPTCHA_site_key"
		data-callback='onSubmit'
		data-action='submit'>Submit</button>

<script src="https://www.google.com/recaptcha/api.js"></script>

<script>
	function onSubmit(token) {
		document.getElementById("demo-form").submit();
	}
</script>

</html>
