<?php
return [

    /*
     * Redirect URL after login
     */
    'redirect_url' => '/login',
    /*
     *  API Key (http://steamcommunity.com/dev/apikey)
     */
    'api_key' => getenv('STEAM_KEY'),
    /*
     * Is using https?
     */
    'https' => false
];