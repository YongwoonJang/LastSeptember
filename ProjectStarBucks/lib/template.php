<?php

  function whiteBoardForCode($purpose, $title, $HTMLcontext, $CSScontext, $JAVASCRIPTcontext){
    if($purpose == "insert"){
      echo '
      <div style="margin-bottom:8px;"> <h6> 제목 </h6></div>
      <textarea id="TITLEsource'.$purpose.'" name="titleSection" rows="4" cols="45" style="margin-left:20px; margin-bottom:8px; width:95%;"></textarea>

      <div style="margin-bottom:8px;"> <h6> CSS 코드 </h6> <h6>&lt;style&gt;</h6> </div>
      <textarea id="CSSsource'.$purpose.'" name="CSSCodeSection" rows="4" cols="45" style="margin-left:20px; margin-bottom:8px; width:95%;"></textarea>
      <div style="margin-bottom:15px; width:100%;"> <h6>&lt;/style&gt; </h6> </div>

      <!-- HTML !-->
      <div style="margin-bottom:8px;"> <h6> HTML 코드 </h6> <h6>&lt;body&gt;</h6> </div>
      <textarea id="HTMLsource'.$purpose.'" name="HTMLCodeSection" rows="4" cols="45" style="margin-left:20px; margin-bottom:8px; width:95%;"></textarea>
      <div style="margin-bottom:15px;"> <h6>&lt;/body&gt; </h6> </div>

      <!-- JAVASCRIPT !-->
      <div style="margin-bottom:8px;"> <h6> JAVASCRIPT 코드 </h6> <h6>&lt;script&gt;</h6> </div>
      <textarea id="JAVASCRIPTsource'.$purpose.'" name="JAVASCRIPTCodeSection" rows="4" cols="45" style="margin-left:20px; margin-bottom:8px; width:95%;"></textarea>
      <div style="margin-bottom:15px;"> <h6>&lt;/script&gt; </h6> </div>';

    }else if(($purpose =="modify")|($purpose == NULL)){

      echo '
      <div style="margin-bottom:8px;"> <h6> 제목 </h6></div>
      <textarea id="TITLEsource'.$purpose.'" name="titleSection" rows="4" cols="45" style="margin-left:20px; margin-bottom:8px; width:95%;">'.$title.'</textarea>

      <div style="margin-bottom:8px;"> <h6> CSS 코드 </h6> <h6>&lt;style&gt;</h6> </div>
      <textarea id="CSSsource'.$purpose.'" name="CSSCodeSection" rows="4" cols="45" style="margin-left:20px; margin-bottom:8px; width:95%;">'.$CSScontext.'</textarea>
      <div style="margin-bottom:15px;"> <h6>&lt;/style&gt; </h6> </div>

      <!-- HTML !-->
      <div style="margin-bottom:8px;"> <h6> HTML 코드 </h6> <h6>&lt;body&gt;</h6> </div>
      <textarea id="HTMLsource'.$purpose.'" name="HTMLCodeSection" rows="4" cols="45" style="margin-left:20px; margin-bottom:8px; width:95%;">'.$HTMLcontext.'</textarea>
      <div style="margin-bottom:15px;"> <h6>&lt;/body&gt; </h6> </div>

      <!-- JAVASCRIPT !-->
      <div style="margin-bottom:8px;"> <h6> JAVASCRIPT 코드 </h6> <h6>&lt;script&gt;</h6> </div>
      <textarea id="JAVASCRIPTsource'.$purpose.'" name="JAVASCRIPTCodeSection" rows="4" cols="45" style="margin-left:20px; margin-bottom:8px; width:95%;">'.$JAVASCRIPTcontext.'</textarea>
      <div style="margin-bottom:15px;"> <h6>&lt;/script&gt; </h6> </div>';

    }
  }

 ?>
