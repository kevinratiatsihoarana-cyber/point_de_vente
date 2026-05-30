@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
<div class="card">
    <div class="card-body">
        <h2 class="card-title"style="margin-bottom:20px;">Modifier les clients</h2>
        <form class="forms-sample" action="" method="post" enctype='multipart/form-data' >
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleInputUsername1" class="form-label">Nom:</label>
                    <input type='text' value='{{$client_details->nom}}'  name='nom' class="form-control " id="exampleInputUsername1" required>
                </div>

            </div>
            <div class="row mb-3">
              <div class="col">
                    <label class="form-label" for="exampleInputUsername1">Prenom:</label>
                    <input  type='text' value='{{$client_details->prenom}}' name='prenom'class="form-control"id="exampleInputUsername1" required>
             </div>       
           </div>
        <div class="row mb-3">
            <div class="col">
                    <label class="form-label" for="exampleInputUsername1">Numeros:</label>
                    <input  type='text' value='{{$client_details->phone}}' name='phone'class="form-control" id="exampleInputUsername1" required>
            </div>       
        </div>
 
        <div class="row mb-3">
            <div class="col">
                    <label class="form-label" for="exampleInputUsername1">Ville:</label>
                    <input  type='text' value='{{$client_details->ville}}' name='ville' class="form-control"id="exampleInputUsername1" required>
            </div>       
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label" for="exampleInputUsername1">Photo:</label>
                <input class="form-control" name='photo' type="file" id="Image">
               
            </div>
            </div>
                <div class="mb-3">
                    <img id='showImage' class="wd-80 rounded-circle" src="{{asset('upload/client_images/'.$client_details->photo)}}" alt="photo">
				</div>
    
            <div>
            <button style="margin-top:20px;" name="submit" type="submit" value="submit" class="btn btn-primary me-2">Modifier</button>
            </div>
         </div>
         </div>
        </form>
    </div>
</div>
</div>








@endsection