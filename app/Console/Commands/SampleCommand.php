<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class SampleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sample';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Basic Test command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $product = Product::findOrFail(1);
        $this->info($product->name);

        $vendors = $product->vendors;
        foreach ($vendors as $vendor) {
            $this->info("-> Sold by {$vendor->name} | {$vendor->pivot->id}");
        }

        $vendorsWithProducts = $product->vendorsWithProducts;
        foreach ($vendorsWithProducts as $vendor) {
            $this->info("-> {$vendor->name} | {$vendor->pivot->id}");
        }

        return 0;
    }
}
