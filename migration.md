#see PROBLEMS solution if have any PROBLEMS

#create table
-----------------------------------
php artisan migrate:install
php artisan make:migration create_users_table --create=users
php artisan migrate:refresh


#create model
------------------------------------
php artisan make:model modelName
-----edit model
        protected $table = "TableName";
        protected $fillable = [
            'field1', 'field2', 'field3'
        ];


#create controller
------------------------------------
php artisan make:controller NameController
    public function index()
    {
      return view('folder/file.php');
    }


#create View file
------------------------------------
view.blade.php



#Add Route
------------------------------------
get url
    Route::get('/name-new', "NameController@index");
post url
    Route::post('/name-new', "NameController@create");


#create method (NameController@create)
-------------------------------------
add this first
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use App\Name;

then create method
    public function create(Request $request)
        {
            $this->validate($request, [
                "first" => "required|min:2|max:10",
                "last" => "required|min:2|max:10",
                "email" => "required|min:15|max:100",
            ]);
            $data = array(
            "first" => $request->first,
            "last" => $request->last,
            "email" => $request->email
            );
            Name::create($data);
            return redirect("/name-new")->with("msg", "Save Successful");
        }





------------------------------------------------------------------------------------
    problem 1
------------------------------------------------------------------------------------
[PDOException]
SQLSTATE[HY000] [2002] No such file or directory
The reason I found is just because PHP and MySQL can't get connected themselves. To get this problem fixed, I follow the next steps:

Open a terminal and connect to the mysql with:

/opt/lampp/bin/mysql -u root
or
mysql -u root -p

It will ask you for the related password. Then once you get the mysql promt type the next command:

mysql> show variables like '%sock%'
You will get something like this:

+-----------------------------------------+-----------------+
| Variable_name                           | Value           |
+-----------------------------------------+-----------------+
| performance_schema_max_socket_classes   | 10              |
| performance_schema_max_socket_instances | 322             |
| socket                                  | /tmp/mysql.sock |
+-----------------------------------------+-----------------+
Keep the value of the last row:

/tmp/mysql.sock
In your laravel project folder, look for the database.php file there is where you configure the DB connection parameters. In the mysql section add the next line at the end:

'unix_socket' => '/tmp/mysql.sock'
You must have something like this:
'mysql' => array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'SchoolBoard',
            'username'  => 'root',
            'password'  => ',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'unix_socket' => '/tmp/mysql.sock',
        ),
------------------------------------------------------------------------------------
    problem 1 end
------------------------------------------------------------------------------------
