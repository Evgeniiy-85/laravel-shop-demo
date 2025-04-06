<?php

namespace App\Livewire;
use Livewire\Component;

class Filter extends Component {
    public string $filter_name;
    public string $model;
    public string $model_field;
    public object $list;
    public $model_id;

    public function filter(int $model_id) {
        $this->model_id = $model_id;
        $this->dispatch('updateFilterList', $this->model, $model_id ? [
            $this->model_field => $model_id
        ] : null);
    }

    public function render() {
        return view('livewire.filter', [
            'filter_name' => $this->filter_name,
            'model' => $this->model,
            'list' => $this->list,
        ]);
    }
}
