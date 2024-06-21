
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        @include("admin.admincss");

      </head>
      <body>
        <div class="container-scroller">
          @include("admin.navbar");
        </div>
        @if(!request()->is('admin/*'))
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Welcome to the Admin Dashboard</h4>
                                    <p class="card-text">Please select an action from the sidebar.</p>
                                </div>
                            </div>

        @endif

        @include("admin.adminscript");


      </body>
    </html>

