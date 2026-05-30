@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Table</a></li>
						<li class="breadcrumb-item active" aria-current="page">produit</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Liste des produit</h6>
                <div class="table-responsive">
                  <table id="example" class="table" >
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>Image</th>
                        <th>Marque</th>
                        <th>Prix</th>
                        <th>Categorie</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($produit as $single)
                      <tr>
                        <td>{{$single->nom_produit}}</td>
                        <td><img  src="{{asset('upload/produit_images/'.$single->image_produit)}}"></td>
                        <td>{{$single->marque_produit}}</td>
                        <td>{{$single->produit_prix}}</td>
                        <td>{{$single->get_categorie->nom_categorie}}</td>
                        <td>
                          <a href="{{url('/produits/modifier_produit/'.$single->id)}}" ><img disabled style="heigth:5px;cursor:pointer;" src="{{asset('upload/images/mo.png')}}"></a>
                          <a href="{{url('/produits/delete_produit/'.$single->id)}}" onclick="return confirm('Est tu sure de vouloir supprimer?')"> <img style="heigth:30px;cursor:pointer;"src="{{asset('upload/images/poubel.png')}}"></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
					</div>
				</div>

			</div>



@endsection