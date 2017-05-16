<?php
f:
echo "Do You Want to Create Multiple Table?(y/n)";
$type = fopen("php://stdin", "r");
$type = fgets($type);
$type = trim($type);
if($type !='y' && $type !='n')
{
	echo "Invalid Command \n";
	goto f;
}
if($type == "n")
{
	t:
	echo "Enter The Table Name: ";
	$table = fopen("php://stdin", "r");
	$table = fgets($table);
	$table = trim($table);
	if (!empty($table))
	{
		$output = shell_exec("php artisan make:migration create_{$table}_table --create={$table}");
		echo "--------------------------------------------------------------------------------------------- \n";
		echo "| "  . $output . " \n";
		echo "--------------------------------------------------------------------------------------------- \n";
	}
	else
	{
		echo "Please Try Again \n";
		goto t;
	}
	$table = ucfirst($table);
	m:
	echo "Do you Want to create model of {$table}? (y/n)";
	$model = fopen("php://stdin", "r");
	$model = fgets($model);
	$model = trim($model);
	if($model == "y")
	{
		$output = shell_exec("php artisan make:model {$table}");
		echo "--------------------------------------------------------------------------------------------- \n";
		echo "| "  . $output . " \n";
		echo "--------------------------------------------------------------------------------------------- \n";
	}
	elseif($model == "n")
	{

	}
	else
	{
		echo "Invilade command \n";
		goto m;
	}

	c:
	echo "Do you Want to create controller of {$table}? (y/n)";
	$controller = fopen("php://stdin", "r");
	$controller = fgets($controller);
	$controller = trim($controller);
	if($controller == "y")
	{
		$output = shell_exec("php artisan make:controller {$table}Controller");
		echo "--------------------------------------------------------------------------------------------- \n";
		echo "| "  . $output . " \n";
		echo "--------------------------------------------------------------------------------------------- \n";
	}
	elseif($controller == "n")
	{

	}
	else
	{
		echo "Invilade command \n";
		goto c;
	}

	at:
	echo "Do you Want to create another Table?(y/n)";
	$perm = fopen("php://stdin", "r");
	$perm = fgets($perm);
	$perm = trim($perm);
	if ($perm == 'y') {
		goto t;
	}
	elseif ($perm = 'n') {

	}
	else {
		echo "Invalid Command \n";
		goto at;
	}
}
elseif ($type == 'y')
{

}
end:
?>
