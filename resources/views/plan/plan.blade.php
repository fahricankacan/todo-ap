@extends('layout.index')


@section('content')


    <div class="card h-100 ">
        <div class="card-body">
            <!----------------LİSTLER-------------------------->
            <div class=row>
                <!--------------COLON 1 ------------------------->
                <div class="col-sm-4 ">
                    {{-- <div class="card-header text-center  ">
                        <h5> Yapılacaklar </h5>
                        <hr>
                    </div> --}}
                    <div class="card-body ">
                        <h1 class="text-center">To-do</h1>
                        <hr>
                        <ul class="list-group droptrue px-2 bg-light" id="sortable1">
                            <li class="shadow-sm list-group-item list-group-item-action list-group-item-secondary my-1">
                                <div class="card-body">
                                    <p class="fs-3"><b>Plan sayfasını düzenlemek </b></p>
                                    <div class="d-flex w-100 justify-content-between">
                                        <span class="text-success p-1 ">5 gün</span>
                                        <!--gün sayısına göre renk değişecek. -->

                                        <span class="bg-blue-800 rounded-circle  p-1"> <i title="Bünyamin Görken">B.G</i></>
                                    </div>
                                    {{-- <div class="d-flex w-100 justify-content-end">
                                      <span class="badge bg-danger-400 text-wrap">Acil</span><!--gün sayısına göre renk değişecek. -->
                                      
                                      
                                  </div> --}}
                                </div>
                            </li>
                            <li class="shadow-sm list-group-item list-group-item-action list-group-item-secondary my-1">
                                <div class="card-body">
                                    <p class="fs-3"><b>Plan sayfasını düzenlemek </b></p>
                                    <div class="d-flex w-100 justify-content-between">
                                        <span class="text-success p-1 ">5 gün</span>
                                        <!--gün sayısına göre renk değişecek. -->

                                        <span class="bg-blue-800 rounded-circle  p-1"> <i title="Bünyamin Görken">B.G</i></>
                                    </div>
                                    {{-- <div class="d-flex w-100 justify-content-end">
                                    <span class="badge bg-danger-400 text-wrap">Acil</span><!--gün sayısına göre renk değişecek. -->
                                    
                                    
                                </div> --}}
                                </div>
                            </li>
                            <li class="shadow-sm list-group-item list-group-item-action list-group-item-secondary my-1">
                                <div class="card-body">
                                    <p class="fs-3"><b>Plan sayfasını düzenlemek </b></p>
                                    <div class="d-flex w-100 justify-content-between">
                                        <span class="text-success p-1 ">5 gün</span>
                                        <!--gün sayısına göre renk değişecek. -->

                                        <span class="bg-blue-800 rounded-circle  p-1"> <i title="Bünyamin Görken">B.G</i></>
                                    </div>
                                    {{-- <div class="d-flex w-100 justify-content-end">
                                  <span class="badge bg-danger-400 text-wrap">Acil</span><!--gün sayısına göre renk değişecek. -->
                                  
                                  
                              </div> --}}
                                </div>
                            </li>
                            <li class="shadow-sm list-group-item list-group-item-action list-group-item-secondary my-1">
                                <div class="card-body">
                                    <p class="fs-3"><b>Plan sayfasını düzenlemek </b></p>
                                    <div class="d-flex w-100 justify-content-between">
                                        <span class="text-success p-1 ">5 gün</span>
                                        <!--gün sayısına göre renk değişecek. -->

                                        <span class="bg-blue-800 rounded-circle  p-1"> <i title="Bünyamin Görken">B.G</i></>
                                    </div>
                                    {{-- <div class="d-flex w-100 justify-content-end">
                                <span class="badge bg-danger-400 text-wrap">Acil</span><!--gün sayısına göre renk değişecek. -->
                                
                                
                            </div> --}}
                                </div>
                            </li>
                            <li class="shadow-sm list-group-item list-group-item-action list-group-item-secondary my-1">
                                <div class="card-body">
                                    <p class="fs-3"><b>Plan sayfasını düzenlemek </b></p>
                                    <div class="d-flex w-100 justify-content-between">
                                        <span class="text-success p-1 ">5 gün</span>
                                        <!--gün sayısına göre renk değişecek. -->

                                        <span class="bg-blue-800 rounded-circle  p-1"> <i title="Bünyamin Görken">B.G</i></>
                                    </div>
                                    {{-- <div class="d-flex w-100 justify-content-end">
                              <span class="badge bg-danger-400 text-wrap">Acil</span><!--gün sayısına göre renk değişecek. -->
                              
                              
                          </div> --}}
                                </div>
                            </li>

                           

                        </ul>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-1">

                            <button onclick="myFunction()" class="btn btn-outline-secondary " type="button"
                                id="eklebtn"><i class="fa fa-plus-circle mx-1"></i>Ekle</button>
                        </div>
                    </div>
                </div>
                <!--------------/COLON 1 ------------------------->
                <!--------------COLON 2------------------------->
                <div class="col-sm-4 ">

                    <!--------------COLON 2 ------------------------->
                    <div class="card-body ">
                        <h1 class="text-center">Yapılıyor</h1>
                        <hr>
                        <ul class="list-group droptrue px-2 bg-light" id="sortable2">
                            <li class="shadow-sm list-group-item list-group-item-action list-group-item-secondary my-1">
                                <div class="card-body">
                                    <p class="fs-3"><b>Plan sayfasını düzenlemek </b></p>
                                    <div class="d-flex w-100 justify-content-between">
                                        <span class="text-success p-1 ">5 gün</span>
                                        <!--gün sayısına göre renk değişecek. -->

                                        <span class="bg-blue-800 rounded-circle  p-1"> <i title="Bünyamin Görken">B.G</i></>
                                    </div>
                                    {{-- <div class="d-flex w-100 justify-content-end">
                                  <span class="badge bg-danger-400 text-wrap">Acil</span><!--gün sayısına göre renk değişecek. -->
                                  
                                  
                              </div> --}}
                                </div>
                            </li>
                            <li class="shadow-sm list-group-item list-group-item-action list-group-item-secondary my-1">
                                <div class="card-body">
                                    <p class="fs-3"><b>Plan sayfasını düzenlemek </b></p>
                                    <div class="d-flex w-100 justify-content-between">
                                        <span class="text-success p-1 ">5 gün</span>
                                        <!--gün sayısına göre renk değişecek. -->

                                        <span class="bg-blue-800 rounded-circle  p-1"> <i title="Bünyamin Görken">B.G</i></>
                                    </div>
                                    {{-- <div class="d-flex w-100 justify-content-end">
                                <span class="badge bg-danger-400 text-wrap">Acil</span><!--gün sayısına göre renk değişecek. -->
                                
                                
                            </div> --}}
                                </div>
                            </li>
                            <li class="shadow-sm list-group-item list-group-item-action list-group-item-secondary my-1">
                                <div class="card-body">
                                    <p class="fs-3"><b>Plan sayfasını düzenlemek </b></p>
                                    <div class="d-flex w-100 justify-content-between">
                                        <span class="text-success p-1 ">5 gün</span>
                                        <!--gün sayısına göre renk değişecek. -->

                                        <span class="bg-blue-800 rounded-circle  p-1"> <i title="Bünyamin Görken">B.G</i></>
                                    </div>
                                    {{-- <div class="d-flex w-100 justify-content-end">
                              <span class="badge bg-danger-400 text-wrap">Acil</span><!--gün sayısına göre renk değişecek. -->
                              
                              
                          </div> --}}
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--------------/COLON 2 ------------------------->
                </div>
                <!--------------/COLON 2------------------------->
                <!--------------COLON 3 ------------------------->
                <div class="col-sm-4 ">
                    <div class="card-body ">
                        <h1 class="text-center">Bitti</h1>
                        <hr>
                        <ul class="list-group droptrue px-2 bg-light" id="sortable3">
                            <li class="shadow-sm list-group-item list-group-item-action list-group-item-secondary my-1">
                                <div class="card-body">
                                    <p class="fs-3"><b>Plan sayfasını düzenlemek </b></p>
                                    <div class="d-flex w-100 justify-content-between">
                                        <span class="text-success p-1 ">5 gün</span>
                                        <!--gün sayısına göre renk değişecek. -->

                                        <span class="bg-blue-800 rounded-circle  p-1"> <i title="Bünyamin Görken">B.G</i></>
                                    </div>
                                    {{-- <div class="d-flex w-100 justify-content-end">
                                  <span class="badge bg-danger-400 text-wrap">Acil</span><!--gün sayısına göre renk değişecek. -->
                                  
                                  
                              </div> --}}
                                </div>
                            </li>
                            <li class="shadow-sm list-group-item list-group-item-action list-group-item-secondary my-1">
                                <div class="card-body">
                                    <p class="fs-3"><b>Plan sayfasını düzenlemek </b></p>
                                    <div class="d-flex w-100 justify-content-between">
                                        <span class="text-success p-1 ">5 gün</span>
                                        <!--gün sayısına göre renk değişecek. -->

                                        <span class="bg-blue-800 rounded-circle  p-1"> <i title="Bünyamin Görken">B.G</i></>
                                    </div>
                                    {{-- <div class="d-flex w-100 justify-content-end">
                                <span class="badge bg-danger-400 text-wrap">Acil</span><!--gün sayısına göre renk değişecek. -->
                                
                                
                            </div> --}}
                                </div>
                            </li>

                        </ul>
                    </div>
                    <!--------------/COLON 3 ------------------------->
                </div>
            </div>
        </div>
        <!----------------LİSTLER SONU-------------------------->
        {{-- <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button> --}}

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="/" method="POST"> 
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModal">Proje Başlığı</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Email address</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                          
                          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>



        <script src="{{ URL::asset('assets/js/plan/dropdrag.js') }}"></script>
        <script src="{{ URL::asset('assets/js/plan/button.js') }}"></script>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>

    @endsection
