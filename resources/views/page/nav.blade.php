<nav class="col-2 bg-light pe-3 border-right"> <!-- Left Side Nav -->

    <h1 class="h4 py-3 text-center text-primary">
        <i class="fas fa-ghost mr-2"></i>
        <span class="d-none d-lg-inline">Dashboard</span>
    </h1>

    <div class="list-group text-center text-lg-start">
       

        <h5 class=" my-3">Mange Category</h5>

        <a href="{{route('category.create')}}" class="list-group-item list-group-item-action">
            <i class="fas fa-users"></i>
            <span class="d-none d-lg-inline">Create Category</span>
            {{--  <span class="d-none d-lg-inline badge bg-danger rounded-pill float-end">20</span>  --}}
        </a>
        <a href="{{route('category.index')}}" class="list-group-item list-group-item-action">
            <i class="fas fa-chart-line"></i>
            <span class="d-none d-lg-inline">Category Lists</span>
        </a>

        <h5 class=" my-3">Mange Article</h5>

        <a href="{{route('article.create')}}" class="list-group-item list-group-item-action">
            <i class="fas fa-users"></i>
            <span class="d-none d-lg-inline">Create Article</span>
            {{--  <span class="d-none d-lg-inline badge bg-danger rounded-pill float-end">20</span>  --}}
        </a>
        <a href="{{route('article.index')}}" class="list-group-item list-group-item-action">
            <i class="fas fa-chart-line"></i>
            <span class="d-none d-lg-inline">Article Lists</span>
        </a>

    </div>

    <h5 class=" my-3">Actions</h5>

    <div class="list-group mt-4 text-center text-lg-start">

        <a href="#" class="list-group-item list-group-item-action">
            <i class="fas fa-user"></i>
            <span class="d-none d-lg-inline">New User</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
            <i class="fas fa-edit"></i>
            <span class="d-none d-lg-inline">Update Data</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
            <i class="far fa-calendar-alt"></i>
            <span class="d-none d-lg-inline">Add Events</span>
        </a>
    </div>

</nav> <!-- Left Side Nav -->
