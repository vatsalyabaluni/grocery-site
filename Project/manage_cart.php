<?php
session_start();
// session_destroy();
include('login_cred.php');
if(!$conn)
    die("Error in Connection : ".mysqli_connect_error());

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['submit']))
    {   
        if(isset($_SESSION['cart']))
        {   
            $myitems = array_column($_SESSION['cart'],'code');
            if(in_array($_POST['product_id'],$myitems))
            {
                echo "<script>
                alert('Item already added');
                window.location.href='https://project-shopping-with-recomend.herokuapp.com/all_product.php';
                </script>";

            }
            else
            {
                $product_id = $_POST['product_id'];
                $records = mysqli_query($conn,"select * from product_details where product_id =$product_id");
                $count = count($_SESSION['cart']) + 1;
                $_SESSION['count'] = $count;
                while($data = mysqli_fetch_array($records))
                {
                    $_SESSION['cart'][$count] = array(
                            'name' => $data['product_name'],
                            'code' => $data['product_id'],
                            'quantity' => $_POST['quantity'],
                            'price' => $data['product_price'],
                            'image' => $data['product_image']
                    );
                }
                echo "<script>
                    alert('Item added');
                    window.location.href='https://project-shopping-with-recomend.herokuapp.com/all_product.php';
                    </script>";
            }
        }
        else
        {   
            $product_id = $_POST['product_id'];
            $records = mysqli_query($conn,"select * from product_details where product_id =$product_id");
            // $count = 0;
            
            while($data = mysqli_fetch_array($records))
            {
                $_SESSION['cart'][1] = array(
                        'name' => $data['product_name'],
                        'code' => $data['product_id'],
                        'quantity' => $_POST['quantity'],
                        'price' => $data['product_price'],
                        'image' => $data['product_image']
                );
            }
            $count = count($_SESSION['cart']);
            $_SESSION['count'] = $count ;
            echo "<script>
                alert('Item added');
                window.location.href='https://project-shopping-with-recomend.herokuapp.com/all_product.php';
                </script>";

        }
    }
    if(isset($_POST['Remove_item']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['name'] == $_POST['Item_Name'])
            {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            $count = count($_SESSION['cart']);
            if($count >= 0)
                $_SESSION['count'] = $count - 1;
            echo "<script>
                alert('Item removed');
                window.location.href='https://project-shopping-with-recomend.herokuapp.com/cart.php';
                </script>";
            }
        }
    }
    if(isset($_POST['submit1']))
    {
        if(isset($_POST['coupon']))
        {
            $coupon = $_POST['coupon'];
            
            $flag = 0;
            $records = mysqli_query($conn,"select * from coupon");
            while($data = mysqli_fetch_array($records))
            {   $d = $_POST['pricep'] - $data['price'];
                if(($coupon == $data['code']) && $d >0)
                {
                    echo "<script>
                    alert('Coupon Code Applied');
                    window.location.href='https://project-shopping-with-recomend.herokuapp.com/cart.php';
                    </script>";
                    $_SESSION['deduce'] = $data['price'];
                    $flag = 1;
                }
            }
            if($flag == 0)
            {
                echo "<script>
                    alert('Wrong Coupon Code');
                    window.location.href='https://project-shopping-with-recomend.herokuapp.com/cart.php';
                    </script>";
            }
        }
    }
    
}
?>