<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class create_product extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create_product {subcategory_id} {name} {price} {slug}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create product in subcategory usage
                             admin:create_product {subcategory_id} {name} {price} {slug} ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $product = Product::create([
            'name'=>$this->argument('name'),
            'slug' => $this->argument('slug'),
            'subcategory_id'=>$this->argument('subcategory_id')
        ]);
    }
}
