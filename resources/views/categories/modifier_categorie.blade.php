@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
<div class="card">
    <div class="card-body">
        <h2 class="card-title"style="margin-bottom:20px;">Modifier categorie</h2>
        <form class="forms-sample" action="" method="post" enctype='multipart/form-data' >
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleInputUsername1" class="form-label">Nom:</label>
                    <input type='text' value="{{$categorie_details->nom_categorie}}"  name='nom_categorie' class="form-control " id="exampleInputUsername1" required>
                </div>
            </div>
            <button style="margin-top:20px;" name="submit" type="submit" value="submit" class="btn btn-primary me-2">Modifier</button>
            </div>
         </div>
         </div>
        </form>
    </div>
</div>
</div>








@endsection