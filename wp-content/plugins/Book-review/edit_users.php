<?php
//if (!class_exists('WP_List_Table')) {
//    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
//}
//global $wpdb;
//$table_name = $wpdb->prefix . 'users';
//if (isset($_POST['update'])) {
//        $user_id = $_GET['ID'];
//    $username = $_POST['user_login'] ?? '';
//    $nice_name = $_POST['user_nicename'] ?? '';
//    $user_email = $_POST['user_email'] ?? '';
//    $user_registered = $_POST['user_registered'] ?? '';
//    $user_url = $_POST['user_url'] ?? '';
//    $user_password = $_POST['user_pass'] ?? '';
//    $sql = $wpdb->update(
//        $table_name,
//        array(
//            'ID' => $user_id,
//            'user_login' => $username,
//            'user_nicename' => $nice_name,
//            'user_email' => $user_email,
//            'user_registered' => $user_registered,
//            'user_url' => $user_url,
//            'user_pass' => $user_password
//        )
//    );
//    if ($sql == true) {
//        echo '<script>alert("Add User Successful")</script>';
//    } else {
//        echo '<script>alert("No Successful")</script>';
//    }
//}
//add_action('admin_menu','add_user_data');

//function update_user(){
//    global $wpdb;
//    $user_id = $_GET['ID'];
//    $table_name = $wpdb->prefix . 'users';
//    $wpdb->update(
//            $table_name,
//        array('ID' => $user_id);
//    );
//    $user_id = $_GET['ID'] ?? '';
//    $print = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE ID='$user_id'"));
//    $result = $wpdb->query($print);
//    while ($row = mysqli_fetch_assoc($result)) {
//        $user_id = $row['ID'] ?? '';
//        $username = $row['user_login'] ?? '';
//        $nice_name = $row['user_nicename'] ?? '';
//        $user_email = $row['user_email'] ?? '';
//        $user_registered = $row['user_registered'] ?? '';
//        $user_url = $row['user_url'] ?? '';
//        $user_password = $row['user_pass'] ?? '';
//    }
//    if (isset($_POST['update'])){
//        if (empty($_POST['user_login']) || empty($_POST['user_email'])){
//            echo 'Please ';
//        }else{
//            $username = $_POST['user_login'] ?? '';
//            $nice_name = $_POST['user_nicename'] ?? '';
//            $user_email = $_POST['user_email'] ?? '';
//            $user_registered = $_POST['user_registered'] ?? '';
//            $user_url = $_POST['user_url'] ?? '';
//            $user_password= $_POST['user_pass'] ?? '';
//            $query = "UPDATE $table_name SET user_login='".$username."', user_nicename='".$nice_name."', user_email='".$user_email."',user_registered='".$user_registered."',user_url='".$user_url."', user_pass='".$user_password."' WHERE ID='".$user_id."'";
//            $result = $wpdb->query($query);
//        }
//    }
//    if (isset($_POST['update'])){
//        $wpdb->update(
//                $table_name,
//                array('ID'=> $user_id),
//                array('user_login' => $username),
//                array('user_nicename' => $nice_name),
//                array('user_email' => $user_email),
//                array('user_registered' => $user_registered),
//                array('user_url' => $user_url),
//                array('user_pass' => $user_password)
//        );
//    }
//}
//        if (isset($_POST['update'])){
//            $user_id = $_POST['ID'];
//            $username = $_POST['user_login'];
//            $nice_name = $_POST['user_nicename'];
//            $user_email = $_POST['user_email'];
//            $user_registered = $_POST['user_registered'];
//            $user_url = $_POST['user_url'];
//            $user_password = $_POST['user_pass'];
//            $sql = $wpdb->query("UPDATE $table_name SET (user_login='$username',user_nicename='$nice_name',user_email='$user_email',user_registered='$user_registered',user_url='$user_url',user_pass='$user_password') WHERE ID = '$user_id'");
//        }

?>
<div class="wrap" id="profile-page">
    <h1 class="wp-heading-inline">Chỉnh sửa Người dùng Cristiano</h1>
    <hr class="wp-header-end">
    <form id="your-profile" action="edit_users.php?ID=<?php ?>"  method="POST" novalidate="novalidate">
        <h2>Tuỳ chọn cá Nhân</h2>
            <input name="action" type="hidden" value="createuser"/>
            <input type="hidden" id="_wpnonce_create-user" name="_wpnonce_create-user" value="4a7caf2807" />
            <input type="hidden" name="_wp_http_referer"/>
            <table class="form-table" role="presentation">
                <tr class="form-field form-required">
                    <th scope="row">
                        <label for="user_login">User Name <span class="description">(required)</span></label>
                    </th>
                    <td><input name="user_login" type="text" id="name" value="<?php ?>" aria-required="true" autocapitalize="none" autocorrect="off" autocomplete="off" maxlength="60"  /></td>
                </tr>
                <tr class="form-field form-required">
                    <th scope="row">
                        <label for="user_nicename">Nice Name <span class="description">(required)</span></label>
                    </th>
                    <td><input name="user_nicename" type="text" id="nicenaem" value="<?php ?>" aria-required="true" autocapitalize="none" autocorrect="off" autocomplete="off" maxlength="60"  /></td>
                </tr>
                <tr class="form-field form-required">
                    <th scope="row">
                        <label for="user_email">User Email <span class="description">(required)</span></label>
                    </th>
                    <td><input name="user_email" type="text" id="email" value="<?php  ?>" aria-required="true" autocapitalize="none" autocorrect="off" autocomplete="off" maxlength="60"  /></td>
                </tr>
                <tr class="form-field form-required">
                    <th scope="row">
                        <label for="user_registered">Date Created <span class="description">(required)</span></label>
                    </th>
                    <td><input name="user_registered" type="date" id="date" value="<?php  ?>" aria-required="true" autocapitalize="none" autocorrect="off" autocomplete="off" maxlength="60"  /></td>
                </tr>
                <tr class="form-field form-required">
                    <th scope="row">
                        <label for="user_url">URL <span class="description">(required)</span></label>
                    </th>
                    <td><input name="user_url" type="text" id="url" value="<?php  ?>" aria-required="true" autocapitalize="none" autocorrect="off" autocomplete="off" maxlength="60"  /></td>
                </tr>
                <tr class="form-field form-required user-pass1-wrap">
                    <th scope="row">
                        <label for="pass1">User Password<span class="description">(required)</span></label>
                    </th>
                    <td>
                        <input class="hidden" value=""/>
                            <div class="wp-pwd">
                                <span class="password-input-wrapper">
                                    <input type="password" name="user_pass" id="pass1" value="<?php  ?>" class="regular-text" autocomplete="new-password" data-reveal="1" data-pw="ZqjWfyq9eKQf*ri9NIfcxoe5" aria-describedby="pass-strength-result" />
                                </span>
                                <button type="button" class="button wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="Hide password">
                                    <span class="dashicons dashicons-hidden" aria-hidden="true"></span>
                                    <span class="text">Hide</span>
                                </button>
                            <div style="display:none" id="pass-strength-result" aria-live="polite"></div>
                        </div>
                    </td>
                </tr>
            </table>
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="user_id" id="user_id" value="4" />
        <p class="submit"><input type="submit" name="update" id="submit" class="button button-primary" value="Cập nhật thành viên"  /></p>
    </form>
</div>




