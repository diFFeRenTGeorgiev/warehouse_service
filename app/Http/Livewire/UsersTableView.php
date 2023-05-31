<?php

namespace App\Http\Livewire;

use App\Models\Product;
use LaravelViews\Views\TableView;
use LaravelViews\Facades\Header;

class UsersTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Product::class;

    protected $paginate = 10;
    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('id')->width('20%'),
            Header::title('Name')->width('20%'),
            Header::title('type')->width('100px'),
            Header::title('Created')->width('100px'),
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->id,
            $model->product_type,
            $model->type,
            $model->created_at,
        ];
    }

    public function renderTable($model){
        $models = $model->where('id','>',95)->get();

        $this->row($models);
    }
}
