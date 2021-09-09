<?php
/* median nabwani - 207571498
sameeh sweed - 206444739  */
session_start();
include("dbClass.php");
$db =new dbClass();
    if(isset($_POST['Add_To_Cart']))//ig hitting the add to cart button
    {
      $product=$_POST['Item_Name'];//getting the item name we wanted to add to cart
      echo $db->checkQuantity($product);//checking quantity
      if($db->checkQuantity($product)<1)//if the quantity is less than one we cant add to cart becuse its out of stock
     {
        echo"<script>
        alert('Item out of stock !');
        window.location.href='home.php';
        </script>";
      }
      else{
            if(isset($_SESSION['cart']))//if the cart have items 
                {
                    $myitems=array_column($_SESSION['cart'],'Item_Name');//getting the items names
                    if(in_array($_POST['Item_Name'],$myitems))
                        {
                            for($i=0;$i<count($_SESSION['cart']);$i++)
                                {
                                    if($_SESSION['cart'][$i]['Item_Name']==$_POST['Item_Name'])//making sure we are heading to check the right item
                                        {
                                            if($_SESSION['cart'][$i]['Quantity']>=$db->checkQuantity($product))//to make sure we are not adding more items than we can order
                                                {
                                                    echo"<script>
                                                    alert('Cant add more !');
                                                    window.location.href='home.php';
                                                    </script>";
                                                }
                                                    else//if we have enough in the store(database quantity)
                                                   {
                                                       $_SESSION['cart'][$i]['Quantity']++;//adds one to the cart
                                                       header('location:home.php');//heading back to home
                                                   }
                                                    
                                            }
                                }
                                    
                            }
                                else
                                {
                                    if(!isset($_SESSION['cart']))//if cart was empty 
                                    {
                                        $_SESSION['cart']=0;
                                    }
                                    else{//adding other items to cart with at least one item in
                                        $count=count($_SESSION['cart']);//to see how many we actually have it the cart
                                        $_SESSION['cart'][$count]=array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'],'Quantity'=>1);
                                        echo"<script>
                                        alert('Item Added');
                                        window.location.href='home.php';
                                        </script>";
                                    }
                                }
                        }
                    
                    else//adding item to the cart for the first time
                    {
                        $_SESSION['cart'][0]=array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'],'Quantity'=>1);
                        echo"<script>
                        alert('Item Added');
                        window.location.href='home.php';
                        </script>";
                    }
                }
    }
    


?>