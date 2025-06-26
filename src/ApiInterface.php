<?php

	namespace BazzaBot;

	interface ApiInterface {
		function Request ( string $method, array $args );
	}