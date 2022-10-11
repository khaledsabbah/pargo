<?php


namespace App\Transformers;


use App\Contracts\ITransform;

class CurrencyTransformer implements ITransform
{
    /**
     * @param array $products
     * @return array
     */
    public static function transform($currencies): array
    {
        $transformedProducts = [];
        foreach ($currencies as $product) {
            $transformedProducts[] = [
                "name" => $product->getName(),
                "rate" => $product->getRate(),
            ];
        }
        return $transformedProducts;
    }


}
