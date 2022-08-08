<?php
function login()
{
    if (isset(session()->get('login'))) {
        $user = session()->get('login');
        return "<a href='<?= $user[name] != '' ? $user[url] : '#' ?>' class='nav-link smoothScroll'
class='btn custom-btn bg-color mt-3'
<?= $user[name] != '' ? '' : 'data-toggle='modal' data-target='#login'' ?>>
<?= $user[name] != '' ? $user[name] : 'Đăng nhập' ?>
</a>";
}
}