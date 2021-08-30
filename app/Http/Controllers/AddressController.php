<?php

namespace App\Http\Controllers;

use App\Exceptions\ErrorOccurredException;
use App\Exceptions\NotFoundException;

use App\Http\Resources\DefaultResource;

use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return DefaultResource
     * @throws ErrorOccurredException
     */
    public function index(): DefaultResource
    {
        try {
            return new DefaultResource(
                Address::all()
            );
        } catch (\Exception $error) {
            throw new ErrorOccurredException(
                $error->getMessage()
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return DefaultResource
     * @throws ErrorOccurredException
     */
    public function show(int $id): DefaultResource
    {
        try {
            if(!$address = Address::find($id))
                throw new NotFoundException();

            return new DefaultResource(
                $address
            );
        } catch (\Exception $error) {
            throw new ErrorOccurredException(
                $error->getMessage(),
                method_exists($error, 'getStatusCode') ?
                    $error->getStatusCode() : 500
            );
        }
    }
}
