<?php

namespace App\Http\Controllers;

use App\Quotation;
use Illuminate\Http\Request;
use App\Http\Requests\VigenereRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\Video;

class PagesController extends Controller
{
    /**
     * Home page
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        $movies = Product::where('type', 'MOVIE')->orderBy(\DB::raw('RAND()'))->take(5)->get();
        $series = Product::where('type', 'SERIES')->orderBy(\DB::raw('RAND()'))->take(5)->get();
        $animes = Product::where('type', 'ANIME')->orderBy(\DB::raw('RAND()'))->take(5)->get();
        $videos = Product::where('type', 'VIDEO')->orderBy(\DB::raw('RAND()'))->take(5)->get();
        $games  = Product::where('type', 'GAME')->orderBy(\DB::raw('RAND()'))->take(5)->get();

        return view('pages.index', compact('movies', 'series', 'animes', 'videos', 'games'))
            ->with('title', 'Home')
            ->with('heading', 'Welcome');
    }

    /**
     * Display vigenere.
     *
     * @return \Illuminate\Http\Response
     */
    public function vigenere()
    {
        return view('tools.vigenere')
            ->with('title', 'Vigenère Cipher - By XByte')
            ->with('heading', 'Vigenère Cipher - By XByte');
    }

    /**
     * Do vigenere.
     *
     * @return \Illuminate\Http\Response
     */
    public function vigenereAction(VigenereRequest $request)
    {
        // validate request further
        if (($request->encrypt && $request->decrypt))
            redirect()->back()->withErrors(['msg' => 'Error processing the request']);

        // encrypt
        if ($request->encrypt)
        {
            $code = $this->encrypt($request->password, $request->box);
            session()->flash('flash_message', 'Text encrypted successfully.');
        }

        // decrypt
        if ($request->decrypt)
        {
            $code = $this->decrypt($request->password, $request->box);
            session()->flash('flash_message', 'Code decrypted successfully.');
        }

        $request->flashExcept(['box']);

        return view('tools.vigenere')
            ->with('title', 'Vigenère Cipher - By XByte')
            ->with('heading', 'Vigenère Cipher - By XByte')
            ->with('code', $code);
    }

    /**
     * encrypt the text given
     *
     * @return string
     */
    function encrypt($pswd, $text)
    {
        // change key to lowercase for simplicity
        $pswd = strtolower($pswd);
        
        // intialize variables
        $code = "";
        $ki = 0;
        $kl = strlen($pswd);
        $length = strlen($text);
        
        // iterate over each line in text
        for ($i = 0; $i < $length; $i++)
        {
            // if the letter is alpha, encrypt it
            if (ctype_alpha($text[$i]))
            {
                // uppercase
                if (ctype_upper($text[$i]))
                {
                    $text[$i] = chr(((ord($pswd[$ki]) - ord("a") + ord($text[$i]) - ord("A")) % 26) + ord("A"));
                }
                
                // lowercase
                else
                {
                    $text[$i] = chr(((ord($pswd[$ki]) - ord("a") + ord($text[$i]) - ord("a")) % 26) + ord("a"));
                }
                
                // update the index of key
                $ki++;
                if ($ki >= $kl)
                {
                    $ki = 0;
                }
            }
        }
        
        // return the encrypted code
        return $text;
    }

    /**
     * decrypt the code given
     *
     * @return string
     */
    function decrypt($pswd, $text)
    {
        // change key to lowercase for simplicity
        $pswd = strtolower($pswd);
        
        // intialize variables
        $code = "";
        $ki = 0;
        $kl = strlen($pswd);
        $length = strlen($text);
        
        // iterate over each line in text
        for ($i = 0; $i < $length; $i++)
        {
            // if the letter is alpha, decrypt it
            if (ctype_alpha($text[$i]))
            {
                // uppercase
                if (ctype_upper($text[$i]))
                {
                    $x = (ord($text[$i]) - ord("A")) - (ord($pswd[$ki]) - ord("a"));
                    
                    if ($x < 0)
                    {
                        $x += 26;
                    }
                    
                    $x = $x + ord("A");
                    
                    $text[$i] = chr($x);
                }
                
                // lowercase
                else
                {
                    $x = (ord($text[$i]) - ord("a")) - (ord($pswd[$ki]) - ord("a"));
                    
                    if ($x < 0)
                    {
                        $x += 26;
                    }
                    
                    $x = $x + ord("a");
                    
                    $text[$i] = chr($x);
                }
                
                // update the index of key
                $ki++;
                if ($ki >= $kl)
                {
                    $ki = 0;
                }
            }
        }
        
        // return the decrypted text
        return $text;
    }
}
