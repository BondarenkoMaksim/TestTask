<?php

class basket
{
    //these int vars are counters of how many items are in the basket
    public int $R01 = 0;
    public int $G01 = 0;
    public int $B01 = 0;
    //these float vars are the price of each product;
    private float $R01Price = 32.95;
    private float $G01Price = 24.95;
    private float $B01Price = 7.95;

    /**This method adds products to basket
     * @param String $code code of the product
     */
    public function add(String $code) {
       switch ($code) {
           case "R01":
               $this->R01++;
               break;
           case "G01":
               $this->G01++;
               break;
           case "B01":
               $this->B01++;
               break;
           default:
               echo ("Wrong Code!!!\n");
               break;
       }
    }

    /**This method evaluate total cost of the basket with delivery
     * @return float total cost of the basket
     */
    public function totalCost ():float {
        $under50 = 4.95;
        $under90 = 2.95;
        $result = $this->G01 * $this->G01Price + $this->B01 * $this->B01Price;
            if ($this->R01 % 2 == 0) {
                $result += ($this->R01 / 2) * $this->R01Price + ($this->R01 / 2) * $this->R01Price / 2;
            } else {
                $result += (($this->R01 + 1) / 2) * $this->R01Price + ($this->R01 - 1) / 2 * ($this->R01Price / 2);
            }
        if ($result < 50 && $result > 0) {
            $result += $under50;
        } else {
            if ($result < 90 && $result > 0) {
                $result+=$under90;
            }
        }
        return $result;
    }
}
$myBasket = new basket();
$menuBool = true;
echo ("Products:\n  Product   Code Price\nR01 Product R01  32.95$\nG01 Product G01  24.95$\nB01 Product B01  7.95$\nFor orders under $50, delivery costs $4.95. For orders under $90, delivery costs $2.95. Orders of $90 or more have free delivery.\nBuy one R1 Product, get the second half price!!!\n");
while ($menuBool) {
    echo("Menu:\n1.Add to basket\n2.Show total cost\n3.exit\n");
    $menu = readLine();
    switch ($menu) {
        case "1":
            echo ("Write product code\n");
            $menuCode = readline();
            $myBasket->add($menuCode);
            break;
        case "2":
            echo("Total cost of your basket=".round($myBasket->totalCost(),2,PHP_ROUND_HALF_DOWN)."\n");
            break;
        case "3":
            $menuBool = false;
            break;
        default:
            echo ("Invalid menu item\n");
            break;
    }
}


