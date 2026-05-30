@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
<div class="card">
    <div class="card-body">
        <h2 class="card-title"style="margin-bottom:20px;">Modifier les produits</h2>
        <form class="forms-sample" action="" method="post" enctype='multipart/form-data' >
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleInputUsername1" class="form-label">Nom:</label>
                    <input type='text'  value='{{$produit_details->nom_produit}}'  name='nom_produit' class="form-control " id="exampleInputUsername1" required>
                </div>

            </div>
            <div class="row mb-3">
              <div class="col">
                    <label class="form-label" for="exampleInputUsername1">Marque:</label>
                    <input  type='text' value='{{$produit_details->marque_produit}}' name='marque_produit'class="form-control"id="exampleInputUsername1" required>
             </div>       
           </div>
        <div class="row mb-3">
            <div class="col">
                    <label class="form-label" for="exampleInputUsername1">Prix:</label>
                    <input  type='text' value='{{$produit_details->produit_prix}}' name='produit_prix'class="form-control" id="exampleInputUsername1" required>
            </div>       
        </div>
 
        <div class="row mb-3">
            <div class="col">
                    <label class="form-label" for="exampleInputUsername1">Categorie:</label>
                    <select class="form-select form-select-lg" name="categorie_id">
                        @foreach($categorie_liste as $single)
						<option value="{{$single->id}}">{{$single->nom_categorie}}</option>
                        @endforeach
					</select>
            </div>       
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label" for="exampleInputUsername1">Image:</label>
                <input class="form-control" name='image_produit' type="file" id="Image">
               
            </div>
            </div>
                <div class="mb-3">
                    <img id='showImage' class="wd-80 rounded-circle" src="{{asset('upload/produit_images/'.$produit_details->image_produit)}}" alt="photo">
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