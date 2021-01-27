# eQuery
easy query php library
So it is a simple very light weight Php library for query with this  query you can do basic CRUD with advnance feature like searching filtering and all 
to implement this  just include __database.php into your file 
and then create a object of Query class and with that object call the function by giving parameter as per your need....
Its documentaion wll be release after 2 months after completing my exam 


First of all create a database  connection by going inside __database.php file and renaming the database name 

after that create an object as
$obj = new query;

############################## for Displaying #####################################

$obj->getData($field, $table, $conditionArr, $likeColumn, $likeWord,$orderByField, $orderBy_Type,$limit);

getData() function takes 8 parameter as mentioned above if you wanna skip any of these parameter then just give ''.

$field = its default value is *,

$table = pass the name of a table,

$conditionarr = here you should pass value by array and array must be associative array where its key value should be the name of table's column and element should be data like
                $conditionarr = array( 'name'=>'$_post['name']',
                                        'password'=>'$_POST['password']');

$likeColumn = Pass the name of column you wanna serach to note: it takes single column name , later on next update we will give facility to enter the multiple number of  column,

$likeWord = Pass any value you wanna search as '$_post['name']'

$orderByField = Pass the name of column ,

$orderBy_Type = Pass how you wanna arrange the data and the deafult arrangement is descending order,

$limit = Pass the number how many record you want to retrive from the particular table

####################### Inserting a data #########################

Again to insert call the function using object as

$obj->insertData($table , $conditionArr)

insertData takes two parameter i.e first one is the name of table and the second one is associative array data but second one is totally optional parameter if you wanna skip second parameter then just give ''


$table = pass the name of table ,

$conditionarr = here you should pass value by array and array must be associative array where its key value should be the name of table's column and element should be data like
                $conditionarr = array( 'name'=>'$_post['name']',
                                        'password'=>'$_POST['password']');

####################### Editing a data #####################


Again to edit a data call the function using object as 


$obj->editData($table='',$setArr='',$conditionArr='')

editData takes 3 parameter i.e first one is the name  of table , second is associative array , and third one is also a associatve array

$table = pass the name of table ,

$setArr = here you should pass value by array and array must be associative array where its key value should be the name of table's column and element should be data like
                $setArr = array( 'name'=>'$_post['name']',
                                        'password'=>'$_POST['password']');


$conditionarr = here you should pass value by array and array must be associative array where its key value should be the name of table's column and element should be data like
                $conditionarr = array( 'name'=>'$_post['name']',
                                        'password'=>'$_POST['password']');
                                        

#################### deleting a data  ########################

Again to delete any record call the function usig object as 

$obj->deleteData($table='',$conditionArr='')

deleteData takes 2 parameter i.e. first one is name of table  and second  is associative array


$table = Pass the name of table ,


$conditionarr = here you should pass value by array and array must be associative array where its key value should be the name of table's column and element should be data like
                $conditionarr = array( 'name'=>'$_post['name']',
                                        'password'=>'$_POST['password']');
                                        
                                        
__Alright that's all for this library next update will be after 2  months where i will be deploying cool documentation using react and n this library there will be more feature  

