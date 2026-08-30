<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [PageController::class, 'about'])->name('about');

// Categories (products landing: show categories first)
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [ProductController::class, 'indexByCategory'])->name('categories.products');
// Products: nav "Products" -> categories page; then products by category
Route::get('/products', [CategoryController::class, 'index'])->name('products.index');
Route::get('/products/category/{category}', [ProductController::class, 'indexByCategory'])->name('products.by_category');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('products.show');

// Project routes
Route::resource('projects', ProjectController::class);

// Contact routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Client routes
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

// Catalog (PDFs)
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

// Gallery (images)
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

// Language switching route
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

Route::get('/mail-test', function () {
    try {
        $to = config('mail.contact_to', 'info@alrashed-safety.com');

        Mail::raw(
            'SMTP test from Laravel at '.now()->toDateTimeString(),
            function ($mail) use ($to) {
                $mail->to($to)->subject('Alrashed Safety SMTP Test');
            }
        );

        return response(
            'OK: mail accepted by SMTP for '.$to
            .' (host='.config('mail.mailers.smtp.host')
            .', port='.config('mail.mailers.smtp.port').'). Check Inbox and Junk.',
            200,
            ['Content-Type' => 'text/plain; charset=UTF-8']
        );
    } catch (\Throwable $e) {
        return response(
            'FAIL: '.$e->getMessage()
            ."\nhost=".config('mail.mailers.smtp.host')
            ."\nport=".config('mail.mailers.smtp.port')
            ."\nuser=".config('mail.mailers.smtp.username')
            ."\nfrom=".config('mail.from.address'),
            200,
            ['Content-Type' => 'text/plain; charset=UTF-8']
        );
    }
});

Route::get('/clear-cache', function () {
    $messages = [];

    try {
        $hotFile = public_path('hot');
        if (is_file($hotFile)) {
            @unlink($hotFile);
            $messages[] = 'Removed public/hot';
        }

        Artisan::call('optimize:clear');
        $messages[] = 'optimize:clear OK';

        Artisan::call('config:clear');
        $messages[] = 'config:clear OK';

        // Do not run view:cache here — Filament views break it on shared hosting.
        Artisan::call('view:clear');
        $messages[] = 'view:clear OK';

        Artisan::call('cache:clear');
        $messages[] = 'cache:clear OK';
    } catch (\Throwable $e) {
        $messages[] = 'ERROR: '.$e->getMessage();
    }

    return response(implode("\n", $messages), 200, [
        'Content-Type' => 'text/plain; charset=UTF-8',
    ]);
});

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return "Storage link created successfully.";
});
