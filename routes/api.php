<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use SaltReviews\Controllers\ReviewsResourcesController;

$version = config('app.API_VERSION', 'v1');

Route::middleware(['api'])
    ->prefix("api/{$version}")
    ->group(function () {

    // API: REVIEWS RESOURCES
    Route::get("reviews", [ReviewsResourcesController::class, 'index']); // get entire collection
    Route::post("reviews", [ReviewsResourcesController::class, 'store']); // create new collection

    Route::get("reviews/trash", [ReviewsResourcesController::class, 'trash']); // trash of collection

    Route::post("reviews/import", [ReviewsResourcesController::class, 'import']); // import collection from external
    Route::post("reviews/export", [ReviewsResourcesController::class, 'export']); // export entire collection
    Route::get("reviews/report", [ReviewsResourcesController::class, 'report']); // report collection

    Route::get("reviews/{id}/trashed", [ReviewsResourcesController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+'); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("reviews/{id}/restore", [ReviewsResourcesController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+'); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("reviews/{id}/delete", [ReviewsResourcesController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+'); // hard delete collection by ID

    Route::get("reviews/{id}", [ReviewsResourcesController::class, 'show'])->where('id', '[a-zA-Z0-9-]+'); // get collection by ID
    Route::put("reviews/{id}", [ReviewsResourcesController::class, 'update'])->where('id', '[a-zA-Z0-9-]+'); // update collection by ID
    Route::patch("reviews/{id}", [ReviewsResourcesController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+'); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("reviews/{id}", [ReviewsResourcesController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+'); // soft delete a collection by ID

});
