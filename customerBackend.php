<html>
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/tether/1.3.7/tether.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css"
          integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js"
            integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU"
            crossorigin="anonymous"></script>
    <script src="formChecker.js"></script>
</head>
<body>
<div class="container vertical-center">
    <?php
    setlocale(LC_MONETARY, 'en_US.UTF-8');

    $itemCost = array("hammers" => 5.11, "nails" => 3.23, "wood" => 7.14);
    $shippingCosts = array('Three-Day' => 5.00, 'Seven-Day' => 0, 'Overnight' => 50.00);
    $totalCost = 0;

    echo "<table class=\"table table-bordered table-striped\">
  <thead>
    <tr>
      <th>Item</th>
      <th>Quantity</th>
      <th>Cost Per Item</th>
      <th>Subtotal</th>
    </tr>
  </thead>
  <tbody>";

    foreach($itemCost as $key => $value) {
        $currentCost = $value * $_POST[$key];
        echo "<tr>";
        echo '<th scope="row">'; echo $key; echo '</th>';
        echo '<td>'; echo $_POST[$key]; echo'</td>';
        echo '<td>'; echo money_format('%.2n', $value); echo '</td>';
        echo '<td>'; echo money_format('%.2n', $currentCost); echo'</td>';
        echo '</tr>';
        $totalCost += $currentCost;
    }

    echo '<tr>';
    echo '<th scope="row">Shipping</th>';
    echo '<td colspan="2">'; echo $_POST['shipping']; echo '</td>';
    echo '<td>'; echo money_format('%.2n', $shippingCosts[$_POST['shipping']]); echo '</td>';
    echo '</tr>';
    $totalCost += $shippingCosts[$_POST['shipping']];

    echo '<tr>';
    echo '<th scope="row" colspan="3">Total Cost </th>';
    echo '<td>'; echo money_format('%.2n', $totalCost); echo '</td>';



  echo "</tbody>
</table>";
    ?>
</div>
</body>
</html>
