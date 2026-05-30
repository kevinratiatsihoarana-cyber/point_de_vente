@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Table</a></li>
						<li class="breadcrumb-item active" aria-current="page">client</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Liste des clients</h6>
                <div class="table-responsive">
                  <table id="example" class="table" >
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Telephone</th>
                        <th>ville</th>
                        <th>photo</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($clients as $single)
                      <tr>
                        <td>{{$single->nom}}</td>
                        <td>{{$single->prenom}}</td>
                        <td>{{$single->phone}}</td>
                        <td>{{$single->ville}}</td>
                        <td><img  src="{{asset('upload/client_images/'.$single->photo)}}" ></td>
                        <td>
                          <a href="{{url('/clients/modifier_client/'.$single->id)}}" ><img style="heigth:5px;cursor:pointer;" src="{{asset('upload/images/mo.png')}}"></a>
                          <a href="{{url('/clients/delete_client/'.$single->id)}}" onclick="return confirm('Est tu sure de vouloir supprimer?')"> <img style="heigth:30px;cursor:pointer;"src="{{asset('upload/images/poubel.png')}}"></a>
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