<?php
function clean($data) {
		$data = trim($data);
		$data = stripslashes($data);

		return $data;
	}