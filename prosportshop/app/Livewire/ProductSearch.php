<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductSearch extends Component
{
    use WithPagination;

    public $search = '';  // Campo para almacenar el término de búsqueda

    // Limitar el número de productos por página
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        // Filtrar los productos por nombre
        $products = Product::where('name', 'like', '%' . $this->search . '%')
                           ->paginate(4); // Mostrar 4 productos por página

        return view('livewire.product-search', compact('products'));
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}