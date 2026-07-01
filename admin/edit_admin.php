<?php
require_once './config/config.php';
require_once 'includes/auth_validate.php';

// User ID for which we are performing operation
$admin_user_id = filter_input(INPUT_GET, 'admin_user_id', FILTER_VALIDATE_INT);
$operation = trim(filter_input(INPUT_GET, 'operation', FILTER_UNSAFE_RAW) ?? '');
$edit = ($operation === 'edit');

// Serve POST request.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // If non-super user accesses this script via URL, stop execution
    if ($_SESSION['admin_type'] !== 'super') {
        echo 'Permission Denied';
        exit();
    }

    // Get POST data
    $data_to_update = filter_input_array(INPUT_POST);

    // Check whether the username already exists
    $db = getDbInstance();
    $db->where('user_name', $data_to_update['user_name']);
    $db->where('id', $admin_user_id, '!=');

    $row = $db->getOne('admin_accounts');

    if (!empty($row['user_name'])) {

        $_SESSION['failure'] = "User name already exists";

        $query_string = http_build_query([
            'admin_user_id' => $admin_user_id,
            'operation'     => $operation,
        ]);

        header('Location: edit_admin.php?' . $query_string);
        exit();
    }

    // Encrypt the password
    if (!empty($data_to_update['password'])) {
        $data_to_update['password'] = password_hash(
            $data_to_update['password'],
            PASSWORD_DEFAULT
        );
    } else {
        // Don't update password if left blank
        unset($data_to_update['password']);
    }

    // Update record
    $db = getDbInstance();
    $db->where('id', $admin_user_id);

    $stat = $db->update('admin_accounts', $data_to_update);

    if ($stat) {
        $_SESSION['success'] = "Admin user has been updated successfully";
    } else {
        $_SESSION['failure'] = "Failed to update Admin user: " . $db->getLastError();
    }

    header('Location: admin_users.php');
    exit();
}

// Get existing admin details
$db = getDbInstance();
$db->where('id', $admin_user_id);

$admin_account = $db->getOne('admin_accounts');

// Import header
require_once 'includes/header.php';
?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Update User</h2>
        </div>
    </div>

    <?php include_once 'includes/flash_messages.php'; ?>

    <form class="well form-horizontal"
          action=""
          method="post"
          id="contact_form"
          enctype="multipart/form-data">

        <?php include_once './forms/admin_users_form.php'; ?>

    </form>

</div>

<?php include_once 'includes/footer.php'; ?>