<?php
session_destroy();
header('Location:' . adminURl('login'));
