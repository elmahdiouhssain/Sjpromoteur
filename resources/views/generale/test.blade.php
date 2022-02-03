<!DOCTYPE html>
<html lang="en">
<head>
  <title>DataTables Bigdata load</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
 
</head>
<body>
 
<div class="container">
  <h2>within few sec,load BigData or 10 lakh or 1 million Datas/Rows quickly <br>using Datatables Server side in Laravel</h2>
  <p>Datatables Server Processing</p>            
  <table class="table table-striped" id="emptableid" width="100%">
    <thead>
      <tr>
        <th>id</th>
        <th>nom_complete</th>
        <th>realise_par</th>
        <th>Im_type</th>
        <th>Societe</th>
        <th>enregistré à </th>
        <th>action </th>
 
      </tr>
    </thead>
    <tbody>
      
    </tbody>
 
  </table>
</div>
@include('layouts.jdatatable')
 
  <script type="text/javascript">
    
    $(document).ready(function() {
 
      $("#emptableid").DataTable({
              serverSide: true,
              ajax: {
                  url: '{{url('adstest')}}',
                  data: function (data) {
                      data.params = {
                          sac: "helo"
                      }
                  }
              },
              buttons: false,
              searching: true,
              scrollY: 500,
              scrollX: true,
              scrollCollapse: true,
              columns: [
                  {data: "id", className: 'id'},
                  {data: "nom_complete", className: 'nom_complete'},
                  {data: "realise_par", className: 'realise_par'},
                  {data: "imm_type", className: 'imm_type'},
                  {data: "societe_id", className: 'societe_id'},
                  {data: "created_at", className: 'created_at'},
                  {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
               
              ]  
        });
 
    });
 
  </script>
 
</body>
</html>