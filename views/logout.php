<?php
session_destroy();
header('location: '.$this->app_url('home'));
?>