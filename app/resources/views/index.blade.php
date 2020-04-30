@extends('base')
@section('datatable')
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="/css/app.css">

    <!-- Fonts -->
    <script src="/js/app.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<style>

    /* table {
        width: 100%;
    } */

    #example_filter {
        float: right;
    }

    #example_paginate {
        float: right;
    }

    label {
        display: inline-flex;
        margin-bottom: .5rem;
        margin-top: .5rem;
        padding-right: 5px;
    }

.pagination_pos{
  float: right;
  padding-top: 155px;
}
    
body {
  background: #e2e1e0;
}

.card {
  background: #fff;
  border-radius: 2px;
  display: inline-block;
  height: 170px;
  margin: 4rem;
  position: relative;
  width: 300px;
  padding:20px;
}

 
</style>
<script>
    function myFunction() {
  alert("Hello! I am an alert box!");
}


function hide_show_table(col_name)
{
 var checkbox_val=document.getElementById(col_name).value;
 if(checkbox_val=="hide")
 {
  var all_col=document.getElementsByClassName(col_name);
  for(var i=0;i<all_col.length;i++)
  {
   all_col[i].style.display="none";
  }
  document.getElementById(col_name+"_head").style.display="none";
  document.getElementById(col_name).value="show";
 }
    
 else
 {
  var all_col=document.getElementsByClassName(col_name);
  for(var i=0;i<all_col.length;i++)
  {
   all_col[i].style.display="table-cell";
  }
  document.getElementById(col_name+"_head").style.display="table-cell";
  document.getElementById(col_name).value="hide";
 }
}
    $(document).ready(function () {
        $('#example').DataTable(
            {
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
                },

                "aLengthMenu": [
                    [5, 10, 25, -1],
                    [5, 10, 25, "All"]
                ],
                "iDisplayLength": 10000
            }
        );
    });



</script>
@endsection
@section('content')
<div class="container mt-5">
    
<div class="mydiv">
  <div class="pagination_pos" style="text-align:left; margin:0px auto 0px auto; display:inline-block;">
    {{ $persones->links() }}
  </div>
    {{-- <button onclick="myFunction()">Try it</button> --}}
    {{-- <div id="checkbox_div">
        <p>Show Hide Column</p>
        <li><input type="checkbox" value="hide" id="name_col" onchange="hide_show_table(this.id);">Name</li>
        <li><input type="checkbox" value="hide" id="prenom_col" onchange="hide_show_table(this.id);">prenom</li>
        <li><input type="checkbox" value="hide" id="adresse_col" onchange="hide_show_table(this.id);">adresse</li>
        <li><input type="checkbox" value="hide" id="date_col" onchange="hide_show_table(this.id);">date</li>
    </div> --}}

    <div class="card card-3" style="text-align:right;display:inline-block;">
      <form action="{{route('exportpage')}}?page={{request()->page ?? 1}}" method="POST">
        {{-- <input type="hidden" name="page" value="{{request()->page ?? 1}}"/> --}}
        @csrf
    <button type="submit" class="btn btn-primary">EXPORT {{$persones->count()}} PERSONES</button><br>
    </form><br>
       <label>
        <input type="checkbox" class="option-input checkbox" type="checkbox" value="hide" id="name_col" onchange="hide_show_table(this.id);"/>Nom
      </label>
      <label>
        <input type="checkbox" class="option-input checkbox" type="checkbox" value="hide" id="prenom_col" onchange="hide_show_table(this.id);"/>Prenom
      </label>
      <label>
        <input type="checkbox" class="option-input checkbox" type="checkbox" value="hide" id="adresse_col" onchange="hide_show_table(this.id);"/>Adresse
      </label>
      <label>
        <input type="checkbox" class="option-input checkbox" type="checkbox" value="hide" id="date_col" onchange="hide_show_table(this.id);"/>Date
      </label>
  
    </div>
  </div>

{{-- <!-- Default inline 2-->
<div class="custom-control custom-checkbox custom-control-inline">
  <input type="checkbox" class="custom-control-input" id="defaultInline2">
  <label class="custom-control-label" for="defaultInline2">2</label>
</div> --}}

 
        
        <br>
            <div class="row">
                <table id="example" class="table table-striped table-bordered">
                        
                    <thead>
                        <tr>
                            {{-- <th><input type="checkbox" onclick="checkAll(this)"></th> --}}
                            {{-- <th>FIC</th>
                            <th>CIVILITE</th> --}}
                            <th id="name_col_head" class="name_col_head">NOM</th>
                            <th id="prenom_col_head" class="prenom_col_head">PRENOM</th>
                            <th id="adresse_col_head" class="adresse_col_head">ADRESSE</th>
                            {{-- <th>CODE_POSTAL</th>
                            <th>VILLE</th>
                            <th>NO_TEL</th>
                            <th>INDIC</th>
                            <th>EMAIL</th> --}}
                            <th id="date_col_head" class="date_col_head">DATE_NAISSANCE</th>
                            {{-- <th>PROVENANCE</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($persones as $p)
                        <tr>
                            {{-- <td><input type="checkbox" name=""></td> --}}
                        {{-- <td>{{ $p->FIC }}</td>
                        <td>{{ $p->CIVILITE }}</td> --}}
                        <td class="name_col">{{ $p->NOM }}</td>
                        <td class="prenom_col">{{ $p->PRENOM }}</td>
                        <td class="adresse_col">{{ $p->ADRESSE_1 }}</td>
                        {{-- <td>{{ $p->CODE_POSTAL }}</td>
                        <td>{{ $p->VILLE }}</td>
                        <td>{{ $p->NO_TEL }}</td>
                        <td>{{ $p->INDIC }}</td>
                        <td>{{ $p->EMAIL }}</td> --}}
                        <td class="date_col">{{ $p->DATE_NAISSANCE }}</td>
                        {{-- <td>{{ $p->PROVENANCE }}</td> --}}
                        </tr>
    
                        @endforeach
                </table>
            </div>
            <br>
            <div class="pagination_pos" style="text-align:right; margin:0px auto 0px auto;">
              {{ $persones->links() }}
            </div>
            
        </div>
@endsection