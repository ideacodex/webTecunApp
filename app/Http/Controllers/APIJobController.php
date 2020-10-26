<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Job;

class APIJobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();

        if(!empty($jobs)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'jobs' => $jobs
            ];
        }else{
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'Sin trabajos por mostrar'
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);

        if(!empty($job)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'job' => $job
            ];
        }else{
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'Sin datos para mostrar'
            ];
        }

        return response()->json($data, $data['code']);
    }
}
