<?php
/* median nabwani - 207571498
sameeh sweed - 206444739  */
class dbClass
{
    private $flag;
    private $host;
    private $db;
    private $charset;
    private $user;
    private $pass;
    private $opt = array(
       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    

private $connection;
public function __construct(string $host= "localhost", string $db = "loginsignup",
string $charset = "utf8", string $user = "root", string $pass = "")
{
    $this->host = $host;
    $this->db = $db;
    $this->charset = $charset;
    $this->user = $user;
    $this->pass = $pass;
    $this->flag=true;
}

private function connect()
{
$dns = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
$this->connection = new PDO($dns, $this->user, $this->pass, $this->opt);
}
public function disconnect()
{
$this->connection = null;
}
public function getUser($userName)//gets the user we asked for
{
    $this->connect();
    $result = $this->connection->query("SELECT * FROM `usertable` WHERE name='$userName'");
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $this->disconnect();
    return $row;
}

public function signup($userName,$password)//the sign up function
{
    $this->connect();
    $this->connection->exec("INSERT INTO usertable VALUES (\"$userName\",\"$password\") ");
    $this->disconnect();
}


public function checkDetails(string $username, int $password)//check login details
{
    $this->connect();
    $result = $this->connection->query("SELECT * FROM usertable"); //Selecting from the users' DB
    while($row = $result->fetch(PDO::FETCH_ASSOC)) 
    {
    $AccountArray[] = $row;
    if($row['name']==$username&&$row['password']==$password)
    { //Scanning the DB for matching details
        header('Location: home.php'); //User heads to the Home Screen
        $this->flag=false; 
        break; //Exiting the loop
    }
    }
    if($this->flag)//if the Log in details are wrong
        echo "Log-in information invalid.";

        $this->disconnect();
}

public function checkDetails2(string $username)//checks if we have alrady the same username if not it adds it to the database
{
    $this->connect();
    $result = $this->connection->query("SELECT `name` FROM `usertable` WHERE name ='$username'"); //Selecting the name from the users DB
    if($result!="")//if its empty we can safely add user
    {
        echo "Username already taken.";
    }
    $this->disconnect();
    
}

public function makePurchase($userName, array $array_of_items)//function that we execute when we hit the make purchase button
{
    $this->connect();
    for($i=0;$i<count($array_of_items);$i++)
    {
        $name=$array_of_items[$i]['Item_Name'];//product name
        $q=$array_of_items[$i]['Quantity'];//Quantity of each item we have
        $this->connection->exec("INSERT INTO `orders`( `username`, `product_name`, `product_quantity`) VALUES ('$userName','$name',$q)");//inserting the order info to the database
        $product=$array_of_items[$i]['Item_Name'];//product name
        $sql = "SELECT `quantity` FROM `products` WHERE product_name='$product'";//getting the actual quantity in our database
        $result = $this->connection->prepare($sql);
        $result->execute();
        $row=$result->fetch();//actual quantity in our database
        $newQ=(int)($row['quantity']);//the quantity of each item in the database
        $newQuantity=$newQ-$q;//the new quantity that should be in the database
        $this->connection->exec("UPDATE `products` SET `quantity`= $newQuantity WHERE product_name='$product'");//updating the quantity in the database
    }
    $this->disconnect();
}
public function checkQuantity($product)//check the quantity lift in the database (left in the store)
{
    $this->connect();
    $sql = "SELECT `quantity` FROM `products` WHERE product_name='$product'";//getting the actual quantity in our database
    $result = $this->connection->prepare($sql);
    $result->execute();
    $row=$result->fetch();
    $this->disconnect();
    return (int)($row['quantity']);//return quantity of the item we wanted to check
}
}
