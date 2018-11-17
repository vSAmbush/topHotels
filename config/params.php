<?php
    $src = explode('?', $_SERVER['REQUEST_URI'])[0];
    $src = (str_replace('/index.php', '', $src) === '/') ? '' : str_replace('/index.php', '', $src);

return [
    'adminEmail' => 'test.th.welcome@gmail.com',
    'img_src' => $src,
];
