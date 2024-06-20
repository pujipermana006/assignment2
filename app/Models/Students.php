<?php

namespace App\Models;

use CodeIgniter\Model;

class Students extends Model
{
    protected $table            = 'students';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'class_id'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ["addPrefix"];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getStudentsWithClass()
    {
        return $this->select('students.*, classes.name as class_name')
                    ->join('classes', 'classes.id = students.class_id')
                    ->findAll();

                    
                
    }

    public function getStudentWithClassById($studentId)
    {
        return $this->select('students.*, classes.name as class_name')
                    ->join('classes', 'classes.id = students.class_id')
                    ->where('students.id', $studentId)
                    ->first();
    }

    public function addPrefix(array $input)
    {
        if (isset($input["data"]["name"])) {
            $input["data"]["name"] = "Student - " . $input["data"]["name"];
        }
        return $input;
    }
   
}




