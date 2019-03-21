<?php
namespace App\View\Cell;

use Cake\Collection\Collection;
use Cake\Datasource\ConnectionManager;
use Cake\View\Cell;
use ResultManager\Controller\Component\CalculateComponent;

/**
 * StudentAcademicProfile cell
 */
class StudentAcademicProfileCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($data)
    {
       $report = ConnectionManager::get('default')->execute('SELECT  * FROM results INNER JOIN subjects ON subjects.id = subject_id WHERE student_id = ?',[$data])->fetchAll('assoc');


        for($i = 0; $i < count($report); $i++){
            $subjects[$report[$i]['name']][] = ($report[$i]['exam']+$report[$i]['ca_1']+$report[$i]['ca_2']+$report[$i]['ca_3']+$report[$i]['ca_4']+$report[$i]['ca_5']+$report[$i]['ca_6']+$report[$i]['ca_7']+$report[$i]['ca_8']+$report[$i]['ca_9']+$report[$i]['ca_10']) ;
            $options['school_class_id'] = $report[$i]['school_class_id'];
            $options['session'] = $report[$i]['session'];
            $options['term'] =$report[$i]['term'];
            $options['subject_id'] = $report[$i]['subject_id'];
            $average[$report[$i]['session']][$report[$i]['name']][$this->SubjectAverage($options)] = $report[$i]['term'].':'.($report[$i]['exam']+$report[$i]['ca_1']+$report[$i]['ca_2']+$report[$i]['ca_3']+$report[$i]['ca_4']+$report[$i]['ca_5']+$report[$i]['ca_6']+$report[$i]['ca_7']+$report[$i]['ca_8']+$report[$i]['ca_9']+$report[$i]['ca_10']) ;

        }
        $this->set('average',$average);
       $this->set('subjects',$subjects);
    }
    /**
     * Return subject average
     * Total subject score / student who sat for the exam and test
     *@param array $options query options
     * @return int course average
     */
    public function SubjectAverage($options){
        $average =   ConnectionManager::get('default')->execute("SELECT SUM(exam+ca_1+ca_2+ca_3+ca_4+ca_5+ca_6+ca_7+ca_8+ca_9+ca_10) as total_score FROM results Results WHERE Results.school_class_id = :class AND session = :session AND term = :term AND subject_id = :subject AND exam != 0 ",
            [ 'class'=>$options['school_class_id'],'session'=>$options['session'],'term'=>$options['term'],'subject'=>$options['subject_id']
            ])->fetch('assoc');


        return $average['total_score'] != 0 ? floor($average['total_score']/$this->totalSatForExam($options)) : 0;
    }
    public function totalSatForExam($options) {
        $total_attendance = ConnectionManager::get('default')->execute("SELECT count(*) as total_attendance FROM `results` where  session = :session and term = :term and school_class_id = :class and subject_id = :subject ",
            [ 'class'=>$options['school_class_id'],'session'=>$options['session'],'term'=>$options['term'],'subject'=>$options['subject_id']
            ])->fetch('assoc');

        return $total_attendance['total_attendance'];
    }
}
