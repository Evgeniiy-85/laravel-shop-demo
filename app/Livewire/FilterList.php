<?php

namespace App\Livewire;
use Livewire\Component;

class FilterList extends Component {
    public object|null $list;
    public string $include;
    public string $model;

    protected $listeners = [
        'updateFilterList'
    ];

    public function updateFilterList($model, $filter) {
        $this->list = $model::getListByFilter($filter);
    }

    public function render() {
        return view('livewire.filter-list', [
            'list' => $this->list,
            'include' => $this->include,
        ]);
    }
}
