<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Issue;
use App\Student;
use App\Book;
use App\Setting;
class issuecontroller extends Controller
{
    public function index()
    {
        $books=Book::all();
        $students=Student::all();
        $data = Issue::join('student', 'issue.id', '=', 'student.s_id')
            ->join('book', 'issue.id', '=', 'book.b_id')
            ->select('issue.*', 'student.name', 'book.name')
            ->get();
            return view('issue.issue-create',["students"=>$students,"books"=>$books]);
    }
    public function store(Request $request)
    {
        if(session()->has('email'))
      {
                $issue = new Issue();
                $date = date("d.m.Y");
                $issue_status=["N"];
                // $return_date=date('d.m.Y', strtotime($date. ' + 7 days'));
                $issue->s_id = $request["s_id"];
                $issue->b_id =$request["b_id"];
                // $issue->issue_date=date("d.m.y");
                 $issue->issue_date=time();
                 $return_date= strtotime($date. ' + 7 days');
                 $issue->return_date=$return_date;
                $issue->issue_status="N";
                $issue->save();
                $book = book::find($request->b_id);
                $book->status = 'N';
                $book->save();
                return redirect('/issue-view');
      }
      else return view('/register');
                }
                public function view(Issue $issue)
                { 
      if(session()->has('email'))
      {
                    $books=Book::all();
                    $students=Student::all();
                    $data = Issue::join('student', 'issue.s_id', '=', 'student.s_id')
                                   ->join('book', 'issue.b_id', '=', 'book.b_id')
                                   ->select('issue.id','book.name','student.phonenumber','student.email','issue.issue_date','issue.return_date')
                                   ->orderBy('issue.id','ASC')
                                   ->get();
                      return view('issue.issue-view',compact('data'));
      }
      else return view('form');
                }
                public function return(Issue $issue,$id)
                {
                    if(session()->has('email'))
                    {
                    $issue=Issue::find($id);
                    return view('issue.return-book',compact('issue'));
                    }
                    else return redirect('/register');
                }
                public function return2(Request $request,$id)
                {
                   
                    $issue=Issue::find($id);
                    echo $request->get('return_date');
                    $issue_status=["Y"];
                    //$issue->return_date=date("d.m.y",strtotime($request->get('return_date'))); 
                    $issue->return_date=strtotime($request->get('return_date')); 
                    $issue->issue_status="Y";
                    $issue->save();
                    // $book = Book::find($request->b_id);
                    // $book->status = 'Y';
                    // $book->save();
                     return redirect('/fine/'.$id);
                }
                public function fine (Issue $issue,$id)
                {
                    $issue=Issue::find($id);
                    return view('issue.fine',compact('issue'));
                }
                public function edit(Issue $issue,$id)
                {
                  $issue=Issue::find($id);
                  return view('issue.reissue',compact('issue'));
                }
                public function update(Request $request,$id)
                {
                    if(session()->has('email'))
                    {
                  $issue=Issue::find($id);
                //   $issue->return_date=date("d.m.y",strtotime($request->get('return_date')));
                //   $issue->issue_date=date("d.m.y");
                  $issue->return_date=strtotime($request->get('return_date'));
                  $issue->issue_date=time();
                  $issue->save();
                  return redirect('/issue-view');
                  }
                  return redirect ('/register');

                }
                public function teacherView(Issue $issue)
                {                    
      if(session()->has('name'))
      {
                    $books=Book::all();
                    $students=Student::all();
                    $data = Issue::join('student', 'issue.s_id', '=', 'student.s_id')
                                   ->join('book', 'issue.b_id', '=', 'book.b_id')
                                   ->select('issue.id','book.name','student.phonenumber','student.email','issue.issue_date','issue.return_date')
                                   ->get();
                     return view('issue.issue-teacher',compact('data'));
      }
      else return view('adminlogin');
                }
}
