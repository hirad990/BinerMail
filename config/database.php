<?php
return ['host'=>getenv('DB_HOST') ?: '127.0.0.1','port'=>(int)(getenv('DB_PORT') ?: 3306),'name'=>getenv('DB_NAME') ?: '','user'=>getenv('DB_USER') ?: '','password'=>getenv('DB_PASSWORD') ?: ''];
