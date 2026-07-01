<?php
require_once './config/config.php';
require_once 'includes/auth_validate.php';

// Get parameters
$customer_id = filter_input(INPUT_GET, 'customer_id', FILTER_VALIDATE_INT);

$operation = filter_input(INPUT_GET, 'operation', FILTER_UNSAFE_RAW);
$operation = trim($operation ?? '');

$edit = ($operation === 'edit');

$db = getDbInstance();

// Handle Update Request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get Job ID
    $customer_id = filter_input(INPUT_GET, 'customer_id', FILTER_VALIDATE_INT);

    // Get Form Data
    $data_to_update = filter_input_array(INPUT_POST);

    // Update Timestamp
    $data_to_update['updated_at'] = date('Y-m-d H:i:s');

    // Update Record
    $db->where('id', $customer_id);
    $status = $db->update('jobs', $data_to_update);

    if ($status) {
        $_SESSION['success'] = "Job updated successfully!";

        // Redirect
        header('Location: customers.php');
        exit();
    } else {
        $_SESSION['failure'] = "Failed to update job.";
    }
}

// Load Existing Job
if ($edit && $customer_id) {

    $db->where('id', $customer_id);
    $customer = $db->getOne('jobs');

    if (!$customer) {
        $_SESSION['failure'] = "Job not found.";
        header('Location: customers.php');
        exit();
    }
}
?>

<?php include_once 'includes/header.php'; ?>

<div id="page-wrapper">

    <div class="row">
        <h2 class="page-header">Update Job Opening</h2>
    </div>

    <?php include('./includes/flash_messages.php'); ?>

    <form action="" method="post" enctype="multipart/form-data" id="contact_form">

        <?php
        // Job Form
        require_once('./forms/customer_form.php');
        ?>

    </form>

</div>

<?php include_once 'includes/footer.php'; ?>