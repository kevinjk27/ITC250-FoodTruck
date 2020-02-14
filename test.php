<?php
    //item order page

    include 'class.php';

    $Items[]=new Item(1, "Salad Bowl", 4.95, "Organic Baby Spring Mix");
    $Items[]=new Item(2, "Fruit Bowl", 3.95, "Organic Seasonal Fruit Mix");
    $Items[]=new Item(3, "Quinoa Bowl", 5.95, "A mix red and white quinoa");
    $Items[]=new Item(4, "Poke Bowl", 5.95, "A bowl of rice with sashimi");
    $Items[]=new Item(5, "Smoothies", 3.95, "Mixed Fresh Fruit Shake");


    //item class & constructor


    //Function to calculate the total
    function Total($selected, $items) {
        $total=0;


        foreach($items as $item) {
            if ($selected[$item->id] > 0) {
            $total = $total + ($selected[$item->id]*$item->price);
        }

        //tax calculation and output formatting
        $tax= $total * .101;
        $total_f = number_format($total, 2);
        $tax_f = number_format($tax, 2);
        $gtotal = $total_f + $tax_f;
        $gtotal_f = number_format($gtotal, 2);

        }
          echo '<p>Subtotal: $' . $total_f . '</p>';
          echo '<p>Taxes: $' . $tax_f . '</p>';
          echo '<p>Order total: $' . $gtotal_f . '</p>';
          echo '<p>Thank you! &#128525;</p>';
    }

?>
	<html>
    <head>
      <title>Food Truck</title>
      <link rel="stylesheet" type="text/css" href="styles.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    </head>
<body>
    <header>
        <h1><a href="index.php"><i class="fas fa-truck"></i> Super Yummy Truck Menu <i class="fas fa-truck"></i></a></h1>
    </header>
    <main>
	<?php

    if (!isset($_POST['selected'])) {

        echo '
            <form action = "' . $_SERVER['PHP_SELF'] . '"  method = "POST">
        <table>
        <tr>
        <td> <b>Item<b> </td>
        <td> <b>Description</b> </td>
        <td> <b>Price</b>     </td>
        <td> <b>Quantity</b> </td>
        </tr>';

        foreach($Items as $item) {

          echo '
            <tr>
                <td>  '. $item->name .'</td>
                <td>  '. $item->description .'
                </td>
                <td>   $'.$item->price.'
                </td>

                <td>

                    <input type="number" name="'.$item->id.'" min="0" max="99">

                      </select>
                  <br/>
                </td>
            </tr>
            ';
        }

		echo '
	    <tr><td><input type = "submit" name = "selected" value ="Submit"></td> </tr>
	   	</table>
    	</form>   ';
        } else {
            Total($_POST, $Items);
            echo'<br>';
        }
    ?>

    <body>
</html>
