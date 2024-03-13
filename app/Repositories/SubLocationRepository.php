<?php

namespace App\Repositories;

use App\Mail\NotificationMail;
use App\Models\PasswordReset;
use App\Models\SubLocation;
use App\Models\UserLocationDetail;
use Exception;
use Illuminate\Database\Query\Builder;

class SubLocationRepository
{
    /**
     * This function retrieves an admin SubLocation by their ID.
     *
     * @param int SubLocationId The parameter `SubLocationId` is an integer that represents the unique identifier of
     * the admin SubLocation that we want to retrieve from the database.
     *
     * @return A SubLocation with the given ID is being returned. However, the `first()` method is unnecessary
     * since `find()` already returns a single model instance. So, the corrected code would be:
     */
    public function getSubLocationById(int $SubLocationId)
    {
        return UserLocationDetail::with(['sub_location', 'user'])
        ->where('sub_location_id', $SubLocationId)
        ->get()[0];
    }

    public function getSubLocationByLocationId($locationId)
    {
        return UserLocationDetail::with(['sub_location'])
        ->where('location_id', '=', $locationId)
        ->has('sub_location') // Only include records where sub_location is not null
        ->get()->toArray();
    }

    public function searchSubLocations($search)
    {
        return UserLocationDetail::with(['location' => function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
        }, 'user', 'sub_location'])
        ->has('sub_location') // Only include records where sub_location is not null
        ->paginate(2);
    }
    /**
     * This function creates an admin SubLocation.
     *
     * @param array $SubLocationDetails The parameter `SubLocationDetails` is an array that contains the details of
     * the admin SubLocation that we want to create.
     *
     * @return The created SubLocation is being returned.
     */
    public function createSubLocation(array $SubLocationDetails)
    {
        $SubLocation = SubLocation::create($SubLocationDetails);
        return $SubLocation;
    }

    /**
     * This function updates a SubLocation.
     *
     * @param int $SubLocationId The parameter `SubLocationId` is an integer that represents the unique identifier of
     * the admin SubLocation that we want to update.
     *
     * @param array $SubLocationDetails The parameter `SubLocationDetails` is an array that contains the details of
     * the admin SubLocation that we want to update.
     *
     * @return The updated SubLocation is being returned.
     */
    public function updateSubLocation(int $SubLocationId, array $SubLocationDetails)
    {
        $SubLocation = SubLocation::findOrFail($SubLocationId);
        $SubLocation->update($SubLocationDetails);
        return $SubLocation;
    }

    /**
     * This function deletes a SubLocation.
     *
     * @param int $SubLocationId The parameter `SubLocationId` is an integer that represents the unique identifier of
     * the admin SubLocation that we want to delete.
     *
     * @return A boolean value is being returned.
     */
    public function deleteSubLocationById(int $SubLocationId)
    {
        $SubLocation = SubLocation::find($SubLocationId);
        $SubLocation->delete();
        return true;
    }
}
