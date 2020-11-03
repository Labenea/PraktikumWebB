class NavBar extends HTMLElement {
  connectedCallback() {
    this.render();
  }
  render() {
    this.innerHTML = `
      <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">PetaniKita</a>
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

        <div class="input-group input-group-sm mt-auto mb-auto mb-3">
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

        <div class="collapse navbar-collapse" id="navbarsExample04">
          <ul class="navbar-nav ml-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="btn btn-success mr-2" aria-current="page" href="#"
                >Login</a
              >
            </li>
            <li class="nav-item">
              <a class="btn btn-primary" aria-current="page" href="#"
                >Sign Up</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>`;
  }
}
customElements.define("nav-bar", NavBar);
