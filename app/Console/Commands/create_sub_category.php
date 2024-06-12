<?php

namespace App\Console\Commands;

use App\Models\SubCategoryItem;
use Illuminate\Console\Command;

class create_sub_category extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create_sub_category {category_id} {name} {slug}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create subcategory for category usage
                             admin:create_sub_category {category ID} name slug';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $category = SubCategoryItem::create(['name' => $this->argument('name'),
                                             'slug' => $this->argument('slug'),
                                             'category_id' => $this->argument('category_id')]);
        $this->info('subcategory id = ' .$category->id);
    }
}
