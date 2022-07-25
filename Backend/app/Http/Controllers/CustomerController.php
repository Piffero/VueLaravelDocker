<?php

namespace App\Http\Controllers;

use App\modals\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $rows = [];
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp = Customer::paginate(10);
        return json_encode($emp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emp = new Customer;
        $emp->CustomerFirstName = $request->input('first_name');
        $emp->CustomerLastName = $request->input('last_name');
        $emp->CustomerEmail = $request->input('email');
        $emp->CustomerGender = $request->input('gender');
        $emp->CustomerIpAddress = $request->input('ip_address');
        $emp->CustomerCompany = $request->input('company');
        $emp->CustomerCity = $request->input('city');
        $emp->CustomerTitle = $request->input('title');
        $emp->CustomerWebSite = $request->input('website');
        
        if($emp->save()) {
            return Response::json(array('success' => true, 'data' => ['id', $emp->id]), 200);
        };

        return Response::json(array('error' => true, 'message' => 'Ocorreu um erro ao processar seus dados'), 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $customerId
     * @return \Illuminate\Http\Response
     */
    public function show(int $customerId)
    {
        $emp = Customer::find($customerId);
        if ($emp) {
            return json_encode($emp);
        }

        return Response::json(array('success' => true, 'message' => 'Customer not found'), 200); // temporary error
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer $customerId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Integer $customerId)
    {
        $emp = Customer::find($customerId);
        $emp->CustomerFirstName = $request->input('first_name');
        $emp->CustomerLastName = $request->input('last_name');
        $emp->CustomerEmail = $request->input('email');
        $emp->CustomerGender = $request->input('gender');
        $emp->CustomerIpAddress = $request->input('ip_address');
        $emp->CustomerCompany = $request->input('company');
        $emp->CustomerCity = $request->input('city');
        $emp->CustomerTitle = $request->input('title');
        $emp->CustomerWebSite = $request->input('website');
        
        if($emp->save()) {
            return Response::json(array('success' => true, 'data' => ['id', $emp->id]), 200);
        };

        return Response::json(array('error' => true, 'message' => 'Ocorreu um erro ao processar seus dados'), 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer  $customerId
     * @return \Illuminate\Http\Response
     */
    public function destroy(Integer $customerId)
    {
        $emp = Task::findOrfail($id);
        $emp->delete();

        return $this->index();
    }

    /**
     * Upload file a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $path = $request->file('file')->getRealPath();
        $records = array_map('str_getcsv', file($path));

        if (! count($records) > 0) {
            return Response::json(array('error' => true, 'message' => 'O arquivo não possui linhas para registro'), 404);
        }

        // Get field names from header column
        $fields = array_map('strtolower', $records[0]);

        // Remove the header column
        array_shift($records);

        foreach ($records as $record) {
            if (count($fields) != count($record)) {
                return Response::json(array('error' => true, 'message' => 'O arquivo csv enviado invalido, não possui cabeçalho.'), 404);;
            }

            // Decode unwanted html entities
            $record =  array_map("html_entity_decode", $record);

            // Set the field name as key
            $record = array_combine($fields, $record);

            // Get the clean data
            $this->rows[] = $this->clear_encoding_str($record);
        }

        foreach($this->rows as $row) {
            Customer::create([
                'CustomerFirstName' => $row['first_name'],
                'CustomerLastName' => $row['last_name'],
                'CustomerEmail' => $row['email'],
                'CustomerGender' => $row['gender'],
                'CustomerIpAddress' => $row['ip_address'],
                'CustomerCompany' => $row['company'],
                'CustomerCity' => $row['city'],
                'CustomerTitle' => $row['title'],
                'CustomerWebSite' => $row['website']
            ]);
        }

        return $this->index();
    }

    private function clear_encoding_str($value)
    {
        if (is_array($value)) {
            $clean = [];
            foreach ($value as $key => $val) {
                $clean[$key] = mb_convert_encoding($val, 'UTF-8', 'UTF-8');
            }
            return $clean;
        }
        return mb_convert_encoding($value, 'UTF-8', 'UTF-8');
    }
}
