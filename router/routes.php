<?php

use App\Services\Router;

Router::set_page(uri:'/signin', page:'signin');
Router::set_page(uri:'/signup', page: 'signup');
Router::set_page(uri:'/profile', page: 'profile');
Router::set_page(uri:'/signout', page: 'signout');
Router::enable();