<?php

return [
  /*
  |--------------------------------------------------------------------------
  | Koneksi Database
  |--------------------------------------------------------------------------
  |
  | Akses Database menggunakan mysql dan PHP PDO.
  |
  */
  'mysql' => [
    'host' => env('hostname'),
    'db' => env('database'),
    'username' => env('username'),
    'password' => env('password')
  ],

  /*
  |--------------------------------------------------------------------------
  | Setting Cookie
  |--------------------------------------------------------------------------
  |
  | Set cookie_name untuk merubah nama cookie. Atur lama ekspirasi cokkie
  | pada key cookie_expiry.
  |
  */
  'remember' => [
    'cookie_name' => 'hash',
    'cookie_expiry'=> 3600
  ],

  /*
  |--------------------------------------------------------------------------
  | Setting Session
  |--------------------------------------------------------------------------
  |
  | Key session_name mengindikasikan nama session login user. token_name
  | key digunakan untuk prevent CSRF.
  |
  */
  'session' => [
    'name' => '_user',
    'token_name' => '_token'
  ]
];
