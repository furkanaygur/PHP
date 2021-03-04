<?php
session_destroy();
header('Location:' . (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : siteURL()));
exit;
