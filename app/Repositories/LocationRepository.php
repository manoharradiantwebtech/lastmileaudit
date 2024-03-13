<?php

namespace App\Repositories;

use App\Mail\NotificationMail;
use App\Models\PasswordReset;
use App\Models\Location;
use App\Models\UserLocationDetail;
use Exception;
use Illuminate\Database\Query\Builder;

class LocationRepository
{
    /**
     * This function retrieves an admin Location by their ID.
     *
     * @param int LocationId The parameter `LocationId` is an integer that represents the unique identifier of
     * the admin Location that we want to retrieve from the database.
     *
     * @return A Location with the given ID is being returned. However, the `first()` method is unnecessary
     * since `find()` already returns a single model instance. So, the corrected code would be:
     */
    public function getLocationById(int $LocationId)
    {
        return UserLocationDetail::with(['location', 'user'])
        ->where('location_id', $LocationId)
        ->get()[0];
    }

    public function getAllLocation()
    {
        return Location::all();
    }

    public function searchLocations($search)
    {
        return UserLocationDetail::with(['location' => function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
        }, 'user'])
        ->doesntHave('sub_location') // Include records where sub_location is null
        ->paginate(2);
    
    }
    /**
     * This function creates an admin Location.
     *
     * @param array $LocationDetails The parameter `LocationDetails` is an array that contains the details of
     * the admin Location that we want to create.
     *
     * @return The created Location is being returned.
     */
    public function createLocation(array $LocationDetails)
    {
        $Location = Location::create($LocationDetails);
        return $Location;
    }

    /**
     * This function updates a Location.
     *
     * @param int $LocationId The parameter `LocationId` is an integer that represents the unique identifier of
     * the admin Location that we want to update.
     *
     * @param array $LocationDetails The parameter `LocationDetails` is an array that contains the details of
     * the admin Location that we want to update.
     *
     * @return The updated Location is being returned.
     */
    public function updateLocation(int $LocationId, array $LocationDetails)
    {
        $Location = Location::findOrFail($LocationId);
        $Location->update($LocationDetails);
        return $Location;
    }

    /**
     * This function deletes a Location.
     *
     * @param int $LocationId The parameter `LocationId` is an integer that represents the unique identifier of
     * the admin Location that we want to delete.
     *
     * @return A boolean value is being returned.
     */
    public function deleteLocationById(int $LocationId)
    {
        $Location = Location::find($LocationId);
        $Location->delete();
        return true;
    }
}
