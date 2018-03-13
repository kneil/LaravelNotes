<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use Session;

class NoteController extends Controller
{

    /**
     * How many results to show per page
     * @var integer
     */
    protected $_paginationSize = 4;
    protected $request;

    public function __construct(Request $request){
      $this->request = $request;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $page = $this->request->input('page');
      $notes = Note::paginate($this->_paginationSize);
      $message = Session::get('message');
      // return to last avaiailalble paginated page
      if ( !count($notes) && ($page != $notes->lastPage())) {
        // propogate message.
        if ( $message ) {
          Session::flash('message', $message);
        }
        return $this->notesRedirect($notes->lastPage());
      }
      else {
        return view("notes", compact("notes","page"));
      }
    }


    /**
     * Display a filtered listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($searchString)
    {
      $page = $this->request->input('page');
      $search = "%" . $searchString . "%";
      $notes = Note::where('content', 'like' , $search)->paginate($this->_paginationSize);
      // return to last avaiailalble paginated page
      if ( !count($notes) && ($page != $notes->lastPage())) {
        return $this->searchRedirect($notes->lastPage(), $searchString);
      } 
      else {
        return view("search", compact("notes","page", "searchString"));
      }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validateNote();
        $note = new Note($this->request->all());
	      $note->save();
        Session::flash('message', 'Entry created.');
        $notes = Note::paginate($this->_paginationSize);
        return $this->notesRedirect($notes->lastPage());
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = $this->request->input('page');
        $noteModel = new Note;
        $note = $noteModel->find($id);
        return view('notes.show', compact('note','page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->validateNote();
        $noteModel = new Note;
        $note = $noteModel->find($id);
        $note->update($this->request->all());
        Session::flash('message', 'Entry updated.');
        return $this->notesRedirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	      Note::destroy($id);
        Session::flash('message', 'Entry deleted.');
        return $this->notesRedirect();
    }

    protected function validateNote(){
      $validation = $this->validate(
        $this->request,
        [
          'content' => 'required',
        ]
      );
    }

    /**
     * @return \Illuminate\Http\Response
     */
    protected function notesRedirect($customPage=false){
      // initialise
      $page=1;
      // check if we need to use the last page
      if ($customPage !== false){
        $page = $customPage;
      }
      // if not use request value
      else{
        $page = $this->request->input('page');
      }
      return redirect("notes?page=" . $page);
    }


    /**
     * @return \Illuminate\Http\Response
     */
    protected function searchRedirect($page,$searchString ){
      return redirect("search/$searchString?page=" . $page);
    }

}
