<?php
if ( ! function_exists('getRole'))
{
     function getRole() {
          return auth()->user()->role;
     }
}

if ( ! function_exists('isAdmin'))
{
     function isAdmin()
     {
          return (getRole() === 'admin');
     }
}