<?php
require '../vendor/autoload.php';

try {
    $fullNode = new BPX\FullNode('localhost', 27921, 'C:\private_full_node.crt', 'C:\private_full_node.key');
    
    echo "GET NETWORK INFO -------------------------------------------------\n";
    var_dump(
        $fullNode -> getNetworkInfo()
    );
    
    echo "GET BLOCKCHAIN STATE ---------------------------------------------\n";
    var_dump(
        $fullNode -> getBlockchainState()
    );
}

catch(BPX\Exceptions\ConnException $e) {
    echo "CONNECTION ERROR: " . $e->getMessage() . "\r\n";
}

catch(BPX\Exceptions\BPXException $e) {
    echo "BPX ERROR: " . $e->getMessage() . "\r\n";
}

?>