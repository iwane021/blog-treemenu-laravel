<html>
<head>
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Iwan P">
    <title>Membuat Multi Level Menu Dinamis dengan Laravel 6.20 by Iwan P</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="/css/treeview.css" rel="stylesheet">
</head>
<body class="bg-dark">
<div class="container">
   <div class="row">
      <div class="col-md-10 offset-md-1 mt-4">
         <div class="card">
            <div class="card-header">
               <h5>Membuat Multi Level Menu Dinamis dengan Laravel Treeview</h5>
               <small>Bisa digunakan untuk menu admin atau frontend</small>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6">
                     <h5 class="mb-2 pt-2 py-0">Add Menu</h5><hr>
                     <form accept="{{ route('menus.store')}}" method="post">
                        @csrf
                         @if(count($errors) > 0)
                                  <div class="alert alert-danger  alert-dismissible">
                                      <button type="button" class="close" data-dismiss="alert">×</button>
                                      @foreach($errors->all() as $error)
                                              {{ $error }}<br>
                                      @endforeach
                                  </div>
                              @endif
                          @if ($message = Session::get('success'))
                           <div class="alert alert-success  alert-dismissible">
                               <button type="button" class="close" data-dismiss="alert">×</button>   
                                   <strong>{{ $message }}</strong>
                           </div>
                        @endif
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Nama Menu</label>
                                 <input type="text" name="title" class="form-control">   
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Parent</label>
                                 <select class="form-control" name="parent_id">
                                    <option selected disabled>-- Pilih Parent Menu --</option>
                                    @foreach($allMenus as $key => $value)
                                       <option value="{{ $key }}">{{ $value}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <button class="btn btn-success">Save</button>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="col-md-6 border">
                     <h5 class="mb-2 py-2">Menu List</h5>
                      <ul id="tree1">
                         @foreach($menus as $key => $menu)
                            <li>
                                {{ $menu->title }}
                                @if(count($menu->childs))
                                    @include('menu.manageChild',['childs' => $menu->childs])
                                @endif
                            </li>
                         @endforeach
                        </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="/js/treeview.js"></script>
</body>
</html>