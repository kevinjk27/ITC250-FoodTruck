<?php
    //item order page

    include 'class.php';

    $Items=new Item(1, "Salad Bowl", 4.95, "Organic Baby Spring Mix");
    $Items->addtoppings("Cheese");
    $Items->addtoppings("Bell Pepper");
    $Items->addtoppings("Corn");
   $newitems[]=$Items;

    $Items=new Item(2, "Fruit Bowl", 3.95, "Organic Seasonal Fruit Mix");
    $Items->addtoppings("Almond Sprinkles");
    $Items->addtoppings("Coconut Chips");
    $Items->addtoppings("Ice Cream");
    $newitems[]=$Items;

    $Items=new Item(3, "Quinoa Bowl", 5.95, "A mix red and white quinoa");
    $Items->addtoppings("Sunflower Seeds");
    $Items->addtoppings("Cucumber");
    $Items->addtoppings("Sprout");
    $newitems[]=$Items;

    $Items=new Item(4, "Poke Bowl", 5.95, "A bowl of rice with sashimi");
    $Items->addtoppings("Edamame");
    $Items->addtoppings("Avocado");
    $Items->addtoppings("Hard Boiled Egg");
    $newitems[]=$Items;


    $Items=new Item(5, "Smoothies", 3.95, "Mixed Fresh Fruit Shake");
    $Items->addtoppings("Pomegranate Seeds");
    $Items->addtoppings("Chia Seeds");
    $Items->addtoppings("Wolfberry");
    $newitems[]=$Items;



    //Function to calculate the total
    function Total($postVariable, $newitems) {
        $total=0;
        $total_toppings = 0;

        foreach($newitems as $item) {

            if ($postVariable[$item->id] > 0) {

            $total = $total + ($postVariable[$item->id]*$item->price);

            for ($x = 1; $x <= 3; $x++){

              $ExtraVariable = 'Topping' . $x . $item->id;

              if(isset($postVariable[$ExtraVariable])){

              $total_toppings += 0.5 * (int)$postVariable[$item->id];

                }
              }
            }


      }

        $total_without_toppins = number_format($total, 2);

        $total += $total_toppings;

       // tax calculation and output formatting
        $tax= ($total) * .101;
        $total_f = number_format($total, 2);
        $total_toppings = number_format($total_toppings, 2);
        $tax_f = number_format($tax, 2);
        $gtotal = $total_f + $tax_f;

        $gtotal_f = number_format($gtotal, 2);


          echo '<p>Subtotal: $' . $total_without_toppins . '</p>';
          echo '<p>Subtotal (Extra toppings): $' . $total_toppings . '</p>';
          echo '<p>Taxes: $' . $tax_f . '</p>';
          echo '<p>Order total: $' . $gtotal_f . '</p>';
          echo '<p>Thank you! &#128525;</p>';
    }

?>
	<html>
    <head>
      <title>Food Truck</title>
      <link rel="stylesheet" type="text/css" href="css/style.css">
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
        <td> <b>Quantity</b>     </td>
        <td> <b>Any Extras? $0.50 </b> </td>
        </tr>';



        foreach($newitems as $item) {

          echo'
          <tr style="border-style: ridge">
              <td>  '. $item->name .'</td>
              <td>  '. $item->description .'</td>
              <td> $'.$item->price.'</td>
              <td> <input type="number" name="'.$item->id.'" min="0" max="99"><br/></td> <td>';

                $i = 1;
                foreach ($item->toppings as $value) {
          echo '
             <input type="checkbox" name="Topping'. $i . $item->id .'" value="0.5"/>'. $value. ' 	$0.50<br>';
            $i++;
            }

          echo'
          </td>
          </tr>';
    }

		echo '
	    <tr><td><input type = "submit" name = "selected" value ="Submit"></td> </tr>
	   	</table>
    	</form>   ';
        } else {
            Total($_POST, $newitems);
            echo'<br>';
        }
    ?>

	<br>
        <div class="links">
            <a class="link" href="https://docs.google.com/document/d/1BrQ3gpuYSc-njv8WRk09qfZGpuWPiCebkpfh0hPUNF0/edit?ts=5e3a1c5c">Work Log</a><br /><br />
            <a class="link" href="https://github.com/kevinjk27/ITC250-FoodTruck">GitHub Repo</a>
        </div>

    <body>
</html>
