<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class ErrorOccurredException extends Exception
{

    /**
     * The error message
     *
     * @var string
     */
    protected $message;

    /**
     * The error status code
     *
     * @var int
     */
    protected $code;

    /**
     * Constructor method
     *
     * @param string $message
     * @param int $code
     */
    public function __construct(string $message = 'An error occurred', int $code = 500)
    {
        parent::__construct();

        $this->message = $message;
        $this->code = $code;
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
        ], $this->code);
    }
}
