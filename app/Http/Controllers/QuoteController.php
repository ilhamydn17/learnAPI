<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Models\Quote;
use Illuminate\Http\Request;
use App\Http\Resources\QuoteResource;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // UNTUK MENAMPILKAN SEMUA DATA DARI TABLE QUOTE MENGGUNAKAN COLLECTION CLASS
        return QuoteResource::collection(Quote::paginate(3));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuoteRequest $request)
    {
        return new QuoteResource(Quote::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quote)
    {

        return new QuoteResource($quote);
    }

    /**
     *
     *
     *
     * Update the specified resource in storage.
     */
    public function update(UpdateQuoteRequest $request, Quote $quotes)
    {
        // -> CARA PERTAMA
        // $quotes->update($request->validated());
        // return new QuoteResource($quotes);

        // -> CARA KEDUA | - BEST PRACTICE -
        return new QuoteResource(tap($quotes)->update($request->validated())); // * tap() digunakan untuk mengembalikan nilai dari $quotes
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        // Cara untuk menghapus data dengan BEST PRACTICE
        $quote->delete();
        return response()->noContent();
    }
}
