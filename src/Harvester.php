<?php

namespace BPX;

use BPX\Utils\RPCClient;

class Harvester extends RPCClient {
    public function getPlots() {
        $resp = $this -> request('get_plots');
        unset($resp -> success);
        return $resp;
    }
    
    public function refreshPlots() {
        return $this -> request('refresh_plots') -> success;
    }
    
    public function deletePlot(string $filename) {
        return $this -> request('delete_plot', [
            'filename' => $filename
        ]) -> success;
    }
    
    public function addPlotDirectory(string $dirname) {
        return $this -> request('add_plot_directory', [
            'dirname' => $dirname
        ]) -> success;
    }
    
    public function getPlotDirectories() {
        return $this -> request('get_plot_directories') -> directories;
    }
    
    public function removePlotDirectory(string $dirname) {
        return $this -> request('remove_plot_directory', [
            'dirname' => $dirname
        ]) -> success;
    }
}

?>