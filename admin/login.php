<?php
session_start();
require_once 'config/config.php';
$token = bin2hex(openssl_random_pseudo_bytes(16));

// If User has already logged in, redirect to dashboard page.
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === TRUE)
{
	header('Location:index.php');
}

// If user has previously selected "remember me option": 
if (isset($_COOKIE['series_id']) && isset($_COOKIE['remember_token']))
{
	// Get user credentials from cookies.
	$series_id = filter_var($_COOKIE['series_id']);
	$remember_token = filter_var($_COOKIE['remember_token']);
	$db = getDbInstance();
	// Get user By series ID: 
	$db->where('series_id', $series_id);
	$row = $db->getOne('admin_accounts');

	if ($db->count >= 1)
	{
		// User found. verify remember token
		if (password_verify($remember_token, $row['remember_token']))
        	{
			// Verify if expiry time is modified. 
			$expires = strtotime($row['expires']);

			if (strtotime(date()) > $expires)
			{
				// Remember Cookie has expired. 
				clearAuthCookie();
				header('Location:login.php');
				exit;
			}

			$_SESSION['user_logged_in'] = TRUE;
			$_SESSION['admin_type'] = $row['admin_type'];
			header('Location:index.php');
			exit;
		}
		else
		{
			clearAuthCookie();
			header('Location:login.php');
			exit;
		}
	}
	else
	{
		clearAuthCookie();
		header('Location:login.php');
		exit;
	}
}

include BASE_PATH.'/includes/header.php';
?>
<style>
body{
    background:#f7f8fc;
    font-family: Arial, Helvetica, sans-serif;
}

.login-panel{
    border:0;
    border-radius:15px;
    overflow:hidden;
    background:#fff;
    box-shadow:0 15px 40px rgba(0,0,0,.12);
}

.login-panel .panel-heading{
    background:linear-gradient(120deg,#FB923C,#F97316);
    color:#fff;
    font-size:22px;
    font-weight:600;
    text-align:center;
    padding:18px;
    border:none;
}

.login-panel .panel-body{
    padding:30px;
    background:#fff;
}

.control-label{
    color:#333;
    font-weight:600;
    margin-bottom:6px;
}

.form-control{
    height:45px;
    border-radius:8px;
    border:1px solid #ddd;
    box-shadow:none;
}

.form-control:focus{
    border-color:#FB923C;
    box-shadow:0 0 0 3px rgba(251,146,60,.15);
}

.checkbox label{
    color:#555;
}

.loginField{
    width:100%;
    height:45px;
    border:none;
    border-radius:8px;
    background:linear-gradient(120deg,#FB923C,#F97316);
    color:#fff;
    font-size:16px;
    font-weight:600;
    transition:.3s;
}

.loginField:hover{
    background:linear-gradient(120deg,#F97316,#EA580C);
    color:#fff;
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(249,115,22,.35);
}

.alert{
    border-radius:8px;
}
</style>
<div id="page-" class="col-md-4 col-md-offset-4">
	<form class="form loginform" method="POST" action="authenticate.php">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">Please Sign in</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="control-label">username</label>
					<input type="text" name="username" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label class="control-label">password</label>
					<input type="password" name="passwd" class="form-control" required="required">
				</div>
				<div class="checkbox">
					<label>
						<input name="remember" type="checkbox" value="1">Remember Me
					</label>
				</div>
				<?php if (isset($_SESSION['login_failure'])): ?>
				<div class="alert alert-danger alert-dismissable fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php
					echo $_SESSION['login_failure'];
					unset($_SESSION['login_failure']);
					?>
				</div>
				<?php endif; ?>
				<button type="submit" class="btn btn-success loginField">Login</button>
			</div>
		</div>
	</form>
</div>
<?php include BASE_PATH.'/includes/footer.php'; ?>
