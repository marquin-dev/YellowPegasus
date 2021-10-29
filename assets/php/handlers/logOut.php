<?php
date_default_timezone_set("America/Sao_Paulo");
setcookie(session_name(), NULL, time()-31557600, '/');
header('Location: /');