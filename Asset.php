<?php

class Asset {
    public $name;
    public $type;
    public $amount;
    public $bank;
    public $account;
    public $currency;
    public $initial_value;
    public $residual_value;
    public $estimated_value;
    public $inventory_number;
    public $production_date;
    public $measure_unit;
    public $view;
    public $quantity;
    public $market_value;
    public $is_cash;
    public $cash_register;

    public function __construct($data) {
        $this->name = $data['name'];
        $this->type = $data['type'];
        
        $this->is_cash = ($this->type === 'деньги');

        if ($this->is_cash) {
            $this->amount = $data['amount'] ?? null;
            $this->bank = $data['bank'] ?? null;
            $this->account = $data['account'] ?? null;
            $this->currency = $data['currency'] ?? null;
            $this->cash_register = $data['cash_register'] ?? null;
        } else {
            $this->initial_value = $data['initial_value'] ?? null;
            $this->residual_value = $data['residual_value'] ?? null;
            $this->estimated_value = $data['estimated_value'] ?? null;
            $this->inventory_number = $data['inventory_number'] ?? null;
            $this->production_date = $data['production_date'] ?? null;
            $this->measure_unit = $data['measure_unit'] ?? null;
            $this->view = $data['view'] ?? null;
            $this->quantity = $data['quantity'] ?? null;
            $this->market_value = $data['market_value'] ?? null;
        }
    }
}
