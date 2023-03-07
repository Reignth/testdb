<?php
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'dbuser');
    $conn->set_charset('utf8mb4');
    $id_post = $_POST['id_post'];
    $result = mysqli_query($conn, "SELECT * FROM comments WHERE id_post = '$id_post'");
    $comments_tmp = array();

    while ($row = mysqli_fetch_object($result))
    {
        array_push($comments_tmp, $row);
    }
    foreach ($comments_tmp as $comment_key => $comment)
    {
        $replies = array();
        if ($comment->reply_of == 0)
        {
            foreach ($comments_tmp as $reply_key => $reply)
            {
                if ($reply->reply_of == $comment->id)
                {
                    array_push($replies, $reply);
                    unset($comments_tmp[$reply_key]);
                }
            }
        }
        $comment->replies = $replies;
    }
    echo json_encode($comments_tmp);
 ?>