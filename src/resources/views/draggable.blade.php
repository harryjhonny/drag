<!DOCTYPE html>
<html lang="en">
<head>
  <title>FWPA Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/gridstack.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/Fonts/font-awesome/css/font-awesome.min.css') }}" />



  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
  
  <script type="text/javascript" src="{{ asset('js/dragdash.js') }}"></script>


  {{-- <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/underscore-min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/gridstack.js') }}"></script> --}}

</head> 
<body>

<div class="grid-stack">

  <div class="grid-stack-item" id="title" data-gs-x="0" data-gs-y="0" data-gs-width="6" data-gs-height="9">
    <div class="grid-stack-item-content panel panel-default">
      <div class="panel-heading clearfix">
          
           <span class="pull-left">   
              <span class="panel-title-text">Featuring</span><br>
              <span class="panel-text">Welcome to the new card</span>
            </span>
          <span class="pull-right inner-menu">
              <span id = "widget-settings" class="fa fa-cog fa-lg widget-settings" data-toggle="modal" data-target="#myModalHorizontal"></span>
              <span id = "remove-widget" class="fa fa-trash-o fa-lg remove-widget"> </span>
          </span>
      </div>
      
      <div class="panel-body ">
          Contents will load here...
      </div>
    </div>
  </div>
 
 <div class="grid-stack-item" id="title" data-gs-x="0" data-gs-y="0" data-gs-width="6" data-gs-height="9">
    <div class="grid-stack-item-content panel panel-default">
      <div class="panel-heading clearfix">
          
           <span class="pull-left">   
              <span class="panel-title-text">Featuring</span><br>
              <span class="panel-text">Welcome to the new card</span>
            </span>
          <span class="pull-right inner-menu">
              <span id = "widget-settings" class="fa fa-cog fa-lg widget-settings" data-toggle="modal" data-target="#myModalHorizontal"></span>
              <span id = "remove-widget" class="fa fa-trash-o fa-lg remove-widget"> </span>
          </span>
      </div>
      
      <div class="panel-body ">
          Contents will load here...
      </div>
    </div>
  </div>

  <div class="grid-stack-item" id="title" data-gs-x="0" data-gs-y="0" data-gs-width="6" data-gs-height="9">
    <div class="grid-stack-item-content panel panel-default">
      <div class="panel-heading clearfix">
          
           <span class="pull-left">   
              <span class="panel-title-text">Featuring</span><br>
              <span class="panel-text">Welcome to the new card</span>
            </span>
          <span class="pull-right inner-menu">
              <span id = "widget-settings" class="fa fa-cog fa-lg widget-settings" data-toggle="modal" data-target="#myModalHorizontal"></span>
              <span id = "remove-widget" class="fa fa-trash-o fa-lg remove-widget"> </span>
          </span>
      </div>
      
      <div class="panel-body ">
          Contents will load here...
      </div>
    </div>
  </div>
  
  
</div>

<script type="text/javascript">

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  });

  $(function() {
  $('.grid-stack').gridstack({
    animate: true
  });

      $('.grid-stack').gridstack({
            animate: true,
            auto: true,
            width: 12,
            float: true,
            vertical_margin: 0,
            always_show_resize_handle: /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
            resizable: {
                handles: 'se,sw'
            },
            draggable: {
                handle: '.panel-heading',
            }
        });
  
  
  });
  

</script>
</body>
</html>
