<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(){
        return view("item");
    }


    public function addItem(){
        return "Item is Aded";
    }


    public function deleteItem(){
        return "Item is Deleted";
    }


    public function searchItem(){
        return "Item is Searched";
    }

    public function updateItem(){
        return "Item is Updated";
    }

    public function getAll(){
        return "Item get all is called";
    }
}
