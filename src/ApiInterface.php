<?php

	declare(strict_types=1);

	namespace BazzaBot;

	use stdClass;

	interface ApiInterface {
		function Request ( string $method, array $args = [] ) : stdClass;
	}