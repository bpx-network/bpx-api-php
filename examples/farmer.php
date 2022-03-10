<?php
require '../vendor/autoload.php';

try {
    $farmer = new BPX\Farmer('localhost', 27924, 'C:\private_farmer.crt', 'C:\private_farmer.key');
    
    echo "GET REWARD TARGETS -----------------------------------------------\n";
    var_dump(
        $farmer -> getRewardTargets(true)
    );
    
    echo "GET POOL STATE ---------------------------------------------------\n";
    var_dump(
        $farmer -> getPoolState()
    );
    
    echo "GET HARVESTERS ---------------------------------------------------\n";
    var_dump(
        $farmer -> getHarvesters()
    );
}

catch(BPX\Exceptions\ConnException $e) {
    echo "CONNECTION ERROR: " . $e->getMessage() . "\r\n";
}

catch(BPX\Exceptions\BPXException $e) {
    echo "BPX ERROR: " . $e->getMessage() . "\r\n";
}

?>