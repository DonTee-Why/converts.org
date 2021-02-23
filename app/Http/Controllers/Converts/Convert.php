<?php

namespace App\Http\Controllers\Converts;

use App\Models\Converts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables as DataTables;

class Convert extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('converts.show');
    }

    /**
     * Get a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getConverts(Request $request, Converts $convert)
    {
        //
        $data = $convert->getData();
        //$data = Converts::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $actionBtn = '<button onclick="toggleModal()" id="getEditdata" data-id="' . $data->id . '" class="bg-green-500 hover:bg-green-600 px-2 py-1.5 rounded font-bold">Edit</button>
                <button onclick="toggleDeleteModal()" id="getDeleteID" data-id="' . $data->id . '" class="bg-red-500 hover:bg-red-600 px-2 py-1.5 rounded font-bold">Delete</button>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('converts.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'known_name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
            'marital_status' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'residential_address' => 'required|string|max:255',
            'nearest_bustop' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'office_address' => 'string|max:255',
            'prayer_request' => 'required|string|max:255',
            'want_to_worship' => 'required|max:225',
            'date' => 'required|date',
        ]);

        Converts::create([
            'name' => $request->name,
            'known_name' => $request->known_name,
            'phone_no' => $request->phone_number,
            'sex' => $request->sex,
            'marital_status' => $request->marital_status,
            'age' => $request->age,
            'residential_address' => $request->residential_address,
            'nearest_bustop' => $request->nearest_bustop,
            'email' => $request->email,
            'office_address' => $request->office_address,
            'prayer_request' => $request->prayer_request,
            'want_to_worship' => $request->want_to_worship,
            'date' => $request->date,
        ]);

        return redirect()->route('register');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Converts $convert)
    {
        //
        $data = $convert->findData($id);
        if ($data->follow_up_status == 0) {
            $html = '
                <select name="follow_up_status" id="follow_up_status" class="bg-gray-200 border-l-8 border-gray-600 w-full p-3 rounded-sm">
                    <option value="0">0</option>
                    <option value="1">1</option>
                </select>
            ';
        } else {
            $html = '
                <select name="follow_up_status" id="follow_up_status" class="bg-gray-200 border-l-8 border-gray-600 w-full p-3 rounded-sm">
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select>
            ';
        }
        return response()->json(['html' => $html]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Converts $convert, $id)
    {
        //
        $this->validate($request, [
            'follow_up_status' =>'required',
        ]);

        $convert->updateData($id, $request->all());
        
        return response()->json(['success'=>'Follow-up Status updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Converts $convert)
    {
        //
        $convert->deleteData($id);

        return response()->json(['success'=>'Convert deleted successfully']);
    }
}
