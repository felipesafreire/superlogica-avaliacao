<?php

function validateZipcode($zipcode)
{
	if (empty($zipcode)) {
		return false;
	}

	$zipcode = str_ireplace(".", "", $zipcode);
	$zipcode = str_ireplace("-", "", $zipcode);
	$zipcode = str_ireplace(" ", "", $zipcode);

	if (!is_numeric($zipcode)) {
		return false;
	}

	if (strlen($zipcode) != 8) {
		return false;
	}

	return true;
}

function clearZipcode($zipcode)
{
	$zipcode = str_ireplace(".", "", $zipcode);
	$zipcode = str_ireplace("-", "", $zipcode);
	$zipcode = str_ireplace(" ", "", $zipcode);
	return $zipcode;
}

function validatePassword($password)
{
	if (empty($password)) {
		return false;
	}

	return preg_match('/[a-z]/', mb_strtolower($password))
		&& preg_match('/[0-9]/', $password)
		&& preg_match('/^[\w$@]{8,}$/', $password);
}

function mask($val, $mask)
{
	$maskared = '';
	$k = 0;
	for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
		if ($mask[$i] == '#') {
			if (isset($val[$k])) {
				$maskared .= $val[$k++];
			}
		} else {
			if (isset($mask[$i])) {
				$maskared .= $mask[$i];
			}
		}
	}

	return $maskared;
}

function zipcodeMask($data)
{
	return mask($data, '#####-###');
}
