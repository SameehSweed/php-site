<?php
/* median nabwani - 207571498
sameeh sweed - 206444739  */
include("navigation.php");
include("dbClass.php");
$db =new dbClass();
if(isset($_POST['Remove_Item']))//if the remove item is clicked
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['Item_Name']==$_POST['Item_Name'])//looks for the item that was clicked to be removed
            {
                if($value['Quantity']==1)//if one item from this specific item left it will remover it totaly
                {
                    unset($_SESSION['cart'][$key]);//relasing the item form the array
                    $_SESSION['cart']=array_values($_SESSION['cart']);
                    echo"<script>
                        alert('Item Removed');
                        window.location.href='mycart.php';
                    </script>";
                }
                else
                $_SESSION['cart'][$key]['Quantity']--;//removes only one from the cart
            }
        }
    }
if(isset($_POST['purchase_submit']))//if the client made the purchase
    {
        $db->makePurchase($_SESSION['username'],$_SESSION['cart']);//applies the purchase
        $_SESSION['cart']=null;//zeroing the cart to allow other purchases to be made
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>MY CART</h1>
            </div>

      <div class="col-lg-8">
            <table class="table">
            <thead class="text-center">
                <tr>
                <th scope="col">Serial No.</th>
                <th scope="col">Item Name</th>
                <th scope="col">Item Price</th>
                <th scope="col">Quantity</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $total=0;
                if(isset($_SESSION['cart']))
                {
                    foreach($_SESSION['cart'] as $key => $value)
                    {
                        $sr=$key+1;//uses this for cart index
                        $total=$total+$value['Price']*$value['Quantity'];//sums the total of the order
                        echo"
                            <tr>
                                <td>$sr</td>
                                <td>$value[Item_Name]</td>
                                <td>$value[Price]</td>
                                <td>$value[Quantity]</td>
                                <td>
                                <form method='POST'>
                                <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                                <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                </form>
                                </td>
                            </tr>
                        ";
                    }
                }
                ?>
            </tbody>
            </table>
      </div>

      <div class="col-lg-4">
      <div class="border bg-light rounded p-4">
            <h4>Total</h4>
            <h5 class="text-right"><?php echo $total .'$' /* prints the total price of the order*/?></h5>
            <br>
            <form method="POST" >
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Cash on Delivery
                    </label>
            </div>
                    <br>
                 <button type="submit" name="purchase_submit" class="btn btn-primary btn-block">Make Purchase</button>
            </form>
      </div>
        </div>
    </div>
    </div>
</body>
</html>