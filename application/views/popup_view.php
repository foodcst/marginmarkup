<style>
html {
  font-family: "roboto", helvetica;
  position: relative;
  height: 100%;
  font-size: 100%;
  line-height: 1.5;
  color: #444;
}

h2 {
  margin: 1.75em 0 0;
  font-size: 5vw;
}

#popup1 h3 { font-size: 1.0em; }

#popup1 p {
text-align:center;
font-size: 14px;

}

.v-center {
  height: 100vh;
  width: 100%;
  display: table;
  position: relative;
  text-align: center;
}

.v-center > div {
  display: table-cell;
  vertical-align: middle;
  position: relative;
  top: -10%;
}

.btn {
font-size: 3vmin;
  padding: 0.75em 1.5em;
  background-color: #fff;
  border: 1px solid #bbb;
  color: #333;
  text-decoration: none;
  display: inline;
  border-radius: 4px;
  -webkit-transition: background-color 1s ease;
  -moz-transition: background-color 1s ease;
  transition: background-color 1s ease;
}

.stylebut {
  background-color: #006c00;
 border: 1px solid rgb(45, 38, 38);
 border-radius: 3px;
 color: #ffffff;
 cursor: pointer;
 padding: 8px !important;
 text-decoration:none;
 font-size: 13px;
}

.popupbtn {
   background-color: #4984BD;
 border: 0px solid rgb(45, 38, 38);
 border-radius: 3px;
 color: #ffffff;
 cursor: pointer;
 padding: 8px !important;
 text-decoration:none;
 font-size: 13px;
 margin-left: 170px;
}
/*.btn:hover {
  background-color: #ddd;
  -webkit-transition: background-color 1s ease;
  -moz-transition: background-color 1s ease;
  transition: background-color 1s ease;
}*/

.btn-small {
  padding: .75em 1em;
  font-size: 0.8em;
}

.modal-box {
  display: none;
  position: absolute;
  z-index: 1000;
  width: 98%;
  background: white;
  border-bottom: 1px solid #aaa;
  border-radius: 4px;
  box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
  border: 1px solid rgba(0, 0, 0, 0.1);
  background-clip: padding-box;
}
@media (min-width: 32em) {

.modal-box { width: 36%;margin-top: 200px; }
}

.modal-box header,
.modal-box .modal-header {
  padding: 0.10em 1.0em;
 border-bottom: 1px solid #ddd;
 text-align: center;
 border-radius: 4px;
 
 color: #636363;
background: #f8f8f8;
background: -moz-linear-gradient(top, #f8f8f8 0%, #e8e8e8 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f8f8f8), color-stop(100%,#e8e8e8));
background: -webkit-linear-gradient(top, #f8f8f8 0%,#e8e8e8 100%);
background: -o-linear-gradient(top, #f8f8f8 0%,#e8e8e8 100%);
background: -ms-linear-gradient(top, #f8f8f8 0%,#e8e8e8 100%);
background: linear-gradient(top, #f8f8f8 0%,#e8e8e8 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f8f8f8', endColorstr='#e8e8e8',GradientType=0 );

}

.modal-box header h3,
.modal-box header h4,
.modal-box .modal-header h3,
.modal-box .modal-header h4 { margin: 0; }

.modal-box .modal-body { padding: 2em 1.5em; }

.modal-box footer,
.modal-box .modal-footer {
  padding: 1em;
  border-top: 1px solid #ddd;
  background: rgba(0, 0, 0, 0.02);
  text-align: right;
}

.modal-overlay {
  opacity: 0;
  filter: alpha(opacity=0);
  position: absolute;
  top: 0;
  left: 0;
  z-index: 900;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.3) !important;
}

</style>
<style>
.progress {
  height: 16px;

  border: 1px solid #eeeeee;
  overflow: hidden;
  margin:14px;
  border-radius: 5px;
}
.progress__bar {
  display: block;
  height: 100%;
  background: #4984BD;
}

</style>	


<div id="popup1" class="modal-box" >
  <header> 
    <h3>Order Guide Sync</h3>
  </header>
  <div class="modal-body">
    <p>
	Syncing......Done
	</p>
	
	<div class="progress" role="progressbar" data-goal="-50" aria-valuemin="-100" aria-valuemax="0">
       <div class="progress__bar"></div>
										
     </div>
	<form action="<?php echo base_url();?>office" method="post">
	<input type="submit" id="button_go" name="sumit" class="popupbtn" value="Go To Vendors" />
	</form>
  </div>
  
  
 

</div>

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/rainbow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-asProgress.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function($){ 
	  
        $('.progress').asProgress({
            'namespace': 'progress'
        });

       $('.progress').asProgress('go',50);
        /*$('.submit').on('click', function(){
             $('.progress').asProgress('go',50);
        });*/
       
    });
    </script>       
	