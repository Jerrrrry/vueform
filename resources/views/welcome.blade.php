<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
         <meta id="token" name="token" value="{{ csrf_token() }}">

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
      

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        </head>

    <body>
   
        <div class="container">
          
            <tasks ></tasks> 
        </div>
        <template id="tasks-template">

        <!--add ajax task-->
        <div class="container">
           <div class="panel-heading">
                <h3>Add an Event</h3>
            </div>
            <div class="panel-body">

                 <div class="form-group">
                     <input class="form-control" placeholder="Task Name" v-model="newtask.body">
                </div>

 

              <button class="btn btn-primary" @click="addTask">Submit</button>

            </div>       
                

        </div>
        <!--end -->
                <h1>My Task(@{{remaining}})</h1>
                <hr>
                <ul class="list-group">
                
                    <li class="list-group-item" v-for="task in list">
                        @{{task.body}}
                        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                        <strong @click="deleteTask(task)">X</strong>
                    </li>
               

                 </ul>

        </template>
       
      
        
        <script  src="https://cdn.jsdelivr.net/vue/1.0.15/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.js"></script>
        <script  src="/js/main.js"></script>
    </body>
</html>


