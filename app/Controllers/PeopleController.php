<?php

namespace App\Controllers;

use App\Models\NIS;
use App\Models\People;

class PeopleController extends Controller
{
    public function index()
    {
        $data = People::all();
        $this->view('people/index', [ 'users' => $data]);
    }

    public function show($data = null)
    {
        $register = filter_input(INPUT_GET, 'r') ?? false;

        if (is_numeric($data)) {
            $userOwnerNIS = People::findByNIS($data);
            $this->view('people/show', ['user' => $userOwnerNIS, 'register' => $register]);
        }
    }

    public function store()
    {
        $data = filter_input(INPUT_POST, 'data');

        if (empty($data)) {
            redirect('');
        }

        $user = $this->findOrCreate($data);

        $register =  isset($user['register']) ? '?r=true' : '';
        redirect('people/show/'. $user['nis'] . $register);
    }

    private function findOrCreate($data)
    {
        if ($user = $this->verifyByNIS($data)) {
            return $user;
        }

        if ($user = $this->verifyByName($data)) {
            return $user;
        }

        return $this->create($data);
    }

    private function verifyByNIS($data)
    {
        $data = str_replace(['.','-'], '', $data);
        if (is_numeric($data)) {
            $user = People::findByNIS($data);
            if ($user) {
                return $user;
            }
        }

        return false;
    }

    private function verifyByName($data)
    {
        $user = People::findByName(strtoupper($data));
        if ($user) {
            return $user;
        }

        return false;
    }

    private function create($data)
    {
        do {
            $nis = NIS::generate();
            if (!People::existsByNIS($nis)) {
                $user = People::create([
                    'name' => strtoupper($data),
                    'nis' => $nis
                ]);
            }
        } while (empty($user));

        $user['register'] = true;
        return $user;
    }
}
