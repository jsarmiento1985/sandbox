<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="#" class="navbar-brand">Task App</a>

    <ul class="navbar-nav ml-auto">
        <form class="form-inline my-2 my-lg-0">
            <input type="search" id="search" class="form-control mr-sm-2" placeholder="Search users">
            <button id="btn_buscar" class="btn btn-success my-2 my-sm-0" type="button">Buscar</button>
        </form>

    </ul>
</nav>

<div class="container p-5">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div id="div_task-form" class="card-body">
                    <form id="task-form">
                        <div class="form-group">
                            <input type="text" id="usuario" placeholder="Usuario" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <!-- <input type="text" id="email" placeholder="Email" class="form-control"> -->
                            <textarea id="email" cols="30" rows="10" class="form-control" placeholder="Email"></textarea>
                        </div>

                        <div class="form-group">
                            <!-- <input type="text" id="email" placeholder="Email" class="form-control"> -->
                            <input type="password" id="pass" class="form-control" placeholder="Password"></input>
                        </div>

                        <div class="form-group">
                            <button id="btn_save" type="submit" class="btn btn-primary btn-block text-center">
                                Save Users
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <table id="example" class="display compact" style="width: 100%">
                <thead>
                    <tr id="lista_tabla">
                        <th>ID</th>
                        <th>USUARIO</th>
                        <th>EMAIL</th>
                        <th>FECHA INGRESO</th>
                    </tr>
                </thead>
                <tbody id="tasks">

                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>

    </div>