<?php
function calculateTotalSales($salesData, $productName) {
    $lines = explode("\n", $salesData); # split the CSV string into an array of lines
    $totalSales = 0;

    foreach ($lines as $line) {
        $fields = explode(",", $line); # split each line into fields
        if (count($fields) == 3) {
            $product = trim($fields[0]);
            $amount = floatval(trim($fields[1]));
            $quantity = intval(trim($fields[2]));

            if ($product === $productName) {
                $totalSales += $amount * $quantity; # calculate the sales amount for the specified product
            }
        }
    }

    return $totalSales;
}

// Sample usage:F
$salesData = "Product A,100.50,5
Product B,75.25,3
Product A,50.25,2
Product C,30.00,1
Product A,75.50,4";
$productName = "Product A";
$totalSales = calculateTotalSales($salesData, $productName);

# product a returns value 905, there are 3 product As, 
# product a.1 = 100.5 x 5 = 502.5
# product a.2 = 50.25 x 2 = 100.5
# product a.3 = 75.5 x 4 = 302
# total 905
echo "Total sales for $productName: PHP" . $totalSales;
?>
