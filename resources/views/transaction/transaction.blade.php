@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Tables</a></li>
						<li class="breadcrumb-item active" aria-current="page">Transaction</li>
					</ol>
				</nav>

    <div class="row">
		<div class=" col-md-5 grid-margin " >

            <div class="card">
              <div class="card-body">
				
              <div class="row mb-3">
			       </div>
				   <div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th>Nom</th>
													<th>Prix</th>
													<th>Quantité</th>
													<th>Total</th>
													<th>Action</th>
												</tr>
											</thead>
										
											<tbody>
												@php
											  $prod=Cart::Content();
										
											  @endphp
												
												@foreach($prod as $single)
												<tr>

													<td>{{$single->name}}</td>
													<td>{{$single->price}}</td>
													<td>{{$single->qty}}</td>
													<td>{{$single->qty*$single->price}}</td>
													<td >
														<a href="{{url('/carts/remove_cart/'.$single->rowId)}}" onclick="return confirm('Est tu sure de vouloir supprimer?')"><img style="heigth:30px;cursor:pointer;margin-top:-6px;" src="{{asset('upload/images/poubel.png')}}"></a>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
										<div class="p-3">
										<h5 >T.V.A: {{Cart::tax()}}</h5>
										</div>
										<div class="p-3">
										<h5 >Sous-Total: {{Cart::subtotal()}}</h5>
										</div>
										<div class="p-3">
										<h5>Total: {{Cart::total()}}</h5>
										</div>
<form action="{{url('factures/facture')}}" method="post">
	@csrf
<div class="input-group">
					    <select class="form-select form-select-lg mb-3" name="cus_id" >
                                       @foreach($clients as $cus)
										<option value="{{$cus->id}}">{{$cus->prenom}}</option>
                                       @endforeach
						</select>
						
                    </div>
										<div class="p-3" style="margin-left:100px;">
										<button class="btn btn-primary" onclick="imprimeur('{{ route('facture') }}', 'facture')">Creer un ticket</button>
										</div>
								</div>
</form>
			 					
              </div>

            </div>
					</div>
					<div class="col-md-7 grid-margin stretch-card"style="padding-left:1px;" >
            <div class="card">
              <div class="card-body">
								<div class="table-responsive">
										<table id="example" class="table table-hover">
											<thead>
												<tr>
													<th>image</th>
													<th>nom</th>
													<th>categorie</th>
													<th>Quantite</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											@foreach($produit as $single)
												<tr>
													<form class="forms-sample" action="{{url('carts/ajouter_cart')}}" enctype="multipart/form-data" method="post">
														@csrf
														<input type="hidden" name="id_produit" value="{{$single->id}}">
														<input type="hidden" name="nom_produit" value="{{$single->nom_produit}}">
														<input type="hidden" name="produit_prix" value="{{$single->produit_prix}}">
													<td><img style="width: 40px;" src="{{asset('upload/produit_images/'.$single->image_produit)}}"></td>
													<td>{{$single->nom_produit}}</td>
													<td>{{$single->get_categorie->nom_categorie}}</td>
													<td><input style="width:70px;" class="form-control form control-sm" type='number' name='quantite' ></input></td>

													<td><button class="btn btn-primary btn-icon" type="submit" name="submit" value="submit" ><i data-feather="plus"></i></button></td>
													</form>
												</tr>
										    @endforeach
											</tbody>
										</table>
					</div>
               </div>
            </div>

		</div>
	</div>

@endsection
@push('scripts')
<script>
    // tambahkan untuk delete cookie innerHeight terlebih dahulu
    document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    
    function imprimeur(url, title) {
        popupCenter(url, title, 625, 500);
    }


    function popupCenter(url, title, w, h) {
        const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
        const dualScreenTop  = window.screenTop  !==  undefined ? window.screenTop  : window.screenY;

        const width  = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        const systemZoom = width / window.screen.availWidth;
        const left       = (width - w) / 2 / systemZoom + dualScreenLeft
        const top        = (height - h) / 2 / systemZoom + dualScreenTop
        const newWindow  = window.open(url, title, 
        `
            scrollbars=yes,
            width  = ${w / systemZoom}, 
            height = ${h / systemZoom}, 
            top    = ${top}, 
            left   = ${left}
        `
        );

        if (window.focus) newWindow.focus();
    }
</script>
@endpush