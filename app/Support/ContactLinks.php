<?php

namespace App\Support;

use App\Models\Product;

class ContactLinks
{
    public const WHATSAPP_NUMBER = '201000864742';

    public static function whatsappUrl(?string $message = null): string
    {
        $url = 'https://wa.me/'.self::WHATSAPP_NUMBER;

        if ($message !== null && $message !== '') {
            $url .= '?text='.rawurlencode($message);
        }

        return $url;
    }

    public static function productWhatsAppMessage(Product $product): string
    {
        return __('products.whatsapp_message', ['product' => $product->getName()]);
    }

    public static function productWhatsAppUrl(Product $product): string
    {
        return self::whatsappUrl(self::productWhatsAppMessage($product));
    }

    public static function productQuoteUrl(Product $product): string
    {
        return route('contact.index', [
            'product' => $product->id,
            'intent' => 'quote',
        ]);
    }
}
