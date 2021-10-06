<?php
declare (strict_types=1);

/** This method reverse string
 * @param $str String
 * @return string reversed string
 */
    function reverse (string $str): string
    {
        $length = strlen($str);
        $newString = '';
        for ($i = $length; $i > 0; $i--) {
            $newString = $newString.$str[$i - 1];
        }
        return $newString;
    }

/**This method returns max value of array
 * @param array $xs
 * @return int max value of array;
 */
    function my_max (array $xs): int
    {
        $max=0;
        for ($i = 0;$i < count($xs);$i++) {
            if ($xs[$i] > $max) {
                $max = (int)$xs[$i];
             }
            if (is_array($xs[$i])) {
                $newMax = my_max($xs[$i]);
                if ($newMax > $max) {
                    $max = $newMax;
                }
            }
        }
        return $max;
    }
    $string='Hello';
    echo('Result of my_max :'.my_max([1, 2, [3, 4, 5], 9])."\n");
    echo ('String: '.$string."\n");
    echo ('ReverseString: '.reverse($string));





