<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;
use App\Student;
class Issue extends Model
{
    protected $table="issue";
    protected $primarykey="id";
    protected $filllable=['s_id','b_id','return_date','issue_date','issue-status'];
    
    
    public static function view()
    {
        $data = Issue::select('issue.id','book.name','student.phonenumber','student.email','issue.issue_date','issue.return_date','issue.issue_status')
                                   ->join('student', 'issue.s_id', '=', 'student.s_id')
                                   ->join('book', 'issue.b_id', '=', 'book.b_id')
                                   ->orderBy('issue.id','ASC')
                                   ->get();
        return $data;
    }

    public static function teacherView()
    {
        $data = Issue::select('issue.id','book.name','student.phonenumber','student.email','issue.issue_date','issue.return_date')
                                   ->join('student', 'issue.s_id', '=', 'student.s_id')
                                   ->join('book', 'issue.b_id', '=', 'book.b_id')
                                   ->orderBy('issue.id','ASC')
                                   ->get();
        return $data;                           
    }
}
