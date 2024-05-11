<?php

class Lang {
	// Settings
	private static $localesPath = "model/locales/";

	// Properties

	// Contructor

	// Methods

	/**
	 * Function to set the language file to read depanding on the language requested
	 * @return string The name of the locales file to be read
	 */
	public static function getLangFile()
	{
		$langCode = filter_input(INPUT_GET, 'l', FILTER_SANITIZE_URL);
		switch ($langCode) {
			case 'en':
				return 'en.json';
			case 'fr':
				return 'fr.json';
			case 'hu':
			default:
				return 'hu.json';
		}
	}

	/**
	 * Function to read and decode the locales file given
	 * @param string $langPath The path of the locales file to read
	 * @return object the decoded JSON object read from the locales file
	 */
	public static function readLangJson($langPath)
	{
		$langFile = fopen(Lang::$localesPath . $langPath, 'r') or die(null);
		$langJson = json_decode(fread($langFile, filesize(Lang::$localesPath . $langPath)));
		fclose($langFile);

		return $langJson;
	}
}
