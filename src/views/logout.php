<?php
session_destroy();
session_unset();
header("Location: /galeria");
exit();