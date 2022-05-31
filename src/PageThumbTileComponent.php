<?php

namespace Quarterloop\PageThumbTile;

use Livewire\Component;

class PageThumbTileComponent extends Component
{

    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }


    public function render()
    {

        return view('dashboard-page-thumb-tile::tile', [
            'website'         => config('dashboard.tiles.hosting.url'),

            'lastUpdateTime'  => date('H:i:s', strtotime($w3cValidatorStore->getLastUpdateTime())),
            'lastUpdateDate'  => date('d.m.Y', strtotime($w3cValidatorStore->getLastUpdateDate())),
        ]);
    }
}
