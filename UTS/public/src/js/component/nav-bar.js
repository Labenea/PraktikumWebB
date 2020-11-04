class NavBar extends HTMLElement {
  connectedCallback() {
    this.render();
  }
  render() {
    this.innerHTML = `
      <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="./index.html">PetaniKita</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarsExample04"
          aria-controls="navbarsExample04"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        

        <div class="collapse navbar-collapse" id="navbarsExample04">
          <div class="row justify-content-between mr-auto ml-auto w-100">
          <div class="col-md-6 d-flex align-items-center mt-2 mb-2 ">
          <div class="input-group input-group-sm ">
          <input
            type="text"
            class="form-control"
            placeholder="Search Products"
            aria-describedby="button-addon2"
          />
          <button
            class="btn btn-outline-secondary"
            type="button"
            id="button-addon2"
          >
            Search
          </button>
        </div>
        </div>
   
          <ul class="navbar-nav col-md justify-content-end mb-2 mb-md-0 pr-0">
            <li class="nav-item ml-2 mt-2 mb-2">
              <a class="btn btn-block btn-success mr-2" aria-current="page" href="./login.html"
                >Login</a
              >
            </li>
            <li class="nav-item ml-2 mt-2 mb-2">
              <a class="btn btn-block btn-primary" aria-current="page" href="./register.html"
                >Sign Up</a
              >
            </li>
          </ul>
   
          </div>
        </div>
      </div>
    </nav>`;
  }
}
customElements.define("nav-bar", NavBar);
