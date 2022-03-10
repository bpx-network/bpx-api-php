<?php
require '../vendor/autoload.php';

try {
    $wallet = new BPX\Wallet('localhost', 27926, 'C:\private_wallet.crt', 'C:\private_wallet.key');
    
    echo "GET LOGGED IN FINGERPRINT ----------------------------------------\n";
    var_dump(
        $wallet -> getLoggedInFingerprint()
    );
    
    echo "GET PUBLIC KEYS --------------------------------------------------\n";
    var_dump(
        $wallet -> getPublicKeys()
    );
    
    echo "GENERATE MNEMONICS -----------------------------------------------\n";
    var_dump(
        $wallet -> generateMnemonic()
    );
    
    echo "GET SYNC STATUS --------------------------------------------------\n";
    var_dump(
        $wallet -> getSyncStatus()
    );
    
    echo "GET HEIGHT INFO --------------------------------------------------\n";
    var_dump(
        $wallet -> getHeightInfo()
    );
    
    echo "GET NETWORK INFO -------------------------------------------------\n";
    var_dump(
        $wallet -> getNetworkInfo()
    );
    
    echo "GET WALLETS ------------------------------------------------------\n";
    var_dump(
        $wallet -> getWallets()
    );
    
    echo "GET WALLET BALANCE -----------------------------------------------\n";
    var_dump(
        $wallet -> getWalletBalance(1)
    );
    
    echo "GET TRANSACTION COUNT -------------------------------------------\n";
    var_dump(
        $wallet -> getTransactionCount(1)
    );
    
    echo "GET NEXT ADDRESS -------------------------------------------------\n";
    var_dump(
        $wallet -> getNextAddress(false)
    );
    
    echo "GET FARMED AMOUNT -------------------------------------------------------\n";
    var_dump(
        $wallet -> getFarmedAmount()
    );
}

catch(BPX\Exceptions\ConnException $e) {
    echo "CONNECTION ERROR: " . $e->getMessage() . "\r\n";
}

catch(BPX\Exceptions\BPXException $e) {
    echo "BPX ERROR: " . $e->getMessage() . "\r\n";
}

?>