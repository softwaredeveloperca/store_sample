<?php

#namespace App\Specs;
namespace AppBundle\Specs;

use AppBundle\Entity\Products;

describe('ProductsController', function() {
    given('productscontroller', function() {
	return new ProductsController();
    });

    describe('instance', function () {
        it('return "Bar" instance', function () {
            expect($this->productscontroller)->toBeAnInstanceOf(ProductsController::class);
        });
    });
    describe('->getProductsAction', function () {
        it('return "$param processed" string', function () {
            $param = 'foo';
            $expected = array();
            allow(Dependency::class)->toReceive('')
                                    ->andReturn($expected);
            
            $result = $this->bar->process($param);
            expect($result)->toBe($expected);
        });
    });
});
