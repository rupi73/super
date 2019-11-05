<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gsm;
use App\Category;
use App\Paper;
class PapersController extends Controller
{


public function __construct(){
    $this->middleware('auth');
}

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch papers
        $papers = Paper::with('gsm')->orderBy('name','asc')->paginate('10');
        return view('papers.index')->with('papers',$papers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('super',Paper::class);
        //fetch papers
        $gsms = Gsm::orderBy('value','asc')->get();
        
       return view('papers.create')->with('gsms',$gsms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('super',Paper::class);
        //validate data
        $this->validate($request,[
        'name'=>'required|max:191',
        'gsms'=>'required|array|min:1',
        'settings'=>'required'
        ]);
//loop the gsms data for each record create
$gsms = $request->gsms;
        foreach($gsms as $_gsm):
           if(!Paper::where('gsm_id',$_gsm)->where('name',$request->name)->first()):
            print $_gsm;
        $gsm= Gsm::findOrFail($_gsm);
        $paper = new Paper;
        $paper->name = $request->name.' '.$gsm->label;
        $paper->slug = str_slug($request->name).'-'.$gsm->value;
        $paper->gsm_id = $_gsm;
        $paper->settings = json_encode($request->settings);        
        $paper->save();
           endif;
        endforeach;
return redirect()->route('papers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Paper $paper)
    {
        //
        //$paper->settings = json_decode($paper->settings);
      return  view('papers.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Paper $paper)
    {
        $this->authorize('super',$paper);
        //fetch gsms
        $gsms = Gsm::orderBy('value','asc')->get();
        //
        $paper->settings = json_decode($paper->settings);
      
        return view('papers.edit',compact('gsms','paper'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Paper $paper)
    {
        $this->authorize('super',$paper);
        $_paper = Paper::where(request(['name','gsm_id']))->where('id','<>',$paper->id)->first();
        $request = request(['name','gsm_id','settings']);
        $request['settings'] = json_encode($request['settings']);       
        if(!$_paper){            
            $paper->update($request);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paper $paper)
    {
        $this->authorize('super',$paper);
        //$paper->delete();
        return back();
    }
}
