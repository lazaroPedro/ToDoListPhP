<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">ToDoList</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
      <div class="d-flex justify-content-between w-100 align-items-center">
        <ul class="navbar-nav flex-row">
          <li class="nav-item me-3">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
        </ul>

        <a class="btn btn-outline-success" href="{{ route('tasks.create') }}">
          Adicionar Tarefas
        </a>
      </div>
    </div>
  </div>
</nav>
