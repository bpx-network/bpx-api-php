<?php

namespace BPX;

use BPX\Utils\RPCClient;

class Wallet extends RPCClient {
    public function logIn(int $fingerprint) {
        return $this -> request('log_in', [
            'fingerprint' => $fingerprint
        ]) -> success;
    }
    
    public function logInAndRestore(int $fingerprint, string $filePath) {
        return $this -> request('log_in_and_restore', [
            'fingerprint' => $fingerprint,
            'file_path' => $filePath
        ]) -> success;
    }
    
    public function logInAndSkip(int $fingerprint) {
        return $this -> request('log_in_and_skip', [
            'fingerprint' => $fingerprint
        ]) -> success;
    }
    
    public function getLoggedInFingerprint() {
        return $this -> request('get_logged_in_fingerprint') -> fingerprint;
    }

    public function getPublicKeys() {
        return $this -> request('get_public_keys') -> public_key_fingerprints;
    }
    
    public function getPrivateKey(int $fingerprint) {
        return $this -> request('get_private_key', [
            'fingerprint' => $fingerprint
        ]) -> private_key;
    }
    
    public function generateMnemonic() {
        return $this -> request('generate_mnemonic') -> mnemonic;
    }
    
    public function addKey(array $mnemonic, string $type = 'new_wallet') {
        return $this -> request('add_key', [
            'mnemonic' => $mnemonic,
            'type' => $type
        ]) -> success;
    }
    
    public function deleteKey(int $fingerprint) {
        return $this -> request('delete_key', [
            'fingerprint' => $fingerprint
        ]) -> success;
    }
    
    public function deleteAllKeys() {
        return $this -> request('delete_all_keys') -> success;
    }
    
    public function getSyncStatus() {
        $resp = $this -> request('get_sync_status');
        unset($resp -> success);
        return $resp;
    }
    
    public function getHeightInfo() {
        return $this -> request('get_height_info') -> height;
    }
    
    public function getNetworkInfo() {
        $resp = $this -> request('get_network_info');
        unset($resp -> success);
        return $resp;
    }
    
    public function getWallets() {
        return $this -> request('get_wallets') -> wallets;
    }
    
    public function getWalletBalance(int $walletId) {
        return $this -> request('get_wallet_balance', [
            'wallet_id' => $walletId
        ]) -> wallet_balance;
    }
    
    public function getTransaction(string $transactionId) {
        $resp = $this -> request('get_transaction', [
            'transaction_id' => $transactionId
        ]);
        unset($resp -> success);
        return $resp;
    }
    
    public function getTransactions(int $walletId, int $start = NULL, int $end = NULL, string $sortKey = NULL, bool $reverse = false) {
        $payload = [
            'wallet_id' => $walletId,
            'reverse' => $reverse
        ];
        
        if($start !== NULL) $payload['start'] = $start;
        if($end !== NULL) $payload['end'] = $end;
        if($sortKey !== NULL) $payload['sort_key'] = $sortKey;
        
        return $this -> request('get_transactions', $payload) -> transactions;
    }
    
    public function getTransactionCount(int $walletId) {
        return $this -> request('get_transaction_count', [
            'wallet_id' => $walletId
        ]) -> count;
    }
    
    public function getNextAddress(int $walletId, bool $newAddress = true) {
        return $this -> request('get_next_address', [
            'wallet_id' => $walletId,
            'new_address' => $newAddress
        ]) -> address;
    }
    
    public function sendTransaction(int $walletId, string $address, string $amount, string $fee) {
        $resp = $this -> request('send_transaction', [
            'wallet_id' => $walletId,
            'address' => $address,
            'amount' => $amount,
            'fee' => $fee
        ]);
        unset($resp -> success);
        return $resp;
    }
    
    public function getFarmedAmount() {
        $resp = $this -> request('get_farmed_amount');
        unset($resp -> success);
        return $resp;
    }
}

?>