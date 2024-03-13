<?php

namespace App\Repositories;

use App\Mail\NotificationMail;
use App\Models\PasswordReset;
use App\Models\UserLocationDetail;
use Exception;
use Illuminate\Database\Query\Builder;

class UserLocationDetailRepository
{
    /**
     * This function retrieves an admin UserLocationDetail by their ID.
     *
     * @param int UserLocationDetailId The parameter `UserLocationDetailId` is an integer that represents the unique identifier of
     * the admin UserLocationDetail that we want to retrieve from the database.
     *
     * @return A UserLocationDetail with the given ID is being returned. However, the `first()` method is unnecessary
     * since `find()` already returns a single model instance. So, the corrected code would be:
     */
    public function getUserLocationDetailById(int $UserLocationDetailId)
    {
        return UserLocationDetail::find($UserLocationDetailId);
    }

    public function getAllUserLocationDetail()
    {
        return UserLocationDetail::with(['UserLocationDetail', 'user'])->get();
    }

    public function searchUserLocationDetails($search)
    {
        return UserLocationDetail::with(['UserLocationDetail' => function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
        }, 'user'])
        ->paginate(2);
    
    }
    /**
     * This function creates an admin UserLocationDetail.
     *
     * @param array $UserLocationDetailDetails The parameter `UserLocationDetailDetails` is an array that contains the details of
     * the admin UserLocationDetail that we want to create.
     *
     * @return The created UserLocationDetail is being returned.
     */
    public function createUserLocationDetail(array $UserLocationDetailDetails)
    {

        $UserLocationDetail = UserLocationDetail::create($UserLocationDetailDetails);
        return $UserLocationDetail;
    }

    /**
     * This function updates a UserLocationDetail.
     *
     * @param int $UserLocationDetailId The parameter `UserLocationDetailId` is an integer that represents the unique identifier of
     * the admin UserLocationDetail that we want to update.
     *
     * @param array $UserLocationDetailDetails The parameter `UserLocationDetailDetails` is an array that contains the details of
     * the admin UserLocationDetail that we want to update.
     *
     * @return The updated UserLocationDetail is being returned.
     */
    public function updateUserLocationDetail(int $UserLocationDetailId, array $UserLocationDetailDetails)
    {
        $UserLocationDetail = UserLocationDetail::findOrFail($UserLocationDetailId);
        $UserLocationDetail->update($UserLocationDetailDetails);
        return $UserLocationDetail;
    }

    /**
     * This function deletes a UserLocationDetail.
     *
     * @param int $UserLocationDetailId The parameter `UserLocationDetailId` is an integer that represents the unique identifier of
     * the admin UserLocationDetail that we want to delete.
     *
     * @return A boolean value is being returned.
     */
    public function deleteUserLocationDetailById(int $UserLocationDetailId)
    {
        $UserLocationDetail = UserLocationDetail::find($UserLocationDetailId);
        $UserLocationDetail->delete();
        return true;
    }
}
