<?php

namespace App\Http\Controllers;


class ContactsController extends Controller
{
    /**
     * Display the contacts index view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('contacts.index');
    }
}
