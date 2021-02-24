<?php

// add
setcookie("user", "username", time() + 86400);

// delete
setcookie("user", "username", time() - 86400);
print_r($_COOKIE);
