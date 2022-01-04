$cartItem2 = Cart::where([
                                    //If color is same but wants to change size and quantity
                                    ['shipping_id', '=', $request->shipping_id],
                                    ['product_id', '=', $product->id],
                                    ['color_id', '=', $request->color_id],
                                    
                                    
                                ])->first();
         $cartItem3 = Cart::where([
                                    ['shipping_id', '=', $request->shipping_id],
                                    ['product_id', '=', $product->id],
                                    ['size_id', '=', $request->size_id],
                                   
                                ])->first();
        

         elseif ($cartItem2) {
            $cartfind = Cart::find($cartItem2->id);
            $cartfind->size_id = $request->size_id;
            $cartfind->quantity = $request->quantity+$cartItem2->quantity;
            $cartfind->save();
        }
        elseif ($cartItem3) {
            $cartfind = Cart::find($cartItem3->id);
            $cartfind->color_id = $request->color_id;
            $cartfind->quantity = $request->quantity+$cartItem3->quantity;
            $cartfind->save();
        }