/**
 * Function to switch between the login form
 * and the forgot passwword form
 */
function switchForm() {
	var frmLoginElem = document.getElementById("login-form");
	var frmForgotElem = document.getElementById("forgot-form")

	if (frmForgotElem.classList.contains("d-none")) {
		frmLoginElem.classList.add("d-none");
		frmForgotElem.classList.remove("d-none");
	} else {
		frmLoginElem.classList.remove("d-none");
		frmForgotElem.classList.add("d-none");
	}
}