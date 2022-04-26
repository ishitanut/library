<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Issue;
use App\Student;
use App\Book;
class issuecontroller extends Controller
{
  public function index()
    {  
      try
      {
       $books=Book::all();
      }
      catch(\Exception $e)
      {
        return view('error');
      }
      try{
      $students=Student::all();
      }
      catch (\Exception $e)
      {
        return view('error');
      }
      return view('issue.issue-create',["students"=>$students,
                                        "books"=>$books]);  
    }
  public function store(Request $request)
  {
    if(session()->has('email'))
    {
      $issue = new Issue();
      $date = date("d.m.Y");
      $issue->s_id = $request["s_id"];
      $issue->b_id =$request["b_id"];
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
  public function view()
  { 
    $data=Issue::view();               
    return view('issue.issue-view',compact('data'));
  }
  public function returnView(Issue $issue,$id)
  {
      try
      {
        $issue=Issue::find($id);
      }
      catch(\Exception $e)
      {
        return view('error');
      }
      return view('issue.return-book',compact('issue'));
  }
  public function return(Request $request,$id,$b_id)
  {
    try
    {
      $issue=Issue::find($id);
    }
    catch(\Exception $e)
    {
      return view('error');
    }
      echo $request->get('return_date');
      $issue->return_date=strtotime($request->get('return_date')); 
      $issue->issue_status="Y";
      $issue->save();
      $book = Book::find($b_id);
      $book->status = 'Y';
      $book->save();
      return redirect('/fine/'.$id);
    }
  public function fine (Issue $issue,$id)
  {
    try
    {
      $issue=Issue::find($id);
    }
    catch(\Exception $e)
    {
      return view('error');
    }   
    return view('issue.fine',compact('issue'));
  }
  public function edit(Issue $issue,$id)
  {
    try
    {
    $issue=Issue::find($id);
    }
    catch(\Exception $e)
    {
      return view('error');
    }
    return view('issue.reissue',compact('issue'));
  }
  public function update(Request $request,$id)
  {
        try{
          $issue=Issue::find($id);
        }
        catch(\Exception $e)
        {
          return view('error');
        }
          $issue->return_date=strtotime($request->get('return_date'));
          $issue->issue_date=time();
          $issue->save();
        return redirect('/issue-view');
  }
  public function teacherView(Request $request)
  {      
        $data = Issue::teacherView();
        $filter_data = [];                            
        foreach($data as $row)
        {
            array_push($filter_data, $row);                             
        }
        $count = count($filter_data);
        $page = $request->page;
        $perPage = 3;                               
        $offset = ($page-1) * $perPage;                               
        $data = array_slice($filter_data,$offset,$perPage);                               
        $data = new Paginator($data,$count,$perPage,$page,['path'=> $request->url(),'query' => $request->query(),]);                                          
        return view('issue.issue-teacher',['data'=>$data]);
      }
    }
