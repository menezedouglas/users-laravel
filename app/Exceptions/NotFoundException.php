<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class NotFoundException extends Exception
{

    /**
     * The error message
     *
     * @var string
     */
    protected $message;

    /**
     * Constructor method
     *
     * @param string $message
     */
    public function __construct(string $message = 'Not Found')
    {
        parent::__construct();

        $this->message = $message;
    }

    /**
     * Generate error response
     *
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'error' => $this->message
        ], 404);
    }

}
