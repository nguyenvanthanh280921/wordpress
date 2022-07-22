<?php

function delete($user_id){
    global $wpdb;

    $wpdb->delete(
        'users',
        array(
            'ID' => $user_id
        )
    );
}