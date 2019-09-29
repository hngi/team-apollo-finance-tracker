$(".form__field .icon.is-show-password").click(() => {
	const password = document.querySelector('.form__field input[name="password"]');
	const icon = document.querySelector('.form__field .icon.is-show-password');

	if (password.getAttribute('type') == 'password') {
		password.setAttribute('type', 'text');
		icon.classList.remove('fa-eye-slash');
		icon.classList.add('fa-eye');

		setTimeout(() => {
			password.setAttribute('type', 'password');
			icon.classList.remove('fa-eye');
			icon.classList.add('fa-eye-slash');
		}, 1500);
	}
});

const toggleSignupForm = () => {
	let form = $('.form');
	form.addClass("transparent");

	setTimeout(() => {
		form.toggleClass("is-login").toggleClass('is-signup');

		if (form.hasClass('is-signup')) {
			$('input[type="submit"]').attr("value", "SIGN UP");
			$('input[type="submit"]').attr("name", "signup");
			form.attr("action", "signup.php");

			$(".form__link.is-signup-toggle").html(`
				Already have an account? <br>
				<a href="#" onclick="toggleSignupForm()">
					Log in.
				</a>
			`)
		} else {
			$('input[type="submit"]').attr("value", "LOG IN");
			$('input[type="submit"]').attr("name", "login");
			form.attr("action", "login.php");

			$(".form__link.is-signup-toggle").html(`
				New here?
				<a href="#" onclick="toggleSignupForm()">
					Sign up.
				</a>
			`)
		}

		form.removeClass("transparent");
	}, 900)
}

$(".form__link.is-signup-toggle > a").click(toggleSignupForm);

