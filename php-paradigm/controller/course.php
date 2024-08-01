<?php

function index()
{
    $row = fetchAll("SELECT * FROM courses LIMIT 10");
    return view("course", ["courses" => $row]);
}

function delete()
{
    $id = $_GET['id'];
    if (runQuery("DELETE FROM courses WHERE id=$id")) {
        redirect(url("/course"));
    }
}
