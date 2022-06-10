<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;

class TodoListController extends Controller
{
    public function index() 
    {
        #return view('todolist', ['listItems' => ListItem::where('is_complete', 0)->get()]);
        return view('todolist', ['listItems' => ListItem::all()]); // passing saved items from saveItem to this view on /todolist page
    }

    public function completed($id)
    {
        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();
        return redirect('todolist');
        #return view('todolist', ['listItems'=>ListItem::all()]);
    }

    public function saveItem(Request $request) // request is everything that is passed through from form to endpoint
    {
        // \Log::info(json_encode($request->all()));
        $newListItem = new ListItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_complete = 0;
        $newListItem->save();

        return redirect('todolist');
        #return view('todolist', ['listItems' => ListItem::all()]);
    }
}
