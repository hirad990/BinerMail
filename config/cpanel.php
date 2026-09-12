<?php
return ['host'=>getenv('CPANEL_HOST') ?: '127.0.0.1','port'=>(int)(getenv('CPANEL_PORT') ?: 2083),'user'=>getenv('CPANEL_USER') ?: '','token'=>getenv('CPANEL_API_TOKEN') ?: '','verify_ssl'=>filter_var(getenv('CPANEL_VERIFY_SSL') ?: 'false',FILTER_VALIDATE_BOOLEAN)];
