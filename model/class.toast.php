<?php

class Toast {
	// Properties
	public $type;
	public $title;
	public $message;
	public $icon;
	public $show = '';

	// Contructor

	/**
	 * Constructor for toast messages
	 *
	 * @param string $type The type of message to display (can be "error", "warning", "success", "info")
	 * @param string $message The message to display inside the toast
	 */
	function __construct($type, $message) {
		global $langJson;
		$this->type = $type;
		$this->message = $message;

		switch ($type) {
			case 'error':
				$this->title = $langJson->toast_error;
				$this->icon = 'circle-xmark';
				break;
			case 'warning':
				$this->title = $langJson->toast_warning;
				$this->icon = 'circle-exclamation';
				break;
			case 'success':
				$this->title = $langJson->toast_success;
				$this->icon = 'circle-check';
				break;
			case 'info':
				$this->title = $langJson->toast_info;
				$this->icon = 'circle-info';
				break;
		}
	}

	// Methods

	/**
	 * Function to show the toast message
	 */
	function show() {
		$this->show = ' show';
	}
}

?>