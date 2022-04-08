<?php

namespace App\Http\Controllers\management;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Http\Request;

class EmployementController extends Controller
{
    public function EmployeeManagement()
    {
        return view('welcome');
    }

    //Get Data 
    public function getData()
    {
        $Form = Form::get();
        if (is_null($Form)) {
            return response()->json('No data found', 403);
        }
        return response()->json(['employee' => $Form], 200);
    }

    //Add Data 
    public function addEmployee(Request $request)
    {
        $employee = Form::create($request->all());
        return response()->json($employee, 201);
    }

    //Get data by Id
    public function getEmployeeById($id)
    {
        $Form = Form::find($id);
        if (is_null($Form)) {
            return response()->json(['message' => 'Employee not Found'], 404);
        }
            return response()->json($Form::find($id), 200);
    }


    //Update Data 
    public function updateEmployee(Request $request, $id)
    {
        $employee = Form::find($id);
        if (is_null($employee)) {
        return response()->json(['message' => 'Employee Not Found'], 404);
        }

        $employee->update($request->all());
        return response($employee, 200);
    }

    //Delete Data 
    public function deleteEmployee($id)
    {
        $employee = Form::find($id);
        if (is_null($employee)) {
            return response()->json(['message' => 'Employee Not Found'], 404);
        }

        $employee->delete();
        return response()->json(null, 204);
    }
}
