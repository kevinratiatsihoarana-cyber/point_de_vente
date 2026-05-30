<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          POS
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item">
            <a href="{{url('/home')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Tableaux de bord</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="/calendrier" class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Calendrier</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">client</span>
              <i class="link-arrow" data-feather="plus"></i>
            </a>
            <div class="collapse" id="emails">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('/clients/ajouter_client')}}" class="nav-link">Ajouter des clients</a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/clients/gerer_client')}}" class="nav-link">gerer les clients</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#produit" role="button" aria-expanded="false" aria-controls="produit">
              <i class="link-icon" data-feather="codepen"></i>
              <span class="link-title">Produit</span>
              <i class="link-arrow" data-feather="plus"></i>
            </a>
            <div class="collapse" id="produit">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('/produits/ajouter_produit')}}" class="nav-link">Ajouter des produits</a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/produits/gerer_produit')}}" class="nav-link">gerer les produits</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#categorie" role="button" aria-expanded="false" aria-controls="categorie">
              <i class="link-icon" data-feather="layers"></i>
              <span class="link-title">Categorie</span>
              <i class="link-arrow" data-feather="plus"></i>
            </a>
            <div class="collapse" id="categorie">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('/categories/ajouter_categorie')}}" class="nav-link">Ajouter des categorie</a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/categories/gerer_categorie')}}" class="nav-link">gerer les categorie</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="{{url('transactions/transaction')}}" class="nav-link">
              <i class="link-icon" data-feather="command"></i>
              <span class="link-title">Transaction</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('payements/payement')}}" class="nav-link">
              <i class="link-icon" data-feather="command"></i>
              <span class="link-title">Historique</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('liste/produit')}}" class="nav-link">
              <i class="link-icon" data-feather="command"></i>
              <span class="link-title">Liste des produits</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>