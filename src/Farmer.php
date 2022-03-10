<?php

namespace BPX;

use BPX\Utils\RPCClient;

class Farmer extends RPCClient {
    public function getSignagePoint(string $spHash) {
        $resp = $this -> request('get_signage_point', [
            'sp_hash' => $spHash
        ]);
        unset($resp -> success);
        return $resp;
    }
    
    public function getSignagePoints() {
        return $this -> request('get_signage_points') -> signage_points;
    }
    
    public function getRewardTargets(bool $searchForPrivateKey) {
        $resp = $this -> request('get_reward_targets', [
            'search_for_private_key' => $searchForPrivateKey
        ]);
        unset($resp -> success);
        return $resp;
    }
    
    public function setRewardTargets(string $farmerTarget = NULL, string $poolTarget = NULL) {
        $payload = [];
        if($farmerTarget !== NULL) $payload['farmer_target'] = $farmerTarget;
        if($poolTarget !== NULL) $payload['pool_target'] = $poolTarget;                  
        return $this -> request('set_reward_targets', $payload) -> success;
    }
    
    public function getPoolState() {
        return $this -> request('get_pool_state') -> pool_state;
    }
    
    public function setPayoutInstructions(string $launcherId, string $payoutInstructions) {
        $resp = $this -> request('set_payout_instructions', [
            'launcher_id' => $launcherId,
            'payout_instructions' => $payoutInstructions
        ]);
        unset($resp -> success);
        return $resp;
    }
    
    public function getHarvesters() {
        return $this -> request('get_harvesters') -> harvesters;
    }
    
    public function getPoolLoginLink(string $launcherId) {
        return $this -> request('get_pool_login_link', [
            'launcher_id' => $launcherId,
        ]) -> login_link;
    }
}

?>