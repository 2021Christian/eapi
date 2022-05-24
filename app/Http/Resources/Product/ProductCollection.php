<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'totalPrice' => round((1 - ($this->discount/100)) * $this->price,2), // creo un campo con el precio final (precio*descuento)
            // rating del producto  = promedio stars de los reviews
            'rating' => $this->reviews->count() > 0
                ? round( $this->reviews->sum('star') / $this->reviews->count(), 2 ) : 'Sin calificaciones.',
            'discount' => $this->discount,
            'href' => [
                'link' => route('products.show', $this->id)
            ]
        ];
    }
}
