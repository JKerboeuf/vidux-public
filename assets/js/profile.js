/**
 * Function to switch between the mail form
 * and the passwword form
 */
function switchForm(form) {
	var btnMail = document.getElementById('btn-new-mail');
	var btnPwd = document.getElementById('btn-new-pwd');
	var frmElem;

	if (form == "mail") {
		frmElem = document.getElementById('frm-new-mail');
	} else if (form == "pwd") {
		frmElem = document.getElementById('frm-new-pwd');
	}

	if (frmElem.classList.contains("d-none")) {
		frmElem.classList.remove("d-none");
		btnMail.classList.add("d-none");
		btnPwd.classList.add("d-none");
	} else {
		frmElem.classList.add("d-none");
		btnMail.classList.remove("d-none");
		btnPwd.classList.remove("d-none");
	}
}