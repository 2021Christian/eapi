<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // limito los campos que devuelvo en el JSON
        return [
            'name' => $this->name,
            'description' => $this->detail,
            'price' => $this->price,
            'stock' => $this->stock == 0 ? 'Sin Stock' : $this->stock,
            'discount' => $this->discount,
            // creo un campo con el precio final (precio*descuento)
            'totalPrice' => round((1 - ($this->discount/100)) * $this->price,2),

            // genero el rating del producto con las stars de los reviews
            // si hay al menos 1 review hago el promedio
            'rating' => $this->reviews->count() > 0
                ? round( $this->reviews->sum('star') / $this->reviews->count(), 2 ) : 'Sin calificaciones.',

            // genero el link a los reviws de ese producto
            'href' => [
                'reviews' => route('reviews.index', $this->id)
            ]
        ];
    }
}
