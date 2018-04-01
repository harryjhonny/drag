<?php

namespace Harryjhonny\Draggable\Http\Controllers;

//use App\Grid;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Input;
//use Debugbar;

class DraggableController extends Controller
{
    //
  

  public function index()
  {
    return view('Drag::draggable');
 }

 public function load(Request $r)
 {
  if ($r->ajax()) {
    
      // Debugbar::info($r->all());

    $user_id = $r->all()['user_id'];

    $grid = Grid::where('user_id',$user_id)->get();

          //Debugbar::info($grid);

    return response()->json($grid);
    
  }
}
public function edit(Request $r)
 {
  if ($r->ajax()) {
    
       Debugbar::info($r->all());

    $user_id = $r->all()['user_id'];
    $grid_id = $r->all()['grid_id'];
    $grid_name = $r->all()['grid_name'];
    $grid_description = $r->all()['grid_description'];
    

    $grid = Grid::where('user_id',$user_id)
                  ->where('grid_id',$grid_id)->first();

            Debugbar::info($grid);

    if($grid_name){
      $grid->name = $grid_name;  
    }
    
    else
    {
      $grid->name = '';
    }
    if($grid_description){
      $grid->description = $grid_description;  
    }
    
    else
    {
      $grid->description = '';
    }

    $grid->save();
    return response()->json($grid);

    if ($grid->save())
    {
      return response(['msg'=>'Success']);
    }

    else
    {
      return response(['msg'=>'Failure']);  
    }
   
  }
}


public function store(Request $r)
{
 if($r->ajax())
 {
  
  $myArray = $r->all();

  Debugbar::info($myArray);
  $user_id = $myArray['user_id'];

  if(array_key_exists('data',$myArray))
  {
    $ajax_data = $myArray['data'];
    
    

    
    $update_grid = Grid::where('user_id', $user_id)->delete();


    foreach($ajax_data as $value)
    {   
                    //Debugbar::info($value['grid_id']);
                    //Debugbar::info($value['cardType']);
    
      $grid = new Grid();
      $grid->user_id = $value['user_id'];
      $grid->grid_id = $value['grid_id'];
      $grid->x = $value['x'];
      $grid->y = $value['y'];
      $grid->height = $value['height'];
      $grid->width = $value['width'];
      
      if($value['name']){
        $grid->name = $value['name'];  
      }
    
      else {
        $grid->name = 'New Card';
      }

      if($value['description']){
      $grid->description = $value['description'];  
    }
    
    else
    {
      $grid->description = 'A detailed description';
    }
      
      //$grid->cardtype = $value['cardType'];
      //$grid->content = $value['content'];
      
      $cardContents = $value['cardType'];
      if (($cardContents == 'pie_chart') || ($cardContents == 'pie3d')) {

            //alert(cardContents);
            $cardContentsValue = '<div class ="chartContainer" id="chartContainer-'.$grid->grid_id.'" >Chart will load here! </div>';
            $chart_type = 'pie3d';
             //Debugbar::info($cardContentsValue);
          }
          else if (($cardContents == 'column_chart') || ($cardContents == 'column3d')) {
            //alert(cardContents);
            $cardContentsValue = '<div class ="chartContainer" id="chartContainer-'.$grid->grid_id.'" >Chart will load here! </div>';
            $chart_type = 'column3d';
          }
          else if ($cardContents == 'demo_table') {
            $cardContentsValue = '<div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Label</th>
                                                <th>Value</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Paper Cost</td>
                                                <td>25</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Binding</td>
                                                <td>20</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Printing Cost</td>
                                                <td>20</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Royality</td>
                                                <td>15</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Transportation Cost</td>
                                                <td>10</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Promotion Cost</td>
                                                <td>10</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>';
                   $chart_type ='demo_table';             
            
          }
          else if ($cardContents == 'demo_textbox') {
              $cardContentsValue ='<textarea class="form-control" rows="5" id="comment"></textarea>';
              $chart_type ='demo_textbox';
          }
                else {
              $cardContentsValue ='Card Contents will be displayed here';
              $chart_type ='';
          }
      $grid->content = $cardContentsValue;
      $grid->cardtype = $chart_type;


      $grid->save();
    }   
    
    if ($grid->save())
    {
      return response(['msg'=>'Success']);
    }

    else
    {
      return response(['msg'=>'Failure']);  
    }
   }

  else {
    $update_grid = Grid::where('user_id', $user_id)->delete();
    return response(['msg'=>'Nothing to Save']);
  } 
  
  
  
}   
}

public function cardType(Request $r)
{
 if($r->ajax()){

  $cardContents = $r->all()['cardContents'];

  Debugbar::info($cardContents);

    if ($cardContents == 'pie_chart') {

            //alert(cardContents);
            $cardContentsValue = '<div class ="chartContainer" id="chartContainer" >Chart will load here! </div>';
            $chart_type = 'pie3d';
             Debugbar::info($cardContentsValue);
          }
          else if ($cardContents == 'column_chart') {
            //alert(cardContents);
            $cardContentsValue = '<div class ="chartContainer" id="chartContainer" >Chart will load here! </div>';
            $chart_type = 'column3d';
          }
          else if ($cardContents == 'demo_table') {
            $cardContentsValue = '<div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Label</th>
                                                <th>Value</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Paper Cost</td>
                                                <td>25</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Binding</td>
                                                <td>20</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Printing Cost</td>
                                                <td>20</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Royality</td>
                                                <td>15</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Transportation Cost</td>
                                                <td>10</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Promotion Cost</td>
                                                <td>10</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>';
                   $chart_type ='';             
            
          }
          else if ($cardContents == 'demo_textbox') {
              $cardContentsValue ='<textarea class="form-control" rows="5" id="comment"></textarea>';
              $chart_type ='';
          }
                else {
              $cardContentsValue ='Card Contents will be displayed here';
              $chart_type ='';
          }  

          $resJSOn = array(
                      'cardValue' => $cardContentsValue,
                      'chartType' => $chart_type);

            return response()->json($resJSOn);
}


 }
public function gridEdit(Request $r)
 {
  if ($r->ajax()) {
    
      // Debugbar::info($r->all());
    $gridArr = $r->all();

    if(array_key_exists('data',$gridArr))
  {
    $ajax_data = $gridArr['data'];

    foreach ($ajax_data as $value) {
      //  Debugbar::info($value);

    $user_id = $r->all()['user_id'];
    $grid_id = $value['grid_id'];
    $grid_x = $value['x'];
    $grid_y = $value['y'];
    $grid_height = $value['height'];
    $grid_width = $value['width'];

    $grid = Grid::where('user_id',$user_id)
                  ->where('grid_id',$grid_id)->first();

    //  Debugbar::info($grid);

    $grid->x = $grid_x;
    $grid->y = $grid_y;
    $grid->width = $grid_width;
    $grid->height = $grid_height;

    $grid->save();


    }

    

  }
    return response()->json($grid);

    
  }
}
  
}
