<?php

namespace App\Http\Controllers;
use App\Models\Board;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;

class AdminBoardController extends Controller
{

    public function index()
    {
        $boards = Board::all();

        return view('admin.board.index', compact('boards'));
    }

    public function create()
    {
        return view('admin.board.create');
    }
    public function store(Request $request)
    {
        //dd($request->nationality);
        $request->validate([
            'board_Name'  => 'required|unique:boards',
        ]);

        $board = new Board();

        $board->board_Name = $request->board_Name;
        $board->save();

        if($board){
            return redirect('admin/board')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $board = Board::findOrFail($id);
        return view('admin.board.edit', compact('board'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'board_Name'  => 'required',
        ]);

        $update = [

            'board_Name' => $request->board_Name,


        ];

        Board::where('pk_board_Id',$request->id)->update($update);

        return redirect('admin/board')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $national = Board::where('pk_board_Id',$id);
        $national->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}
