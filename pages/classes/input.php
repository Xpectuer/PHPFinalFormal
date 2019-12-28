<?php
class input
{   //拦截敏感词

    function __construct()
    {

    }

    function post($key)
    {

        $val = $_POST[$key];


        return $val;
    }

    function get($key)
    {
        $val = $_GET[$key];
        return $val;
    }

    function postComment($key)
    {

        $val = $_POST[$key];
        if(strlen($val)<140) {
            //控制评论长度
            return $val;
        }
        return false;
    }
    function postJSON(){

    }

}