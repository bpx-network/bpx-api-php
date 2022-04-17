# bpx-api-php
A PHP API for interacting with the BPX Blockchain.
Works well with chia and other forks.

## Install
`composer require bpx-network/bpx-api-php`

## Requirements
- PHP >= 7.0
- cURL

## Usage
Check examples/ folder for more usage examples.
```php
<?php
require __DIR__ . '/vendor/autoload.php';
    
try {
    $fullNode = new BPX\FullNode('localhost', 27921, 'C:\private_full_node.crt', 'C:\private_full_node.key');
    $wallet = new BPX\Wallet('localhost', 27926, 'C:\private_wallet.crt', 'C:\private_wallet.key');
    $farmer = new BPX\Farmer('localhost', 27924, 'C:\private_farmer.crt', 'C:\private_farmer.key');
    $harvester = new BPX\Harvester('localhost', 27925, 'C:\private_harvester.crt', 'C:\private_harvester.key');
    $crawler = new BPX\Crawler('localhost', 27927, 'C:\private_crawler.crt', 'C:\private_crawler.key');
        
    var_dump(
        $fullNode -> getBlockchainState()
    );
    
    var_dump(
        $wallet -> getWalletBalance(1)
    );
    
    var_dump(
        $farmer -> getRewardTargets(true)
    );
		
    $harvester -> refreshPlots();
    
    var_dump(
        $crawler -> getPeerCounts()
    );
}
    
catch(BPX\Exceptions\ConnException $e) {
    echo "Connection error: " . $e->getMessage();
}
    
catch(BPX\Exceptions\BPXException $e) {
    echo "BPX error: " . $e->getMessage();
}    
?>
```