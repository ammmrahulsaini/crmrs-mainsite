<?php
class Costumers
{
    /**
     *
     */
    public function __construct()
    {
    }

    /**
     *
     */
    public function __destruct()
    {
    }
    
    /**
     * Set friendly columns\' names to order tables\' entries
     */
    public function setOrderingValues()
    {
        $ordering = [
        'id' => 'ID',
        'job_title' => 'Job Title',
        'department' => 'Department',
        'vacancies' => 'Open Positions',
        'employment_type' => 'Employment Type',
        'work_mode' => 'Work Mode',
        'location' => 'Location',
        'experience' => 'Experience',
        'education' => 'Qualification',
        'salary' => 'Salary Range',
        'application_deadline' => 'Application Deadline',
        'status' => 'Status',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At'
        ];
        return $ordering;
    }
}
?>
