<!DOCTYPE html>
<html>
    <head>
        <title>Shop List</title>
         <meta id="token" name="token" value="{{ csrf_token() }}">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

       

    </head>

    <body>
        <header class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-inner">
                 
                  <div class="container">
                    <div class="navbar-header">
                      <a class="navbar-brand" href="#">Skill Test</a>
                    </div>
                    <ul class="nav navbar-nav">
                      <li><a href="/">Home</a></li>
                      
                    </ul>
                  </div>
                </div>
        </header>
   
        <div class="container" style="margin-top:80px">
            <div class="row">
                <shop ></shop>
            </div>
          
            
        </div>
        <template id="shop-template">
            <!--add product -->
            <div class="col-md-6">
                <div class="pannel panel-info">
                    <div class="panel-heading">Add new thing to your shop list</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input class="form-control" placeholder="Product name" v-model="newlist.name">

                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="price" v-model="newlist.price">

                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="quantity" v-model="newlist.quantity">

                        </div>


 

                         <button class="btn btn-primary" @click="addList">Submit</button>


                    </div>
                </div>
            </div>
            <!--end-->
            <!--show all list-->
            <div class="col-md-6">
                <div class="pannel panel-info">
                    <div class="panel-heading">Your current shop list</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tbody v-for="shop in list">
                                <tr>
                                    <td>@{{shop.name}}</td>
                                    <td>@{{shop.price}}</td>
                                    <td>@{{shop.quantity}}</td>
                                    <td><strong @click="deleteList(shop)">X</strong></td>
                                    <td><a href="#" data-toggle="modal" data-target="#myModal@{{shop.id}}" @click="importList(shop)">edit</a></td>
                                    
                                    <td>
                                        <div id="myModal@{{shop.id}}" class="modal fade" role="dialog">
                                      <div class="modal-dialog">

                                       
                                        <div class="modal-content">
                                       
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                          </div>
                                          <div class="modal-body">
                                         
                                            <p>Some text in the modal.</p>
                                            <div class="form-group">
                                                <input class="form-control" name="name" placeholder="@{{shop.name}}"   value="@{{editlist.name}}" v-model="editlist.name">

                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" name="price" placeholder="@{{shop.price}}"    value="@{{editlist.price}}" v-model="editlist.price" >

                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" name="quantity" placeholder="@{{shop.quantity}}" value="@{{editlist.quantity}}" v-model="editlist.quantity">

                                            </div>
                                          

                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal" @click="updateList(editlist,shop)">Update</button>
                                          </div>
                                          
                                        </div>

                                      </div>
                                    </div>
                                        



                                    </td>

                                </tr>
                                
                                <!--modal file
                                    <div id="myModal@{{shop.name}}" class="modal fade" role="dialog">
                                      <div class="modal-dialog">

                                       
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                          </div>
                                          <div class="modal-body">
                                            <p>Some text in the modal.</p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                  modal end-->
                                    
                            </tbody>
                        </table>
                        <table>
                            <tbody>
                                <tr>
                                  <td>Total:@{{sum|currency}}</td>
                                  
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

      
        </template>
       
      
        
        <script  src="https://cdn.jsdelivr.net/vue/1.0.15/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.js"></script>
        <script  src="/js/total.js"></script>
    </body>
</html>