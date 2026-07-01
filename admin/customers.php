<style>
/* Page Header */
.page-header {
    margin-top: 0;
    font-weight: 600;
    color: #333;
}

/* Filter Box */
.filter-form {
    background: #fff;
    border: 1px solid #eee;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 3px 10px rgba(0,0,0,.08);
}

.filter-form label {
    font-weight: 600;
    margin-right: 8px;
}

.filter-form .form-control {
    border-radius: 8px;
    height: 42px;
    margin-right: 10px;
}

.filter-form .form-control:focus {
    border-color: #F97316;
    box-shadow: 0 0 0 3px rgba(249,115,22,.15);
}

.table-responsive {
    border: 0;
}

.table td,
.table th {
    white-space: nowrap;
    vertical-align: middle;
}

.table td:last-child {
    min-width: 90px;
}

@media (max-width: 767px) {
    .table {
        font-size: 13px;
    }

    .btn-sm {
        padding: 3px 6px;
        font-size: 12px;
    }
}

/* Buttons */
.btn-success {
    background: linear-gradient(120deg, #28a745, #218838);
    border: none;
    border-radius: 8px;
}

.btn-primary {
    background: linear-gradient(120deg, #FB923C, #F97316);
    border: none;
    border-radius: 8px;
}

.btn-danger {
    border-radius: 8px;
}

.btn {
    transition: .3s;
}

.btn:hover {
    transform: translateY(-2px);
}

/* Export Button */
#export-section {
    margin-bottom: 15px;
}

/* Pagination */
.pagination > li > a,
.pagination > li > span {
    color: #F97316;
    border-radius: 6px !important;
    margin: 0 2px;
}

.pagination > .active > a,
.pagination > .active > span {
    background: #F97316;
    border-color: #F97316;
}

/* Modal */
.modal-content {
    border-radius: 10px;
}

.modal-header {
    background: linear-gradient(120deg, #FB923C, #F97316);
    color: #fff;
    border-radius: 10px 10px 0 0;
}

.modal-header .close {
    color: #fff;
    opacity: 1;
}

</style>
<?php
require_once 'config/config.php';
require_once BASE_PATH . '/includes/auth_validate.php';

// Costumers class
require_once BASE_PATH . '/lib/Costumers/Costumers.php';
$costumers = new Costumers();

// Get Input data from query string
$search_string = filter_input(INPUT_GET, 'search_string');
$filter_col = filter_input(INPUT_GET, 'filter_col');
$order_by = filter_input(INPUT_GET, 'order_by');

// Per page limit for pagination.
$pagelimit = 15;

// Get current page.
$page = filter_input(INPUT_GET, 'page');
if (!$page) {
	$page = 1;
}

// If filter types are not selected we show latest added data first
if (!$filter_col) {
	$filter_col = 'id';
}
if (!$order_by) {
	$order_by = 'Desc';
}

//Get DB instance. i.e instance of MYSQLiDB Library
$db = getDbInstance();
$select = array('id', 'job_title', 'department', 'location', 'education', 'created_at', 'updated_at');

//Start building query according to input parameters.
// If search string
if ($search_string) {
	$db->where('job_title', '%' . $search_string . '%', 'like');
}

//If order by option selected
if ($order_by) {
	$db->orderBy($filter_col, $order_by);
}

// Set pagination limit
$db->pageLimit = $pagelimit;

// Get result of the query.
$rows = $db->arraybuilder()->paginate('jobs', $page, $select);
$total_pages = $db->totalPages;

include BASE_PATH . '/includes/header.php';
?>
<!-- Main container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Job Openings</h1>
        </div>
        <div class="col-lg-6">
            <div class="page-action-links text-right">
<a href="add_customer.php?operation=create" class="btn btn-success">
    <i class="glyphicon glyphicon-plus"></i> Add Job
</a>            </div>
            
        </div>
    </div>
    <?php include BASE_PATH . '/includes/flash_messages.php';?>

    <!-- Filters -->
    <div class="well text-center filter-form">
        <form class="form form-inline" action="">
            <label for="input_search">Search</label>
            <input type="text" class="form-control" id="input_search" name="search_string" value="<?php echo xss_clean($search_string); ?>">
            <label for="input_order">Order By</label>
            <select name="filter_col" class="form-control">
                <?php
foreach ($costumers->setOrderingValues() as $opt_value => $opt_name):
	($order_by === $opt_value) ? $selected = 'selected' : $selected = '';
	echo ' <option value="' . $opt_value . '" ' . $selected . '>' . $opt_name . '</option>';
endforeach;
?>
            </select>
            <select name="order_by" class="form-control" id="input_order">
                <option value="Asc" <?php
if ($order_by == 'Asc') {
	echo 'selected';
}
?> >Asc</option>
                <option value="Desc" <?php
if ($order_by == 'Desc') {
	echo 'selected';
}
?>>Desc</option>
            </select>
<input type="submit" value="Search" class="btn btn-primary">        </form>
    </div>
    <hr>
    <!-- //Filters -->


    <div id="export-section">
<a href="export_customers.php" class="btn btn-primary">
    <i class="glyphicon glyphicon-export"></i> Export CSV
</a>    </div>

  <!-- Responsive Table -->
<div class="table-responsive">
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th width="5%">Sr.No</th>
                <th width="5%">ID</th>
                <th width="45%">Job Title</th>
                <th width="20%">Qualification</th>
                <th width="20%">Location</th>
                <th width="10%" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $srno = 1;
            foreach ($rows as $row):
            ?>
            <tr>
                <td><?php echo $srno++; ?></td>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo xss_clean($row['job_title']); ?></td>
                <td><?php echo xss_clean($row['education']); ?></td>
                <td><?php echo xss_clean($row['location']); ?></td>
                <td class="text-center">
                    <a href="edit_customer.php?customer_id=<?php echo $row['id']; ?>&operation=edit"
                        class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>

                    <a href="#"
                        class="btn btn-danger btn-sm"
                        data-toggle="modal"
                        data-target="#confirm-delete-<?php echo $row['id']; ?>">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>
                </td>
            </tr>

            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="confirm-delete-<?php echo $row['id']; ?>" role="dialog">
                <div class="modal-dialog">
                    <form action="delete_customer.php" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirm</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="del_id" value="<?php echo $row['id']; ?>">
                                <p>Are you sure you want to delete this row?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger pull-left">Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Modal -->

            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    <!-- //Table -->

    <!-- Pagination -->
    <div class="text-center">
    <?php echo paginationLinks($page, $total_pages, 'customers.php'); ?>
    </div>
    <!-- //Pagination -->
</div>
<!-- //Main container -->
<?php include BASE_PATH . '/includes/footer.php';?>
