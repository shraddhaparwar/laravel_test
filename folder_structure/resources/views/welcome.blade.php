<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

       

    </head>
    <body class="antialiased">
         <div class="columns is-centered" style="padding: 50px;">
          @foreach($files as $file)
            <div class="column is-3">
              <div class="box" style="padding: 5px;">
                <a href="javascript:void(0);" onclick="getFiles('{{$file}}')" class="button is-primary">{{$file}}</a>
              </div>
            </div>
          @endforeach

          <div id="fileList">
            
          </div>
      </div>

       <div>
            <button  onclick="cFolder()">Folder</button>
            <button onclick="cfile()">File</button>
            <br>
            <div id="cfolder" style="display:none;">
                <input type="text" name="name" value="" id="name" placeholder="Enter folder name"/>
                <button id="createFolder">Create Folder</button>
            </div>

            <div id="cfile" style="display:none;">
                <input type="text" name="folder_name" value="" id="folder_name" placeholder="Enter folder name"/>
                <input type="text" name="file_name" value="" id="file_name" placeholder="Enter file name"/>
                <button id="createFile">Create File</button>
            </div>
       </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

        <script>
            $("#fileList").html('');
            function getFiles(name){
                $.ajax({
                    url: siteUrl+ '/files',
                    method: 'GET',
                    data: {'name' :name},
                    success: function(res){
                        var result = JSON.parse(res);
                        console.log('result' +result.files );
                        $("#fileList").html('');
                        $.each(result.files,function(i,each){
                            $("#fileList").append('<p>'+each+'</p>');
                            console.log('each' +each );
                        })
                        
                    }
                });
            }

            function cFolder(){
                $("#cfolder").show();
            }
            function cfile(){
                $("#cfile").show();
            }

          var siteUrl = "{{url('')}}";
          $("#createFolder").click(function(){
            var name =  $("#name").val();
           
            $.ajax({
                url: siteUrl+ '/create',
                method: 'GET',
                data: {'name' :name},
                success: function(res){
                    $("#folder_name").val(name);
                    console.log('result' +res );
                }
            });
          });

           $("#createFile").click(function(){
            var file_name =  $("#file_name").val();
            var folder_name =  $("#folder_name").val();
            $.ajax({
                url: siteUrl+ '/create-file',
                method: 'GET',
                data: {'file_name' :file_name, 'folder_name':folder_name},
                success: function(res){
                    console.log('result' +res );
                }
            });
          });

        </script>
    </body>
</html>
