<?php

namespace BPX;

use BPX\Utils\RPCClient;

class FullNode extends RPCClient {
    public function getBlockchainState() {
        return $this -> request('get_blockchain_state') -> blockchain_state;
    }
    
    public function getBlock(string $headerHash) {
        return $this -> request('get_block', [
            'header_hash' => $headerHash
        ]) -> block;
    }
    
    public function getBlocks(int $start, int $end, bool $excludeReorged = false) {                 
        return $this -> request('get_blocks', [
            'start' => $start,
            'end' => $end,
            'exclude_header_hash' => true,
            'exclude_reorged' => $excludeReorged
        ]) -> blocks;
    }
    
    public function getBlockRecordByHeight(int $height) {
        return $this -> request('get_block_record_by_height', [
            'height' => $height
        ]) -> block_record;
    }
    
    public function getBlockRecord(string $headerHash) {
        return $this -> request('get_block_record', [
            'header_hash' => $headerHash
        ]) -> block_record;
    }
    
    public function getUnfinishedBlockHeaders() {
        return $this -> request('get_unfinished_block_headers') -> headers;
    }
    
    public function getAllBlock(int $start, int $end) {
        return $this -> request('get_blocks', [
            'start' => $start,
            'end' => $end,
            'exclude_header_hash' => true
        ]) -> blocks;
    }
    
    public function getNetworkSpace(string $newerBlockHeaderHash, string $olderBlockHeaderHash) {
         return $this -> request('get_network_space', [
            'newer_block_header_hash' => $newerBlockHeaderHash,
            'older_block_header_hash' => $olderBlockHeaderHash
        ]) -> space;
    }
    
    public function getCoinRecordByName(string $name) {
        return $this -> request('get_coin_record_by_name', [
            'name' => $name
        ]) -> coin_record;
    }
    
    public function getCoinRecordsByPuzzleHash(string $puzzleHash, bool $includeSpentCoins = true, int $startHeight = NULL, int $endHeight = NULL) {
        $payload = [
            'puzzle_hash' => $puzzleHash,
            'include_spent_coins' => $includeSpentCoins
        ];
        if($startHeight !== NULL) $payload['start_height'] = $startHeight;
        if($endHeight !== NULL) $payload['end_height'] = $endHeight;
                               
        return $this -> request('get_coin_records_by_puzzle_hash', $payload) -> coin_records;
    }
    
    public function getAdditionsAndRemovals(string $headerHash) {
        $resp = $this -> request('get_additions_and_removals', [
            'header_hash' => $headerHash
        ]);
        unset($resp -> success);
        return $resp;
    }
    
    public function getBlocksRecords(int $start, int $end) {
        return $this -> request('get_block_records', [
            'start' => $start,
            'end' => $end
        ]) -> block_records;
    }
    
    public function pushTx(array $spendBundle) {
        return $this -> request('push_tx', [
            'spend_bundle' => $spendBundle
        ]) -> status;
    }
    
    public function getPuzzleAndSolution(string $coinId, int $height){
        return $this -> request('get_puzzle_and_solution', [
            'coin_id' => $coinId,
            'height' => $height
        ]) -> coin_solution;
    }
    
    public function getAllMempoolTxIds() {
        return $this -> request('get_all_mempool_tx_ids') -> tx_ids;
    }
    
    public function getAllMempoolItems() {
        return $this -> request('get_all_mempool_items') -> mempool_items;
    }
    
    public function getMempoolItemByTxId(string $txId) {
        return $this -> request('get_mempool_item_by_tx_id', [
            'tx_id' => $txId
        ]) -> mempool_item;
    }
    
    public function getNetworkInfo() {
        $resp = $this -> request('get_network_info');
        unset($resp -> success);
        return $resp;
    }   
}

?>