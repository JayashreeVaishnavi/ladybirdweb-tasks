<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrokenEggRequest;
use App\Http\Requests\PalindromeRequest;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getFizzBuzz()
    {
        $array = [];
        for ($index = 1; $index <= 20; $index++) {
            $array[] = checkModulus($index);
        }
        return view('fizz-buzz', compact('array'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function palindrome()
    {
        return view('palindrome');
    }

    /**
     * @param PalindromeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkPalindrome(PalindromeRequest $request)
    {
        try {
            $string = $request->string;
            if ($this->isPalindrome($string)) {
                return response()->json(['message' => 'The string is a palindrome']);
            }
            return response()->json(['message' => 'The string is not a palindrome']);
        } catch (\Throwable $exception) {
            return response()->json(['errors' => ['string' => ['Something went wrong']]], 500);
        }
    }

    /**
     * @param $string
     * @return bool
     */
    protected function isPalindrome($string): bool
    {
        $strrev = '';
        // Instead of looping we can also use strrev function to check palindrome.
        for ($index = (strlen($string) - 1); $index >= 0; $index--) {
            $strrev .= $string[$index];
        }
        if (strtolower($string) == strtolower($strrev)) {
            return true;
        }
        return false;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function brokenEggView()
    {
        return view('broken-egg');
    }

    /**
     * @param BrokenEggRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBrokenEggAttemptsAndFloors(BrokenEggRequest $request)
    {
        try {
            $minimumAttempts = minimumAttempts($request->eggs_count, $request->floors_count);
            return response()->json(['number_of_attempts' => $minimumAttempts]);
        } catch (\Throwable $exception) {
            return response()->json(['errors' => ['string' => ['Something went wrong']]], 500);
        }
    }
}
