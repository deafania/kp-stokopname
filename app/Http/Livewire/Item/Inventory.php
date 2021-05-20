<?php

namespace App\Http\Livewire\Item;

use App\Models\Databarang;
use Livewire\Component;

class Inventory extends Component
{   
    public $item, $item_detail;

    public function mounted($item)
    {
        $this->item = $item;
    }

    public function render()
    {
        return view('livewire.item.inventory');
    }

    public function openModal($id_barang)
    {
        $this->item_detail = Databarang::where('id_barang', $id_barang);
    }
}
