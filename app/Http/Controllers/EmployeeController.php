<?php

namespace App\Http\Controller;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $EmpID = [
        1 => [
            'EmpNumber' => 4190271,
            'FirstName' => 'Ernesto III',
            'LastName' => 'Cunanan',
            'Birthday' => '04/05/2001',
            'Gender' => 'Male'
        ],

        2 => [
            'EmpNumber' => 4190271,
            'FirstName' => 'Ernesto Jr.',
            'LastName' => 'Cunanan',
            'Birthday' => '04/23/2001',
            'Gender' => 'Male'            
        ],

        3 => [
            'EmpNumber' => 4190271,
            'FirstName' => 'Ernesto Sr.',
            'LastName' => 'Cunanan',
            'Birthday' => '12/19/1942',
            'Gender' => 'Male'
        ]
    ];

    public function index()
    {
        return view('Employee.index', ['EmpID' => $this -> EmpID]);
    }

    public function show($id)
    {
        abort_if(!(isset($this -> EmpID)), 404);
        return view('Employee.show', ['Employee' => $this -> EmpID($id)]);
    }

    public function create()
    {
        return view('Employee.create');
    }

    public function store(Request $request)
    {
        $EmpNumber = Request() -> input('EmployeeNumber');
        $FirstName = Request() -> input('FirstName');
        $LastName = Request() -> input('LastName');
        $Birthday = Request() -> input('Birthday');
        $Gender  = Request() -> input('Gender');
        $EmpID = [
            'EmpNumber' => $EmpNumber,
            'FirstName' => $FirstName,
            'LastName' => $LastName,
            'Birthday' => $Birthday,
            'Gender' => $Gender
        ];
        return view('Employee.store', ['Employee' => $this -> EmpID($id)]);
    }

    public function destroy($id)
    {
        $this -> EmpID[$id] -> delete();
        return view('Employee.store', ['Employee' => $this -> EmpID]);
    }

    public function birthday($mm, $dd, $yyyy)
    {
        $date = date('M/D/Y', mktime(0,0,0, $mm,$dd,$yyyy));
        return view('Employee.birthday', ['Employee' => $this -> EmpID], ['date' => $date]);
    }


}