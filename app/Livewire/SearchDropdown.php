<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

use function Laravel\Prompts\search;

class SearchDropdown extends Component
{
    public $search;
    public $searchResult;

    public function mount()
    {
        $this->searchResult = [];
        $this->search = '';
    }

    public function render()
    {
        if (strlen($this->search) >= 2) {
            $this->searchResult = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/search/movie?query=' . $this->search)->json()['results'];
        }

        return view('livewire.search-dropdown', [
            "searchResults" => collect($this->searchResult)->take(7)
        ]);
    }
}
