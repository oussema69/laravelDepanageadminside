<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(Request $request)
{
    $searchTerm = $request->input('search');
    if ($searchTerm) {
        $clients = Client::where('nom', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('prenom', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('email', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('matricule', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('num_assurance', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('tel', 'LIKE', '%' . $searchTerm . '%')
                          ->get();
        return view('clients.index', compact('clients', 'searchTerm'));
    } else {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }
}



    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nom' => 'required',
                'prenom' => 'required',
                'email' => 'required|email|unique:clients',
                'password' => 'required|min:8',
                'matricule' => 'required|unique:clients',
                'tel' => 'required|digits:8',
                'num_assurance' => 'required'
            ]);
        } catch (ValidationException $exception) {
            return redirect()->back()->withErrors($exception->validator->getMessageBag());
            echo"non";
        }

        $client = new Client([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'matricule' => $request->get('matricule'),
            'tel' => $request->get('tel'),
            'num_assurance' => $request->get('num_assurance')
        ]);

        $client->save();
        return redirect('/clients')->with('success', 'Client has been added');
    }


    public function show($id)
    {
        $client = Client::find($id);
        return view('clients.show', compact('client'));
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:clients,email,'.$id,
            'matricule' => 'required',
            'tel' => 'required|digits:8',
            'num_assurance' => 'required'
        ]);

        $client = Client::find($id);
        $client->nom = $request->get('nom');
        $client->prenom = $request->get('prenom');
        $client->email = $request->get('email');
        if (!empty($request->get('password'))) {
            $client->password = Hash::make($request->get('password'));
        }
        $client->matricule = $request->get('matricule');
        $client->tel = $request->get('tel');
        $client->num_assurance = $request->get('num_assurance');

        $client->save();
        return redirect('/clients')->with('success', 'Client has been updated');
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();

        return redirect('/clients')->with('success', 'Client has been deleted Successfully');
    }
}

