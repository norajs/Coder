<html>
    
    <head>
        
        <link rel= "stylesheet" href="style.css">
        <script type= "text/javascript" src="jquery-3.2.1.min.js"></script>
    </head>
    
    <body>
        
        <!--simple ajax with get
        <script type="text/javascript">
            $.get("info.txt", function(data){
                alert(data);
            });
        </script> 
        
        not so simple ajax with ajax
        
        <script type="text/javascript">
            $.ajax("info.txt")
                .done(function(data){
                $("#line").html(data);
                })
                .fail(function(){
                alert("Data retrieval failed");
                });
        </script> -->
        
        
        <div id="header">
            <div id="logo">Coder</div>
             
            <div id="buttonContainer">
                <div class="toggleButton active" id="html">HTML</div>
                <div class="toggleButton" id="css">Css</div>
                <div class="toggleButton" id="javascript">Js</div>
                <div class="toggleButton active" id="output">Output</div>
            </div>
        </div>
        
        <div id="bodyContainer">
            <textarea id="htmlPanel" class="panel"></textarea>
            
            <textarea id="cssPanel" class="panel hidden">
            </textarea>
            
            <textarea id="javascriptPanel" class="panel hidden">
            </textarea>
            
            <iframe id="outputPanel" class="panel outp"> 
            </iframe>
            
        </div>
        
        
        
        
        
        <script type="text/javascript">
            
            function updateOutput() {
                $("iframe").contents().find("html").html("<html><head><style type='text/css'>" + $("#cssPanel").val() + "</style></head><body>" + $("#htmlPanel").val() + "</body></html>");
                
                document.getElementById("outputPanel").contentWindow.eval($("#javascriptPanel").val());
                
            }
            
            $(".toggleButton").hover(function(){
                $(this).addClass("highlightedButton");
            }, function(){
                $(this).removeClass("highlightedButton");
            });
            
            $(".toggleButton").click(function(){
               $(this).toggleClass("active");
                
               var panelId = $(this).attr("id") + "Panel" ;
                
                $("#" + panelId).toggleClass("hidden");
                
                var numberOfActivePanels = 4 -  $('.hidden').length ;
                
                $(".panel").width(($(window).width() / numberOfActivePanels)-4);
            });
            
            $(".panel").height($(window).height() - $("#header").height() -16);
            
             $(".panel").width(($(window).width() / 2)-4);
            
            updateOutput();
            
            $("textarea").on('change keyup paste', function(){
                updateOutput();
            });
        </script>
        
        
        
        
        
        
    </body>


</html>