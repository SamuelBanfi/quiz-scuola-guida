<?php


class Home
{
    public function index()
    {
		require "application/views/templates/header.php";
        require "application/views/index/index.php";
        require "application/views/templates/footer.php";
    }
}
