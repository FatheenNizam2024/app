<pre>
    <?php 

    include "libs/load.php";

    
    // //echo __DIR__;
    // echo __LINE__;

    // signup("test01","test-1234","test@gmail.com","0774765988777");
    // $conn = Database::getConnection();
    // $conn = Database::getConnection();
    
 
     
        class Calculator {
            public function __call($method, $arguments) {
                if ($method === 'add') {
                    return array_sum($arguments);
                } elseif ($method === 'multiply') {
                    return array_product($arguments);
                } else {
                    throw new Exception("Method '$method' not found");
                }
            }
        }

        $calc = new Calculator();
        print_r($calc);
        echo "<br>";
        echo $calc->add(5, 10, 15);      // Output: 30
        echo "<br>";
        echo $calc->multiply(2, 3, 4);   // Output: 24

    ?>
</pre>