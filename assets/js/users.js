/**
 * Function to transfer the date from the modify user button to the modal
 * @param {*} event The event caught by the listener
 */
function transferModData(event) {
	const target = event.relatedTarget.getAttribute('data-bs-target');
	const infos = event.relatedTarget.getAttribute('data-bs-infos');
	const modal = document.getElementById(target.slice(1));
	const split = infos.split(';');

	const id = modal.querySelector('.modal-body #idMod');
	const nameInput = modal.querySelector('.modal-body #nameMod');
	const emailInput = modal.querySelector('.modal-body #emailMod');
	const roleSelect = modal.querySelector('.modal-body #roleMod');
	const activeRadioYes = modal.querySelector('.modal-body #activeModYes');
	const activeRadioNo = modal.querySelector('.modal-body #activeModNo');

	id.value = split[0];
	nameInput.value = split[1];
	emailInput.value = split[2];
	roleSelect.value = split[3];
	activeRadioYes.checked = split[4] == 1;
	activeRadioNo.checked = !(split[4] == 1);
}

/**
 * Function to transfer the date from the delete user button to the modal
 * @param {*} event The event caught by the listener
 */
function transferDelData(event) {
	const target = event.relatedTarget.getAttribute('data-bs-target');
	const infos = event.relatedTarget.getAttribute('data-bs-infos');
	const modal = document.getElementById(target.slice(1));

	const id = modal.querySelector('.modal-body #idDel');

	id.value = infos;
}

const modUserModal = document.getElementById('modUserModal')
if (modUserModal) {
	modUserModal.addEventListener('show.bs.modal', transferModData);
}
const delUserModal = document.getElementById('delUserModal')
if (delUserModal) {
	delUserModal.addEventListener('show.bs.modal', transferDelData);
}