<?php

namespace App\Http\Controllers;

use App\Card;
use App\Http\Requests\StoreCardRequest;
use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(StoreCardRequest $request)
    {
        $card = Card::create([
            'name' => $request->cardName,
            'user_id' => $request->user()->id,
        ]);
        foreach ($request->name as $name) {
            Player::create([
                'card_id' => $card->id,
                'name' => $name,
            ]);
        }
        return redirect()->route();
    }
    public function index()
    {
       $cards = Auth::user()->cards;

       return view('overview', compact('cards'));
    }

    public function show(Card $card)
    {
        return view('card', compact('card'));
    }
}
