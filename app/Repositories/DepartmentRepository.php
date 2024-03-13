<?php

namespace App\Repositories;

use App\Mail\NotificationMail;
use App\Models\PasswordReset;
use App\Models\Department;
use Exception;
use Illuminate\Database\Query\Builder;

class DepartmentRepository
{
    /**
     * This function retrieves an admin Department by their ID.
     *
     * @param int DepartmentId The parameter `DepartmentId` is an integer that represents the unique identifier of
     * the admin Department that we want to retrieve from the database.
     *
     * @return A Department with the given ID is being returned. However, the `first()` method is unnecessary
     * since `find()` already returns a single model instance. So, the corrected code would be:
     */
    public function getDepartmentById(int $DepartmentId)
    {
        return Department::find($DepartmentId);
    }

    public function getAllDepartment()
    {
        return Department::with(['user'])->get();
    }

    public function searchDepartments($search)
    {
        return Department::where('name', 'like', '%' . $search . '%')->paginate(1);
        
    }
    /**
     * This function creates an admin Department.
     *
     * @param array $DepartmentDetails The parameter `DepartmentDetails` is an array that contains the details of
     * the admin Department that we want to create.
     *
     * @return The created Department is being returned.
     */
    public function createDepartment(array $DepartmentDetails)
    {
        $Department = Department::create($DepartmentDetails);
        return $Department;
    }

    /**
     * This function updates a Department.
     *
     * @param int $DepartmentId The parameter `DepartmentId` is an integer that represents the unique identifier of
     * the admin Department that we want to update.
     *
     * @param array $DepartmentDetails The parameter `DepartmentDetails` is an array that contains the details of
     * the admin Department that we want to update.
     *
     * @return The updated Department is being returned.
     */
    public function updateDepartment(int $DepartmentId, array $DepartmentDetails)
    {
        $Department = Department::findOrFail($DepartmentId);
        $Department->update($DepartmentDetails);
        return $Department;
    }

    /**
     * This function deletes a Department.
     *
     * @param int $DepartmentId The parameter `DepartmentId` is an integer that represents the unique identifier of
     * the admin Department that we want to delete.
     *
     * @return A boolean value is being returned.
     */
    public function deleteDepartmentById(int $DepartmentId)
    {
        $Department = Department::find($DepartmentId);
        $Department->delete();
        return true;
    }
}
