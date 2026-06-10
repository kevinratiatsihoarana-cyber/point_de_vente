@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Table</a></li>
						<li class="breadcrumb-item active" aria-current="page">payement</li>
					</ol>
				</nav>
        

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Tous les payement</h6>
                <div class="table-responsive">
                  <table id="example" class="table" >
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Quantite</th>
                        <th>Total</th>
                        <th>status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($contents as $single)
                      <tr>
                        <td>{{$single->name}} </td>
                        <td>{{ date('d-m-Y') }}</td>
                        <td>{{$single->qty}}</td>
                        <td>{{Cart::total()}}</td>
                        <td><span class="badge bg-primary">payé<span></td>
                        <td>
                          <a  href="{{url('/voir_produit/'.$single->id)}}" class="btn btn-primary me-2"  >voir</a>
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