<?php


function index()
{
    $rows = fetchAll("SELECT * FROM batches LIMIT 10");

    return view("batch", ["batches" => $rows]);
    // return json($rows);
}

function delete()
{
    $id = $_GET['id'];
    if (runQuery("DELETE FROM batches WHERE id=$id")) {
        redirect(url("/batch"));
    }
}
