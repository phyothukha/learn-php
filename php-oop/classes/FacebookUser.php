<?php

class FacebookUser
{
    public $facebookUser;
    private $facebookPassword;
    public $facebookPosts;

    function __construct($user, $password, $post)
    {
        $this->facebookUser = $user;
        $this->facebookPassword = $password;
        $this->facebookPosts = $post;
    }
}
