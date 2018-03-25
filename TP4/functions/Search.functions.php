<?php

	function  renderGenresCheckboxes($genres) {
		//retourne une chaîne de caractère correspondant à l'affichage de la liste des checkboxes genres dispo
		$out ="";
		foreach ($genres as $genre) {
			$out .= "<input type=\"checkbox\" name=\"genre[]\"";
			$out .= "value=\"";
			$out .= $genre->getName();
			$out .= "\">";
			$out .= $genre->getName();
			$out .="</input><br>";
		}
		return $out;
	}

	function renderCountryDropdown($countries){
		//retourne une chaîne de caractère correspondant à l'affichage du dropdown des pays dispo
		$out ="";
		$out .= "<select name=\"country\" id=\"class\">";
		$out .= "<option name=\"country[]\" value=\"\"> -- </option><br>";
		
		foreach ($countries as $country) {
			$out .= "<option";
			$out .= " name=\"country[]\" value=\"";
			$out .= $country->getName();
			$out .= "\">";
			$out .= $country->getName();
			$out .="</option><br>";
		}
		$out .= "</select>";

		return $out;
	}

/*
		                `.:+##########;,`                             
		          `;####@#+;:,.`````.:'+####'`                                              
		       `###@:`                     `###:                                            
		     ,###`                            +##                                           
		    +##              `,'+#@@@@+;.      ##:                                          
		   ##;           ;@#@#:.`      .;@#;   ##;                                          
		  ;#+         :@#'                 +#.:##`                                          
		  +#;       ,##.                    +###                                            
		  :##      '#'                      +#,                                             
		   +#'    .#+                     .;'.                                              
		    +##   '#,                                                                       
		     ;##: ;#:                      `,:;'++';,.                                      
		       +##;##`         `####  ;###@#+;:,,,:;+@####:                                 
		         :####; `    `#@.'###@'                  ;###+                              
		            `+####  :#;  +#.                        ,###;                           
		                 `` +'                                 ;###`                        
		             ,###@+. `                                   `####:             ,+      
		           +##'                                             `'####@@#+##@####`      
		         ;#@,     .##.                                            .;;';:,  +#.      
		        ##+       ;#`+#+`                                                `##;       
		       ##;        #+   +##.                                         ` .###+         
		      +#'        .#,     ;#@:                                      `#####.          
		     ,##         ##        :@##.       ##'                              :#@.        
		     +#:     ;, ;#           `+###'`   +#@##`        ::`                  +#;       
		    `##`    :#+:@`               ,+#####+  ++#;      '#'   #'     ##       +#:      
		    .##    `@###`                            ,##@.  `####' .@#`  `##,       ##`     
		    .#+    ;##+   ,+#######+.                 `:######+':###,@@`  ##:       '#'     
		    `#'    ##; ;###'.     ,@#@#+     #'    '###@+:.`.:+@########  ##;       ,##     
		     ';   .##.+##             :###:.,##':+##.              ;####' ##;       ,##     
		      ;.#@###'#+         ;#`    .##++#+:#@.       `#'       @#'##`####@.    ;#'     
		      +#, '####;        .##;     ##; #+`##.       ##+       @#;:####, +@`   ##.     
		     ,#;  '##'#+         ,:     `##, #+ #@.       `'.      ;##: +###. ;#,  ;#+      
		     '#.  '## @#'              ;##'  ;: ;##`              +##;   ###  +#. `##`      
		     ;#,  ;##  +###,        .####     ,  ;##'           ,@#@`   ,##, ,#+  +#,       
		     .#+  .##,   .###########@:`           #####,   `+###@,     ### :##  :##        
		      :#'  ##+                                ;#######+,       '####@:   +#,        
		       .######.                                               ;###@;#    ##.        
		       .# ``##+                          `.:'+;``            +###@` #`   ;#+..      
		       :+   @##+                `########+':`              `@##    :'     ;####+    
		        `   , ##@.                                        +##;             '##+     
		       '#;     :##+                                     +##+            :+###`      
		       `##`      +###`                               .###'        ######@:          
		        #@.        :###'`                         .####.            .;###@,         
		       `##`          `'@###:                  `'###+.                   `###        
		       ##;               .#########+:     ;###@'`                        `##;       
		  `  :##;                       +#+':       ##,                  ,+`      +#;       
		  '#####@@+##;     `            ##,         ##,                 ;##,     ;##`       
		    ````  +#+    '##,           ##:         ##:                +###'    +#@.        
		         .##    ####'        `+###:         ##:       ,@##`  `@## ##; `##+          
		         ;#+  .@#;`@#.  '#;###+` `          ;@#@#:`.@##+:#; +##:   '###'            
		         `#####+`  ;######@;#:                #+######'.`@###;                      
		                   '@####:`@+#                '#@..@#######:                        
		               `########+  '##;               :##`:############,                    
		             '############: +##,              :####+ ;###########@:


############################################################################################

                                               ,,                                          
`7MM"""Mq.                                   `7MM                                          
  MM   `MM.                                    MM                                          
  MM   ,M9 ,6"Yb.  ,pP"Ybd  ,p6"bo   ,6"Yb.    MM  .gP"Ya                                  
  MMmmdM9 8)   MM  8I   `" 6M'  OO  8)   MM    MM ,M'   Yb                                 
  MM       ,pm9MM  `YMMMa. 8M        ,pm9MM    MM 8M""""""                                 
  MM      8M   MM  L.   I8 YM.    , 8M   MM    MM YM.    ,                                 
.JMML.    `Moo9^Yo.M9mmmP'  YMbmd'  `Moo9^Yo..JMML.`Mbmmd'                                 
                                      ,,        ,,                                         
`7MM"""Mq.                            db      `7MM                     mm               OO 
  MM   `MM.                                     MM                     MM               88 
  MM   ,M9 `7Mb,od8 .gP"Ya  ,pP"Ybd `7MM   ,M""bMM  .gP"Ya `7MMpMMMb.mmMMmm .gP"Ya      || 
  MMmmdM9    MM' "',M'   Yb 8I   `"   MM ,AP    MM ,M'   Yb  MM    MM  MM  ,M'   Yb     || 
  MM         MM    8M"""""" `YMMMa.   MM 8MI    MM 8M""""""  MM    MM  MM  8M""""""     `' 
  MM         MM    YM.    , L.   I8   MM `Mb    MM YM.    ,  MM    MM  MM  YM.    ,     ,, 
.JMML.     .JMML.   `Mbmmd' M9mmmP' .JMML.`Wbmd"MML.`Mbmmd'.JMML  JMML.`Mbmo`Mbmmd'     db 

*/
?>
