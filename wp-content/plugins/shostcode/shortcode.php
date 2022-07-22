<?php
/*
 * Plugin Name: Short Code
 * Plugin Author: ThanhNV
*/

add_shortcode('all_user', 'show_all_user');

function show_all_user(){
    global $wpdb;
    $table_name = $wpdb->prefix .'users';
    $results = $wpdb->get_results("SELECT * FROM $table_name");
    $content = "";
    $content.= "<table>
                    <thead>
                        <tr>
                            <td> ID </td>
                            <td> User Name </td>
                            <td> User Email </td>
                            <td> User Password </td>
                            <td> User Url </td>
                            <td> Date Created </td>
                        </tr>
                    </thead>
                    </tbody>";
    foreach ($results as $result){
        $content .= "<tr>
                        <td>".$result->ID."</td>
                        <td>".$result->user_login."</td>
                        <td>".$result->user_email."</td>
                        <td>".$result->user_pass."</td>
                        <td>".$result->user_url."</td>
                        <td>".$result->user_registered."</td>
                    </tr>";
    }
    $content .= "<tbody></table>";

    return $content;
}