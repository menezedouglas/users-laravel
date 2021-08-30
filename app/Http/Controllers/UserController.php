<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

use App\Exceptions\{
    ErrorOccurredException,
    NotFoundException
};

use App\Http\Resources\DefaultResource;

use App\Http\Requests\User\{
    DeleteRequest,
    StoreRequest,
    UpdateRequest
};

use App\Models\{
    Address,
    City,
    State,
    User,
    UserAddress
};
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
                User::all()
            );
        } catch (\Exception $error) {
            throw new ErrorOccurredException(
                $error->getMessage()
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return DefaultResource
     * @throws ErrorOccurredException
     */
    public function store(StoreRequest $request): DefaultResource
    {
        try {

            DB::beginTransaction();

            $user = new User();
            $user['name'] = $request->input('name');
            $user['email'] = $request->input('email');
            $user['age'] = $request->input('age');
            $user->save();

            if (
                !$city = City::where([
                    'name' => $request->input('city')
                ])->first()
            ) {
                $city = new City();
                $city['name'] = $request->input('city');
                $city->save();
            }

            if (
                !$state = State::where([
                        'name' => $request->input('state'),
                        'code' => $request->input('uf')]
                )->first()
            ) {
                $state = new State();
                $state['name'] = $request->input('state');
                $state['code'] = $request->input('uf');
                $state->save();
            }

            if (
                !$address = Address::where([
                    'postal_code' => $request->input('postal_code')
                ])->first()
            ) {
                $address = new Address();
                $address['street'] = $request->input('street');
                $address['state_id'] = $state->id;
                $address['city_id'] = $city->id;
                $address['location'] = $request->input('location');
                $address['postal_code'] = $request->input('postal_code');
                $address->save();
            }

            $userAddress = new UserAddress();
            $userAddress['number'] = $request->input('number');
            $userAddress['complement'] = $request->input('complement');
            $userAddress['user_id'] = $user->id;
            $userAddress['address_id'] = $address->id;
            $userAddress->save();

            DB::commit();

            return new DefaultResource(['message' => 'success']);

        } catch (\Exception $error) {
            DB::rollBack();
            throw new ErrorOccurredException();
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
            if (!$user = User::find($id))
                throw new NotFoundException();

            return new DefaultResource($user);
        } catch (\Exception $error) {
            throw new ErrorOccurredException(
                $error->getMessage(),
                method_exists($error, 'getStatusCode') ?
                    $error->getStatusCode() : 500
            );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @return DefaultResource
     * @throws ErrorOccurredException
     */
    public function update(UpdateRequest $request): DefaultResource
    {

        try {

            DB::beginTransaction();

            $user = User::find($request->input('id'));

            $user['name'] = $request->input('name');
            $user['email'] = $request->input('email');
            $user['age'] = $request->input('age');
            $user->save();

            $userAddresses = $user->address()->get();

            foreach ($userAddresses as $userAddress) {
                $address = Address::find($userAddress->address_id);
                $city = City::find($address->city_id);
                $state = State::find($address->state_id);

                $city['name'] = $request->input('city');
                $city->save();

                $state['name'] = $request->input('state');
                $state['code'] = $request->input('uf');
                $state->save();

                $address['street'] = $request->input('street');
                $address['state_id'] = $state->id;
                $address['city_id'] = $city->id;
                $address['location'] = $request->input('location');
                $address['postal_code'] = $request->input('postal_code');
                $address->save();

                $userAddress['number'] = $request->input('number');
                $userAddress['complement'] = $request->input('complement');
                $userAddress['user_id'] = $user->id;
                $userAddress['address_id'] = $address->id;
                $userAddress->save();
            }

            DB::commit();

            return new DefaultResource(['message' => 'success']);

        } catch (\Exception $error) {
            DB::rollBack();
            throw new ErrorOccurredException();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteRequest $request
     * @return DefaultResource
     * @throws ErrorOccurredException
     */
    public function destroy(DeleteRequest $request): DefaultResource
    {
        try {
            $user = User::find($request->input('id'));

            $userAddresses = $user->address()->get();

            foreach ($userAddresses as $userAddress) {
                $userAddress->delete();
            }

            $user->delete();

            return new DefaultResource(['message' => 'success']);
        } catch (\Exception $error) {
            throw new ErrorOccurredException();
        }
    }
}
