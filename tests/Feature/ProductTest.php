<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Product;
class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function new_products_are_visible()
    {
        $product = factory(Product::class)->make();
        $this->get('/search?n='.$product->name)->assertSee($product->name);
    }
}
