<?php
/*
 * Plugin Name: List Table Example WP
 * Description: wp_list_table example to display data in your Wordpress admin area
 * Plugin URI: http://www.thanhnv.vn
 * Author: ThanhNV
 * Author URI: http://www.thanhnv.vn
 * version: 1.0.0
 * License: GPL2
 */

// Loading table class
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

// Extending class
class Employees_List_Table extends WP_List_Table
{
    private $users_data;

    private function get_users_data($search = "")
    {
        global $wpdb;
        if (!empty($search)){
            return $wpdb->get_results(
                "SELECT ID,user_login,user_email,user_nicename,user_url,user_registered FROM {$wpdb->prefix}users
                        WHERE ID Like '%{$search}%' OR user_login Like '%{$search}%' OR user_email Like '%{$search}%' OR display_name Like '%{$search}%'",
                ARRAY_A
            );
        }else{
            return $wpdb->get_results(
                "SELECT ID,user_login,user_email,user_nicename,user_url,user_registered FROM {$wpdb->prefix}users",
                ARRAY_A
            );
        }
    }
    // Define table columns
    function get_columns()
    {
        $columns = array(
            'cb'            => '<input type="checkbox" />',
            'ID' => 'ID',
            'user_login' => 'Username',
            'user_nicename'    => 'Nice Name',
            'user_email'      => 'Email',
            'user_registered'      => 'Date created',
            'user_url'      => 'URL'
        );
        return $columns;
    }

    // Bind table with columns, data and all
    function prepare_items()
    {
        if (isset($_POST['page']) && isset($_POST['s'])){
            $this->users_data = $this->get_users_data($_POST['s']);
        }else{
            $this->users_data = $this->get_users_data();
        }
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array($columns, $hidden, $sortable);

        /* pagination */
        $per_page = $this->get_items_per_page('employees_per_page',2);
        $current_page = $this->get_pagenum();
        $total_items = count($this->users_data);
        /* Edit */
        if(isset($_GET['action']) && $_GET['page'] == "employees_list_table" && $_GET['action'] == "edit"){
            $empID = intval($_GET['employee']);
        }
        /* Delete */
        if(isset($_GET['action']) && $_GET['page'] == "employees_list_table" && $_GET['action'] == "delete"){
            $empID = intval($_GET['employee']);
        }
        /* Bulk action */
        if(isset($_GET['action']) && $_GET['page'] == "employees_list_table" && $_GET['action'] == "delete_all"){
            $empIDs = $_GET['user'];
        }
        if(isset($_GET['action']) == "employees_list_table" && $_GET['action'] == "draft_all"){
            $empIDs = $_GET['user'];
        }
        if(isset($_GET['action']) == "employees_list_table" && $_GET['action'] == "change_all"){
            $empIDs = $_GET['user'];
        }
        $this->users_data = array_slice($this->users_data, (($current_page - 1) * $per_page), $per_page);

        $this->set_pagination_args(array(
            'total_items' => $total_items, // total number of items
            'per_page' => $per_page // items to show on a page
        ));

        usort($this->users_data, array(&$this, 'usort_reorder'));

        $this->items = $this->users_data;
    }
    // bind data with column
    function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'ID':
            case 'user_login':
            case 'user_email':
                return $item[$column_name];
            case 'user_nicename':
                return ucwords($item[$column_name]);
            case 'user_registered':
                return ucwords($item[$column_name]);
            case 'user_url':
                return ucwords($item[$column_name]);
            default:
                return print_r($item, true); //Show the whole array for troubleshooting purposes
        }
    }
    // To show checkbox with each row
    function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="user[]" value="%s" />',
            $item['ID']
        );
    }
    // Add sorting to columns
    protected function get_sortable_columns()
    {
        $sortable_columns = array(
            'user_login' => array('user_login', false),
            'user_nicename' => array('user_nicename', false),
            'user_email' => array('user_email', true),
            'user_registered' => array('user_registered', true),
            'user_url' => array('user_url', true)
        );
        return $sortable_columns;
    }

    // Sorting function
    function usort_reorder($a, $b)
    {
        // If no sort, default to user_login
        $orderby = (!empty($_GET['orderby'])) ? $_GET['orderby'] : 'user_login';
        // If no order, default to asc
        $order = (!empty($_GET['order'])) ? $_GET['order'] : 'asc';
        // Determine sort order
        $result = strcmp($a[$orderby], $b[$orderby]);
        // Send final sort direction to usort
        return ($order === 'asc') ? $result : -$result;
    }
    // Adding action buttons to column
    function column_user_login($item){
        $actions = array(
          'edit' => sprintf('<a href="admin.php?page=employees_add_new_page">Edit</a>', $_REQUEST['page'], 'edit', $item['ID']),
          'delete' => sprintf('<a href="?page=%s&action=%s&employee=%s">Delete</a>', $_REQUEST['page'], 'delete', $item['ID']),
        );
        return sprintf('%1$s %2$s', $item['user_login'], $this->row_actions($actions));
    }
    // To show bulk action dropdown
    function get_bulk_actions(){
        $actions = array(
            'delete_all' => 'Delete',
            'draft_all' => "Move to Draft",
            'change_all' => "Change to published"
        );
        return $actions;
    }

}

// Adding menu
function my_add_menu_items()
{
    $hook = add_menu_page('List All User', 'List All User', 'activate_plugins', 'employees_list_table', 'employees_list_init','dashicons-wordpress');
    // screen option
    add_action("load-$hook", 'my_tbl_add_option');
    function my_tbl_add_option(){
        $option = 'per_page';

        $argc = array(
            'lable' => 'Employees',
            'default' => 2,
            'option' => 'employees_per_page',
        );
        add_screen_option($option, $argc);

        $empTable = new Employees_List_Table();
    }
    add_submenu_page('employees_list_table','New Page','Add New User','activate_plugins','employees_add', 'employee_add_new_user');
    add_submenu_page('employees_list_table','New Page',' Edit User ','activate_plugins','employees_add_new_page', 'employee_edit_user');
}
add_action('admin_menu', 'my_add_menu_items');

// get saved screen meta value
add_filter('set-screen-option', 'my_table_set_option', 10, 5);

function my_table_set_option($status, $option, $value){
    return $value;
}
function employees_list_init()
{
    // Creating an instance
    $empTable = new Employees_List_Table();
    echo '<style>#the-list .row-actions{left:0;}</style><div class="wrap"><h2>Employees List Table</h2>';
//    echo '<input type="submit" id="add-new" class="button actions" value="Add New" />';
//     Prepare table
    $empTable->prepare_items();
    ?>
    <div class='update-nag notice notice-warning inline'>
        <a href="https://wordpress.org/support/wordpress-version/version-6-0/">WordPress 6.0</a>
        is available!
        <a href="https://staging-jessup.ilsa.org/wp-admin/update-core.php" aria-label="Please update WordPress now">Please update now</a>
    .</div>
    <div class="error wppb-serial-notification" >
        <p>Your
            <strong>Profile Builder</strong>
            license has expired. <br/>Please
            <a href='https://www.cozmoslabs.com/account/?utm_source=PB&utm_medium=dashboard&utm_campaign=PB-Renewal' target='_blank'>Renew Your Licence</a>
            to continue receiving access to product downloads, automatic updates and support.
            <a href='https://www.cozmoslabs.com/account/?utm_source=PB&utm_medium=dashboard&utm_campaign=PB-Renewal' target='_blank' class='button-primary'>Renew now </a>
            <a href='/wp-admin/users.php?wppb_expired_dismiss_notification=0' class='wppb-dismiss-notification'>Dismiss</a>
        </p>
    </div>
    <form method="get">
        <input type="hidden" name="page" value="employees_list_table" />
        <?php $empTable->search_box('search', 'search_id');
        // Display table
        $empTable->display();
        ?>
    </form>

<?php
    echo '</div>';
}
function employee_add_new_user(){
    include 'add-users.php';
}
function employee_edit_user(){
    include 'edit_users.php';
}

