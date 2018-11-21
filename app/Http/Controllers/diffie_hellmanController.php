<?php

namespace App\Http\Controllers;

use App\Rules\Prime;
use Illuminate\Http\Request;

class diffie_hellmanController extends Controller
{
    public function show()
    {
        return view('result');
    }

    public function calculate(Request $request)
    {
        if ($request->prime_number)
            $q = $request->prime_number;

        else
            $q = $this->random_prime_number();

        if ($request->primitive_root)
            $a = $request->primitive_root;
        else
            $a = $this->random_primitive_root_number($q);

        if ($request->secret_key_a)
            $Xa = $request->secret_key_a;
        else
            $Xa = $this->random_secret_key($q);

        if ($request->secret_key_b)
            $Xb = $request->secret_key_b;
        else
            $Xb = $this->random_secret_key($q);

        // if the user enter prime_number the validation will be based on this value
        if ($request->prime_number){
            $validatedData = $request->validate([
                'prime_number' => ['gt:1', 'lt:1001', new Prime, 'nullable', 'numeric'],
                'primitive_root' => ['gt:0', 'lt:prime_number', 'nullable', 'numeric'],
                'secret_key_a' => ['gt:-1', 'lt:prime_number', 'nullable', 'numeric'],
                'secret_key_b' => ['gt:-1', 'lt:prime_number', 'nullable', 'numeric'],
            ]);
        }

        // if the user did not enter prime_number but inter any another field the prime_number will be required
        elseif (!$request->prime_number && ($request->primitive_root or $request->secret_key_a or $request->secret_key_b)){
            $validatedData = $request->validate([
                'prime_number' => ['bail','required','gt:1', 'lt:1001', new Prime,  'numeric'],
                'primitive_root' => ['gt:0', 'lt:'.$q, 'nullable', 'numeric'],
                'secret_key_a' => ['gt:-1', 'lt:'.$q, 'nullable', 'numeric'],
                'secret_key_b' => ['gt:-1', 'lt:'.$q, 'nullable', 'numeric'],
            ]);
        }
        else{
            // if the user did not enter prime_number or any field the validation will be based generated random key
            $validatedData = $request->validate([
                'prime_number' => ['gt:1', 'lt:1001', new Prime, 'nullable', 'numeric'],
                'primitive_root' => ['gt:0', 'lt:'.$q, 'nullable', 'numeric'],
                'secret_key_a' => ['gt:-1', 'lt:'.$q, 'nullable', 'numeric'],
                'secret_key_b' => ['gt:-1', 'lt:'.$q, 'nullable', 'numeric'],
            ]);
        }



        $public_key = $this->compute_public_key($q, $a, $Xa, $Xb);
        $Ya = $public_key['Ya'];
        $Yb = $public_key['Yb'];

        $shared_key = $this->compute_shared_key($Ya, $Yb, $Xa, $Xb, $q);
        $Ka = $shared_key['Ka'];
        $Kb = $shared_key['Kb'];

//        dd($Ya , $Yb , $Ka , $Kb);


        return view('result')->with([
            'q' => $q,
            'a' => $a,
            'Xa' => $Xa,
            'Xb' => $Xb,
            'Ya' => $Ya,
            'Yb' => $Yb,
            'Ka' => $Ka,
            'Kb' => $Kb,
        ]);
    }


// this method to check if the number is prime or not
    public function isPrime($number)
    {
        if ($number == 1)
            return 0;
        for ($i = 2; $i <= $number / 2; $i++) {
            if ($number % $i == 0)
                return 0;
        }
        return 1;
    }

// this method to generate random 'q' number
    public function random_prime_number()
    {
        while (true) {
            $rand = rand(100, 1000);
            if ($this->isPrime($rand))
                return $rand;
        }

    }

// this method to generate random 'a' number
    public function random_primitive_root_number($q)
    {
        return rand(1, $q - 1);
    }

// this method to generate random 'Xa' or 'Xb' numbers
    public function random_secret_key($q)
    {
        return rand(0, $q - 1);
    }


    public function compute_public_key($q, $a, $Xa, $Xb)
    {
        $Ya = gmp_mod(gmp_pow($a, $Xa), $q);
        $Yb = gmp_mod(gmp_pow($a, $Xb), $q);
        return [
            'Ya' => $Ya,
            'Yb' => $Yb
        ];
    }


    public function compute_shared_key($Ya, $Yb, $Xa, $Xb, $q)
    {
        $Ka = gmp_mod(gmp_pow($Yb, $Xa), $q);
        $Kb = gmp_mod(gmp_pow($Ya, $Xb), $q);
        return [
            'Ka' => $Ka,
            'Kb' => $Kb,
        ];
    }


}
