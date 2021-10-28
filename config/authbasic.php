<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Credentials Provider
    |--------------------------------------------------------------------------
    |
    | This value is the list of credentials allowed to access your routes.
    | You can also set this in your ".env" file. Example:
    |
    | AUTHBASIC_USERS=user1:pass1,user2:pass2
    |
    | Values set in ".env" file will be merged to the value in this file.
    |
    */

    'credentials' => array_merge(
        [
            // [ 'username', 'password' ],
        ],
        array_map(fn ($cred) => explode(':', $cred), array_filter(explode(',', env('AUTHBASIC_USERS', '')))),
    )

];
